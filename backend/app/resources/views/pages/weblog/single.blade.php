@extends('layout/app')
@section('main')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4  order-12 order-lg-1 m-10 ">

                    @include('partial/blogSidebar')

                    <div class="alert-box mt-4 mx-auto ">
                        <div>توجه:</div>
                        <div>
                            جهت ارسال نظرات و پیشنهادات خود از طریق اپلیکیشن اقدام نمایید
                        </div>
                    </div>

                </div>
                <div class="col-md-12  col-lg-8 mx-auto order-1 order-lg-12">
                    <img class="myblog-image" src="{{ asset('storage/articles/' . $article->image->title) }}"
                        alt="myblog-image">
                    <div class="row my-5" class="blog-sidebar-btns">
                        <p class="title-ads mx-auto text-nowrap"><a>{{ $article->title }}</a></p>
                    </div>
                    <div class="text-div">
                        {!! $article->description !!}
                    </div>
                    <div class="rating">
                        <span class="rating-panel">
                            @php
                                if (isset($article->score)) {
                                    for ($i = 0; $i < ceil($article->score->rate); $i++) {
                                        echo '<a href="#" class="mx-1"><i class="fa fa-star fa-2x text-warning"></i></a>';
                                    }
                                    for ($i = $i; $i < 5; $i++) {
                                        echo '<a href="#" class="mx-1"><i class="fa fa-star-o fa-2x text-warning"></i></a>';
                                    }
                                } else {
                                    for ($i = 1; $i < 6; $i++) {
                                        echo '<a href="#" class="mx-1"><i class="fa fa-star-o fa-2x text-warning"></i></a>';
                                    }
                                }
                            @endphp
                        </span>
                        <p>امتیاز:
                            {{ isset($article->score->rate) ? ceil($article->score->rate) : 'هنوز امتیازی داده نشده است' }}
                        </p>
                    </div>
                    <div>
                        <div class="row my-5" class="blog-sidebar-btns">
                            <p class="title-ads mx-auto text-nowrap"><a href="#">نظرات کاربران</a></p>
                        </div>
                        <div>

                            @include('partial/user-comments')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
