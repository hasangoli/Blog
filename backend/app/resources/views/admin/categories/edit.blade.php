@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')



@section('styles')\

@endsection


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title"> ویرایش ({{ $category->title }})</h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.categories.update',$category->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">
                            <input type="hidden" name="modelType" value="{{ $category->modelType }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                           placeholder="عنوان" value="{{ $category->title }}">
                                </div>
                            </div>
                        </div>

                        @if ($model == "article")
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">نوع</label>
                                        <select class="select-form" name="type" id="type">

                                            <option value="news" @if ($category->type == 'news') selected  @endif> آخرین اخبار و رویدادها</option>
                                            <option value="rules" @if ($category->type == 'rules') selected  @endif> قوانین بریتانیا</option>
                                            <option value="asylum" @if ($category->type == 'asylum') selected  @endif> مهاجرت و پناهندگی</option>
                                            <option value="covid" @if ($category->type == 'covid') selected  @endif> کوید 19</option>

                                        </select>
                                    </div>
                                </div>
                            @endif

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success btn-icon-text">
                                <i class="fas fa-check-circle"></i>
                                ثبت
                            </button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

