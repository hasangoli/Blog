@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')

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
                        <h4 class="title"></h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => 'admin.recruitmentAds.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" id="title" name="title" class="form-control border-input"
                                               placeholder="عنوان" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">slug</label>
                                        <input type="text" id="slug" name="slug" class="form-control border-input"
                                               placeholder="slug" value="{{ old('slug') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">جایگاه</label>
                                        <input type="text" id="slug" name="index" class="form-control border-input"
                                               placeholder="جایگاه" value="{{ old('index') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">دسته بندی</label>
                                        <select name="category_id" id="category">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">کشور</label>
                                        <select name="country_id" id="country_id">

                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}"> {{ $country->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mx-auto">
                                    <div class="form-group">
                                        <label for="country_id">نوع آگهی</label>
                                        <select name="type" id="type">

                                            <option value="Advertising"> آگهی </option>
                                            <option value="Requirements"> نیازمندی </option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="description" class="float-right d-block">توضیحات</label>
                                    <div class="form-group">
                                        <textarea name="description" id="description"
                                                  class="form-control border-input CkEditor">{{ old('description') }}</textarea>
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
                                        <input type="file" id="files" accept="image/*" name="image[]" style="display:none;" multiple/>
                                    </div>
                                    <div class="image-preview">


                                    </div>
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

