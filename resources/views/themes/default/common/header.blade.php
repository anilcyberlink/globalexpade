<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes-assets/css/bootstrap.min.css') }}">
    <!--hompage css-->
    <link rel="stylesheet" href="{{ asset('themes-assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('themes-assets/css/jquery.modal.min.css') }}"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>{{ $setting->site_name }}</title>
</head>

<body>
    @include('themes.default.common.response')
    <header class="header">
        <div class="content">
            <div class="row v-center">
                <div class="header-item item-left">
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('themes-assets/img/logo.png') }}" width="75" alt=""></a>
                    </div>
                </div>
                <!-- menu start here -->
                <div class="header-item item-center">
                    <div class="menu-overlay">
                    </div>
                    <nav class="menu">
                        <div class="mobile-menu-head">
                            <div class="go-back"><i class="fa fa-angle-left"></i></div>
                            <div class="current-menu-title"></div>
                            <div class="mobile-menu-close">&times;</div>
                        </div>
                        <ul class="menu-main m-0 p-0">
                            <li>
                                <a href="{{ url('/') }}"><span class="menu-u">Home</span></a>
                            </li>
                            <li class="menu-item-has-children">
                                <a><span class="menu-u">Expedition</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="sub-menu mega-menu mega-menu-column-4">
                                    @foreach ($expeditions as $row)
                                        <div class="list-item">
                                            <h4 class="title">{{$row->title }}</h4>
                                            <ul>
                                                @foreach ($row->trips->take(4) as $trip)
                                                    <li><a href="{{ route('page.tripdetail',$trip->uri )}}"> {{ $trip->trip_title }}</a></li>
                                                @endforeach

                                                @if($row->trips->count() > 4)
                                                    <li><a class="nav-more" href="{{ route('page.expedition',$row->uri) }}"> More <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            fill="currentColor" class="bi bi-caret-right-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                        </svg></a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('page.trekking')}}"><span class="menu-u">Trekking</span></a>
                            </li>
                            @foreach ($posttypes as $item)
                                <li>
                                    <a href="{{ route('page.posttype_detail', $item->uri) }}"><span class="menu-u">{{ $item->post_type }}</span> </a>
                                </li>
                            @endforeach

                            @if($pagetypes->count() > 0)
                                <li class="menu-item-has-children">
                                    <a><span class="menu-u">Useful Info</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="sub-menu ">
                                        <ul>
                                            @foreach($pagetypes as $row)
                                                <li><a href="{{url('info/' . $row->uri)}}">{{$row->page_type}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- menu end here -->
                <div class="header-item item-right">
                    <!-- mobile menu trigger -->
                    <div class="mobile-menu-trigger">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>>
