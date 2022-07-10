<div class=" col-sm-12 mx-auto px-1">
    @forelse ($articles as $item)
        <a href="{{ route('articleSingle', ['type' => $item->type, 'slug' => $item->slug]) }}">
            <div class="post advertising-image">
                <img src="{{ asset('storage/articles/' . $item->image->title) }}" alt="advertising image">
                <div class="bg-title">
                    <div class="text-overlay">
                        <h4 class="text-nowrap">{{ $item->title }}</h4>
                        <p>{!! mb_substr(strip_tags($item->description), 0, 80, 'utf8') . '...' !!}</p>
                    </div>
                    <button href="{{ route('articleSingle', ['type' => $item->type, 'slug' => $item->slug]) }}"
                        class="learn-more-btn"> {{ __('main.seeMore') }}</button>
                </div>
            </div>
            <a>
            @empty
                <div class="alert alert-danger"> sorry not found any things </div>
    @endforelse
</div>
