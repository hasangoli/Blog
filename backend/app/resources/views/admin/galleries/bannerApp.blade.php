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

                        {!! Form::open(['route' => ['admin.bannerApp.update'], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            {{-- festivals url --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">بنر کارت سبز</label>
                                </div>
                            </div>

                          <div class="col-md-12 mx-auto">
                              <div class="my-4 my-1 drop-region" >
                                  <label for="image">عکس
                                  </label>
                                  <div class="drop-message">
                                      جهت بارگزاری عکس ،عکس ها را به داخل کادر بکشید و یا  <strong class="text-info">اینجا</strong> کلیک کنید
                                      <i class="fas fa-upload cus-upload-icon"></i>
                                      <input type="file" id="files" accept="image/*" name="greencardBanner" style="display:none;" />
                                  </div>
                                  <div class="image-preview">

                                      @if(\Storage::disk('public')->exists('gallery/greencardBanner.png'))
                                      <img class="thumbnail" src="{{ asset('storage/gallery/greencardBanner.png') }}" >

                                      @endif

                                  </div>
                              </div>
                          </div>

                            {{-- celebrations --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"> بنر بنر کارت زرد </label>
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
                                        <input type="file" id="files" accept="image/*" name="yellowcardBanner" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if(\Storage::disk('public')->exists('gallery/yellowcardBanner.png'))
                                        <img class="thumbnail" src="{{ asset('storage/gallery/yellowcardBanner.png') }}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>

                            {{-- celebrations --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">بنر بریتانیا در آیینه تاریخ</label>
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
                                        <input type="file" id="files" accept="image/*" name="britaniaHistorycardBanner" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if(\Storage::disk('public')->exists('gallery/britaniaHistorycardBanner.png'))
                                        <img class="thumbnail" src="{{ asset('storage/gallery/britaniaHistorycardBanner.png') }}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">بنر تصاویر</label>
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
                                        <input type="file" id="files" accept="image/*" name="pictuerBanner" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if(\Storage::disk('public')->exists('gallery/pictuerBanner.png'))
                                        <img class="thumbnail" src="{{ asset('storage/gallery/pictuerBanner.png') }}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">بنر مصاحبه</label>
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
                                        <input type="file" id="files" accept="image/*" name="interviewBanner" style="display:none;" />
                                    </div>
                                    <div class="image-preview">

                                        @if(\Storage::disk('public')->exists('gallery/interviewBanner.png'))
                                        <img class="thumbnail" src="{{ asset('storage/gallery/interviewBanner.png') }}"
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

