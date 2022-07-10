
@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')

@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title"></h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => 'admin.pages.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                           placeholder="عنوان" value="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control border-input"
                                           placeholder="slug" value="">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">توضیحات</label>
                                    <textarea name="description" id="description"
                                              class="form-control border-input"></textarea>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">محنوا</label>
                                    <textarea name="content" id="content"
                                              class="form-control border-input CkEditor"></textarea>
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

