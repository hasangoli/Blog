@extends('layout/app')
@section('main')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row my-5" class="blog-sidebar-btns">
                        <p class="title-ads mx-auto text-nowrap"><a href="#">{{ $gallery->title }} </a></p>
                    </div>

                    {{-- show video --}}
                    <div class="col-md-10 mx-auto ">
                        @if ($gallery->video)
                            <video width="100%" height="auto" controls>
                                <source src="{{ asset('storage/gallery/' . $gallery->video->title) }}" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>

                            {{-- show image --}}
                        @else
                            <img class="myblog-image"
                                src="{{ asset('storage/gallery/' . $gallery->image->title) }}" alt="myblog-image">
                        @endif
                    </div>

                    @if ($gallery->description)
                        <div class=" col-md-10 mx-auto comment-container">{!! $gallery->description !!}</div>
                    @endif

                    <div class="rating">
                        <span class="rating-panel">
                            @php
                                if (isset($gallery->score)) {
                                    for ($i = 0; $i < ceil($gallery->score->rate); $i++) {
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
                            {{ isset($gallery->score->rate) ? ceil($gallery->score->rate) : 'هنوز امتیازی داده نشده است' }}
                        </p>
                    </div>
                    <div>
                        <div class="row my-5" class="blog-sidebar-btns">
                            <p class="title-ads mx-auto text-nowrap"><a href="#">نظرات کاربران</a></p>
                        </div>
                        <div class="col-md-9 mx-auto">
                            @include('partial/user-comments')

                            <div class="alert-box col-md-4 mx-auto">
                                <div>توجه:</div>
                                <div>
                                    جهت ارسال نظرات و پیشنهادات خود از طریق اپلیکیشن اقدام نمایید
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
