<section>
    <p>
        <a href="{{ route('requirements', 'Advertising') }}">
            {{ __('main.ads') }}
        </a>
    </p>
    <div class="ads mt-5 overflow-y-auto max-h-cus1 d-flex">
        <div class=" card-ads mb-2">
            @foreach ($ads as $advertising)
                <div class="img-ads">
                    <a href="{{ route('requirements', 'Advertising') }}">
                        <img class="img-ads-card"
                            src="{{ asset('storage/recruitmentAds/' . $advertising->image()->first()->title) }}"
                            alt="advertising banner">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
