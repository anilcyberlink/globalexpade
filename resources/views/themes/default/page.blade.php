@extends('themes.default.common.master')
@section('title',$data->post_type)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail',$data->banner)
@section('brief',$data->brief)
@section('content') 

<!-- HEADER START -->
<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header" uk-scrollspy-class>
    <div class="uk-media-450 uk_header_image uk-position-relative">
      <img src="@if($data->banner){{ asset('uploads/medium/' . $data->banner) }}@else {{asset('themes-assets/images/default/default-banner.jpg')}}@endif" class="uk-image" alt="{{$data->post_title}}" loading="eager">
    </div>
    <div class="uk-overlay-primary uk-position-cover"></div>
    <div class="uk-panel uk_header_image_content uk-position-bottom">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow">{{$data->post_type}}</div>
          <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">{{$data->post_tag}}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- HEADER END -->
<!-- section -->
<section class="uk-section-large bg-white uk-position-relative">
  <div class="uk-container">
    <div class="uk-grid" uk-grid uk-scrollspy="target:[uk-scrollspy-class], h1, h2, h3, h4, h5, h6, a, p, i, li;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
      <div class="uk-width-auto@s">
        <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
          <div class="uk_trip_image uk-media-380  uk-position-relative">
            <img src="@if($data->thumbnail){{asset('uploads/original/' . $data->thumbnail)}}@else {{asset('themes-assets/images/default/default-profile.jpg')}}@endif" uk-img class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$data->post_title}}" loading="eager">
            <div class="uk-panel uk_trip_image_content uk-position-bottom">
              <div class="uk-flex-column uk-text-left  uk-grid-small uk-light  uk-margin-medium-bottom" uk-grid>
                @if($setting->facebook_link)
                <div>
                  <a class="" rel="noreferrer" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;" target="_blank" uk-tooltip="title:Facebook; pos:right;"></a>
                </div>
                @endif
                @if($setting->youtube_link)
                <div>
                  <a class="" rel="noreferrer" href="{{$setting->youtube_link}}" uk-icon="icon: youtube;" target="_blank" uk-tooltip="title:Youtube; pos:right;"></a>
                </div>
                @endif
                @if($setting->twitter_link)
                <div>
                  <a class="" rel="noreferrer" href="{{$setting->twitter_link}}" uk-icon="icon: twitter;" target="_blank" uk-tooltip="title:Twitter; pos:right;"></a>
                </div>
                @endif
                @if($setting->instagram_link)
                <div>
                  <a class="" rel="noreferrer" href="{{$setting->instagram_link}}" uk-icon="icon: instagram;" target="_blank" uk-tooltip="title:Instagram; pos:right;"></a>
                </div>
                @endif
                @if($setting->linkedin_link)
                <div>
                  <a class="" rel="noreferrer" href="{{$setting->linkedin_link}}" target="_blank">
                    <i class="fa fa-wikipedia-w" uk-tooltip="title:Wikipedia; pos:right;"></i>
                  </a>
                </div>
                @endif
              </div>
              <div class="uk-margin-small-bottom">
                <span class="f-w-600 f-17 text-primary uk-display-block">{{$data->post_title}}</span>
                <div class="text-white f-13">
                  <i>{{$data->sub_title}}</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if($data->brief || $data->content)
      <div class="uk-width-expand@s">
        {!!$data->brief!!}
        {!!$data->content!!}
      </div>
      @endif
    </div>
  </div>
</section>

@stop