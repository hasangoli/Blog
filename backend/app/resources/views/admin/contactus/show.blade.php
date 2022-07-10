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

                        <div class="row">

                            <div class="col-12 mb-5">
                                نام : {{ $contactus->name }}
                            </div>

                            <div class="col-12 mb-5">
                                نام خانوادگی : {{ $contactus->lastName }}
                            </div>

                            <div class="col-12 mb-5">
                                شماره تماس : {{ $contactus->phone }}
                            </div>

                            <div class="col-12 mb-5">
                                <span class="col-12 d-block "> : پیام  </span>
                                <span class="col-12 d-block my-2">{{ $contactus->message }}</span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

