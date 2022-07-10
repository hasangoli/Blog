@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')




@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title">ویرایش ({{ $product->title }})</h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.products.update',$product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                           placeholder="عنوان" value="{{ $product->title }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control border-input"
                                           placeholder="slug" value="{{ old('slug') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pricePound">قیمت به پوند</label>
                                    <input type="text" id="pricePound" name="pricePound" class="form-control border-input"
                                           placeholder="قیمت به پوند" value="{{ $product->pricePound }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priceToman">قیمت به تومن</label>
                                    <input type="text" id="priceToman" name="priceToman" class="form-control border-input"
                                           placeholder="قیمت به تومن" value="{{ $product->priceToman }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productCode">کد محصول</label>
                                    <input type="text" id="productCode" name="productCode" class="form-control border-input"
                                           placeholder="کد محصول" value="{{ $product->productCode }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category">دسته بندی</label>
                                    <select name="category_id" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == $product->category_id ) checked @endif> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">قیمت</label>
                                    <input type="text" id="price" name="price" class="form-control border-input"
                                           placeholder="قیمت" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">توضیحات</label>
                                    <textarea name="description" id="description"
                                              class="form-control border-input CkEditor">{{ $product->description }}</textarea>
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
                                            <img class="thumbnail" src="{{ asset('storage/products/'.$item->title) }}" alt=""
                                            title="default">
                                        @endforeach
                                    @else
                                        <img class="thumbnail" src=""
                                            title="default">
                                    @endif

                                </div>
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

