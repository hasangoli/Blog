@extends('layout/app')
@section('main')
    <main>
        <div class="container">
            <div class="row mx-auto">
                <div class="col-md-7 mx-auto">
                    <div class="row my-5" class="blog-sidebar-btns">
                        <p class="title-ads mx-auto text-nowrap"><a href="#">{{ __('main.networkActivities') }}</a></p>
                    </div>

                 {{-- show video --}}
                @if ($networkActivitie->video)
                <div class="row">
                    <div class="col-md-12 d-flex mx-auto justify-content-center ">
                            <video class="col-md-12 w-inherit" controls>
                            <source src="{{ asset('storage/NetworkActives/'.$networkActivitie->video->title) }}" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                            </video>
                    </div>
                </div>

                        {{-- show image --}}
                    @else
                        <img class="myblog-image"
                            src="{{ asset('storage/NetworkActives/' . $networkActivitie->image->title) }}"
                            alt="myblog-image">
                    @endif

                    <div class="text-div my-5">{!! $networkActivitie->description !!}</div>
                    <div class="rating">
                        <span class="rating-panel">
                            @php
                                if (isset($networkActivitie->score)) {
                                    for ($i = 0; $i < ceil($networkActivitie->score->rate); $i++) {
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
                            {{ isset($networkActivitie->score->rate) ? ceil($networkActivitie->score->rate) : 'هنوز امتیازی داده نشده است' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
