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

                        {!! Form::open(['route' => ['admin.festivalapps.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" id="title" name="title" class="form-control border-input"
                                               placeholder="عنوان" value="{{ old('title') }}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">نوع</label>
                                        <select name="type" id="type">

                                            <option value="festival"> جشنواره ها و مسابقات</option>
                                            <option value="concert"> مراسمات و کنسرت ها</option>
                                            <option value="college"> کالج زبان انگلیسی</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
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


                                <div>
                                     <input type="file" id="files" accept="video/*" name="video[]"  multiple/>
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

