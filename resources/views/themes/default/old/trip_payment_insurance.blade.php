@extends('themes.default.common.master')
@section('title', $guide->first()->title)
@section('thumbnail', $guide->first()->thumbnail)
@section('content')

<!-- HEADER START -->

<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header bg-light uk-border-light-dark-bottom" uk-scrollspy-class>
    <div class="uk-panel">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <h1 class="f-w-600 text-black uk-margin-remove ">{{$guide->first()->title}}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- HEADER END -->
<!-- section -->
<section class="uk-section bg-white uk-position-relative">
    
  <div class="uk-container" uk-scrollspy="target:h1, h2, h3, h4, h5, h6, li, p, a, img, .uk-content, .uk-meta; cls: uk-animation-slide-top-medium;   delay: 100; repeat: false;">
    <div uk-grid class="uk-grid uk-grid-medium">
        @foreach($guide->take(1) as $value)
      <div class="uk-width-expand@m ">
        @if($value->images->isNotEmpty())
        <div class="uk-media-400 uk-margin uk-position-relative  uk-border-rounded">
          @foreach($value->images->take(1) as $val)
          <img src="{{ asset('uploads/travel-guide/' . $val->image) }}" uk-img alt="{{$val->title}}">
          @endforeach
          <div class="uk-image-caption uk-position-bottom uk-padding-small uk-text-white">
            <div class="uk-position-cover uk-overlay-primary"></div>
            <div class="uk-position-relative text-white">{{$value->link}}</div>
          </div>
        </div>
        @endif  
        <div class="sharethis-inline-share-buttons uk-margin-bottom"></div>
        <div>
          {!! $value->brief !!}
          @if($value->images->isNotEmpty())
          @foreach($value->images->skip(1)->take(1) as $val)
          <img src="{{ asset('uploads/travel-guide/' . $val->image) }}" uk-img alt="{{$val->title}}">
          @endforeach
          @endif
          {!! $value->description !!}
        </div>
      </div>
       @endforeach
    </div>
   </div>
</section>

@stop
