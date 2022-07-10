@extends('layout/app')

@section('main')
    <main>
        <div class="container">
            <div style="position:relative;">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            
                            {{-- new carousel --}}
                            <div class="carusel-wrapper">
                                @foreach ($slider as $item)
                                    @if ($loop->first)
                                        <div class="carusel-item active">
                                            <img src="{{ asset('storage/slider/' . $item->image) }}" alt="">
                                        </div>
                                    @else
                                        <div class="carusel-item">
                                            <img src="{{ asset('storage/slider/' . $item->image) }}" alt="">
                                        </div>
                                    @endif
                                @endforeach

                                <div class="carusel-left-button"><i class="fa fa-chevron-left color-main"></i></div>
                                <div class="carusel-right-button"><i class="fa fa-chevron-right color-main"></i></div>
                            </div>


                            {{-- new carousel ended --}}
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-lg-3 col-md-12 mx-auto sidbar order-12 order-lg-1">
                                    @include('partial/adsSidebar')
                        </div>
                        <div class="col-lg-5 col-md-12 mx-auto main order-1 order-lg-2">

                            @include('partial/latest-news')

                            <div class="row" id="immigration-btn">
                                <p class="title-ads fs-29 mx-auto text-nowrap"><a href="{{ route('articles', 'asylum') }}">
                                        {{ __('main.ImmigrationAndAsylum') }}
                            </div>

                            @include('partial/immigration')

                            <div class="row" id="app-intro">
                                <p class="title-ads mx-auto fs-29"><a
                                        href="{{ route('appIntro') }}">{{ __('main.introducingTheApplication') }}</a>
                                </p>
                            </div>
                            <div class="col-lg-12 col-sm-8 mx-auto px-1" id="just-img">
                                @include('partial/just-img')
                            </div>
                            <div class="row" id="app-intro">
                                <p class="title-ads mx-auto"><a
                                        href="{{ route('networkActivities') }}">{{ __('main.networkActivities') }}</a>
                                </p>
                            </div>
                            <div class="row concert-cards">
                                <div class="col-lg-12 col-sm-8 mx-auto ">
                                    <div class="row">
                                        @foreach ($NetworkActives as $NetworkActive)
                                            <div class="col-6 mx-auto px-1">
                                                <div class="post advertising-image">
                                                    <a
                                                        href="{{ route('networkActivitiesSingle', $NetworkActive->slug) }}">
                                                        <img src="{{ asset('storage/NetworkActives/' . $NetworkActive->image->title) }}"
                                                            alt="advertising image">
                                                        <div class="bg-title concert-card-txt">
                                                            <div class="text-overlay pt-4 mx-auto text-overlay-cus">
                                                                <div class="text-nowrap">{{ $NetworkActive->title }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 mx-auto order-2 order-lg-3">
                            <div class="row ">
                                <div class="col-lg-12 col-sm-8 mx-auto px-1 sidbar">
                                    @include('partial/festivals')
                                </div>



                                <div class="col-lg-11 col-sm-8 mx-auto px-1 sidbar">
                                    @include('partial/socialNetwork')
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="row tanager-title owl-bottom-container py-3 px-5 mx-auto">

                        @include('partial/owlCarousel')

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
