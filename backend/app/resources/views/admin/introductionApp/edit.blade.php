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

                        {!! Form::open(['route' => ['admin.settings.updateIntroductionApplication'], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

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

                                        @if($setting->image)
                                        <img class="thumbnail" src="{{ asset('storage/settings/'.$setting->image->title) }}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">توضیحات</label>
                                    <textarea name="descriptionOfApplication" id="descriptionOfApplication"
                                              class="form-control border-input CkEditor">{{ old('country_id',$setting->descriptionOfApplication) }}</textarea>
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

