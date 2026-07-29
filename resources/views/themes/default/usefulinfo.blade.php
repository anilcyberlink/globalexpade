@extends('themes.default.common.master')
@section('title', $pages->page_type)
@section('brief', $pages->brief)
@section('thumbnail', $pages->image)
@section('meta_keyword', $pages->brief)
@section('meta_description', $pages->brief)
@section('content')

 <!-- Page Header -->
    <div class="detail-trip-header d-flex justify-content-end flex-column"
        @if(!empty($pages->image))
            style="background-image: url('{{ asset('uploads/medium/'.$pages->image) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;"
        @endif
    >
        <div class="section-padding">
            <p class="page-title--secondary">
                <a href="{{ url('/') }}">Home</a> • <a class="active-list">{{ $pages->page_type }}</a>
            </p>
            <h1 class="header-font">{{ $pages->page_type }}</h1>
            <p class="small-header-font"></p>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="container-fluid section-padding pt-5 pb-4">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <p class="para-font">
                    {!! $pages->brief !!}
                </p>
            </div>
        </div>

        <!-- Useful Info Cards -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-5 useful-info-row">

                    @foreach ($data as $row)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <a href="{{ url('info/'.$pages->uri.'/'.teamurl($row['uri'],$row['page_key'])) }}" class="text-decoration-none">
                                <div class="card text-white border-0 useful-info-card">
                                    <img src="{{ $row->page_thumbnail ? asset('uploads/original/' . $row->page_thumbnail) : asset('themes-assets/img/list/1.jpg') }}" class="card-img useful-info-img"
                                        alt="{{ $row->page_type }}">
                                    <div
                                        class="card-img-overlay d-flex flex-column align-items-center justify-content-center text-center">
                                        <h5 class="card-title mb-0" style="font-family: 'Playfair Display', serif;">
                                            {{ $row->page_title }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
