@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')



@section('styles')

@endsection


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title">ویرایش ({{ $article->title }})</h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.articles.update',$article->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                           placeholder="عنوان" value="{{ old('title',$article->title)  }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control border-input"
                                           placeholder="slug" value="{{ old('slug',$article->slug) }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">نوع</label>
                                    <select name="type" id="type" onChange="getCategories(this)">

                                        <option value="news" @if($article->title=='news') selected @endif> آخرین اخبار و رویدادها </option>
                                        <option value="rules" @if($article->title=='rules') selected @endif> قوانین بریتانیا </option>
                                        <option value="asylum" @if($article->title=='asylum') selected @endif> مهاجرت و پناهندگی </option>
                                        <option value="covid" @if($article->title=='covid') selected @endif> کوید 19 </option>

                                    </select>
                                </div>
                            </div>

                            <script>

                                    function getCategories(x){
                                        let type = $(x).find(' option:selected ').val();
                                        let urlRoute = "{{ route('admin.articles.getCategories') }}";
                                        let data = {
                                            'type':type,
                                            '_token':"{{ csrf_token() }}"
                                            };
                                        $.post(urlRoute , data , function(msg){
                                            $(' #category option').remove();
                                            $.each(msg,function(index,value){
                                                let options = `
                                                <option value="${value.id}">${value.title}</option>
                                                `;
                                                $(' #category ').append(options);
                                            });
                                        },'json');
                                    }
                                </script>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country_id">کشور</label>
                                    <select name="country_id" id="country_id">

                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" @if($country->id== old('country_id',$article->country_id)) selected @endif> {{ $country->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category">دسته بندی </label>
                                    <select name="category_id" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == old('category_id',$article->category_id) ) checked @endif> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">توضیحات</label>
                                    <textarea name="description" id="description"
                                              class="form-control border-input CkEditor">{{ old('country_id',$article->description) }}</textarea>
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
                                    <input type="file" id="files" accept="image/*" name="image" style="display:none;"/>
                                </div>
                                <div class="image-preview">

                                    @if($article->image)
                                    <img class="thumbnail" src="{{ asset('storage/articles/'.$article->image->title) }}" alt=""
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
                        <div class="clearfix"></div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

