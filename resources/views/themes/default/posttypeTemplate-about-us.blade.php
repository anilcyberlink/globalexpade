@extends('themes.default.common.master') @section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner) @section('brief', $data->brief)
@section('content')

    <style>
        .why-row {
            margin-bottom: 70px;
            position: relative;
        }

        /* Give the row itself some breathing room from the edges */
        .about-bottom-row {
            padding: 0 20px;
        }

        .why-img-wrap {
            padding: 20px;          /* keeps image off the column edge, prevents full-bleed look */
        }

        .why-img-wrap img.about-card-img {
            width: 100%;
            max-width: 340px;       /* smaller cap than before */
            height: 260px;          /* fixed, sane height instead of stretching to match text */
            object-fit: cover;      /* crops nicely instead of distorting */
            border-radius: 4px;
            display: block;
            margin: 0 auto;
        }

        .why-text-body {
            position: relative;
            padding: 20px 40px;
        }

        .why-number {
            display: block;
            font-size: 90px;
            font-weight: 700;
            color: #eee;
            line-height: 1;
            position: absolute;
            top: -30px;
            left: 40px;
            z-index: 0;
        }

        .why-text-body h1 {
            position: relative;
            z-index: 1;
            font-size: 26px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
            margin-top: 40px;
        }

        .why-text-body .card-text {
            position: relative;
            z-index: 1;
            color: #555;
            line-height: 1.8;
        }

        .why-text-body .card-text + .card-text {
            margin-top: 15px;
        }

        @media (max-width: 991px) {
            .why-row .col-lg-5,
            .why-row .col-lg-7 {
                order: unset !important;
            }
            .why-img-wrap {
                margin-bottom: 15px;
            }
            .why-number {
                left: 50%;
                transform: translateX(-50%);
            }
            .why-text-body {
                text-align: center;
                padding: 20px;
            }
        }
    </style>

    <div class="about-banner d-flex justify-content-center flex-column"
        @if(!empty($data->banner))
            style="background-image: url('{{ asset('uploads/original/'.$data->banner) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;"
        @endif
    >
        <div class="section-padding">
            <p class="page-title--secondary "> <a href="{{ url('/') }}">Home</a> • <a class="active-list" >{{ $data->post_type }}</a>
            </p>
            <h3 class="page-title ">{{ $data->post_tag }}</h3>
        </div>
    </div>
    <div class="about-info">
        <div class="section-padding1">
            <div class="row about-top-row">
                <div class="col-md-12 col-lg-6 about-top-content ">
                    <h1 class="heading-section">{{ $data->post_type }}</h1>
                    <p class="para-font">
                        {!! $data->content !!}
                    </p>
                </div>
                <div class="col-md-12 col-lg-6  d-flex align-items-center about-bottom-content">
                    <div class="container-fluid ">
                        <div class="row ">
                            <div class="col-6 image1"> <img src="{{ $data->banner ? asset('uploads/original/'.$data->banner) : asset('themes-assets/img/about/about2.png')}}" class="img-fluid"></div>
                            <div class="col-6"> <img src="{{ $data->thumbnail ? asset('uploads/original/'.$data->thumbnail) : asset('themes-assets/img/about/about1.png')}}" class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-us">
        <div class="section-padding1">
            <div class="about-bottom-row">

                @foreach ($posts as $row)
                    @if($loop->odd)
                        <!-- Row: Image - Text -->
                        <div class="row align-items-center why-row">
                            <div class="col-lg-5 order-lg-1">
                                <div class="why-img-wrap">
                                    <img src="{{ $row->page_thumbnail ? asset('uploads/original/'.$row->page_thumbnail) : asset('themes-assets/img/about/about1.png')}}" class="about-card-img" alt="{{ $row->post_title }}">
                                </div>
                            </div>
                            <div class="col-lg-7 order-lg-2">
                                <div class="why-text-body">
                                    <span class="why-number">{{ sprintf('%02d', $loop->iteration) }}</span>
                                    <h1>{{ $row->post_title }}</h1>
                                    <p class="card-text">
                                        {!! $row->post_excerpt !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Row: Text - Image -->
                        <div class="row align-items-center why-row">
                            <div class="col-lg-7 order-lg-1">
                                <div class="why-text-body">
                                    <span class="why-number">{{ sprintf('%02d', $loop->iteration) }}</span>
                                    <h1>{{ $row->post_title }}</h1>
                                    <p class="card-text">
                                        {!! $row->post_excerpt !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 order-lg-2">
                                <div class="why-img-wrap">
                                    <img src="{{ $row->page_thumbnail ? asset('uploads/original/'.$row->page_thumbnail) : asset('themes-assets/img/about/about1.png')}}" class="about-card-img" alt="{{ $row->post_title }}">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <div class="sponsers-section">

        <div class="container-fluid">
            <div class="row">
                <div id="carousel" class="carousel slide carousel2" data-ride="carousel" style="padding:0px 80px;">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item  carousel2-item active">
                            <div class="d-none d-lg-block">
                                <div class="slide-box">
                                    <img src="assets/img/Breeze.jpg" alt="First slide">
                                    <img src="assets/img/Shatterproof.jpeg" alt="First slide">
                                    <img src="assets/img/images.png" alt="First slide">
                                    <img src="assets/img/Breeze.jpg" alt="First slide">
                                </div>
                            </div>
                            <div class="d-none d-md-block d-lg-none">
                                <div class="slide-box">
                                    <img src="assets/img/Breeze.jpg" alt="First slide">
                                    <img src="assets/img/Shatterproof.jpeg" alt="First slide">
                                    <img src="assets/img/images.png" alt="First slide">
                                </div>
                            </div>
                            <div class="d-none d-sm-block d-md-none">
                                <div class="slide-box">
                                    <img src="assets/img/Breeze.jpg" alt="First slide">
                                    <img src="assets/img/images.png" alt="First slide">
                                </div>
                            </div>
                            <div class="d-block d-sm-none">
                                <img class="d-block w-100" src="assets/img/Shatterproof.jpeg" alt="First slide">
                            </div>
                        </div>
                        <div class="carousel-item carousel2-item">
                            <div class="d-none d-lg-block">
                                <div class="slide-box">
                                    <img src="assets/img/Breeze.jpg" alt="Second slide">
                                    <img src="assets/img/images.png" alt="Second slide">
                                    <img src="assets/img/Shatterproof.jpeg" alt="Second slide">
                                    <img src="assets/img/Breeze.jpg" alt="Second slide">
                                </div>
                            </div>
                            <div class="d-none d-md-block d-lg-none">
                                <div class="slide-box">
                                    <img src="assets/img/images.png" alt="Second slide">
                                    <img src="assets/img/Shatterproof.jpeg" alt="Second slide">
                                    <img src="assets/img/images.png" alt="Second slide">
                                </div>
                            </div>
                            <div class="d-none d-sm-block d-md-none">
                                <div class="slide-box">
                                    <img src="assets/img/images.png" alt="Second slide">
                                    <img src="assets/img/Breeze.jpg" alt="Second slide">
                                </div>
                            </div>
                            <div class="d-block d-sm-none">
                                <img class="d-block w-100" src="assets/img/images.png" alt="Second slide"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <div class="slider-border"><span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <div class="slider-border"><span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop
