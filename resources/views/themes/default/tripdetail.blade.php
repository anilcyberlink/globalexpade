@extends('themes.default.common.master')
@section('title',$data->trip_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)      
@section('thumbnail',$data->thumbnail)
@section('brief',$data->trip_excerpt)
@section('content')
<!-- HEADER START -->
<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header" uk-scrollspy-class>
    <div class="uk-media-700 uk_header_image1 uk-position-relative">
      <img src="@if($data->banner){{ asset('uploads/banners/'.$data->banner) }}@else{{asset('themes-assets/images/default/default-banner.jpg')}}@endif" class="uk-image" alt="{{ $data->trip_title }}" loading="eager">
    </div>
    <div class="uk-overlay-primary uk-position-cover"></div>
    <div class="uk-panel uk_header_image_content uk-position-bottom">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow uk-text-center">{{ $data->trip_title }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- HEADER END -->
<!-- Trip Facts -->
<section class="uk-section bg-light uk-trip-facts uk-position-relative uk-background-cover uk-background-norepeat uk-background-bottom">
  <div class="uk-container">
    <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid uk-scrollspy="target:[uk-scrollspy-class], p, img; cls: uk-animation-slide-top-medium; delay: 50; repeat: false;">
      <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m">
        <div class="uk-panel">
          <div class="uk-margin">
            <div class="uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-match uk-grid uk-flex-left uk-light" uk-grid>
              @if($data->peak_name)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                    <img src="{{asset('themes-assets/images/icons/Country.png')}}" alt="{{$data->peak_name}}" width="40">
                     <!--<img src="{{asset('themes-assets/images/icons_new/Country.png')}}" alt="{{$data->peak_name}}" width="50">-->
                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Country</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->peak_name}} </p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->duration)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                    <!--<img src="{{asset('themes-assets/images/icons/Duration.png')}}" alt="{{$data->duration}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Duration.png')}}" alt="{{$data->duration}}" width="35">
                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Duration</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->duration}} {{$data->duration <= '1'?'Day':'Days'}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->trip_grade)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                     @if($data->trip_grade==1)
                    <!--<img src="{{asset('themes-assets/images/icons/Grade1.png')}}" alt="{{$data->trip_grade}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Grade1.png')}}" alt="{{$data->trip_grade}}" width="50">
                    @elseif($data->trip_grade==2)
                      <!--<img src="{{asset('themes-assets/images/icons/Grade2.png')}}" alt="{{$data->trip_grade}}" width="50">-->
                     <img src="{{asset('themes-assets/images/icons_new/Grade2.png')}}" alt="{{$data->trip_grade}}" width="50">
                      @elseif($data->trip_grade==3)
                      <!--<img src="{{asset('themes-assets/images/icons/Grade3.png')}}" alt="{{$data->trip_grade}}" width="50">-->
                     <img src="{{asset('themes-assets/images/icons_new/Grade3.png')}}" alt="{{$data->trip_grade}}" width="50">
                      @elseif($data->trip_grade==4)
                   <!--<img src="{{asset('themes-assets/images/icons/Grade4.png')}}" alt="{{$data->trip_grade}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Grade4.png')}}" alt="{{$data->trip_grade}}" width="50">
                   @endif

                    
                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Grade</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{ grade_message_trek($data->trip_grade) }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->max_altitude)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                    <!--<img src="{{asset('themes-assets/images/icons/MaxAltitude.png')}}" alt="{{$data->max_altitude}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Elevation.png')}}" alt="{{$data->max_altitude}}" width="50">

                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Max Altitude</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->max_altitude}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->walking_per_day)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                    <!--<img src="{{asset('themes-assets/images/icons/DailyActivities.png')}}" alt="{{$data->walking_per_day}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Activities.png')}}" alt="{{$data->walking_per_day}}" width="50">

                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Daily activity</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->walking_per_day}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->best_season)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                      @if($data->best_season=='Autumn')
                    <!--<img src="{{asset('themes-assets/images/icons/BestSeason.png')}}" alt="{{$data->best_season}}" width="50">-->
                   <img src="{{asset('themes-assets/images/icons_new/Autumn.png')}}" alt="{{$data->best_season}}" width="50">
                   @elseif($data->best_season=='Spring')
                   <img src="{{asset('themes-assets/images/icons_new/Spring.png')}}" alt="{{$data->best_season}}" width="50">
                   @elseif($data->best_season=='Winter')
                    <img src="{{asset('themes-assets/images/icons_new/Winter.png')}}" alt="{{$data->best_season}}" width="50">
                       @elseif($data->best_season=='Spring/Autumn')
                    <img src="{{asset('themes-assets/images/icons_new/best-season.png')}}" alt="{{$data->best_season}}" width="50">
                   @endif
                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Best Season</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->best_season}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->accommodation)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                    <!--<img src="{{asset('themes-assets/images/icons/Accomodation.png')}}" alt="{{$data->accommodation}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Accomodation.png')}}" alt="{{$data->accommodation}}" width="50">
                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong>Accommodation</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->accommodation}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
              @if($data->group_size)
              <!--  -->
              <div>
                <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                   <!--<img src="{{asset('themes-assets/images/icons/Group.png')}}" alt="{{$data->group_size}}" width="50">-->
                    <img src="{{asset('themes-assets/images/icons_new/Group.png')}}" alt="{{$data->group_size}}" width="40">
                  </div>
                  <div>
                    <div>
                      <p class="uk-margin-remove">
                        <strong> Group Size</strong>
                      </p>
                      <p class="uk-margin-remove f-14 text-primary">{{$data->group_size}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="uk-padding-small"></div>
</section>
<!-- end Facts -->
<!-- start section -->
<section class="uk-section uk-trippage uk-padding-remove-top uk-position-relative">
  <div class="uk-container" uk-scrollspy="target:[uk-scrollspy-class], img, h1, h2, h3, h4, h5, h6, ul, hr, .uk-button,  p; cls: uk-animation-slide-top-medium; delay: 50; repeat: false;">
    <ul class="uk-triptab bg-light uk-box-shadow-medium" data-uk-tab="{connect:'#tripdetails'}" uk-sticky="offset: 83; end: !.uk-trippage;">
      <li>
        <a href="">Overview</a>
      </li>
      @if($itinerary->count() > 0)
      <li>
        <a href=""> Itinerary</a>
      </li>
      @endif
      @if($data->trip_map)
      <li>
        <a href="">Map </a>
      </li>
      @endif
      @if($cost_includes->count()>0 || $cost_excludes->count()>0)
      <li>
        <a href="">Cost Includes, Excludes </a>
      </li>

      @endif
      <!--@if($trip_docs->count()>0 || $gear_insurance || $gear_payment)-->
      <!--<li>-->
      <!--  <a href="">Gears List</a>-->
      <!--</li>-->
      <!--@endif-->
      @if($photo_videos->count() > 0)
      <li>
        <a href="">Photo/Videos</a>
      </li>
      @endif
    </ul>
    <ul id="tripdetails" class="uk-switcher uk-margin-medium">
      <!-- Overview -->
      <li>
        <div class="uk-grid-medium uk-grid" uk-grid>
          <!--  -->
          <div class="uk-width-expand@m">
            {!!$data->trip_excerpt!!}
            <br>
            <div class="uk-margin-top toggle0001" hidden id="toggle0001">
            {!!$data->trip_content!!} 
            </div>
            @if($data->trip_content)
            <a class="text-primary toggle0001" href="#toggle0001" uk-toggle="target: .toggle0001; animation: uk-animation-fade">Read More <i class="fa fa-plus"></i></a>
            @endif
            <a class="text-red toggle0001" href="#toggle0001" uk-toggle="target: .toggle0001; animation: uk-animation-fade" hidden>Read less <i class="fa fa-minus"></i>
            </a>
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-3@m">
            <div class="uk-trip-sidebar uk-clearfix uk-sticky uk-z-index-zero" uk-sticky="offset: 155; end: !.uk-trippage;">
              @include('themes.default.common.trip-action')
              </div>
          </div>
          <!--  -->
        </div>
      </li>
      <!-- end Overview -->
       @if($itinerary->count()>0)
      <!--  Itinerary-->
      <li>
        <div class="uk-grid-medium uk-grid" uk-grid>
          <!--  -->
          @if($itinerary->count()>0)
          <div class="uk-width-expand@m">
            <ul uk-accordion class="uk-accordion uk-accordion-outline uk-itinerary">
              <!--  -->
              @foreach ($itinerary as $value)
              <li class="{{$loop->first?'uk-open':''}}">
                <div class="uk-accordion-title  uk-itinerary-title">
                  <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto uk-text-center">
                      <div class="uk-day uk-margin-small-right"> Day {{ $value->days }}  </div>
                    </div>
                    <div class="uk-width-expand">
                      <div class="uk-width-1-1"> {{ $value->title }} </div>
                    </div>
                  </div>
                </div>
                <div class="uk-accordion-content uk-itinerary-content">
                  {!! $value->content !!}
                </div>
              </li>
              @endforeach
              <!--  -->
              <!--  -->
            </ul>
          </div>
          <!--  -->
          @endif
          <!--  -->
          <div class="uk-width-1-3@m">
            <div class="uk-trip-sidebar uk-clearfix uk-sticky uk-z-index-zero" uk-sticky="offset: 155; end: !.uk-trippage;"> 
              @include('themes.default.common.trip-action')
             </div>
          </div>
          <!--  -->
        </div>
      </li>
      <!-- end  Itinerary -->
      @endif
       @if($data->trip_map)
      <!-- Map / Altitude Chart -->
      <li>
        <div classs="uk-grid-medium" uk-grid>
          <!--  -->
          <div class="uk-width-expand@m" uk-lightbox="animation: slide;">
            <a href="{{asset('uploads/original/'.$data->trip_map)}}" data-caption="Route Map">
              <div class=" ">
                <img src="{{asset('uploads/original/'.$data->trip_map)}}" alt="{{$data->trip_title}}" uk-img class="uk-border-rounded">
              </div>
              <i class="uk-margin-small-top f-13">Route Map</i>
            </a>
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-3@m">
            <div class="uk-trip-sidebar uk-clearfix uk-sticky uk-z-index-zero" uk-sticky="offset: 155; end: !.uk-trippage;"> 
              @include('themes.default.common.trip-action')
            </div>
          </div>
          <!--  -->
        </div>
      </li>
      <!-- end Map / Altitude Chart -->
      @endif
      @if($cost_includes->count()>0 || $cost_excludes->count()>0)
      <!-- Cost Includes, Excludes -->
      <li>
        <div class="uk-padding bg-light uk-border-rounded">
          <div class="uk-grid-large uk-grid uk-grid-divider" uk-grid>
            @if($cost_includes->count() > 0)
            <div class="uk-width-expand@m">
              <h4 class="f-w-600">Cost Includes</h4>
              <div class="uk-trip-inclusive">
                <ul>
                  @foreach($cost_includes as $value )
                  <li>{{ $value->title }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endif
            @if($cost_excludes->count() > 0)
            <div class="uk-width-expand@m">
              <h4 class="f-w-600">Cost Excludes</h4>
              <div class="uk-trip-exclusive">
                <ul>
                  @foreach ($cost_excludes as $value )
                  <li>{{ $value->title }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endif
          </div>
        </div>
      </li>
      <!-- Cost Includes, Excludes -->
      @endif
      
      @if ($photo_videos->count() > 0)
      <!-- Photo/Videos -->
      <li>
        <div class="uk-grid-medium uk-grid" uk-grid>
          <!--  -->
          <div class="uk-width-expand@m">
            <div class="uk-gallery">
              <ul class="uk-grid uk-grid-small" uk-grid  uk-lightbox="animation: slide;">
                <li class="uk-width-1-1">
                  <!--  -->
                  @if($videos->isNotEmpty())
                  @foreach ($videos as $row)
                  <div class="uk-video uk-border-rounded">
                    <a class="uk-video-player" href="#modal-media-youtube" uk-toggle>
                      <div class="uk-media-400 uk-position-relative">
                        <img class="uk-image" alt="" uk-img src="https://img.youtube.com/vi/{{ $row->video }}/maxresdefault.jpg">
                        <div class="uk-overlay-primary uk-position-cover"></div>
                        <div class="uk-position-center">
                          <div class="uk-overlay">
                            <h4 class="uk-margin-top uk-margin-remove-bottom text-white">
                              <span class="uk-light uk-icon" uk-icon="icon:play-circle; ratio: 3.5 "></span>
                            </h4>
                          </div>
                        </div>
                      </div>
                    </a>
                    <div id="modal-media-youtube" class="uk-flex-top" uk-modal>
                      <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                        <button class="uk-modal-close-outside" type="button" uk-close></button>
                        <iframe src="https://www.youtube-nocookie.com/embed/{{ $row->video }}" width="854" height="480" uk-video uk-responsive></iframe>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <!--  -->
                </li>
                @if($photos->count()>0)
                @if($videos->isEmpty())
                @foreach ($photos->slice(0,1) as $row)
                <li class=" uk-width-1-3@m uk-width-1-2">
                  <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}">
                    <div class="uk-media-150 uk-border-rounded">
                      <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" uk-img alt="{{$row->title}}">
                    </div>
                  </a>
                </li>
                @endforeach
                @foreach ($photos->skip(1) as $row)
                  @continue($row->thumbnail == null)
                  @continue($loop->iteration >= 4)
                <li class=" uk-width-1-3@m uk-width-1-2">
                  <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}">
                    <div>
                      <div class="uk-media-150 uk-more-images  uk-border-rounded">
                        <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" uk-img alt="{{$row->title}}">
                        @if ($loop->iteration >= 3)
                        <span class="uk-h1 uk-position-center uk-light uk-margin-remove text-white " style="z-index: 1;">+ {{ $loop->remaining }}</span>             
                        <div class="uk-overlay-primary uk-position-cover"></div>
                        @endif
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
                @else
                @foreach ($photos as $row)
                  @continue($row->thumbnail == null)
                  @continue($loop->iteration >= 4)
                  <li class=" uk-width-1-3@m uk-width-1-2">
                    <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}">
                      <div>
                        <div class="uk-media-150 uk-more-images  uk-border-rounded">
                          <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" uk-img alt ="{{$row->title}}">
                          @if ($loop->iteration >=3)
                          @if($loop->remaining > 0)
                          <span class="uk-h1 uk-position-center uk-light uk-margin-remove text-white " style="z-index: 1;">+ {{ $loop->remaining }}</span>
                          <div class="uk-overlay-primary uk-position-cover"></div>@endif
                          @endif
                        </div>
                      </div>
                    </a>
                  </li>
                  @endforeach
                  @endif
                <!-- more images -->
                @foreach ($photo_videos as $row)
                <li class="uk-hidden">
                  <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}" alt = "{{$row->title}}"></a>
                </li>
                @endforeach
                @endif
                <!-- end -->
              </ul>
            </div>
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-3@m">
            <div class="uk-trip-sidebar uk-clearfix uk-sticky uk-z-index-zero" uk-sticky="offset: 155; end: !.uk-trippage;"> 
              @include('themes.default.common.trip-action')
            </div>
          </div>
          <!--  -->
        </div>
      </li>
      <!-- end Photo/Videos -->
      @endif
      
      @if ($trip_docs->count()>0 || $gear_insurance || $gear_payment || $guide)
      <!-- Gears List -->
      <li>
        <div class="uk-grid-medium uk-grid" uk-grid>
          <!--  -->
          <div class="uk-width-expand@m">
            <div class="uk-child-width-1-2@m uk-text-center" uk-height-match="target:.uk_trip_content" uk-grid>
              <!-- start: list -->
              @if ($trip_docs->count() > 0)
                @foreach ($trip_docs as $row)
              <div>
                <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                  <a href="{{ asset('uploads/doc/' . $row->document) }}" target="_blank" class="uk-media-200 uk_trip_image uk-position-relative">
                    <img src="@if($row->thumbnail){{ asset('uploads/original/' . $row->thumbnail) }}@else{{ asset('themes-assets/images/default/blank.png') }}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{ $row->title }}" loading="eager">
                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                      <h4 class="text-white uk-text-bold uk-margin-bottom"> {{ $row->title }}</h4>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
              @endif
              <!-- end: list -->
               <!-- start: list -->
              @if($guide->count()>0)
              @foreach($guide as $row)
              <div>
                <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                  <a href="{{route('payment',$data->uri)}}" class="uk-media-200 uk_trip_image uk-position-relative">
                    <img src="@if($row->thumbnail){{ asset( 'uploads/original/' . $row->thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$row->title}}" loading="eager">
                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                      <h4 class="text-white uk-text-bold uk-margin-bottom">{{$row->title}} </h4>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
              @endif
              <!-- end: list -->
              <!-- start: list -->
               @if($gear_payment->count()>0)
              @foreach($gear_payment as $row)
              <div>
                <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                  <a href="{{route('payment',$data->uri)}}" class="uk-media-200 uk_trip_image uk-position-relative">
                    <img src="@if($row->thumbnail){{ asset( 'uploads/original/' . $row->thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$row->title}}" loading="eager">
                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                      <h4 class="text-white uk-text-bold uk-margin-bottom">{{$row->title}} </h4>
                    </div>
                  </a>
                </div>
              </div>
               @endforeach
              @endif
              <!-- end: list -->
              <!-- start: list -->
               @if($gear_insurance->count()>0)
              @foreach($gear_insurance as $row)
               <div>
                <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                  <a href="{{route('payment',$data->uri)}}" class="uk-media-200 uk_trip_image uk-position-relative">
                    <img src="@if($row->thumbnail){{ asset( 'uploads/original/' . $row->thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$row->title}}" loading="eager">
                    <div class="uk-panel uk_trip_image_content uk-position-bottom">
                      <h4 class="text-white uk-text-bold uk-margin-bottom">{{$row->title}} </h4>
                    </div>
                  </a>
                </div>
              </div>
               @endforeach
              @endif
              <!-- end: list -->
            </div>
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-3@m">
            <div class="uk-trip-sidebar uk-clearfix uk-sticky uk-z-index-zero" uk-sticky="offset: 155; end: !.uk-trippage;"> 
              @include('themes.default.common.trip-action')
             </div>
          </div>
          <!--  -->
        </div>
      </li>
      <!-- end Gears List -->
      @endif
      
    </ul>
  </div>
