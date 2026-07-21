@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail',$data->page_thumbnail)
@section('brief',$data->post_excerpt)
@section('content')
@if($data->page_banner)
<section class="uk-cover-container  uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative" uk-parallax="bgy: -200; easing: 1;  " 
data-src="{{ asset('uploads/banners/'.$data->page_banner) }}" uk-height-viewport="expand: true; min-height: 700;" uk-img alt ="{{$data->post_title}}">
<div class="uk-overlay-primary uk-position-cover"></div>
<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
  <div class="uk-container uk-container-small" uk-scrollspy="target:h1, h2, h3, h4, h5, h6, p; cls: uk-animation-slide-top-medium;   delay: 100; repeat: true;">
    <h5 class="text-white uk-margin-small-bottom uk-text-uppercase">{{$data->created_at->format('d M Y')}}</h5>
    <h1 class="f-w-600 text-white uk-margin-large-bottom">{{$data->post_title}}</h1>
  </div>
</div>
</section>
@else
<section class="uk-section bg-primary uk-background-texture">
    <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
      <div class="uk-container" uk-scrollspy="target:h1, h2, h3, h4, h5, h6, p; cls: uk-animation-slide-top-medium;   delay: 100; repeat: true;">
         <h5 class="text-white uk-margin-small-bottom uk-text-uppercase">{{$post_type->post_type}}</h5>
         <h1 class="f-w-600 text-white uk-margin-remove">{{$data->post_title}}</h1>
      </div>
   </div>
</section>
@endif
<!-- HEADER END -->
<!-- section -->
<section class="uk-section bg-white uk-position-relative">
<div class="uk-container uk-container-small" uk-scrollspy="target:h1, h2, h3, h4, h5, h6, li, p, a, img, .uk-content, .uk-meta; cls: uk-animation-slide-top-medium;   delay: 100; repeat: false;">
<div class="sharethis-inline-share-buttons"></div>
    {!!$data->post_content!!}
</div>
@if($related->count()>0)
 <!-- related -->
<div class="uk-container uk-container-expand-right uk-position-relative uk-position-z-index uk-margin-medium-top" uk-scrollspy="target:[uk-scrollspy-class], h2, li, h4; cls: uk-animation-slide-top-medium; delay: 50; repeat: false;">
    <h5 class="f-w-600 text-black-light uk-title-border-bottom">Related </h5>
    <ul class="uk-child-width-1-3@m uk-grid-medium"  uk-height-match="target:.uk-card;" uk-grid>
    @foreach ($related as $value)    
    <li>
      <div>
        <a class="uk-item uk-card uk-card-default uk-card-hover uk-margin-remove-first-child uk-link-toggle uk-display-block" href="{{ route('page.pagedetail',$value->uri) }}">
          <div class="uk-card-media-top">
            <div class="uk-media-250">
              <img src="@if($value->page_thumbnail){{asset('/uploads/original/'.$value->page_thumbnail)}}@else{{asset('images/default/default-thumbnail.png')}}@endif" class="uk-image" alt="{{$data->post_title}}">
              <div class="uk-position-top">
                <div class="uk-padding-small"> <span class="uk-label bg-primary"><i class="fa fa-circle"></i>{{post_parent_byId($value->post_parent)->post_title}}
                 </span> </div>
             </div>
            </div>
          </div>
          <div class="uk-card-body uk-margin-remove-first-child">
            <div class="uk-meta text-black-light f-14 uk-margin-small-top">{{$value->post_date}}</div>
            <h2 class="uk-title uk-h3 uk-margin-small-top uk-margin-remove-bottom">
              <span class="uk-link-heading f-20">{{$value->post_title}}</span>
            </h2>
          </div>
        </a>
      </div>
    </li>
    @endforeach
  
    </ul>
 </div>
 @endif
<!-- end -->
</section>
@endsection
