@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')



@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title"></h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.festivals.update'], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            {{-- festivals url --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">لینک جشنواره ها</label>
                                    <input type="text" id="festivalsUrl" name="festivalsUrl" class="form-control border-input"
                                           placeholder="لینک جشنواره ها" value="{{ old('festivalsUrl',$festival->festivalsUrl) }}">
                                </div>
                            </div>

                            {{--  new image  --}}
                            {{-- <div class="col-md-12 mx-auto">
                                <div class="form-group">
                                    <label for="image">عکس:
                                    </label>
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                        <div class="row">
                                        <div class="col-md-6 col-sm-12 mx-auto d-flex justify-center">
                                        <label class="upload__btn">
                                            <input  name="festivalsLogo" type="file" multiple="" data-max_length="1" class="upload__inputfile">
                                        <p>بارگزاری عکس</p>
                                    </label>
                                </div>
                            </div> --}}

                          <div class="col-md-12 mx-auto">
                              <div class="my-4 my-1 drop-region" >
                                  <label for="image">عکس
                                  </label>
                                  <div class="drop-message">
                                      جهت بارگزاری عکس ،عکس ها را به داخل کادر بکشید و یا  <strong class="text-info">اینجا</strong> کلیک کنید
                                      <i class="fas fa-upload cus-upload-icon"></i>
                                      <input type="file" id="files" accept="image/*" name="festivalsLogo" style="display:none;" />
                                  </div>
                                  <div class="image-preview">

                                      @if($festival->festivalsLogo)
                                      <img class="thumbnail" src="{{ asset('storage/festivals/'.$festival->festivalsLogo) }}" alt="{{$festival->festivalsLogo}}"
                                      title="default">

                                      @endif

                                  </div>
                              </div>
                          </div>





                            {{-- <div>

                                <div class="upload__img-wrap">

                                    @if($festival->festivalsLogo)
                                    <img class="thumbnail" src="{{ asset('storage/festivals/'.$festival->festivalsLogo) }}" alt=""
                                    title="default">
                                    @else
                                        <img class="thumbnail" src=""
                                            title="default">
                                    @endif
                                </div>
                            </div> --}}

                            {{-- celebrations --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">لینک جشنواره ها و مراسمات</label>
                                    <input type="text" id="celebrationsUrl" name="celebrationsUrl" class="form-control border-input"
                                           placeholder="لینک جشنواره ها و مراسمات" value="{{ old('celebrationsUrl',$festival->celebrationsUrl) }}">
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
                                        <input type="file" id="files" accept="image/*" name="celebrationsLogo" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if($festival->celebrationsLogo)
                                        <img class="thumbnail" src="{{ asset('storage/festivals/'.$festival->celebrationsLogo) }}" alt="{{$festival->festivalsLogo}}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>

                            {{-- celebrations --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">لینک کالج زبان انگلیسی</label>
                                    <input type="text" id="LanguageCollegeUrl" name="LanguageCollegeUrl" class="form-control border-input"
                                           placeholder="لینک کالج زبان انگلیسی" value="{{ old('LanguageCollegeUrl',$festival->LanguageCollegeUrl) }}">
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
                                        <input type="file" id="files" accept="image/*" name="LanguageCollegeLogo" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if($festival->LanguageCollegeLogo)
                                        <img class="thumbnail" src="{{ asset('storage/festivals/'.$festival->LanguageCollegeLogo) }}" alt="{{$festival->festivalsLogo}}"
                                        title="default">

                                        @endif

                                    </div>
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

