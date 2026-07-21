@extends('themes.default.common.master')
@section('title', $data->title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->thumbnail)
@section('brief', $data->brief)
@section('content')
    <!-- HEADER START -->
    <div
        uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
        <div class="uk_header" uk-scrollspy-class>
            <div class=" uk_header_image uk-position-relative">
                <img src="@if ($data->banner) {{ asset('uploads/banners/' . $data->banner) }}@else{{ asset('themes-assets/images/default/default-banner.jpg') }} @endif"
                    class="uk-image" alt="{{$data->title}}" loading="eager">
            </div>
            <div class="uk-banner-overlay uk-position-cover"></div>
            <div class="uk-panel uk_header_image_content uk-position-bottom">
                <div class="uk-container">
                    <div class="uk-padding-large uk-padding-remove-horizontal">
                        <div class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow">
                            Trekkings </div>
                        <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">{{ $data->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="texture">
        <img src="{{ asset('themes-assets/images/highertexture.png') }}" alt="">
    </div>
    <!-- HEADER END -->
    <!-- section -->
    <section class="uk-section bg-white uk-position-relative">
         <div class=" uk-section uk-padding-remove-top uk-container">
            <!-- <p class="uk-text-justify"></p> -->
            {!! $data->excerpt !!}
            <hr class="uk-divider-icon uk-margin-medium-top">
        </div>
        <div class="uk-container">
            <ul class=" uk-child-width-1-2@s uk-child-width-1-3@l uk-text-left uk-flex uk-flex-center" uk-height-match="target:.uk_trip_content"
                uk-grid
                uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
                @if ($trips->count() > 0)
                    @foreach ($trips as $item)
                        <!-- start: list -->
                         <li>
                            <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                                <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-media-350 uk_trip_image uk-position-relative">
                                    <img src="@if ($item->thumbnail) {{ asset('uploads/original/' . $item->thumbnail) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{ $item->trip_title }}" loading="eager">
                                        <div class="uk-panel uk_trip_image_content2 uk-position-bottom">
                                            @if ($item->discount)
                                                <span class="uk_trip_tag">
                                                    <span>{{ $item->discount }}%OFF</span>
                                                </span>
                                            @endif
                                            <h4 class="text-white uk-text-bold uk-margin-small-bottom uk-margin-small-top">{{ $item->trip_title }}</h4>
                                            <div class="uk-h4 uk-text-bold uk-margin-remove text-white" uk-scrollspy-class>
                                                {{ $item->duration }}
                                                {{ $item->duration <= '1' ? 'Day' : 'Days' }}
                                            </div>
                                        </div>
                                </a>
                                                    
                            </div>
                        </li>
                        <!--<li>-->
                        <!--    <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>-->
                        <!--        <a href="{{ url('page/' . tripurl($item->uri)) }}"-->
                        <!--            class="uk-media-350 uk_trip_image uk-position-relative">-->
                        <!--            <img src="@if ($item->thumbnail) {{ asset('uploads/original/' . $item->thumbnail) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"-->
                        <!--                class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$item->trip_title}}"-->
                        <!--                loading="eager">-->
                        <!--            <div class="uk-panel uk_trip_image_content uk-position-bottom">-->
                        <!--                @if ($item->discount)-->
                        <!--                    <span class="uk_trip_tag">-->
                        <!--                        <span>{{ $item->discount }}</span>-->
                        <!--                    </span>-->
                        <!--                @endif-->
                        <!--                <h3 class="text-white uk-text-bold">{{ $item->trip_title }}</h3>-->
                        <!--            </div>-->
                        <!--        </a>-->
                        <!--        <div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">-->
                        <!--            <div>-->
                        <!--                <div class="uk-h3 uk-text-bold uk-margin-remove text-secondary-light"-->
                        <!--                    uk-scrollspy-class>{{ $item->duration }}-->
                        <!--                    {{ $item->duration <= '1' ? 'Day' : 'Days' }}</div>-->
                        <!--                    @if( $item->guided_group)-->
                        <!--                    <div class="f-12 uk-margin-small-top text-secondary-light" uk-scrollspy-class>Guided-->
                        <!--                    Group ({{ $item->guided_group }})</div>-->
                        <!--                    @endif-->
                        <!--                <div class="f-14 uk-margin-top text-secondary-light" uk-scrollspy-class>-->
                        <!--                    {!! $item->trip_highlight !!}</div>-->
                        <!--            </div>-->
                        <!--            <a href="{{ url('page/' . tripurl($item->uri)) }}"-->
                        <!--                class="uk-width-1-1 uk-button button-primary button-primary-active uk-margin-top"-->
                        <!--                uk-scrollspy-class>View Details</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!-- end: list -->
                    @endforeach
                @endif
            </ul>
            <ul class=" pagination uk-flex-center uk-margin-large-top">
                {!! $trips->links('themes.default.common.pagination') !!}
            </ul>
        </div>
    </section>
@stop
