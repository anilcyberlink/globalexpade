@extends('themes.default.common.master')
@section('title', $data->trip_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->thumbnail)
@section('brief', $data->trip_excerpt)
@section('content')

    <!-- Banner Section -->
    <div class="detail-trip-header d-flex justify-content-end flex-column"
        @if (!empty($data->banner)) style="background-image: url('{{ asset('uploads/banners/' . $data->banner) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;" @endif>
        <div class="section-padding">
            <p class="page-title--secondary "> <a href="{{ url('/') }}">Home</a> • <a
                    class="active-list">{{ $data->trip_title }}</a>
            </p>
            <h1 class="header-font">{{ $data->trip_title }}</h1>
            <p class="small-header-font">{{ $data->sub_title }}</p>
        </div>
    </div>
    <!-- Icon Section -->
    <div class="container-fluid detail-trip-icon">
        <div class="row">
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content "><img src="{{ asset('themes-assets/icons/country.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Country <br> <span class="trip-right-content-lower">{{ $data->peak_name }} </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/mountain.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Max Altitude <br> <span class="trip-right-content-lower">{{ $data->max_altitude }} </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/calendar.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Duration <br> <span class="trip-right-content-lower">{{ $data->duration }} Days </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/route.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Route<br> <span class="trip-right-content-lower">{{ $data->route }}</span> </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/top-three.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Difficuly <br> <span
                            class="trip-right-content-lower">{{ grade_message_trek($data->trip_grade) }}</span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/clear-sky.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Best Season<br> <span class="trip-right-content-lower">{{ $data->best_season }}</span> </h1>
                </div>
            </div>
            {{-- <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/globe.png')}}"  height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Weather Reports <br> <span class="trip-right-content-lower">{{ $data->peak_name }}</span> </h1>
                </div>
            </div> --}}
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="{{ asset('themes-assets/icons/hills.png') }}" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Accommodation <br> <span class="trip-right-content-lower">{{ $data->accommodation }}</span> </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Date Section -->
    <div class="container date-section">
        <div class="row">
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="{{ asset('themes-assets/icons/mountain.png') }}" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Starting Price: <br> <span class="trip-right-content-lower">${{ $data->starting_price }}</span>
                    </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="{{ asset('themes-assets/icons/mountain.png') }}" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Start Date: <br> <span class="trip-right-content-lower">{{ $data->start_date }}</span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="{{ asset('themes-assets/icons/mountain.png') }}" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Walking Per Day: <br> <span class="trip-right-content-lower">{{ $data->walking_per_day }}</span>
                    </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="{{ asset('themes-assets/icons/mountain.png') }}" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Group Size <br> <span class="trip-right-content-lower">{{ $data->group_size }} </span> </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Overview Section -->
    <div class="container-fluid overview-section">
        <div class="row ">
            <div class=" col-lg-6 d-flex   flex-column ">
                <h1 class="heading-section mt-5">TRIP OVERVIEW</h1>
                <p class="para-font align-items-center justify-content-center">
                    {!! $data->trip_excerpt !!}
                </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center pl-3"style="background-color:white;">
                <img src="{{ $data->thumbnail ? asset('/uploads/original/' . $data->thumbnail) : asset('themes-assets/img/trip-detail/climb1.png') }}"
                    height="500" width="500" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- Itenary Section and map and cost section -->
    <div class=" container-fluid itenary-section">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="heading-section mt-5">ITINERARY</h1>

                @if ($itinerary->count() > 0)
                    <div class="row itenary-row">
                        <div class="container itenary-div-section">
                            @foreach ($itinerary as $key => $value)
                                <div class="row itenary-div">

                                    <a href="#collapse{{ $key }}"
                                        class="d-flex justify-content-between align-items-center w-100"
                                        data-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="collapse{{ $key }}"
                                        style="text-decoration:none; color:inherit;">

                                        <p class="itenary-top mb-0">
                                            <span style="color:#007bff;font-family:'Playfair Display', serif;">
                                                Day {{ $value->days }} :
                                            </span>
                                            {{ $value->title }}
                                        </p>

                                        <img src="{{ asset('themes-assets/icons/down.png') }}" width="20"
                                            height="20" alt="Toggle">

                                    </a>

                                    <div class="collapse w-100" id="collapse{{ $key }}">
                                        <div class="card card-body itenary-bottom">
                                            {!! $value->content !!}
                                        </div>
                                    </div>

                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="container-fluid map">
                        <h1 class="heading-section">Trip Description</h1>
                        <div class="">
                            {!! $data->trip_content !!}
                        </div>
                    </div>
                </div>
                <hr>

                @if ($data->trip_map)
                    <div class="row">
                        <div class="container-fluid map">
                            <h1 class="heading-section">ROUTE MAP</h1>
                            <div class="text-center">
                                <img src="{{ $data->trip_map ? asset('uploads/original/' . $data->trip_map) : asset('themes-assets/img/list/map.jpg') }}"
                                    class="img-fluid route-map-img" style="border:1px solid #FFCC00;">
                            </div>
                        </div>
                    </div>
                @endif
                @if ($cost_includes->count() > 0)
                    <div class="row">
                        <div class="container cost-includes">
                            <h1 class="heading-section">COST INCLUDES</h1>
                            <ul class=list-ul>
                                @foreach ($cost_includes as $value)
                                    <li>{{ $value->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>
                @endif
                @if ($cost_excludes->count() > 0)
                    <div class="row">
                        <div class="container cost-includes">
                            <h1 class="heading-section">COST EXCLUDES</h1>
                            <ul class=list-ul1>
                                @foreach ($cost_excludes as $value)
                                    <li>{{ $value->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-1"></div>

            <div class="col-lg-3 sidebar">
                <div class="container-fluid sticky">
                    <div class="container sticky-sidebar">
                        <button type="button" class="button-yellow itenary-top" id="openInquiryPopup">
                            INQUIRY NOW
                        </button>

                        <br><br>

                        <!-- Booking Button -->
                        <a href="{{ route('page.booking', $data->uri) }}">
                            <button type="button" class="button-white itenary-top">
                                BOOK NOW
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="geInquiryPopup" class="ge-popup-overlay">
        <div class="ge-popup-box">
            <div class="ge-popup-header">
                <h3>Inquiry Form</h3>
                <span id="closeInquiryPopup">&times;</span>
            </div>
            <form action="{{ route('post-inquiry') }}" method="POST">
                @csrf
                <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response">
                <input type="hidden" name="trip_uri" value="{{ $data->uri }}">

                <div class="ge-row">
                    <div class="ge-col">
                        <label>Name <span>*</span></label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="ge-col">
                        <label>Email <span>*</span></label>
                        <input type="email" name="email" required>
                    </div>
                </div>
                <div class="ge-group">
                    <label>Subject <span>*</span></label>
                    <input type="text" name="subject" required>
                </div>
                <div class="ge-group">
                    <label>Message</label>
                    <textarea name="message" rows="5"></textarea>
                </div>
                <button class="ge-submit-btn" type="submit">
                    Send Inquiry
                </button>
            </form>
        </div>
    </div>
    {{-- pop up model --}}

    <div class="section-padding similar-trip pt-5 pb-5 mt-5">
        <h1 class="heading-section">SIMILAR TRIP</h1>
        <div class="row">
            @foreach ($similar_trips as $item)
                <div class="col-lg-4 mx-auto mb-3 card-deck ">
                    <div class="card">
                        <a href="{{ route('page.tripdetail', $item->uri) }}">
                            <img src="{{ $item->thumbnail ? asset('uploads/original/' . $item->thumbnail) : asset('themes-assets/img/list/1.jpg') }}"
                                class="card-img-top exp-img " alt="{{ $item->trip_title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title ">
                                <p class="exped-section-title"><a href="{{ route('page.tripdetail', $item->uri) }}">
                                        {{ $item->trip_title }} </a> </p>
                            </h5>
                            <div class="row">
                                <div class="col-md-6  ">
                                    <p><img src="{{ asset('themes-assets/icons/time.png') }}" height="23"
                                            width="23" class="mr-3"> {{ $item->duration }} Days</p>
                                    <p><img src="{{ asset('themes-assets/icons/altitude.png') }}" height="23"
                                            width="23" class="mr-3">{{ $item->max_altitude }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><img src="{{ asset('themes-assets/icons/people.png') }}" height="23"
                                            width="23" class="mr-3"> {{ $item->group_size }}</p>
                                    <p><img src="{{ asset('themes-assets/icons/map.png') }}" height="23"
                                            width="23" class="mr-3">{{ $item->peak_name }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function() {
            function executeRecaptcha() {
                grecaptcha.execute('<?php echo env('SITE_KEY'); ?>', {
                    action: 'homepage'
                }).then(function(token) {
                    document.getElementById('g_recaptcha_response').value = token;
                });
            }

            // Initial execution of reCAPTCHA
            executeRecaptcha();

            // Refresh the reCAPTCHA token every 100 seconds (less than 2 minutes)
            setInterval(executeRecaptcha, 900000);
        });


        document.addEventListener("DOMContentLoaded", function() {

            const popup = document.getElementById("geInquiryPopup");

            document.getElementById("openInquiryPopup").onclick = function() {
                popup.classList.add("active");
            };

            document.getElementById("closeInquiryPopup").onclick = function() {
                popup.classList.remove("active");
            };

            popup.onclick = function(e) {
                if (e.target === popup) {
                    popup.classList.remove("active");
                }
            };

        });
    </script>
@stop
