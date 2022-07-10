@extends('layout/app')

@section('main')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="box-catgory">
                            <a
                                href="https://iranian-liverpool.com/videos/%D8%A8%D8%B1%DB%8C%D8%AA%D8%A7%D9%86%DB%8C%D8%A7-%D8%AF%D8%B1-%D8%A2%DB%8C%D9%86%D9%87-%D8%AA%D8%A7%D8%B1%DB%8C%D8%AE">
                                <h2>بریتانیا در آینه تاریخ</h2>
                                <img
                                    src="{{ asset('frontend/assets/images/60510b8f23917_28.jpg') }}">
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

                        @include('partial/socialNetwork')

                        @include('partial/adsSidebar')

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
