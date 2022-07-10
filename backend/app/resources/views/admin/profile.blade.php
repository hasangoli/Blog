@extends('admin/layouts/app-dark')

@section('title', 'تنظیمات')


@section('contents')
<div class="content">
    <div class="row px-3">
        <div class="col-md-12 py-3">
            <div class="card p-4">
                <div class="header">
                    <h4 class="title">profile</h4>
                </div>
                <div class="content">
                    {!! Form::open(['route' => 'admin.profile.update', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام</label>
                                    <input type="text" name="name" class="form-control border-input"
                                        placeholder="نام"
                                        value="{{ old('name',$adminInfo->name) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ایمیل (username)</label>
                                    <input type="text" name="email" class="form-control border-input"
                                        placeholder="ایمیل"
                                        value="{{ old('email',$adminInfo->email) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رمز</label>
                                    <input type="password" name="password" class="form-control border-input" placeholder="رمز"
                                        value="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تکرار رمز</label>
                                    <input type="password" name="password_confirmation" class="form-control border-input" placeholder="تکرار رمز"
                                        value="">
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

                                        @if($adminInfo->image)
                                        <img class="thumbnail" src="{{ asset('storage/settings/'.$adminInfo->image->title) }}"
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
