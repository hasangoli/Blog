@extends('layout/app')
@section('main')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="row my-5" class="blog-sidebar-btns">
                        <p class="title-ads mx-auto text-nowrap "><a href="#">{{ __('main.linksAndPages') }}</a></p>
                    </div>
                </div>

                <div class="col-xl-8 mr-auto mx-auto">
                    <div class="row mx-auto links-container">
                        @foreach ($SocialNetworks as $SocialNetwork)
                            <div class="col-md-5 mx-3 tanager-title-cust my-5">
                                <div class="insta-links-and-pages row">
                                    <div class="col-9 my-auto pl-0 text-truncate1">
                                        <a href="{{ $SocialNetwork->url }}">
                                            {{ $SocialNetwork->title }}
                                        </a>
                                    </div>
                                    <div class="col-3 my-auto">
                                        <span>
                                            <img
                                                src="{{ asset('storage/socialNetwork/' . $SocialNetwork->image->title) }}"
                                                alt="instagram-logo">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
