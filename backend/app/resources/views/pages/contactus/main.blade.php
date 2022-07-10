@extends('layout/app')

 {{-- recaptcha --}}
@push('captcha')

    <script type="text/javascript">
        function callbackThen(response){
            // read HTTP status
            console.log(response.status);

            // read Promise object
            response.json().then(function(data){
                console.log(data);
            });
        }
        function callbackCatch(error){
            console.error('Error:', error)
        }
    </script>


        {!! htmlScriptTagJsApi([
            'action' => 'homepage',
            'callback_then' => 'callbackThen',
            'callback_catch' => 'callbackCatch'
        ]) !!}
 @endpush

@section('main')

    <main>
        <div class="container">
            <div class="row mx-auto">
                <div class=" col-md-6 col-12 info">
                    <h1 class="text-right"> {{ __('main.Contacts') }} :</h1>
                    <hr>
                    <ul class="p-0">
                        <li><span class="text-nowrap">{{ __('main.address') }} :</span>
                            <div>{{ $setting->address }}</div>
                        </li>
                        <li><span class="text-nowrap">{{ __('main.postalCode') }} :</span>
                            <div> {{ $setting->postalCode }} </div>
                        </li>
                        <li><span class="text-nowrap">{{ __('main.email') }} :</span>
                            <div>{{ $setting->email }} </div>
                        </li>
                        <li><span class="text-nowrap">{{ __('main.contactAdmin') }} :</span>
                            <div>{{ $setting->contactAdmin }}</div>
                        </li>
                        <li><span class="text-nowrap">{{ __('main.contactOffice') }} :</span>
                            <div>{{ $setting->contactOffice }}</div>
                        </li>
                        <li>
                            <span class="text-nowrap">{{ __('main.ConnectToWebSupport') }} :</span>
                            <div>{{ $setting->ConnectToWebSupport }}</div>
                        </li>
                    </ul>
                    <div class="row info-assets">
                        <div class="col-lg-4 col-sm-12 mx-auto loc-contactus">
                            <span class="location">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1189.1423411664543!2d-2.982835707891202!3d53.40973466972706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b213a89b624d5%3A0xa8578f8579725920!2sLCVS!5e0!3m2!1sen!2suk!4v1632044610127!5m2!1sen!2suk"
                                    width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </span>
                        </div>
                        <div class="col-lg-3 col-12 mx-auto contactus-social"><a class="mx-1" href="{{ $setting->facebook }}">
                                <img src="{{ asset('frontend/assets/images/facebook-logo.png') }}"
                                    alt="facebook-logo"></a>
                            <a class="mx-1" href="{{ $setting->twitter }}">
                                <img src="{{ asset('frontend/assets/images/twitter-logo.png') }}" alt="twitter-logo"></a>
                            <a class="mx-1" href="{{ explode(',',$setting->instagram)[0] }}">
                                <img src="{{ asset('frontend/assets/images/instagram-logo.png') }}"
                                    alt="instagram-logo"></a>
                            <a class="mx-1" href="{{ $setting->whatsApp }}">
                                <img src="{{ asset('frontend/assets/images/whatsapp-logo.png') }}"
                                    alt="whatsapp-logo"></a>
                            <a class="mx-1" href="{{ $setting->telegram }}">
                                <img src="{{ asset('frontend/assets/images/telegram-logo.png') }}"
                                    alt="telegram-logo"></a>
                            <a class="mx-1" href="{{ $setting->youtube }}">
                                <img src="{{ asset('frontend/assets/images/youtube-logo.png') }}"
                                    alt="telegram-logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <form id="contact" action="{{ route('contactus.store') }}" method="post">
                        @csrf
                        <fieldset>
                            <label>{{ __('main.name') }}:</label>
                            <input name="name" placeholder="{{ __('main.name') }} ..." type="text" tabindex="1" required autofocus>
                        </fieldset>
                        <fieldset>
                            <label>{{ __('main.lastName') }}:</label>
                            <input name="lastName" placeholder="{{ __('main.lastName') }} ..." type="text" tabindex="1" required autofocus>
                        </fieldset>
                        <fieldset>
                            <label>{{ __('main.phone') }}:</label>
                            <input name="phone" placeholder="*********09" type="tel" tabindex="3" required>
                        </fieldset>
                        <fieldset>
                            <label>{{ __('main.message') }}:</label>
                            <textarea name="message" placeholder="{{ __('main.message') }}..." tabindex="5" required ></textarea>
                        </fieldset>
                        <fieldset>
                            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">{{ __('main.send') }}</button>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
