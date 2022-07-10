<section class="blogSidebar pl-4">

    {{-- search and latest blog --}}

    @if (Request::is('articles/*') || Request::is('search-Articles/*'))
        <div class="search-box-container">
            {!! Form::open(['route' => ['searchArticle', $type], 'method' => 'GET']) !!}
            <div class="row">
                <div id="inputSearchArticle" class="col-lg-11 col-md-12 mx-auto">
                    <button class="serach-btn btn btn-primary"><i class="fa fa-search"></i></button>
                    <input class="search-box" name="searchArticle" @if (isset($searchText)) value="{{ $searchText }}" @endif type="text" required
                        placeholder="...جستجو در وبلاگ">
                </div>
            </div>
            @if (isset($categoryId) && $categoryId != '') <input type="hidden" name="categoryId" value="{{ $categoryId }}"> @endif
            @if (isset($countryId) && $countryId != '') <input type="hidden" name="countryId" value="{{ $countryId }}"> @endif

            {!! Form::close() !!}
        </div>
        <div class="row my-5" class="blog-sidebar-btns">
            <p class="title-ads mx-auto text-nowrap">
                <a href="#">
                    @switch($type)
                        @case('news')
                            {{ __('main.latestNews') }}
                        @break
                        @case('rules')
                            {{ __('main.latestBritishLaws') }}
                        @break
                        @case('asylum')
                            {{ __('main.latestImmigrationAndAsylum') }}
                        @break
                        @case('covid')
                            {{ __('main.latestCovid') }}
                        @break
                    @endswitch
                </a>
            </p>
        </div>

        @foreach ($latestArticle as $item)
            
            <a href="{{ route('articleSingle', ['type' => $item->type, 'slug' => $item->slug]) }}">
                <div class="my-20">
                    <div class="row">
                        <div class="col-md-3 my-auto">
                            <img class="my-auto" src="{{ asset('storage/articles/' . $item->image->title) }}"
                                alt="">
                        </div>
                        <div class="col-md-9 mb-4 blogSidebarText">{!! mb_substr(strip_tags($item->description), 0, 60, 'utf8') . '...' !!}</div>
                    </div>
                </div>
            </a>
        @endforeach

        {{-- search and latest requirements --}}

    @elseif(Request::is('requirements/*') || Request::is('requirements') || Request::is('search-Requirements'))
        <div class="search-box-container">
            {!! Form::open(['route' => ['searchRequirements'], 'method' => 'GET']) !!}
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="row">
                <div id="inputSearchRequirements" class="col-lg-11 col-md-4 mx-auto">
                    <input class="search-box" name="searchArticle" @if (isset($searchText)) value="{{ $searchText }}" @endif type="text" required
                        placeholder="...جستجو در وبلاگ">
                    <button class="serach-btn btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
            @if (isset($categoryId) && $categoryId != '') <input type="hidden" name="categoryId" value="{{ $categoryId }}"> @endif
            @if (isset($countryId) && $countryId != '') <input type="hidden" name="countryId" value="{{ $countryId }}"> @endif

            {!! Form::close() !!}
        </div>
        <div class="row my-5" class="blog-sidebar-btns">
            <p class="title-ads mx-auto text-nowrap">
                <a href="#">
                    @if ($type == 'Requirements')
                        {{ __('main.latestRequirements') }}
                    @elseif($type=="Advertising")
                        {{ __('main.latestAds') }}
                    @endif

                </a>
            </p>
        </div>

        <div class="my-20">
            <div class="row">
                @foreach ($latestRequirementAds as $item)
                    @if($item->image->first())
                    <div class="col-md-3 col-lg-12 text-center mx-auto">
                        <img class="my-auto col-md-12 col-lg-6 h-auto "
                            src="{{ asset('storage/recruitmentAds/' . $item->image->first()->title) }}" alt="">
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif




    <hr>
    @if ($type != 'Advertising')
        <div>
            <div class="row my-5" class="blog-sidebar-btns">
                <p class="title-ads mx-auto text-nowrap"><a href="#">{{ __('main.categories') }}</a></p>
            </div>
            <ul class="category-list">
                @foreach ($categories as $category)
                    <li
                        onclick="$(` form input[name='categoryId'] `).remove();$('form').append(`<input  type='hidden' name='categoryId' value='{{ $category->id }}'>`).submit();
                        ">
                        <a>{{ $category->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endif



    @if ($type != 'Advertising')
        <div class="row mt-5" class="blog-sidebar-btns">
            <p class="title-ads mx-auto text-nowrap"><a href="#">{{ __('main.countries') }}</a></p>
        </div>
        <div class="row sticks">
            <div id="sticks-items">
                @foreach ($countries as $country)
                    <p class="mb-5"
                        onclick="$(` form input[name='countryId'] `).remove();$('form').append(`<input  type='hidde' name='countryId' value='{{ $country->id }}'>`).submit();">{{ $country->title }}</p>
                @endforeach
            </div>

        </div>
    @endif
</section>
