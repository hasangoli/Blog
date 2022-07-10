@extends('layout/app')
@section('main')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4  order-12 order-lg-1">
                    @include('partial/blogSidebar')
                </div>

                <div class="col-md-12  col-lg-8 mx-auto order-1 order-lg-12 ">
                    <div class="row">

                        <div class="col-xl-8 col-sm-12 col-md-12 col-lg-12 mx-auto">

                            <div class="row" id="immigration-btn">
                                <p class="title-ads fs-29 mx-auto text-nowrap"><a href="#">
                                        @switch($type)
                                            @case ('news')
                                                {{ __('header.latestNews') }}
                                            @break
                                            @case ('rules')
                                                {{ __('header.britishLaw') }}
                                            @break
                                            @case ('asylum')
                                                {{ __('header.immigrationAndAsylum') }}
                                            @break
                                            @case ('covid')
                                                {{ __('header.covid19') }}
                                            @break
                                        @endswitch
                            </div>

                            @include('partial/immigration')

                        </div>


                        {!! $articles->appends(request()->input())->links('vendor.pagination.bootstrap-4') !!}

                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection
