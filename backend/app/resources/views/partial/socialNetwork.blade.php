<section class="android-h">
    <p>{{ __('main.socialNetworks') }}</p>

    {{-- new --}}
    <div class="news row">
        <div class="col-sm-12">
            <div class="facebook-link mb-2">
                <span class="social-title mx-auto"><a href="{{ $setting->facebook }}">
                        {{ __('main.facebook') }}
                    </a></span>
                <span class="links-background">
                    <img src="{{ asset('frontend/assets/images/facebook-logo.png') }}" alt="facebook-logo">
                </span>
            </div>

            <div class="instagram-link mb-2">
                <ul class="acc">

                    <li style="height:auto;">

                      <button class="acc_ctrl"><span  class="social-title mx-auto">{{ __('main.instagram') }}</span><span class="links-background" style="    margin: 7px 0 7px 7px;
                        ">
                        <img src="{{ asset('frontend/assets/images/instagram-logo.png') }}" alt="instagram-logo">
                    </span></button>

                          <div class="acc_panel">

                            @foreach (explode(',',$setting->instagram) as $key=>$instagramUrl)
                                <span class="social-title-sub mx-auto">
                                    <a class="sub-instagram-page " href="{{ $instagramUrl }}">
                                        {{ __('main.instagram') }} {{ $key+1 }}
                                    </a>
                                </span>
                                <hr>
                            @endforeach
                         </div>
                    </li>

                  </ul>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                  <script>$(function() {
                    $('.acc_ctrl').on('click', function(e) {
                      e.preventDefault();
                      if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $(this).next()
                        .stop()
                        .slideUp(300);
                      } else {
                        $(this).addClass('active');
                        $(this).next()
                        .stop()
                        .slideDown(300);
                      }
                    });
                  });</script>
                {{-- <span class="social-title mx-auto"> <a href="{{ $setting->instagram }}">
                        {{ __('main.instagram') }}
                    </a></span>
                <span class="links-background">
                    <img src="{{ asset('frontend/assets/images/instagram-logo.png') }}" alt="instagram-logo">
                </span> --}}
            </div>

            <div class="whatsapp-link mb-2">
                <span class="social-title mx-auto"><a href="https://wa.me/{{ $setting->whatsApp }}">
                        {{ __('main.whatsApp') }}
                    </a></span>
                <span class="links-background">
                    <img src="{{ asset('frontend/assets/images/whatsapp-logo.png') }}" alt="whatsapp-logo"> </span>
            </div>

            <div class="telegram-link mb-2">
                <span class="social-title mx-auto"><a href="{{ $setting->telegram }}">
                        {{ __('main.telegram') }}
                    </a></span>
                <span class="links-background">
                    <img src="{{ asset('frontend/assets/images/telegram-logo.png') }}" alt="telegram-logo"> </span>
            </div>

            <div class="twitter-link mb-2">
                <span class="social-title mx-auto"><a href="{{ $setting->twitter }}">
                        {{ __('main.twitter') }}
                    </a></span>
                <span class="links-background">
                    <img src="{{ asset('frontend/assets/images/twitter-logo.png') }}" alt="twitter-logo"> </span>
            </div>

            <div class="youtube-link mb-2">
                <span class="social-title mx-auto"><a href="{{ $setting->youtube }}">
                        {{ __('main.youtube') }}
                    </a></span>
                <span class="links-background">
                    <img src="{{ asset('frontend/assets/images/youtube-logo.png') }}" alt="youtube-logo"> </span>
            </div>
        </div>
    </div>
</section>
