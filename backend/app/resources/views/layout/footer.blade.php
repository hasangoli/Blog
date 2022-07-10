<footer>
    <div class="container">
        <div class="row footer-container">
            <div class="col-xl-2 col-12 text-center m-auto">
                <div><img class="footer-logo" src="{{ asset('storage/settings/' . $setting->logo) }}"
                        alt="پرشین تاناجرز"></div>
                <div class="footer-social">
                    <a class="mx-1" href="{{ $setting->youtube }}"><img
                            src="{{ asset('frontend/assets/images/youtube-logo.png') }}" alt="facebook-logo"></a>
                    <a class="mx-1" href="{{ $setting->facebook }}"><img
                            src="{{ asset('frontend/assets/images/facebook-logo.png') }}" alt="facebook-logo"></a>
                    <a class="mx-1" href="{{ $setting->twitter }}"><img
                            src="{{ asset('frontend/assets/images/twitter-logo.png') }}" alt="twitter-logo"></a>
                    <a class="mx-1" href="{{ explode(',',$setting->instagram)[0] }}"><img
                            src="{{ asset('frontend/assets/images/instagram-logo.png') }}" alt="instagram-logo"></a>
                    <a class="mx-1" href="https://wa.me/{{ $setting->whatsApp }}"><img
                            src="{{ asset('frontend/assets/images/whatsapp-logo.png') }}" alt="whatsapp-logo"></a>
                    <a class="mx-1" href="{{ $setting->telegram }}"><img
                            src="{{ asset('frontend/assets/images/telegram-logo.png') }}" alt="telegram-logo"></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <h4 class="title-ads-footer footer-btn text-nowrap text-truncate">
                    {{ __('footer.FrequentlyUsedLinks') }}
                </h4>
                <ul>
                    <li>
                        <a href="{{ route('articles', 'news') }}">{{ __('main.latestNews') }}</a>
                    </li>
                    <li><a href="{{ route('articles', 'asylum') }}">{{ __('footer.immigrationAndAsylum') }}</a></li>
                    <li><a href="{{ route('gallery', 'yellowCard') }}">{{ __('main.yellowCard') }}</a></li>
                    <li><a href="{{ route('requirements', 'Requirements') }}">{{ __('footer.requirements') }}</a></li>
                    <li><a href="{{ route('contactus') }}">{{ __('footer.contactus') }}</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <h4 class="title-ads-footer footer-btn text-nowrap text-truncate">{{ __('footer.contactus') }}</h4>
                <ul>
                    <li><span class="footer-contact"><span class="footer-contact    f-right"><span
                                    class="font-family-kodak">{{ __('footer.address') }}</span>
                                :</span>{{ $setting->address }}</span></li>
                    <li><span class="footer-contact"><span class="footer-contact f-right"><span
                                    class="font-family-kodak">{{ __('footer.postalCode') }}</span>
                                :</span>{{ $setting->postalCode }}</span></li>
                    <li><span class="footer-contact"><span class="footer-contact f-right"><span
                                    class="font-family-kodak">{{ __('footer.email') }}</span>
                                :</span>{{ $setting->email }}</span></li>
                    <li><span class="footer-contact"><span class="footer-contact f-right"><span
                                    class="font-family-kodak">{{ __('footer.contactAdmin') }}</span>
                                :</span>{{ $setting->contactAdmin }}</span></li>
                    <li><span class="footer-contact"><span class="footer-contact f-right"><span
                                    class="font-family-kodak">{{ __('footer.contactOffice') }}</span>
                                :</span>{{ $setting->contactOffice }}</span></li>
                </ul>
            </div>
            <div class="col-xl-2 col-12 location-footer">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1189.1423411664543!2d-2.982835707891202!3d53.40973466972706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b213a89b624d5%3A0xa8578f8579725920!2sLCVS!5e0!3m2!1sen!2suk!4v1632044610127!5m2!1sen!2suk"
                    width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</footer>
