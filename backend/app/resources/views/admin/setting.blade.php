@extends('admin/layouts/app-dark')

@section('title', 'تنظیمات')


@section('styles')

@endsection

@section('contents')
<div class="content">
    <div class="row px-3">
        <div class="col-md-12 py-3">
            <div class="card p-4">
                <div class="header">
                    <h4 class="title">تنظیمات</h4>
                </div>
                <div class="content">
                    {!! Form::open(['route' => 'admin.settings.update', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>عنوان سایت</label>
                                    <input type="text" name="titleSite" class="form-control border-input"
                                        placeholder="عنوان سایت"
                                        value="{{ old('titleSite',$setting->titleSite) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>آدرس</label>
                                    <input type="address" name="address" class="form-control border-input"
                                        placeholder="آدرس"
                                        value="{{ old('address',$setting->address) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>قیمت نیازمندی ها (پوند)</label>
                                    <input type="text" name="ads_pound" class="form-control border-input"
                                        placeholder="قیمت نیازمندی ها (پوند)"
                                        value="{{ old('ads_pound',$setting->ads_pound) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>قیمت نیازمندی ها (تومن)</label>
                                    <input type="text" name="ads_toman" class="form-control border-input"
                                        placeholder="قیمت نیازمندی ها (تومن)"
                                        value="{{ old('ads_toman',$setting->ads_toman) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input type="email" name="email" class="form-control border-input" placeholder="ایمیل"
                                        value="{{ old('email',$setting->email) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contactAdmin">کد پستی</label>
                                    <input type="text" name="postalCode" class="form-control border-input"
                                        placeholder="کد پستی"
                                        value="{{ old('postalCode',$setting->postalCode) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contactAdmin">ارتباط با مدیر</label>
                                    <input type="text" name="contactAdmin" class="form-control border-input"
                                        placeholder="Contact admin"
                                        value="{{ old('contactAdmin',$setting->contactAdmin) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ConnectToWebSupport">ارتباط با پشتیبان وب</label>
                                    <input type="text" name="ConnectToWebSupport" class="form-control border-input"
                                        placeholder="ConnectToWebSupport"
                                        value="{{ old('ConnectToWebSupport',$setting->ConnectToWebSupport) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contactOffice">ارتباط با دفتر</label>
                                    <input type="text" name="contactOffice" class="form-control border-input"
                                        placeholder="Contact office"
                                        value="{{ old('contactOffice',$setting->contactOffice) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telegram">تلگرام</label>
                                    <input type="text" name="telegram" class="form-control border-input"
                                        placeholder="تلگرام"
                                        value="{{ old('telegram',$setting->telegram) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instagram">اینستاگرام</label>
                                    <input type="text" name="instagram" class="form-control border-input" placeholder="اینستاگرام"
                                        value="{{ old('instagram',$setting->instagram) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>واتساپ</label>
                                    <input type="text" name="whatsApp" class="form-control border-input"
                                        placeholder="واتساپ"
                                        value="{{ old('whatsApp',$setting->whatsApp) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="youtube">یوتیوب</label>
                                    <input type="text" name="youtube" class="form-control border-input"
                                        placeholder="یوتیوب"
                                        value="{{ old('youtube',$setting->youtube) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="linkedin">فیسبوک</label>
                                    <input type="text" name="facebook" class="form-control border-input"
                                        placeholder="فیسبوک"
                                        value="{{ old('facebook',$setting->facebook) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="twitter">توییتر</label>
                                    <input type="text" name="twitter" class="form-control border-input"
                                        placeholder="توییتر"
                                        value="{{ old('twitter',$setting->twitter) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                            <label style="float:right" for="TermsAndConditions">قوانین و مقررات اپلیکیشن</label>
                                <div style="margin-top:30px !important" class="form-group">

                                    <textarea name="TermsAndConditions" id="TermsAndConditions"
                                              class="form-control border-input CkEditor">{{ old('TermsAndConditions',$setting->TermsAndConditions) }}</textarea>
                                </div>
                            </div>

                        </div>

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

                                        @if($setting->logo)
                                        <img class="thumbnail" src="{{ asset('storage/settings/'.$setting->logo) }}"
                                        title="default">

                                        @endif

                                    </div>
                                </div>
                            </div>
                            {{--  new image end  --}}
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success btn-icon-text"><i class="fas fa-check"></i> ثبت تغییرات </button>
                        </div>
                   {{ Form::close() }}
            </div>
        </div>

    </div>
</div>

@endsection
