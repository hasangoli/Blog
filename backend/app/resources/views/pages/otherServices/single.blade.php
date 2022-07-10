@extends('layout/app')
@section('main')
<main>
        <div class="hero-wrap" style="background-image: url({{ asset('/storage/pages/' . $page->image_uri) }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">صفحه اصلی</a></span></p>

                    <p class="title-ads mx-auto fs-29 col-sm-9 col-lg-4">

                        {{ $page->title }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftc-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 wrap-about ftco-animate">
                    <div class="heading-section heading-section-wo-line mb-5  text-justify">
                        <div class="text-justify">
                            {{-- <h2 class="mb-4 text-center">{{ $page->title }}</h2> --}}
                        </div>
                        {!! $page->content !!}
                    </div>
                    <div class="pr-md-5 mr-md-5 mb-5">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($festival)
        <section>
                <div class="row">
                    <div class="col-11 col-lg-8 mx-auto">
                        <div class="mx-auto tanager-title-cus1 my-2 px-2 row">

                            <div class="col-4 my-5 mx-auto">

                                <a href="{{ $festival->festivalsUrl }}">
                                    <img class="img-page-cus img-eng-card" src="{{ asset('storage/festivals/' . $festival->festivalsLogo) }}"
                                        alt="advertising banner">
                                </a>
                            </div>
                            <div class="col-4 my-5 mx-auto">
                                <a href="{{ $festival->celebrationsUrl }}">
                                    <img class="img-page-cus img-eng-card" src="{{ asset('storage/festivals/' . $festival->celebrationsLogo) }}"
                                        alt="advertising banner">
                                </a>
                            </div>
                            <div class="col-4 my-5 mx-auto">
                                <a href="{{ $festival->LanguageCollegeUrl }}">
                                    <img class="img-page-cus     img-eng-card" src="{{ asset('storage/festivals/' . $festival->LanguageCollegeLogo) }}"
                                        alt="advertising banner">
                                </a>
                            </div>

                        </div>
                     </div>
                </div>
            {{-- <div class="row tanager-title owl-bottom-container py-3 px-5 mx-auto">
                <div class="owl-carousel owl-theme">

                        <div class="item">
                            <a href="{{ 'page/'.$festival->festivalsUrl }}">
                                <img class="img-eng-card" src="{{ asset('storage/festivals/' . $festival->festivalsLogo) }}"
                                    alt="advertising banner">
                            </a>
                        </div>

                        <div class="item">
                            <a href="{{ 'page/'.$festival->celebrationsUrl }}">
                                <img class="img-eng-card" src="{{ asset('storage/festivals/' . $festival->celebrationsLogo) }}"
                                    alt="advertising banner">
                            </a>
                        </div>

                        <div class="item">
                            <a href="{{ 'page/'.$festival->LanguageCollegeUrl }}">
                                <img class="img-eng-card" src="{{ asset('storage/festivals/' . $festival->LanguageCollegeLogo) }}"
                                    alt="advertising banner">
                            </a>
                        </div>

                </div>
            </div> --}}
        </section>
    @endif
</main>
@endsection
