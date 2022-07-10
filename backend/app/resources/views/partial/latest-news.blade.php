<div class="row" id="hit-news">
    <p class="title-ads fs-29 mx-auto"><a href="{{ route('articles', 'news') }}">{{ __('main.breakingNews') }}</a></p>
</div>
<div id="advertisings-div" class="row">
    @foreach ($news as $new)
        <div class="col-lg-11 col-sm-8 mx-auto px-1">
            <div class="post advertising-image">
                <img src="{{ asset('storage/articles/' . $new->image->title) }}" alt="advertising image">
                <div class="bg-title">
                    <div class="text-overlay">
                        <h4 class="text-nowrap">{{ $new->title }}</h4>
                        <span class="description-card">{!! $new->description !!}</span>
                    </div>
                    <a href="{{ route('articleSingle', ['type' => $new->type, 'slug' => $new->slug]) }}"
                        class="learn-more-btn">{{ __('main.seeMore') }}</a>
                </div>
            </div>

        </div>
    @endforeach
</div>
