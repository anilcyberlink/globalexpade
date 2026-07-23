@extends('themes.default.common.master')

@section('content')

    <div class="exped">
        <div class="exped-banner d-flex justify-content-center flex-column">
            <div class="section-padding">
                <p class="page-title--secondary ">
                    <a class="home-list" href="{{ url('/') }}">Home</a>
                    <a class="active-list"> • Trekking</a>
                </p>
                <p class="exped-title">
                    Trekking
                </p>
                <h3 class="page-title">
                    
                </h3>
            </div>
        </div>

        <div class="spad">
            <div class="section-padding-2">
                <div class="row">
                    @foreach ($trips as $item)
                        <div class="col-lg-4 mx-auto mb-3 card-deck ">
                            <div class="card">
                                <a href="{{ route('page.tripdetail',$item->uri )}}">
                                    <img src="{{ $item->thumbnail ? asset('uploads/original/' . $item->thumbnail) : asset('themes-assets/img/list/1.jpg') }}" class="card-img-top exp-img " alt="{{ $item->trip_title }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title ">
                                        <p class="exped-section-title"><a href="{{ route('page.tripdetail',$item->uri )}}"> {{ $item->trip_title }} </a> </p>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6  ">
                                            <p><img src="{{ asset('themes-assets/icons/time.png') }}" height="23" width="23" class="mr-3"
                                                    >{{ $item->duration }} Days</p>
                                            <p><img src="{{ asset('themes-assets/icons/altitude.png') }}" height="23" width="23" class="mr-3"
                                                    >{{ $item->max_altitude }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><img src="{{ asset('themes-assets/icons/people.png') }}" height="23" width="23" class="mr-3"
                                                    >{{ $item->group_size }}</p>
                                            <p><img src="{{ asset('themes-assets/icons/map.png') }}" height="23" width="23" class="mr-3"
                                                    >{{ $item->peak_name }}</p>
                                        </div>
                                    </div>
                                    <p class="card-text">
                                        {{ $item->sub_title }}
                                    </p>
                                    <a href="{{ route('page.tripdetail',$item->uri )}}" class="btn-exped"> <span>More Details</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {!! $trips->links('themes.default.common.pagination') !!}
            </div>

        </div>
    </div>
@stop
