@extends('layout/app')
@section('main')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="row my-5" class="blog-sidebar-btns">
                        <p class="title-ads mx-auto text-nowrap"><a href="#">{{ __('main.networkActivities') }}</a></p>
                    </div>
                </div>
                <div class="row">


                    @forelse ($networkActivities as $item)
                        <div class="col-lg-4 mx-auto col-sm-10">
                            <div class="m-3">
                                <div class="post advertising-image">
                                    <a href="{{ route('networkActivitiesSingle', $item->slug) }}">
                                        <img src="{{ asset('storage/NetworkActives/' . $item->image->title) }}"
                                            alt="advertising image">
                                        <div class="bg-title concert-card-txt">
                                            <div class="text-overlay mx-auto mt-3  text-overlay-cus">
                                                <p class="text-nowrap" style="color:white">{{ $item->title }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger"> sorry not found any things </div>
                    @endforelse



                </div>

            </div>
        </div>
    </main>
@endsection