</section>
<!--end section  -->
@if( $similar_trips->count() > 0)
<!-- start: Similar Trips -->
<section class="uk-section bg-white uk-padding-remove-top uk-border-light-dark-top">
  <div class="uk-container uk-text-center">
    <div class="" uk-scrollspy="target: [uk-scrollspy-class], h1, h3, span, p; cls: uk-animation-slide-top-small; delay: 20; repeat: false;">
      <div class="uk-slider-container-offset" uk-slider="autoplay: true; sets: true;">
        <!--  -->
        <div class="uk-flex uk-flex-center uk-flex-middle uk-margin-medium-top uk-margin-medium-bottom">
          <a class="uk-title-nav uk-icon uk-slidenav-previous" href="#" uk-slidenav-previous="" uk-slider-item="previous" aria-label="Previous slide" uk-tooltip="pos: left; title: Previous;"></a>
          <h1 class="uk-text-bold text-secondary-light uk-margin-remove">Similar Trips <span class="text-primary">.</span>
          </h1>
          <a class="uk-title-nav uk-icon uk-slidenav-next" href="#" uk-slidenav-next="" uk-slider-item="next" aria-label="Next slide" uk-tooltip="pos: right; title: Next;"></a>
        </div>
        <!--  -->
        <div class="uk-position-relative uk-visible-toggle uk-container" tabindex="-1">
          <ul class="uk-slider-items  uk-child-width-1-2@s uk-child-width-1-3@l uk-text-left" uk-height-match="target:.uk_trip_content" uk-grid>
            <!-- start: list -->
            @foreach ($similar_trips as $item)
            {{--<li>
              <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-media-350 uk_trip_image uk-position-relative">
                  <img src="@if($item->thumbnail){{ asset('uploads/original/'.$item->thumbnail) }}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{$item->trip_title}}" loading="eager">
                  <div class="uk-panel uk_trip_image_content uk-position-bottom">
                    @if($item->discount)
                    <span class="uk_trip_tag">
                      <span>{{$item->discount}}</span>
                    </span>
                    @endif
                    <h3 class="text-white uk-text-bold">{{$item->trip_title}}</h3>
                  </div>
                </a>
                <div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">
                  <div>
                    <div class="uk-h3 uk-text-bold uk-margin-remove text-secondary-light" uk-scrollspy-class>{{$item->duration}} {{$item->duration <= '1' ? 'Day' : 'Days' }}</div>
                    @if($item->guided_group)
                    <div class="f-12 uk-margin-small-top text-secondary-light" uk-scrollspy-class>Guided Group ({{$item->guided_group}})</div>
                    @endif
                    <div class="f-14 uk-margin-top text-secondary-light" uk-scrollspy-class>{!!$item->trip_highlight!!}</div>
                  </div>
                  <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-width-1-1 uk-button button-primary button-primary-active uk-margin-top" uk-scrollspy-class>View Details</a>
                </div>
              </div>
            </li>--}}
            <li>
                <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>
                    <a href="{{ url('page/' . tripurl($item->uri)) }}"
                        class="uk-media-500 uk_trip_image uk-position-relative">
                        <img src="@if ($item->thumbnail) {{ asset('uploads/original/' . $item->thumbnail) }}@else{{ asset('themes-assets/images/default/default-thumbnail.png') }} @endif"
                            class="uk-image uk-transition-scale-up uk-transition-opaque"
                            alt="{{ $item->trip_title }}" loading="eager">
                        <div class="uk-panel uk_trip_image_content uk-position-bottom">
                            @if ($item->discount)
                                <span class="uk_trip_tag">
                                    <span>{{ $item->discount}}%OFF</span>
                                </span>
                            @endif
                            <div class="uk-h4 uk-margin-remove text-white" uk-scrollspy-class>
                                 {{ $item->duration }}
                                 {{ $item->duration <= '1' ? 'Day' : 'Days' }}
                            </div>
                            <h4 class="text-white uk-margin-small-bottom uk-margin-small-top" style="font-size:1.25rem;letter-spacing:2px;line-height:1.2;">{{ $item->trip_title }}</h4>
                        </div>
                    </a>
                    <!--<div class="uk_trip_content uk-flex uk-flex-between uk-flex-column">-->
                    <!--    <div>-->
                    <!--        <div class="uk-h4 uk-text-bold uk-margin-remove text-secondary-light"-->
                    <!--            uk-scrollspy-class>{{ $item->duration }}-->
                    <!--            {{ $item->duration <= '1' ? 'Day' : 'Days' }}</div>-->
                    <!--        @if ($item->guided_group)-->
                    <!--            <div class="f-12 uk-margin-small-top text-secondary-light"-->
                    <!--                uk-scrollspy-class>Guided Group ({{ $item->guided_group }})-->
                    <!--            </div>-->
                    <!--        @endif-->
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
          <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin uk-hidden@l"></ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end: Similar Trips -->
