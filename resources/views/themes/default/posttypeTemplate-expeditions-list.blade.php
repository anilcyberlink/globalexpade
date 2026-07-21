@extends('themes.default.common.master')
@section('title',$data->title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail',$data->thumbnail)
@section('brief',$data->brief)
@section('content')

<!-- HEADER START -->
<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header" uk-scrollspy-class>
    <div class=" uk_header_image uk-position-relative">
      <img src="@if($data->banner){{ asset('uploads/original/' . $data->banner) }}@else{{asset('themes-assets/images/default/default-banner.jpg')}}@endif" class="uk-image" alt="{{$data->post_type}}" loading="eager">
    </div>
    <div class="uk-banner-overlay uk-position-cover"></div>
    <div class="uk-panel uk_header_image_content uk-position-bottom">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow"></div>
          <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">{{$data->post_type}}</h1>
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
    {!! $data->content !!}
    <hr class="uk-divider-icon uk-margin-medium-top">
  </div>
  @if($expeditions->count() > 0)
    <div class="uk-container">
      @foreach($expeditions as $row)
        @if($loop->iteration % 2 != 0)
          <div class="uk-grid uk-child-width-1-2@s uk-margin uk-margin-remove-horizontal" uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
              <div class="uk-margin-vertical">
                  <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                    <a href="{{ route('page.destinationlist', $row->uri) }}" class="uk-media-350 uk_trip_image uk-position-relative">
                    <img src="@if($row->thumbnail){{ asset('uploads/original/' . $row->thumbnail) }}@else{{asset('themes-assets/images/default/default-banner.jpg')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="" loading="eager">
                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                      <h3 class="text-white uk-text-bold">{{$row->title}}</h3>
                    </div>
                    </a>  
                  </div>
              </div>
              <div class="uk-margin-vertical" style="display:flex; align-items:center;">
                  <div class="uk_trip_content uk-flex uk-flex-center uk-flex-column">
                    <div>
                      <div class="uk-h3 uk-text-bold uk-margin-remove text-secondary-light" uk-scrollspy-class></div>
                      <h3 class="f-24  uk-margin-top text-secondary-light uk-text-bold" uk-scrollspy-class>{{$row->sub_title}}</h3>
                      <p>{{$row->brief}}</p>
                      <a href="{{ route('page.destinationlist', $row->uri) }}" class="uk-button button-primary button-primary-active uk-margin-small-top"> View More</a>
                    </div>
                </div>
              </div>
          </div>
        @else
          <div class="uk-grid uk-child-width-1-2@s uk-margin uk-margin-remove-horizontal uk-flex" uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
              <div class="uk-flex-last uk-flex-first@m" style="display:flex; align-items:center;">
                <div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">
                    <div>
                      <div class="uk-h3 uk-text-bold uk-margin-remove text-secondary-light" uk-scrollspy-class></div>
                      <h3 class="f-24  uk-margin-top text-secondary-light uk-text-bold" uk-scrollspy-class>{{$row->sub_title}}</h3>
                      <p>{{$row->brief}}</p>
                      <a href="{{ route('page.destinationlist', $row->uri) }}" class="uk-button button-primary button-primary-active uk-margin-small-top"> View More</a>
                    </div>
                </div>
              </div>
              <div class="uk-flex-first uk-flex-last@m">
                  <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class >
                    <a href="{{ route('page.destinationlist', $row->uri) }}" class="uk-media-350 uk_trip_image uk-position-relative">
                    <img src="@if($row->thumbnail){{ asset('uploads/original/' . $row->thumbnail) }} @else{{asset('themes-assets/images/default/default-banner.jpg')}} @endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="" loading="eager">
                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                      <h3 class="text-white uk-text-bold">{{$row->title}}</h3>
                </div>
              </a>  
                  </div>
              </div>
          </div>
        @endif
      @endforeach
      <ul class=" pagination uk-flex-center uk-margin-large-top">
        {!! $expeditions->links('themes.default.common.pagination') !!}
      </ul>
    </div>
  @else
    <div class="uk-container">
      <ul class=" uk-child-width-1-2@s uk-child-width-1-3@l uk-text-left " uk-height-match="target:.uk_trip_content" uk-grid uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
        <h4>Nothing to view!</h4>
      </ul>
    </div>
  @endif
</section>

@stop