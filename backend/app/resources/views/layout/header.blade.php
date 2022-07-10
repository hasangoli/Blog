<div class="mx-auto tanager-title my-2 px-2">
    <p class="shadow-text text-nowrap">{{ $setting->titleSite }}</p>
</div>

<div class="col-md-12">

    <header>
        {{-- toggle menu start --}}
        <div class="menu-wrap d-lg-none">
            <input type="checkbox" class="toggler" id="toggler">
            <div class="hamburger">
                <div></div>
            </div>
            <div class="menu ">
                <div style=" overflow-x: hidden; overflow-y: auto;">
                    <div>
                        <ul>
                            <span class="close-btn-menu"><button type="button" class="close close-cus" data-dismiss="menu" aria-label="Close" onclick="closeMenue()">
                                <span class="close-bg" aria-hidden="true">X</span>
                            </button></span>
                            <li><a class="mr-4" href="{{ route('index') }}">{{ __('header.home') }}</a>
                            </li>
                            <ul class="accordion">
                                <li class="accordion-item ">
                                    <h3 class="accordion-thumb">{{ __('header.weblog') }} </h3>
                                    <p class="accordion-panel">
                                        <a class="d-block my-2" href="
                                            {{ route('articles', 'news') }}">{{ __('header.latestNews') }}</a>
                                        <a class="d-block my-2"
                                            href="{{ route('articles', 'rules') }}">{{ __('header.britishLaw') }}</a>
                                        <a class="d-block my-2"
                                            href="{{ route('articles', 'asylum') }}">{{ __('header.immigrationAndAsylum') }}
                                        </a>
                                        <a class="d-block my-2"
                                            href="{{ route('articles', 'covid') }}">{{ __('header.covid19') }}</a>
                                    </p>
                                </li>
                            </ul>
                            <ul class="accordion">
                                <li class="accordion-item ">
                                    <h3 class="accordion-thumb">{{ __('header.gallery') }} </h3>
                                    <p class="accordion-panel">
                                        <a class="d-block my-2" href="{{ route('gallery', 'yellowCard') }}">
                                            {{ __('header.yellowCard') }}
                                        </a>
                                        <a class="d-block my-2" href="{{ route('gallery', 'greenCard') }}">
                                            {{ __('header.greenCard') }}
                                        </a>
                                        <a class="d-block my-2"
                                            href="{{ route('gallery', 'BritainInTheMirrorOfHistory') }}">
                                            {{ __('header.BritainInTheMirrorOfHistory') }}
                                        </a>
                                        <a class="d-block my-2" href="{{ route('gallery', 'interview') }}">
                                            {{ __('header.interview') }}
                                        </a>
                                        <a class="d-block my-2" href="{{ route('gallery', 'pictures') }}">
                                            {{ __('header.pictures') }}
                                        </a>
                                    </p>
                                </li>
                            </ul>
                            <li><a class="mr-4"
                                    href="{{ route('requirements', 'Requirements') }}">{{ __('header.requirements') }}</a>
                            </li>
                            <li><a class="mr-4"
                                    href="{{ route('socialNetworks') }}">{{ __('header.linksAndPages') }}</a>
                            </li>
                            <li><a class="mr-4"
                                    href="{{ route('appIntro') }}">{{ __('header.appIntro') }}</a></li>
                            <ul class="accordion">
                                <li class="accordion-item ">
                                    <h3 class="accordion-thumb">{{ __('header.otherSrvices') }} </h3>
                                    <p class="accordion-panel">
                                        @foreach ($pages as $page)

                                            <a class="d-block my-2" href="{{ route('pageSingle', $page->slug) }}">
                                                {{ $page->title }}
                                            </a>

                                        @endforeach
                                    </p>
                                </li>
                            </ul>
                            <li><a class="mr-4"
                                    href="{{ route('contactus') }}">{{ __('header.contactus') }}</a></li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>

        {{-- tiggle menu ends --}}

        <nav id="cssmenu">
            <div class="d-lg-none  m-74">
                <div class="d-flex">

                    <ol class="pr-1">

                        <li class="language d-flex">
                            <a class="d-flex" href="#" id="languagePhone">
                                <p style="color:#0f2a60;" class="ml-1">{{ __('main.language') }}</p> <i
                                    style="color:#0f2a60;" class="fa fa-caret-down drop-down-item"></i>
                            </a>

                            <ul>
                                <li>
                                    <a class="mt-2" href="{{ url('locale/fa') }}">
                                        <p>فارسی</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="mt-2" href="{{ url('locale/en') }}">
                                        <p>English</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="mt-2" href="{{ url('locale/tu') }}">
                                        <p>Türkiye</p>
                                    </a>
                                </li>

                                <li>
                                    <a class="mt-2" href="{{ url('locale/ar') }}">
                                        <p>عربي</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ol>
                    <a class="res-lang-links pos-cus" href="#">
                        @switch(Session('locale'))
                            @case('fa')
                                <img class="lang" src="{{ asset('frontend/assets/images/fa.png') }}">
                            @break

                            @case('en')
                                <img class="lang" src="{{ asset('frontend/assets/images/en.png') }}">
                            @break

                            @case('tu')
                                <img class="lang" src="{{ asset('frontend/assets/images/tu.png') }}">
                            @break

                            @case('ar')
                                <img class="lang" src="{{ asset('frontend/assets/images/ar.png') }}">
                            @break

                            @default
                                <img class="lang" src="{{ asset('frontend/assets/images/fa.png') }}">
                        @endswitch
                    </a>


                </div>
            </div>





            <a class="android-h a-logo" href="{{ env('APP_URL', '/') }}">
                <img class="logo android-h" src="{{ asset('storage/settings/' . $setting->logo) }}"
                    alt="پرشین تاناجرز">
            </a>



            <ul class="menu-head p-0">

                <li><a href="{{ route('index') }}">{{ __('header.home') }}</a></li>

                <li>
                    <a href="#">{{ __('header.weblog') }} <i class="fa fa-caret-down drop-down-item"></i></a>
                    <ul>
                        <li>
                            <a href="{{ route('articles', 'news') }}">{{ __('header.latestNews') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('articles', 'rules') }}">{{ __('header.britishLaw') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('articles', 'asylum') }}">{{ __('header.immigrationAndAsylum') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('articles', 'covid') }}">{{ __('header.covid19') }}</a>
                        </li>

                    </ul>
                </li>



                <li>
                    <a>{{ __('header.gallery') }} <i class="fa fa-caret-down drop-down-item"></i></a>
                    <ul>

                        <li>
                            <a href="{{ route('gallery', 'yellowCard') }}">
                                {{ __('header.yellowCard') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('gallery', 'greenCard') }}">
                                {{ __('header.greenCard') }}
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('gallery', 'BritainInTheMirrorOfHistory') }}">
                                {{ __('header.BritainInTheMirrorOfHistory') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('gallery', 'interview') }}">
                                {{ __('header.interview') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery', 'pictures') }}">
                                {{ __('header.pictures') }}
                            </a>
                        </li>

                    </ul>
                </li>

                <li><a href="{{ route('requirements', 'Requirements') }}">{{ __('header.requirements') }}</a></li>

                <li><a href="{{ route('socialNetworks') }}">{{ __('header.linksAndPages') }}</a></li>
                <li><a href="{{ route('appIntro') }}">{{ __('header.appIntro') }}</a></li>
                <li class="d-flex align-items-center">
                    <a class="pl-0">{{ __('header.otherSrvices') }}</a> <i
                        class="fa fa-caret-down drop-down-item mr-1 ml-3"></i></a>
                    <ul class="other-serve">
                        @foreach ($pages as $page)
                            <li>
                                <a href="{{ route('pageSingle', $page->slug) }}">
                                    {{ $page->title }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li><a href="{{ route('contactus') }}">{{ __('header.contactus') }}</a></li>
                <li class="language d-flex">
                    <a class="d-flex" href="#">
                        <p class="ml-1">{{ __('main.language') }}</p> <i
                            class="fa fa-caret-down drop-down-item"></i>
                    </a>
                    <ul class="lan-ul">
                        <li>
                            <a href="{{ url('locale/fa') }}">
                                <p>فارسی</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('locale/en') }}">
                                <p>English</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('locale/tu') }}">
                                <p>Türkiye</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('locale/ar') }}">
                                <p>عربي</p>
                            </a>
                        </li>
                    </ul>
                    <a class="res-lang-links pos-cus" href="#">
                        @switch(Session('locale'))
                            @case('fa')
                                <img class="lang" src="{{ asset('frontend/assets/images/fa.png') }}">
                            @break

                            @case('en')
                                <img class="lang" src="{{ asset('frontend/assets/images/en.png') }}">
                            @break

                            @case('tu')
                                <img class="lang" src="{{ asset('frontend/assets/images/tu.png') }}">
                            @break

                            @case('ar')
                                <img class="lang" src="{{ asset('frontend/assets/images/ar.png') }}">
                            @break

                            @default
                                <img class="lang" src="{{ asset('frontend/assets/images/fa.png') }}">
                        @endswitch

                        {{-- @case('fa') --}}
                    </a>
                </li>

            </ul>


        </nav>
    </header>

</div>
