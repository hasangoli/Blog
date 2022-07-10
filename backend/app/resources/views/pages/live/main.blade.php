@extends('frontend/layout/app')

@section('main')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/%D9%87%D9%86%DA%AF%D8%A7%D9%85%D9%87">
                                <h2>هنگامه</h2>
                                <img src="{{ asset('frontend/assets/images/60ad4b63cc0d6_37.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/13-%D8%A8%D8%AF%D8%B1">
                                <h2>13 بدر</h2>
                                <img src="{{ asset('frontend/assets/images/6069808accb22_30.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a
                                href="https://iranian-liverpool.com/videos/%D9%BE%D8%B4%D8%AA-%D8%B5%D8%AD%D9%86%D9%87">
                                <h2>پشت صحنه</h2>
                                <img src="{{ asset('frontend/assets/images/60697f8610744_29.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/new-year">
                                <h2>new year</h2>
                                <img src="{{ asset('frontend/assets/images/5fef8ff1bbedc_23.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/6">
                                <h2>6</h2>
                                <img src="{{ asset('frontend/assets/images/5f9d7b877783e_13.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/5">
                                <h2>5</h2>
                                <img src="{{ asset('frontend/assets/images/5f9d7b564140b_12.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/4">
                                <h2>4</h2>
                                <img src="{{ asset('frontend/assets/images/5f9d7b0c38830_11.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/3">
                                <h2>3</h2>
                                <img src="{{ asset('frontend/assets/images/5f9d7ab155705_10.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a href="https://iranian-liverpool.com/videos/1">
                                <h2>1</h2>
                                <img src="{{ asset('frontend/assets/images/5f881bd7f1494_9.jpg') }}">
                                <p class="des"></p>
                                <p>مشاهده</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 sidbar">
                <div class="row">
                    <div class="col-md-12">


                        @include('frontend/partial/socialNetwork')

                        @include('frontend/partial/adsSidebar')

                        <section class="android-h">
                            <p>آخرین نوشته ها</p>
                            <div class="news">
                                <ul>
                                    <li>
                                        <a href="https://iranian-liverpool.com/posts/Covid-19">Covid-19</a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://iranian-liverpool.com/posts/%D8%A2%D9%85%D9%88%D8%B2%D8%B4-%D8%B2%D8%A8%D8%A7%D9%86-%D8%A7%D9%86%DA%AF%D9%84%DB%8C%D8%B3%DB%8C">آموزش
                                            زبان انگلیسی</a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://iranian-liverpool.com/posts/%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA-%D9%87%D8%A7%DB%8C-%D8%B4%D8%A8%DA%A9%D9%87">فعالیت‌های
                                            شبکه</a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

@endsection
