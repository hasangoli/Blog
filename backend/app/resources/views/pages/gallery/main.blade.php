@extends('layout/app')
@section('main')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="row my-5" class="blog-sidebar-btns">
                        <p class="title-ads mx-auto text-nowrap"><a href="#">
                                @switch ($type)
                                    @case('yellowCard')
                                        {{ __('main.yellowCard') }}
                                    @break
                                    @case('greenCard')
                                        {{ __('main.greenCard') }}
                                    @break
                                    @case('BritainInTheMirrorOfHistory')
                                        {{ __('main.BritainInTheMirrorOfHistory') }}
                                    @break
                                    @case('interview')
                                        {{ __('main.interview') }}
                                    @break
                                    @case('pictures')
                                        {{ __('main.pictures') }}
                                    @break
                                @endswitch
                            </a></p>
                    </div>
                </div>
                <div class="row">

                    @foreach ($gallery as $item)
                        <div class="col-lg-4" style="display: flex; justify-content: center;">
                            <div class="box-catgory mr-2">
                                <a href="{{ route('gallerySingle', ['type' => $item->type, 'slug' => $item->slug]) }}">
                                    <img src="{{ asset('storage/gallery/' . $item->image->title) }}">
                                    <p>{{ $item->title }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
@endsection
