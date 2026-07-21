@extends('themes.default.common.master')
@section('title', $data->page_title)
@section('brief', $data->page_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

<!-- HEADER START -->
<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header" uk-scrollspy-class>
    <div class=" uk_header_image uk-position-relative">
      <img src="@if($data->page_banner){{ asset(env('PUBLIC_PATH').'uploads/banners/' . $data->page_banner) }}@else{{asset('themes-assets/images/default/default-banner.jpg')}}@endif" class="uk-image" alt="{{$data->page_title}}" loading="eager">
    </div>
    <div class="uk-position-cover uk-banner-overlay"></div>
    <div class="uk-panel uk_header_image_content uk-position-bottom">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow"> Useful Info </div>
          <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">{{$data->page_title}}</h1>
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
  <!--<div class="uk-container" uk-scrollspy="target:h1, h2, h3, h4, h5, h6, li, p, a, img, .uk-content, .uk-meta; cls: uk-animation-slide-top-medium;   delay: 100; repeat: false;">-->
  <div class="uk-container">
    <div uk-grid class="uk-grid uk-grid-medium">
      <div class="uk-width-expand@m ">
        <div class="uk-media-350 uk-margin uk-position-relative  uk-border-rounded">
          <img src="@if($data->page_thumbnail){{ asset(env('PUBLIC_PATH').'uploads/original/' . $data->page_thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" alt="{{$data->sub_title}}" uk-img>
		  @if($data->sub_title) 
		  <div class="uk-image-caption uk-position-bottom uk-padding-small uk-text-white">
            <div class="uk-position-cover uk-overlay-primary"></div>
            <div class="uk-position-relative text-white">{{$data->sub_title}}</div>	
          </div>
		  @endif
        </div>
        <div class="sharethis-inline-share-buttons uk-margin-bottom"></div>
		@if(($data->page_excerpt) || ($data->page_content))
        <div class="uk-text-justify">
			    {!!$data->page_excerpt!!}
       
          {!!$data->page_content!!}
        </div>
		@endif

		<!--{{--@if($details->count()>0 && $data->id == 8)-->
		<!--<div>-->
		<!--	<ul uk-accordion class="uk-accordion uk-accordion-outline">-->
			    
		<!--	  @foreach($details as $row)-->
		<!--	  <li class="{{$loop->first?'uk-open':''}}">-->
		<!--		<div class="uk-accordion-title  uk-itinerary-title">{{$row->title}}</div>-->
		<!--		<div class="uk-accordion-content">-->
		<!--		  {!!$row->content!!}-->
		<!--		</div>-->
		<!--	  </li>-->
		<!--	  @endforeach-->
			    
			    
		<!--	</ul>-->
		<!--  </div>-->
		<!--  @else-->
  <!--    @foreach($details as $row) -->
  <!--    <li>-->
		<!--		<div class="text-black">{{$row->title}}</div>-->
		<!--		<div class="uk-accordion-content">-->
		<!--		  {!!$row->content!!}-->
		<!--		</div>-->
		<!--	  </li> -->
  <!--      <br>   -->
		<!--	  @endforeach-->
  <!--      @endif--}}-->
  
        <!--gear list added-->
        			 @if($doc->count()>0)
                 <div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid>
                     @foreach($doc as $row)
                    <div>
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle "
                            tabindex="0" target="_blank"
                            href="{{ asset('uploads/doc/' . $row->document) }}">
                            @if($row->thumbnail)
                            <div class="uk-media-250"><img class="uk-image" alt="{{ $row->title }}"
                                    uk-img src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                            </div>
                            @else
                            <div class="uk-media-250"><img class="uk-image" alt="{{ $row->title }}"
                                    uk-img src="{{ asset('themes-assets/images/blank.png') }}">
                            </div>
                            @endif
                            <div class="uk-overlay-primary uk-position-cover"></div>
                            <div class="uk-position-center">
                                <div class="uk-overlay">
                                    <h4 class="uk-margin-remove text-white uk-text-bold">
                                        {{ $row->title }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                 
                    </div>
                @endif
                    
            <!--gear list end-->


      </div>

      <div class="uk-width-1-3@m">
        <!--  -->
		@if($links->count()>0)
        <div class="uk-blog-sidebar " style="z-index: 9;" uk-sticky="media:@m; offset: 100; bottom: #uk-stop-sticky">
          <div class="bg-white uk-box-shadow-large uk-padding uk-border-rounded">
            <h4 class="text-primary">Related Links </h4>
            <hr style="background-color:#e19a03; height:2px;">
            <ul class="uk-list uk-list-large uk-list-divider text-secondary">
			@foreach($links as $row)
              <li class="move">
                <a class="{{$row->uri ==  Request::segment(2)?'uk-active':'text-secondary'}} " href="{{url('info/'.$row->uri)}}">{{$row->page_type}}</a>
              </li>
			@endforeach
            </ul>
          </div>
        </div>
		@endif
        <!--  -->
      </div>
    </div>
    <div id="uk-stop-sticky"></div>
  </div>
</section>

@endsection