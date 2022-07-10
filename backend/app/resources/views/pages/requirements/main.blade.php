@extends('layout/app')
@section('main')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3  order-12 order-lg-1">

                    @include('partial/blogSidebar')

                </div>

                <div class="col-md-12  col-lg-9 mx-auto order-1 order-lg-12">
                    <div class="row">
                        <p class="title-ads fs-29 mx-auto text-nowrap">
                            @if ($type == 'Advertising')
                                {{ __('main.ads') }}
                            @elseif($type == 'Requirements')
                                {{ __('main.requirements') }}
                            @endif

                        </p>
                    </div>
                    <div class="row justify-content-center">
                        @forelse ($requirementAds as $ads)
                            @if($ads->image()->first())
                            <div class=" col-lg-4 d-flex col-md-4 col-sm-6">
                                <div class="box-catgory  mx-auto ">
                                    <a class="modal-links" data-toggle="modal"
                                        data-target="#adsModal-{{ $ads->id }}">
                                        <img width="295" height="295"
                                            src="{{ asset('storage/recruitmentAds/' . $ads->image->first()->title) }}">
                                    </a>
                                </div>
                            </div>
                            @endif
                        @empty
                            <div class="alert alert-danger"> sorry not found any things </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Modal -->

            @foreach ($requirementAds as $ads)
                @if($ads->image()->first())
                <div class="modal fade" id="adsModal-{{ $ads->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/recruitmentAds/' . $ads->image->first()->title) }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

        </div>
    </main>
@endsection
