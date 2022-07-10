@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')


@push('script')
    <script>jQuery(document).ready(function () {
    ImgUpload();
  });

  function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $(".upload__inputfile").each(function () {
      $(this).on("change", function (e) {
        console.log('here')
        imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
        $(".upload__img-wrap").empty()
        imgWrap.html="";
        var maxLength = $(this).attr("data-max_length");

        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;
        filesArr.forEach(function (f, index) {
          if (!f.type.match("image/*")) {
            return;
          }

          if (imgArray.length > maxLength) {
            return false;
          } else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
              if (imgArray[i] !== undefined) {
                len++;
              }
            }
            if (len > maxLength) {
              return false;
            } else {
              imgArray.push(f);

              var reader = new FileReader();
              reader.onload = function (e) {
                var html =
                  "<div class='upload__img-box'><div style='background-image: url(" +
                  e.target.result +
                  ")' data-number='" +
                  $(".upload__img-close").length +
                  "' data-file='" +
                  f.name +
                  "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                imgWrap.append(html);
                iterator++;
              };
              reader.readAsDataURL(f);
            }
          }
        });
      });
    });

    $("body").on("click", ".upload__img-close", function (e) {
      var file = $(this).parent().data("file");
      for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i].name === file) {
          imgArray.splice(i, 1);
          break;
        }
      }
      $(this).parent().parent().remove();
    });
  }
  </script>

@endpush


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title">ویرایش ({{ $gallery->title }})</h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.galleries.update',$gallery->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                           placeholder="عنوان" value="{{ old('title',$gallery->title) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control border-input"
                                           placeholder="slug" value="{{ old('slug',$gallery->slug) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">نوع</label>
                                    <select name="type" id="type">
                                        <option value="yellowCard" @if (old('type',$gallery->type) == 'yellowCard') selected @endif>کارت زرد</option>
                                        <option value="greenCard" @if (old('type',$gallery->type) == 'greenCard') selected @endif>کارت سبز</option>
                                        <option value="BritainInTheMirrorOfHistory" @if (old('type',$gallery->type) == 'BritainInTheMirrorOfHistory') selected @endif>بریتانیا در آینه تاریخ</option>
                                        <option value="interview" @if (old('type',$gallery->type) == 'interview') selected @endif> مصاحبه </option>
                                        <option value="pictures" @if (old('type',$gallery->type) == 'pictures') selected @endif>تصاویر</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea name="description" id="description"
                                              class="form-control border-input CkEditor">{{ old('description',$gallery->description) }}</textarea>
                                </div>
                            </div>


                            {{--  new image  --}}

                              <div class="col-md-12 mx-auto">
                                <div class="my-4 my-1 drop-region" >
                                    <label for="image">عکس
                                    </label>
                                    <div class="drop-message">
                                        جهت بارگزاری عکس ،عکس ها را به داخل کادر بکشید و یا  <strong class="text-info">اینجا</strong> کلیک کنید
                                        <i class="fas fa-upload cus-upload-icon"></i>
                                        <input type="file" id="files" accept="image/*" name="image" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if($gallery->image)
                                        <img class="thumbnail" src="{{ asset('storage/gallery/'.$gallery->image->title) }}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video">ویدیو(اختیاری)</label>
                                    <input type="file" id="video" name="video" accept="video/*" class="form-control border-input"
                                           value="">
                                </div>
                                @if ($gallery->video)
                                    <div class="thumbnail">
                                        <video style="width:100%" controls class="float-right">
                                            <source src="{{ asset('storage/gallery/' . $gallery->video->title) }}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success btn-icon-text">
                                <i class="fas fa-check-circle"></i>
                                ثبت
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

