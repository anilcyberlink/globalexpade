@extends('themes.default.common.master')
@section('content')

    <!-- start: hero banner -->
    <section class="uk-section-default uk-section uk-padding-remove-vertical">
        <div class="uk-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid
            uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 50; repeat: false;">
            <div class="uk-width-1-1@m">
                <div uk-slideshow="animation: fade; velocity: 0.6; autoplay: true; autoplay-interval: 5000; pause-on-hover: false;"
                    class="uk-margin uk-slideshow">
                    <div class="uk-position-relative uk-visible-toggle " tabindex="-1">
                        <ul class="uk-slideshow-items" uk-height-viewport="offset-top: 83;">
                            @if ($banner != null)
                                @foreach ($banner as $row)
                                    <li class="uk-item @if ($loop->first) uk-active uk-transition-active @endif"
                                        tabindex="-1">
                                        <picture>
                                            <source type="image/jpg" sizes="(max-aspect-ratio: 2560/1120) 229vh">
                                            <img src="@if ($row->banner) {{ asset('uploads/banners/' . $row->banner) }}@else{{ asset('themes-assets/images/default/default-banner.jpg') }} @endif"
                                                class="uk-image" alt="{{ $row->trip_title }}" loading="eager" uk-cover>
                                        </picture>
                                        <div class="uk-position-cover uk-flex uk-flex-bottom uk-container uk-container-large uk-section uk-position-z-index"
                                            style="margin-bottom:50px;">
                                            <div
                                                class="uk-width-xlarge uk-margin-remove-first-child uk-margin-auto-left uk-margin-auto-right uk-text-center">
                                                <div class="text-white uk-h5 uk-text-bold uk-margin-top uk-margin-remove-bottom uk-text-uppercase uk-text-shadow"
                                                    uk-slideshow-parallax="y: -50,0,0 opacity: 0,1,1">Featured Trip</div>
                                                <h2 class="uk-title uk-text-bold text-white uk-heading-small uk-margin-remove uk-text-shadow"
                                                    uk-slideshow-parallax="x: -150,0,150 opacity: 0,1,1">
                                                    {{ $row->trip_title }}
                                                </h2>
                                                <div class="uk-margin-top">
                                                    <a class="uk-button uk-button-icon button-primary button-primary-active"
                                                        href="{{ url('page/' . tripurl($row->uri)) }}"
                                                        uk-slideshow-parallax="y: 50,0,0 opacity: 0,1,1">Read more <span>
                                                            <i class=""></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="uk-position-cover bg-gradient-to-t from-transparent-44 via-transparent-60 to-transparent">
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="uk-hidden-hover uk-hidden-touch uk-visible@m uk-light">
                            <a class="uk-slidenav uk-hero-nav uk-position-small uk-position-center-left uk-icon uk-slidenav-previous uk-slidenav"
                                href="#" uk-slidenav-previous="" uk-slideshow-item="previous"
                                aria-label="Previous slide"></a>
                            <a class="uk-slidenav uk-hero-nav uk-position-small uk-position-center-right uk-icon uk-slidenav-next uk-slidenav"
                                href="#" uk-slidenav-next="" uk-slideshow-item="next" aria-label="Next slide"></a>
                        </div>
                        <div
                            class="uk-panel uk-container uk-container-large uk-position-relative uk-visible@l uk-display-block">
                            <div class="uk-position-bottom-center uk-width-1-1 uk-light">
                                <ul class="uk-line-text uk-flex-top uk-grid-medium uk-child-width-expand"
                                    uk-height-match="target: li>a" uk-grid>
                                    @if ($banner != null)
                                        @foreach ($banner as $row)
                                            <li uk-slideshow-item="{{ $loop->index }}"
                                                class="uk-first-column @if ($loop->first) uk-active @endif">
                                                <a href="{{ url('page/' . tripurl($row->uri)) }}">
                                                    <div class="uk-flex uk-flex-middle">
                                                        <span>
                                                            <em>{{ $loop->iteration }}</em>
                                                        </span>
                                                        <div>{{ $row->trip_title }}</div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="uk-clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: hero banner -->
    @if ($about_me)
        <!-- start: about us -->
        <section class="uk-section bg-white">
            <div class="uk-container">
                <div class="uk-text-center uk-text-left@m uk-margin-auto"
                    uk-scrollspy="target: [uk-scrollspy-class], h1, span, img, p; cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
                    <div class="uk-text-center">
                        <h1 class="uk-text-bold text-secondary-light uk-margin-small">Adventures begin here</h1>
                        <span class="text-primary">{{ $about_me->post_tag }}</span><br>
                    </div>
                    <div class="uk-grid uk-margin-medium-top uk-flex uk-flex-center uk-flex-middle" uk-grid>
                        <div class="uk-width-1-2@m">
                            <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                                <div class="uk_trip_image uk-media-420  uk-position-relative">
                                    <img src="@if ($about_me->thumbnail) {{ asset('uploads/original/' . $about_me->thumbnail) }}@else {{ asset('themes-assets/images/default/default-profile.jpg') }} @endif"
                                        uk-img class="uk-image uk-transition-scale-up uk-transition-opaque"
                                        alt="{{ $about_me->post_type }}" loading="eager">
                                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                        <div class="uk-flex-column uk-text-left  uk-grid-small uk-light  uk-margin-medium-bottom"
                                            uk-grid>
                                            @if ($setting->facebook_link)
                                                <div>
                                                    <a class="" rel="noreferrer" href="{{ $setting->facebook_link }}"
                                                        uk-icon="icon: facebook;" target="_blank"
                                                        uk-tooltip="title:Facebook; pos:right;"></a>
                                                </div>
                                            @endif
                                            @if ($setting->youtube_link)
                                                <div>
                                                    <a class="" rel="noreferrer" href="{{ $setting->youtube_link }}"
                                                        uk-icon="icon: youtube;" target="_blank"
                                                        uk-tooltip="title:Youtube; pos:right;"></a>
                                                </div>
                                            @endif
                                            @if ($setting->twitter_link)
                                                <div>
                                                    <a class="" rel="noreferrer" href="{{ $setting->twitter_link }}"
                                                        uk-icon="icon: twitter;" target="_blank"
                                                        uk-tooltip="title:Twitter; pos:right;"></a>
                                                </div>
                                            @endif
                                            @if ($setting->instagram_link)
                                                <div>
                                                    <a class="" rel="noreferrer"
                                                        href="{{ $setting->instagram_link }}" uk-icon="icon: instagram;"
                                                        target="_blank" uk-tooltip="title:Instagram; pos:right;"></a>
                                                </div>
                                            @endif
                                            @if ($setting->linkedin_link)
                                                <div>
                                                    <a class="" rel="noreferrer"
                                                        href="{{ $setting->linkedin_link }}"target="_blank">
                                                        <i class="fa fa-wikipedia-w"
                                                            uk-tooltip="title:Wikipedia; pos:right;"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="uk-margin-small-bottom">
                                            <span
                                                class="f-w-600 f-17 text-primary uk-display-block">{{ $about_me->post_type }}</span>
                                            <div class="text-white f-13">
                                                <i>{{ $setting->site_name }}</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m">
                            {!! $about_me->brief !!}
                            <div class="uk-margin-top toggle0001" hidden id="toggle0001">
                                {!! $about_me->content !!}
                            </div>
                            @if ($about_me->content)
                                <a class="uk-button button-primary button-primary-active toggle0001" href="#toggle0001"
                                    uk-toggle="target: .toggle0001; animation: uk-animation-fade">Read More <i
                                        class="fa fa-plus"></i></a>
                            @endif
                            <a class="uk-button button-red button-secondary-active toggle0001" href="#toggle0001"
                                uk-toggle="target: .toggle0001; animation: uk-animation-fade" hidden>Read less <i
                                    class="fa fa-minus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: about us -->
    @endif
    <!-- start: Category -->
    <!--<div class="bg-image" style="background: url('{{ asset('themes-assets/images/bg1.png') }}')"></div>-->
    <section class="uk-section  uk-padding-remove-top">
        <div class="uk-container uk-text-center">
            <div class=""
                uk-scrollspy="target: [uk-scrollspy-class], h1, h3, img, span, p, a; cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
                <div class="uk-child-width-1-2@s uk-text-center" uk-height-match="target:.uk_trip_content" uk-grid>
                    <!-- start: list -->
                    <div>
                        <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                            <a href="{{ route('page.posttype_detail', $expeditions_type->uri) }}"
                                class="uk-media-450 uk_trip_image uk-position-relative">
                                <img src="@if ($expeditions_type->banner) {{ asset('uploads/medium/' . $expeditions_type->banner) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"
                                    class="uk-image uk-transition-scale-up uk-transition-opaque"
                                    alt="{{ $expeditions_type->post_type }}" loading="eager">
                                <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                    <h2 class="text-white uk-text-bold uk-margin-small">{{ $expeditions_type->post_type }}
                                        <!--<span class="text-primary">.</span>-->
                                    </h2>
                                    <div class="text-white f-16 uk-margin-medium-bottom">{!! $expeditions_type->brief !!} </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end: list -->
                    <!-- start: list -->
                    <div>
                        <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                            <a href="{{ route('page.posttype_detail', $trekkings_type->uri) }}"
                                class="uk-media-450 uk_trip_image uk-position-relative">
                                <img src="@if ($trekkings_type->banner) {{ asset('uploads/medium/' . $trekkings_type->banner) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"
                                    class="uk-image uk-transition-scale-up uk-transition-opaque"
                                    alt="{{ $trekkings_type->post_type }}" loading="eager">
                                <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                    <h2 class="text-white uk-text-bold uk-margin-small">{{ $trekkings_type->post_type }}
                                        <!--<span class="text-primary">.</span>-->
                                    </h2>
                                    <div class="text-white f-16 uk-margin-medium-bottom">{!! $trekkings_type->brief !!} </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end: list -->
                </div>
            </div>
        </div>
    </section>
    <!-- end: Category -->
    <section class="uk-section uk-middle-banner uk-margin-medium-top uk-flex uk-flex-center uk-flex-middle"
        style="background-image: linear-gradient(180deg, #ffffff 2%, #72727266 35%, #00000066 62%, #ffffff 87%, #ffffff 100%), url('{{ $setting->banner ? asset('uploads/original/' . $setting->banner) : asset('themes-assets/images/img-middle.jpg') }}');">
        <div class="uk-width-5-6">
            <h2 class="uk-text-bold uk-heading-small">Embark on unforgettable journeys, where every destination tells a
                story and every moment becomes a memory.</h2>
        </div>
    </section>
      {{-- TESTIMONIAL SECTION START --}}
    <section class="uk-section testimonial-section">
        <div class="uk-container" uk-scrollspy="target: [uk-scrollspy-class], h2, span, p, a; cls: uk-animation-slide-top-medium;delay: 100; repeat: false;">
            <div class="uk-grid-large uk-flex-middle" uk-grid>
                <!-- Left Content -->
                <div class="uk-width-2-5@m" uk-scrollspy-class>
                    <span class="text-primary">
                        {{ $testimonial->post_tag }}
                    </span>

                    <h2 class="uk-text-bold text-secondary-light uk-margin-small">
                        {{-- Discover What Our
                        Fellow Travelers Say
                        About Us --}}
                        {!! strip_tags($testimonial->brief) !!}
                    </h2>

                    <p class="uk-text-muted uk-margin-medium-top">

                        {!! Str::limit(strip_tags($testimonial->content), 280) !!}
                    </p>

                    <a href="{{ route('testimonial') }}"
                        class="uk-button button-primary button-primary-active uk-margin-medium-top">
                        Explore All Testimonials
                    </a>
                </div>
                <!-- Right Slider -->
                <div class="uk-width-3-5@m" uk-scrollspy-class>
                    <div class="uk-position-relative uk-visible-toggle" tabindex="-1"
                        uk-slideshow="
                            animation: fade;
                            autoplay: true;
                            autoplay-interval: 5000;
                            pause-on-hover: true;">
                        <ul class="uk-slideshow-items testimonial-slider">
                            @foreach ($testimonials as $testimonial)
                                <li>
                                    <div class="testimonial-card">
                                        <span class="quote-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </span>

                                        <div class="testimonial-stars">
                                            @for ($i = 1; $i <= $testimonial->rating; $i++)
                                                ★
                                            @endfor
                                        </div>
                                        <div class="testimonial-text">
                                            {!! Str::limit(strip_tags($testimonial->testimonial), 280) !!}
                                        </div>
                                        <div class="testimonial-footer">
                                            <div class="testimonial-avatar">
                                                <img src="@if ($testimonial->picture) {{ asset('uploads/testimonials/' . $testimonial->picture) }}
                                        @else
                                            {{ asset('themes-assets/images/default/default-profile.jpg') }} @endif"
                                                    alt="{{ $testimonial->name }}">
                                            </div>
                                            <div>
                                                <h4 class="testimonial-name">
                                                    {{ $testimonial->name }}
                                                </h4>
                                                <span class="testimonial-country">
                                                    {{ $testimonial->country }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="testimonial-controls">
                                            <a href="#" uk-slideshow-item="previous"
                                                class="testimonial-arrow prev">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                            <a href="#" uk-slideshow-item="next" class="testimonial-arrow next">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start: Trips -->
    @if ($popular_trip->trips->count() > 0)
        <section class="uk-section uk-margin-remove@s uk-margin-large-bottom">
            <div class="uk-container uk-text-center">
                <div class=""
                    uk-scrollspy="target: [uk-scrollspy-class], h1,img, h3, span, p; cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
                    <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                        @foreach ($popular_trip->trips->take(1) as $item)
                            <div class="uk-width-expand uk-margin-top uk_trip uk-padding-remove uk-visible@m"
                                style="top:35px; ">
                                <a href="{{ url('page/' . tripurl($item->uri)) }}"
                                    class="uk-media-580 uk_trip_image uk-position-relative">
                                    <img src="@if ($item->thumbnail) {{ asset('uploads/original/' . $item->thumbnail) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"
                                        class="uk-image uk-transition-scale-up uk-transition-opaque uk-scrollspy-inview "
                                        alt="{{ $item->trip_title }}" loading="eager" style="">
                                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                        <div class="uk-h4 uk-margin-remove text-white uk-scrollspy-inview "
                                            uk-scrollspy-class="" style="">
                                            {{ $item->duration }}
                                            {{ $item->duration <= '1' ? 'Day' : 'Days' }}
                                        </div>
                                        <h3 class="text-white uk-scrollspy-inview uk-margin-small-bottom"
                                            style="font-size:1.25rem;letter-spacing:2px;line-height:1.2;">
                                            {{ $item->trip_title }}</h3>
                                    </div>
                                </a>
                                <!--<div class="uk_trip uk_trip_content uk-flex uk-flex-between uk-flex-column">-->
                                <!--   <div>-->
                                <!--      <div class="uk-h4 uk-text-bold uk-margin-remove text-secondary-light uk-scrollspy-inview " uk-scrollspy-class="" style="">9-->
                                <!--         Days-->
                                <!--      </div>-->
                                <!--      <div class="f-14 uk-margin-top text-secondary-light uk-webkit uk-scrollspy-inview " uk-scrollspy-class="" style="">We use the latest model B3E helicopter for the Kathmandu – Jumla and Rara Lake – Kathmandu flights.</div>-->
                                <!--   </div>-->
                                <!--<a href="https://demo7.lakhetech.com/page/luxury-tour-to-jomsom-pokhara-and-chitwan-national-park.html" class="uk-width-1-1 uk-button button-primary button-primary-active uk-margin-top uk-scrollspy-inview " uk-scrollspy-class="" style="">View Details</a>-->
                                <!--</div>-->
                            </div>
                        @endforeach

                        <div class=" uk-width-2-3@m ">
                            <div class="" uk-slider="autoplay: true; sets: true; minItems: 4">
                                <!--  -->
                                <div
                                    class="uk-flex uk-flex-center uk-flex-middle uk-margin-medium-top uk-margin-small-bottom">
                                    <a class="uk-title-nav uk-icon uk-slidenav-previous uk-hidden" href="#"
                                        uk-slidenav-previous="" uk-slider-item="previous" aria-label="Previous slide"
                                        uk-tooltip="pos: left; title: Previous;"></a>
                                    <h1 class="uk-text-bold text-secondary-light uk-margin-remove">Popular Trips <span
                                            class="text-primary"></span>
                                    </h1>
                                    <a class="uk-title-nav uk-icon uk-slidenav-next uk-hidden" href="#"
                                        uk-slidenav-next="" uk-slider-item="next" aria-label="Next slide"
                                        uk-tooltip="pos: right; title: Next;"></a>
                                </div>
                                <!--  -->
                                <div class="uk-position-relative uk-visible-toggle uk-container uk-padding-small uk-padding-remove-horizontal"
                                    tabindex="-1" uk-slider>
                                    <ul class="uk-slider-items  uk-child-width-1-2@s
                                        uk-child-width-1-3@l uk-text-left uk-grid-small"
                                        uk-height-match="target:.uk_trip_content" uk-grid>
                                        <!-- start: list -->
                                        @foreach ($popular_trip->trips->skip(1)->take(9) as $item)
                                            <li>
                                                <div class="uk_trip uk-transition-toggle uk-link-toggle"
                                                    uk-scrollspy-class>
                                                    <a href="{{ url('page/' . tripurl($item->uri)) }}"
                                                        class="uk-media-500 uk_trip_image uk-position-relative">
                                                        <img src="@if ($item->thumbnail) {{ asset('uploads/original/' . $item->thumbnail) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"
                                                            class="uk-image uk-transition-scale-up uk-transition-opaque"
                                                            alt="{{ $item->trip_title }}" loading="eager">
                                                        <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                                            @if ($item->discount)
                                                                <span class="uk_trip_tag">
                                                                    <span>{{ $item->discount }}%OFF</span>
                                                                </span>
                                                            @endif
                                                            <div class="uk-h4 uk-margin-remove text-white"
                                                                uk-scrollspy-class>
                                                                {{ $item->duration }}
                                                                {{ $item->duration <= '1' ? 'Day' : 'Days' }}
                                                            </div>
                                                            <h4 class="text-white uk-margin-small-bottom uk-margin-small-top"
                                                                style="font-size:1.25rem;letter-spacing:2px;line-height:1.2;">
                                                                {{ $item->trip_title }}</h4>
                                                        </div>
                                                    </a>
                                                    <!--<div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">-->
                                                    <!--    <div>-->
                                                    <!--        <div class="uk-h4 uk-text-bold uk-margin-remove text-secondary-light"-->
                                                    <!--            uk-scrollspy-class>{{ $item->duration }}-->
                                                    <!--            {{ $item->duration <= '1' ? 'Day' : 'Days' }}</div>-->
                                                    <!--        @if ($item->guided_group)
    -->
                                                    <!--            <div class="f-12 uk-margin-small-top text-secondary-light"-->
                                                    <!--                uk-scrollspy-class>Guided Group ({{ $item->guided_group }})-->
                                                    <!--            </div>-->
                                                    <!--
    @endif-->
                                                    <!--        <div class="f-14 uk-margin-top text-secondary-light uk-webkit"-->
                                                    <!--            uk-scrollspy-class>{!! $item->trip_highlight !!}</div>-->
                                                    <!--    </div>-->
                                                    <!--<a href="{{ url('page/' . tripurl($item->uri)) }}"-->
                                                    <!--    class="uk-width-1-1 uk-button button-primary button-primary-active uk-margin-top"-->
                                                    <!--    uk-scrollspy-class>View Details</a>-->
                                                    <!--</div>-->
                                                </div>
                                            </li>
                                        @endforeach
                                        <!-- end: list -->
                                    </ul>
                                    <!-- <div class="uk-hidden-hover uk-hidden-touch uk-visible@m uk-light"><a class="uk-slidenav uk-hero-nav uk-position-small uk-position-center-left uk-icon uk-slidenav-previous uk-slidenav" href="#" uk-slidenav-previous="" uk-slider-item="previous" aria-label="Previous slide"></a><a class="uk-slidenav uk-hero-nav uk-position-small uk-position-center-right uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next" aria-label="Next slide"></a></div> -->
                                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin "></ul>
                                </div>
                            </div>
                            <!--@if ($popular_trip->trips->count() > 4)
    -->
                            <!--<div class="uk-margin-top uk-width-expand" id="StopSticky">-->
                            <!--    <a href="{{ route('popular-trips') }}" class="uk-button button-primary-outline ">See all Trips</a>-->
                            <!--</div>-->
                            <!--
    @endif-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- end: Trips -->
    <!-- start: Instagram -->
    <!--<section class="uk-section bg-white  uk-border-light-dark-top">-->
    <!--    <div class="uk-container uk-container-smalls uk-text-center">-->
    <!--        <div class=""-->
    <!--            uk-scrollspy="target: [uk-scrollspy-class], a; cls: uk-animation-slide-top-small; delay: 100; repeat: false;">-->
    <!--            <h2 class="uk-text-bold text-secondary-light uk-margin-medium-bottom" uk-scrollspy-class>Follow us on-->
    <!--                Instagram</h2>-->
    <!-- code -->
    <!--            <script src="https://apps.elfsight.com/p/platform.js" defer></script>-->
    <!--            <div class="elfsight-app-66f35a8f-4019-45d8-9621-c61a672878fd"></div>-->
    <!-- end code -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- end: Instagram -->
    <!-- =========================================
          Newsletter Section Start
          ========================================== -->
    <section class="uk-section newsletter-section">
        <div class="uk-container">

            <div class="newsletter-card">

                <div class="uk-grid-large uk-flex-middle" uk-grid>

                    <!-- Left Content -->
                    <div class="uk-width-1-2@m uk-scrollspy-inview">
                        <div class="newsletter-content">
                            <span class="newsletter-subtitle">
                                STAY CONNECTED
                            </span>

                            <h2 class="newsletter-title uk-scrollspy-inview">
                                Join Our Travel Newsletter
                            </h2>

                            <p class="newsletter-desc uk-scrollspy-inview">
                                Get the latest trekking updates, adventure stories,
                                exclusive offers and travel inspiration directly in your inbox.
                            </p>
                        </div>
                    </div>

                    <!-- Right Form -->
                    <div class="uk-width-1-2@m uk-scrollspy-inview">

                        <form action="{{ route('newsletter.subscribe') }}" method="POST" id="newsletterForm"
                            class="uk-grid-small uk-grid">

                            @csrf

                            {{-- <div class="uk-grid-small" uk-grid> --}}

                            <!-- Full Name -->
                            {{-- <div class="uk-width-1-2@s"> --}}
                            <div class="uk-width-1-2@s uk-grid-margin">

                                <label class="uk-form-label formControlLabel">
                                    Full Name <span class="text-red">*</span>
                                </label>

                                <input type="text" name="name" class="rsform-input-box uk-input"
                                    placeholder="Enter your full name" value="{{ old('name') }}">

                                @error('name')
                                    <small class="input-error">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>
                            {{-- </div> --}}

                            <!-- Email -->
                            {{-- <div class="uk-width-1-2@s"> --}}
                            <div class="uk-width-1-2@s
uk-grid-margin">

                                <label class="uk-form-label formControlLabel">
                                    Email Address <span class="text-red">*</span>
                                </label>

                                <input type="email" name="email" class="rsform-input-box uk-input"
                                    placeholder="Enter your email address" value="{{ old('email') }}">

                                @error('email')
                                    <small class="input-error">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>
                            {{-- </div> --}}

                            <!-- Privacy -->
                            <div class="uk-width-1-1">
                                <p class="newsletter-policy">
                                    We respect your privacy. Your information is secure and
                                    you can unsubscribe anytime.
                                </p>
                            </div>

                            <!-- Button -->
                            <div class="uk-width-1-1 uk-scrollspy-inview" style="margin-top:20px;">
                                <button type="submit" class="uk-button button-primary button-primary-active">
                                    Subscribe Now
                                </button>
                            </div>

                            {{-- </div> --}}

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Success Toast -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({

                toast: true,

                position: 'top-end',

                icon: 'success',

                title: "{{ session('success') }}",

                showConfirmButton: false,

                timer: 3000,

                timerProgressBar: true,

                background: '#ffffff',

                color: '#1f2937',

                iconColor: '#c9a14a',
            });
        </script>
    @endif

   @if (session('message'))
        <script>
            Swal.fire({

                toast: true,

                position: 'top-end',

                icon: 'info',

                title: "{{ session('message') }}",

                showConfirmButton: false,

                timer: 3000,

                timerProgressBar: true,

                background: '#ffffff',

                color: '#1f2937',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({

                toast: true,

                position: 'top-end',

                icon: 'error',

                title: "{{ session('error') }}",

                showConfirmButton: false,

                timer: 3500,

                timerProgressBar: true,

                background: '#ffffff',

                color: '#1f2937',
            });
        </script>
    @endif



    @if ($errors->any())
        <script>
            Swal.fire({

                toast: true,

                position: 'top-end',

                icon: 'warning',

                title: 'Please fix the highlighted fields and try again.',

                showConfirmButton: false,

                timer: 3000,

                timerProgressBar: true,

                background: '#ffffff',

                color: '#1f2937',
            });
        </script>
    @endif
    <!-- ===============================
                             Newsletter Section End
                        ================================ -->
@endsection