@endif
<!-- Inquire Now popup -->
<div id="inquire-now" uk-modal>
  <div class="uk-modal-dialog uk-modal-border-rounded">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-modal-header bg-secondary uk-text-center uk-padding-small">
      <h3 class="uk-h3 uk-margin-remove text-white">Have Questions? </h3>
      <p class="uk-margin-small text-white f-14">{{$data->trip_title}}</p>
    </div>
    <div class="uk-modal-body uk-padding">
      <form class="uk-grid-medium" uk-grid action="{{ route('post-inquiry') }}" method="POST">
       @csrf
         <input type="hidden" name="trip_id" value="{{$data->id}}">
         <input type="hidden" name="title" value="{{$data->trip_title}}">
         @include('themes.default.common.flash-message')
        <div class="uk-width-1-1@s uk-margin-small">
          <label>Full Name <span class="text-red">*</span>
          </label>
          <input class="uk-input" name="name" type="text" placeholder=" ">
        </div>
        <div class="uk-width-1-1@s uk-margin-small">
          <label>Email Address <span class="text-red">*</span>
          </label>
          <input class="uk-input" name="email" type="email" placeholder=" ">
        </div>
        <div class="uk-width-1-1@s uk-margin-small">
          <label>Country <span class="text-red">*</span>
          </label>
          <select name="country" class="uk-select">
           @include('themes.default.common.country')
          </select>
        </div>
        <div class="uk-width-1-1@s uk-margin-small">
          <label>Contact Number <span class="text-red">*</span>
          </label>
          <input class="uk-input" name="number" type="text" placeholder="">
        </div>
        <div class="uk-width-1-1@s uk-margin-small">
          <label>Your Message/Questions </label>
          <textarea name="review" class="uk-textarea" rows="5" placeholder="Let us know all your enquiries and we will get back to you shortly.."></textarea>
        </div>
         {!! HCaptcha::renderJs() !!}
         {!! HCaptcha::display() !!}
        <div class="uk-width-1-1@s uk-text-center">
          <button class="uk-button button-primary button-primary-active" type="submit">Send Your Inquiry </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Inquire Now popup -->
@stop