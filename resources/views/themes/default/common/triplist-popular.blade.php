@extends('themes.default.common.master')
@section('content')
    <!-- HEADER START -->
    <div
        uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
        <div class="uk_header bg-light uk-border-light-dark-bottom" uk-scrollspy-class>
            <div class="uk-panel">
                <div class="uk-container">
                    <div class="uk-padding-large uk-padding-remove-horizontal">
                        <div class="uk-h5 text-primary uk-margin-small-bottom uk-text-uppercase f-w-600"></div>
                        <h1 class="f-w-600 text-black uk-margin-remove ">Our most popular trips <span
                            class="text-primary">.</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER END -->
    <!-- section -->
    <section class="uk-section-large bg-white uk-position-relative">
        @if ($popular_trips->count() > 0)
            <div class="uk-container">
                <ul class=" uk-child-width-1-2@s uk-child-width-1-3@l uk-text-left" uk-height-match="target:.uk_trip_content"
                    uk-grid
                    uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
                    <!-- start: list -->
                    @foreach ($popular_trips as $item)
                        <li>
                            <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                                <a href="{{ url('page/' . tripurl($item->uri)) }}"
                                    class="uk-media-350 uk_trip_image uk-position-relative">
                                    <img src="@if ($item->thumbnail) {{ asset('uploads/original/' . $item->thumbnail) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"
                                        class="uk-image uk-transition-scale-up uk-transition-opaque"
                                        alt="{{ $item->title }}" loading="eager">
                                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                        @if ($item->discount)
                                            <span class="uk_trip_tag">
                                                <span>{{ $item->discount}}%OFF</span>
                                            </span>
                                        @endif
                                        <h3 class="text-white uk-text-bold">{{ $item->trip_title }}</h3>
                                    </div>
                                </a>
                                <div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">
                                    <div>
                                        <div class="uk-h3 uk-text-bold uk-margin-remove text-secondary-light"
                                            uk-scrollspy-class>{{ $item->duration }}
                                            {{ $item->duration <= '1' ? 'Day' : 'Days' }}</div>
                                        @if ($item->guided_group)
                                            <div class="f-12 uk-margin-small-top text-secondary-light" uk-scrollspy-class>
                                                Guided Group ({{ $item->guided_group }})</div>
                                        @endif
                                        <div class="f-14 uk-margin-top text-secondary-light" uk-scrollspy-class>
                                            {!! $item->trip_highlight !!}</div>
                                    </div>
                                    <a href="{{ url('page/' . tripurl($item->uri)) }}"
                                        class="uk-width-1-1 uk-button button-primary button-primary-active uk-margin-top"
                                        uk-scrollspy-class>View Details</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <!-- end: list -->
                </ul>
                <ul class=" pagination uk-flex-center uk-margin-large-top">
                    {!! $popular_trips->links('themes.default.common.pagination') !!}
                </ul>
            </div>
        @else
            <div class="uk-container">
                <ul class=" uk-child-width-1-2@s uk-child-width-1-3@l uk-text-left"
                    uk-height-match="target:.uk_trip_content" uk-grid
                    uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
                    <h4>Nothing to view!</h4>
                </ul>
            </div>
        @endif
    </section>

@stop
