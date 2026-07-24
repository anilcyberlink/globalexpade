@extends('themes.default.common.master')

@section('content')

    <div class="exped">
        <div class="exped-banner d-flex justify-content-center flex-column">
            <div class="section-padding">
                <p class="page-title--secondary ">
                    <a class="home-list" href="{{ url('/') }}">Home</a>
                    <a class="active-list" href="{{ route('page.expeditions') }}"> • Expeditions</a>
                </p>
                <p class="exped-title">

                </p>
                <h3 class="page-title">

                </h3>
            </div>
        </div>

        <div class="spad">
            <div class="section-padding-2">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-4 mx-auto mb-3 card-deck ">
                            <div class="card">
                                <a href="{{ route('page.expedition',$item->uri) }}">
                                    <img src="{{ $item->thumbnail ? asset('uploads/original/' . $item->thumbnail) : asset('themes-assets/img/list/1.jpg') }}" class="card-img-top exp-img " alt="{{ $item->title }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title ">
                                        <p class="exped-section-title"><a href="{{ route('page.expedition',$item->uri) }}"> {{ $item->title }} </a> </p>
                                    </h5>
                                    <p class="card-text">
                                        {{ $item->sub_title }}
                                    </p>
                                    <a href="{{ route('page.expedition',$item->uri) }}" class="btn-exped"> <span>More Details</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {!! $data->links('themes.default.common.pagination') !!}
            </div>

        </div>
    </div>
@stop
