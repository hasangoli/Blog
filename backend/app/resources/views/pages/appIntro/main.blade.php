@extends('layout/app')
@section('main')

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row my-5" class="blog-sidebar-btns" >
                    <p class="title-ads mx-auto text-nowrap"><a href="#">{{ __('main.appIntro') }}</a></p>
                </div>
                <div class="col-md-6 mx-auto my-5">
                    <img src="{{ asset('storage/settings/'.$appIntro->image->title) }}" alt="cellphone">
                </div>
                <div class="comment-container">{!! $appIntro->descriptionOfApplication !!}</div>
            </div>

        </div>
    </div>
</main>
@endsection
