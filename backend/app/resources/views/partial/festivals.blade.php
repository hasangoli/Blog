<section>
    <p> {{ __('main.FestivalsEnglishCollegeCeremonies') }}</p>
    <div class=" card-ads ">
        <div class="img-ads">
            <a href="{{ 'page/'.$festival->festivalsUrl }}">
                <img class="img-eng-card" src="{{ asset('storage/festivals/' . $festival->festivalsLogo) }}"
                    alt="advertising banner">
            </a>
            <div class="text-title">{{ __('main.festivalsAndExhibitions') }}</div>
        </div>

    </div>
    <div class=" card-ads mt-5">
        <div class="img-ads ">
            <a href="{{ 'page/'.$festival->celebrationsUrl }}">
                <img class="img-eng-card" src="{{ asset('storage/festivals/' . $festival->celebrationsLogo) }}"
                    alt="advertising banner">
            </a>
            <div class="text-title">{{ __('main.celebrationsAndCeremonies') }}</div>
        </div>

    </div>
    <div class=" card-ads mt-5">
        <div class="img-ads">
            <a href="{{ 'page/'.$festival->LanguageCollegeUrl }}">
                <img class="img-eng-card" src="{{ asset('storage/festivals/' . $festival->LanguageCollegeLogo) }}"
                    alt="advertising banner">
            </a>
            <div class="text-title">{{ __('main.englishLanguageCollege') }}</div>
        </div>

    </div>
</section>
