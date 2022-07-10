@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title">ویرایش ({{ $recruitmentAds->title }})</h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.recruitmentAds.update', $recruitmentAds->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                        placeholder="عنوان" value="{{ old('title', $recruitmentAds->title) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control border-input"
                                        placeholder="slug" value="{{ old('slug', $recruitmentAds->slug) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">جایگاه</label>
                                    <input type="text" name="index" class="form-control border-input"
                                           placeholder="جایگاه" value="{{ old('index', $recruitmentAds->index!=0 ? $recruitmentAds->index : 0) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">دسته بندی</label>
                                    <select name="category_id" id="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($category->id == $recruitmentAds->category_id) checked @endif>
                                                {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country_id">کشور</label>
                                    <select name="country_id" id="country_id">

                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @if ($country->id == $recruitmentAds->country_id) selected @endif>
                                                {{ $country->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label for="country_id">نوع آگهی</label>
                                    <select name="type" id="type">

                                        <option value="Advertising" @if ($recruitmentAds->type == 'Advertising') selected @endif> آگهی </option>
                                        <option value="Requirements" @if ($recruitmentAds->type == 'Requirements') selected @endif> نیازمندی </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">توضیحات</label>
                                    <textarea name="description" id="description"
                                        class="form-control border-input CkEditor">{{ old('description', $recruitmentAds->description) }}</textarea>
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

                                    @if($images)
                                        @foreach ($images as $item)
                                            <img class="thumbnail" src="{{ asset('storage/recruitmentAds/'.$item->title) }}" alt=""
                                            title="default">
                                        @endforeach
                                    @else
                                        <img class="thumbnail" src=""
                                            title="default">
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success btn-icon-text">
                                <i class="fas fa-check-circle"></i>
                                ثبت
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
