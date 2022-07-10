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

                        {!! Form::open(['route' => ['admin.settings.updateAboutUs'], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">توضیحات</label>
                                            <textarea name="about_us" id="descriptionOfApplication"
                                                class="form-control border-input CkEditor">{{ $setting->about_us }}</textarea>
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
