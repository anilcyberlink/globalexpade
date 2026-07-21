@extends('themes.default.common.master')
@section('title', $pages->page_type)
@section('brief', $pages->brief)
@section('thumbnail', $pages->image)
@section('meta_keyword', $pages->brief)
@section('meta_description', $pages->brief)
@section('content')

<!-- HEADER START -->
<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header" uk-scrollspy-class>
    <div class=" uk_header_image uk-position-relative">
      <img src="@if($pages->image){{ asset(env('PUBLIC_PATH').'uploads/original/' . $pages->image) }}@else{{asset('themes-assets/images/default/default-banner.jpg')}}@endif" class="uk-image" alt="{{$pages->page_type}}" loading="eager">
    </div>
    <div class="uk-position-cover uk-banner-overlay"></div>
    <div class="uk-panel uk_header_image_content uk-position-bottom">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow"> Useful Info </div>
          <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">{{$pages->page_type}}</h1>
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
<section class="uk-section-large bg-white uk-position-relative">
  <div class="uk-container">
    <ul class=" uk-child-width-1-2@s uk-child-width-1-3@l uk-text-left uk-flex uk-flex-center" uk-height-match="target:.uk_trip_content" uk-grid uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
      <!-- start: list -->
      @if($data != null)
	  @foreach($data as $row)
	  <li>
        <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
          <a href="{{ url('info/'.$pages->uri.'/'.teamurl($row['uri'],$row['page_key'])) }}" class="uk-media-350 uk_trip_image uk-position-relative">
            <img src="@if($row->page_thumbnail){{ asset(env('PUBLIC_PATH').'uploads/original/' . $row->page_thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$row->page_title}}" loading="eager">
            <div class="uk-panel uk_trip_image_content2 uk-position-bottom">
              <h4 class="text-white uk-text-bold ">{{$row->page_title}}</h4>
            </div>
          </a>
        </div>
      </li> 
      <!--<li>-->
      <!--  <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>-->
      <!--    <a href="{{ url('info/'.$pages->uri.'/'.teamurl($row['uri'],$row['page_key'])) }}" class="uk-media-350 uk_trip_image uk-position-relative">-->
      <!--      <img src="@if($row->page_thumbnail){{ asset(env('PUBLIC_PATH').'uploads/original/' . $row->page_thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$row->page_title}}" loading="eager">-->
      <!--      <div class="uk-panel uk_trip_image_content uk-position-bottom">-->
      <!--        <h3 class="text-white uk-text-bold">{{$row->page_title}}</h3>-->
      <!--      </div>-->
      <!--    </a>-->
      <!--    <div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">-->
      <!--      <a href="{{ url('info/'.$pages->uri.'/'.teamurl($row['uri'],$row['page_key'])) }}" class="uk-width-1-1 uk-button button-primary button-primary-active uk-margin-top" uk-scrollspy-class>View Details</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
	  @endforeach
	  @endif
      <!-- end: list -->
    </ul>
    <ul class=" pagination uk-flex-center uk-margin-large-top">
      {!! $data->links('themes.default.common.pagination') !!}
    </ul>
  </div>
</section>

@endsection