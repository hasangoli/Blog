@extends('admin/layouts/app-dark')

@section('title', 'صفحه داشبورد')


@section('scripts')


@endsection
@push('script')
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $(".upload__inputfile").each(function() {
                $(this).on("change", function(e) {
                    console.log('here')
                    imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
                    $(".upload__img-wrap").empty()
                    imgWrap.html = "";
                    var maxLength = $(this).attr("data-max_length");

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {
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
                                reader.onload = function(e) {
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

            $("body").on("click", ".upload__img-close", function(e) {
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

@section('styles')


@endsection


@section('contents')



    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title">{{ $user->name }}</h4>
                    </div>
                    <div class="content">
                        {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put', 'enctype'=>'multipart/form-data']) }}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام </label>
                                    <input type="text" id="name" name="name" class="form-control border-input"
                                        placeholder="نام" value="{{ $user->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> نام خانوادگی </label>
                                    <input type="text" id="alias" name="lastname" class="form-control border-input"
                                        placeholder="نام مستعار" value="{{ $user->lastName }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input type="text" id="email" name="email" class="form-control border-input"
                                        placeholder="ایمیل" value="{{ $user->email }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره تماس</label>
                                    <input type="text" id="phone_number" name="phone" class="form-control border-input"
                                        placeholder="شماره تماس" value="{{ $user->phone }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> شماره تماس اضطراری</label>
                                    <input type="text" id="phone" name="emergency_phone" class="form-control border-input"
                                        placeholder="شماره تماس اظطراری" value="{{ $user->emergency_phone }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>آدرس</label>
                                    <input type="text" id="address" name="address" class="form-control border-input"
                                        placeholder="آدرس" value="{{ $user->address }}">
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12 mx-auto">
                            <div class="my-4 my-1 drop-region" >
                                <label for="image">عکس
                                </label>
                                <div class="drop-message">
                                    جهت بارگزاری عکس ،عکس ها را به داخل کادر بکشید و یا  <strong class="text-info">اینجا</strong> کلیک کنید
                                    <i class="fas fa-upload cus-upload-icon"></i>
                                    <input type="file" id="files" accept="image/*" name="image" style="display:none;"/>
                                </div>
                                <div class="image-preview">

                                    @if($user->image)
                                    <img class="thumbnail" src="{{ asset('storage/users/'.$user->image->title) }}" alt=""
                                    title="default">
                                    
                                    @else
                                    
                                    <img class="thumbnail" src="{{ asset('storage/users/default.png') }}" alt=""
                                    title="default">
                                    
                                    @endif

                                </div>
                            </div>
                        </div>


                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary btn-icon-text">ویرایش</button>
                        </div>
                        <div class="clearfix"></div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>





@endsection
