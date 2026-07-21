<!DOCTYPE html>
<html>

<head>
    <title>{{$setting->site_name}}</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset('themes-assets/images/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('themes-assets/images/favicon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#e19a03">
    <link rel="stylesheet" href="{{asset('themes-assets/css/app.css')}}" />
    <meta name="keywords" content="@yield('meta_keyword') " />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="@yield('brief')" />
    @if (trim($__env->yieldContent('thumbnail')))
        <meta property="og:image" content="{{ asset('uploads/original/') }}/@yield('thumbnail')" />
    @else
        <meta property="og:image" content="{{ asset('themes-assets/images/logo.svg') }}" />
    @endif
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{$setting->site_name}}" />
    <meta property="twitter:card" content="" />
    <meta property="twitter:site" content="" />
    <meta property="twitter:title" content="@yield('title')" />
    <meta property="twitter:description" content="@yield('brief')" />
    @if (trim($__env->yieldContent('thumbnail')))
        <meta property="twitter:image" content="{{ asset('uploads/original/') }}/@yield('thumbnail')" />
    @else
        <meta property="twitter:image" content="{{ asset('themes-assets/images/logo.svg') }}" />
    @endif
    <meta property="twitter:url" content="" />
    <meta name="twitter:image:alt" content="" />

</head>

<body>
    <!-- preloader -->
    <!--<div class="uk-preloader uk-text-center">-->
    <!--  <div class="wrapper">-->
    <!--    <div class="cloud"></div>-->
    <!--    <div class="cloud2"></div>-->
    <!--    <div class="mountain"></div>-->
    <!--    <div class="dash dash1"></div>-->
    <!--    <div class="dash dash2"></div>-->
    <!--    <div class="dash dash3"></div>-->
    <!--    <div class="dash dash4"></div>-->
    <!--    <div class="dash dash5"></div>-->
    <!--    <div class="dash dash6"></div>-->
    <!--    <div class="dash dash7"></div>-->
    <!--    <div class="dash dash8"></div>-->
    <!--    <div class="dash dash9"></div>-->
    <!--    <div class="dash dash10"></div>-->
    <!--    <div class="flag"></div>-->
    <!--  </div>-->
    <!--  <h3 class="text-white">Loading...</h3>-->
    <!--</div>-->
    </div>
    <!-- end preloader -->
    <!-- Header start -->
    <div class=""
        uk-sticky="start: 100; animation: uk-animation-slide-top; cls-active:uk-navbar-sticky; sel-target:.uk-navbar-container; class:uk-sticky;">
        <!-- uk-scrollspy="target: [uk-scrollspy-class], .uk-navbar, li; cls: uk-animation-slide-bottom-small; delay: 50; repeat: false;" -->
        <!-- Main Menu -->
        <div
            class="uk-visible@l  uk-navbar-container text-white uk-box-shadow-medium uk-main-header-transparent uk-navbar-transparent">
            <div class="uk-container uk-container-large">
                <nav class="uk-navbar d-flex uk-flex-middle uk-flex-between" uk-navbar="  uk-dropbar-top">
                    <div class=" ">
                        <!--<a class="uk-navbar-item uk-logo uk-margin-medium-right" href="{{url('/')}}">-->
                        <!--  <img src="{{asset('themes-assets/images/logo.svg')}}" alt="{{$setting->site_name}}" uk-svg>-->
                        <!--</a>-->
                        <a class="uk-navbar-item uk-logo uk-margin-medium-right " href="{{url('/')}}">
                            <img src=" {{asset('themes-assets/images/new-logo.png')}}"
                               alt="{{$setting->site_name}}" class="uk-logo-white">
                            <img src="{{asset('themes-assets/images/new-logo.png')}}" alt="{{$setting->site_name}}"
                                class="uk-logo-dark"> </a>
                    </div>
                    <div>
                        <ul class="uk-navbar-nav uk-position-relative" style="margin-left:auto;">
                            {{--<li>
                                <a href="{{url('/')}}"> Home</a>
                            </li>--}}
                            <li>
                                <a href="{{ route('page.posttype_detail', $about_us->uri) }}">{{$about_us->post_type}}
                                </a>
                            </li>
                            <!-- Begin: expeditions -->
                            <li>
                                <a href="{{ route('page.posttype_detail', $nav_expeditions->uri) }}">
                                    {{$nav_expeditions->post_type}} <span uk-navbar-parent-icon></span>
                                </a>

                                <div uk-drop="boundary:.uk-navbar; stretch: true; flip: false; delay-hide: 20;"
                                    class="uk-dropdown">
                                    <div class="uk-child-width-1-4 uk-grid-medium" uk-grid>
                                        <!-- Trip 1 -->
                                        @foreach (trip_byDestinations([1, 2, 3, 4])->slice(0, 8) as $_keyEx => $_rowEx)
                                            <div>
                                                <div class="uk_trip uk-transition-toggle uk-link-toggle">
                                                    <a href="{{ url('page/' . tripurl($_rowEx->uri)) }}"
                                                        class="uk-media-200 uk_trip_image uk-position-relative">
                                                        <img src="@if($_rowEx->thumbnail){{asset('uploads/original/' . $_rowEx->thumbnail)}}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif"
                                                            class="uk-image uk-transition-scale-up uk-transition-opaque"
                                                            alt="" loading="eager">
                                                        <div class="uk-panel uk_trip_image_content uk-position-bottom">
                                                            <span class="uk_trip_tag">
                                                                <span> {{ $_rowEx->max_altitude }} </span>
                                                            </span>
                                                            <h5 class="text-white uk-text-bold">
                                                                {{ $_rowEx->trip_title }}
                                                            </h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <a href="{{ route('page.expeditionlist') }}"
                                        class="uk-align-right uk-margin-small-top uk-margin-remove-bottom uk-button uk-button-text">
                                        View All
                                    </a>
                                </div>
                            </li>
                            <!-- End: expeditions -->

                            <!-- Begin: expeditions  -->
                            <!-- <li>-->
                            <!--   <a href="{{ route('page.posttype_detail', $nav_expeditions->uri) }}">{{$nav_expeditions->post_type}} <span uk-navbar-parent-icon></span>-->
                            <!--   </a>-->
                            <!--   <div uk-drop="boundary:.uk-navbar; stretch: true; flip: false; delay-hide: 20;" class="uk-dropdown">-->
                            <!--     <div class="">-->
                            <!--       <div class=" uk-grid-large tabs" uk-grid>-->
                            <!--         <div class="uk-width-1-5@s">-->
                            <!--           <ul class="uk-nav uk-navbar-dropdown-nav tabs-nav f-16 f-w-600">-->
                            <!--             @foreach ($expeditions as $row )-->
                            <!--             @if(trip_byDestinations($row->id)->count()>0)-->
                            <!--             <li class="{{$loop->first?'uk-active':''}}">-->
                            <!--               <a href="#{{$row->uri}}">{{$row->title}}</a>-->
                            <!--             </li>-->
                            <!--             @endif-->
                            <!--             @endforeach-->
                            <!--           </ul>-->
                            <!--         </div>-->
                            <!--         <div class="uk-width-expand@s">-->

                            <!--         @foreach ($expeditions as $row)-->
                            <!--@if (trip_byDestinations($row->id)->count() > 0)-->
                            <!--           <div id="{{$row->uri}}" class="{{$loop->first?'tab-content uk-active':'tab-content'}}">-->
                            <!--             <div class="uk-child-width-1-3 uk-grid-medium" uk-grid>-->
                            <!--               @if(trip_byDestinations($row->id)->count()>0)-->
                            <!--               @foreach (trip_byDestinations($row->id)->slice(0,2) as $_keyEx => $_rowEx)-->
                            <!--               @if ($_keyEx >= 2)-->
                            <!--                 @continue-->
                            <!--               @endif-->
                            <!--               <div>-->
                            <!--                  start: list -->
                            <!--                 <div>-->
                            <!--                   <div class="uk_trip uk-transition-toggle uk-link-toggle" uk-scrollspy-class>-->
                            <!--                     <a href="{{ url('page/' . tripurl($_rowEx->uri)) }}" class="uk-media-200 uk_trip_image uk-position-relative">-->
                            <!--                       <img src="@if($_rowEx->thumbnail){{asset('uploads/original/'.$_rowEx->thumbnail)}}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif" class="uk-image uk-transition-scale-up uk-transition-opaque" alt="{{ $_rowEx->trip_title }}" loading="eager">-->
                            <!--                       <div class="uk-panel uk_trip_image_content uk-position-bottom">-->
                            <!--                         @if($_rowEx->duration)-->
                            <!--                         <span class="uk_trip_tag_header">-->
                            <!--                           {{$_rowEx->duration}} {{$_rowEx->duration <= '1' ? 'Day' : 'Days' }}-->
                            <!--                         </span>-->
                            <!--                         @endif-->
                            <!--                         <h5 class="text-white uk-text-bold   uk-margin-remove uk-margin-bottom">{{ $_rowEx->trip_title }}</h5>-->
                            <!--                       </div>-->
                            <!--                     </a>-->
                            <!--                   </div>-->
                            <!--                 </div>-->
                            <!--                  end: list -->
                            <!--               </div>-->
                            <!--               @endforeach-->
                            <!--               @endif-->
                            <!--               <div>-->
                            <!--                 <ul class="uk-nav uk-navbar-dropdown-nav">-->
                            <!--                   @if(trip_byDestinations($row->id)->count()>0)-->
                            <!--                   @foreach (trip_byDestinations($row->id)->slice(2,7) as $value)-->
                            <!--                   <li>-->
                            <!--                     <a href="{{ url('page/' . tripurl($value->uri)) }}"> {{$value->trip_title}}</a>-->
                            <!--                   </li>-->
                            <!--                   @endforeach-->
                            <!--                   @endif-->
                            <!--                 </ul>-->
                            <!--               </div>-->
                            <!--             </div>-->
                            <!--             <a href="{{ route('page.destinationlist', $row->uri) }}" class="uk-align-right uk-margin-small-top uk-margin-remove-bottom uk-button uk-button-text ">View All</a>-->
                            <!--           </div>-->

                            <!--           @endif-->
                            <!--           @endforeach-->


                            <!--         </div>-->
                            <!--       </div>-->
                            <!--     </div>-->
                            <!--   </div>-->
                            <!-- </li>-->
                            <!-- End: expeditions  -->
                            <!-- Begin: trekkings  -->
                            <li>
                                <a href="{{ route('page.posttype_detail', $nav_trekkings->uri) }}">{{$nav_trekkings->post_type}}
                                    <span uk-navbar-parent-icon></span>
                                </a>
                                <div uk-drop="boundary:.uk-navbar; stretch: true; flip: false; delay-hide: 20;"
                                    class="uk-dropdown">
                                    <div class="">
                                        <div class=" uk-grid-large tabs" uk-grid>
                                            <div class="uk-width-1-5@s">
                                                <ul class="uk-nav uk-navbar-dropdown-nav tabs-navT f-w-600">
                                                    @foreach($regions as $row)
                                                        <li class="{{$loop->first ? 'uk-active' : ''}}">
                                                            <a href="#{{$row->uri}}">{{$row->trip_title}}</a>
                                                        </li>
                                                    @endforeach
                                                    <!-- @foreach($regions as $row)
                                                        @if (tripbyregions($row->id)->count() > 0)
                                                        <li class="{{$loop->first ? 'uk-active' : ''}}">
                                                            <a href="#{{$row->uri}}">{{$row->title}}</a>
                                                        </li>
                                                        @endif
                                                    @endforeach -->
                                                </ul>
                                            </div>
                                            <div class="uk-width-expand@s">
                                                @foreach ($regions as $row)
                                                    @if (tripbyregions($row->id)->count() > 0)
                                                        <!--  -->
                                                        <div id="{{$row->uri}}"
                                                            class="{{$loop->first ? 'tab-contentT uk-active' : 'tab-contentT'}}">
                                                            <div class="uk-child-width-1-3 uk-grid-medium" uk-grid>
                                                                @if(tripbyregions($row->id)->count() > 0)
                                                                    @foreach (tripbyregions($row->id)->slice(0, 2) as $_keyEx => $_rowEx)
                                                                        @if ($_keyEx >= 2)
                                                                            @continue
                                                                        @endif
                                                                        <div>
                                                                            <!-- start: list -->
                                                                            <div>
                                                                                <div class="uk_trip uk-transition-toggle uk-link-toggle"
                                                                                    uk-scrollspy-class>
                                                                                    <a href="{{ url('page/' . tripurl($_rowEx->uri)) }}"
                                                                                        class="uk-media-200 uk_trip_image uk-position-relative">
                                                                                        <img src="@if($_rowEx->thumbnail){{asset('uploads/original/' . $_rowEx->thumbnail)}}@else{{asset('themes-assets/images/default/default-thumbnail.png')}}@endif"
                                                                                            class="uk-image uk-transition-scale-up uk-transition-opaque"
                                                                                            alt="{{ $_rowEx->trip_title }}"
                                                                                            loading="eager">
                                                                                        <div
                                                                                            class="uk-panel uk_trip_image_content uk-position-bottom">
                                                                                            <!--<span class="uk_trip_tag_header">-->
                                                                                            <!--  {{$_rowEx->duration}} {{$_rowEx->duration <= '1' ? 'Day' : 'Days' }}-->
                                                                                            <!--</span>-->
                                                                                            <h5
                                                                                                class="text-white uk-text-bold uk-margin-remove uk-margin-bottom">
                                                                                                {{ $_rowEx->trip_title }}</h5>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end: list -->
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                                <div>
                                                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                        @if(tripbyregions($row->id)->count() > 0)
                                                                            @foreach (tripbyregions($row->id)->slice(2, 4) as $value)
                                                                                <li>
                                                                                    <a href="{{ url('page/' . tripurl($value->uri)) }}">
                                                                                        {{$value->trip_title}}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <a href="{{ route('page.regionlist', $row->uri) }}"
                                                                class="uk-align-right uk-margin-small-top uk-margin-remove-bottom uk-button uk-button-text ">View
                                                                All</a>
                                                        </div>
                                                        <!--  -->
                                                    @endif
                                                @endforeach
                                                <!--  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- End: trekkings  -->
                            @if($pagetypes->count() > 0)
                                <li>
                                    <a href="avoide:javascript;">Useful Info <span uk-navbar-parent-icon></span>
                                    </a>
                                    <div uk-drop="mode:hover; pos: bottom-center; delay-hide: 20;" class="uk-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            @foreach($pagetypes as $row)
                                                <li>
                                                    <a href="{{url('info/' . $row->uri)}}"> {{$row->page_type}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="">
                        <div class="uk-flex uk-flex-middle  uk-grid-medium">
                            <div>
                                <a class="text-white uk-contact" href="tel:{{$setting->phone}}">
                                    <span class="uk-margin-small-right">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>{{$setting->phone}}</a>
                            </div>
                            @if($contact_us != NULL)
                                <div>
                                    <a href="{{ route('page.posttype_detail', $contact_us->uri) }}"
                                        class="uk-button button-primary button-primary-active">
                                        {{$contact_us->post_type}}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end main menu -->
        <!-- mobile menu -->
        <div class="uk-header-mobile uk-hidden@l " uk-header="">
            <div class="uk-navbar-container bg-grey">
                <div class="uk-container">
                    <nav class="uk-navbar" uk-navbar="{&quot;container&quot;:&quot;.uk-header-mobile&quot;}">
                        <div class="uk-navbar-left">
                            <a href="{{url('/')}}" class="uk-logo uk-navbar-item">
                                <img alt="" loading="eager" src="{{asset('themes-assets/images/logo.svg')}}" uk-svg>
                            </a>
                        </div>
                        <div class="uk-navbar-right">
                            <div class="uk-navbar-item">
                                <div class="uk-visible@s uk-grid-expand uk-child-width-1-1 uk-margin-remove-vertical uk-grid uk-grid-stack"
                                    uk-grid="">
                                    <div class="uk-width-1-1">
                                        <div class="uk-margin-small-right">
                                            <a class="text-secondary uk-contact" href="tel:{{$setting->phone}}">
                                                <span class="uk-margin-small-right">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </span>{{$setting->phone}} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a uk-toggle aria-label="Open Menu" href="#uk-dialog-mobile"
                                class="uk-navbar-toggle uk-navbar-toggle-animate" aria-expanded="false">
                                <div uk-navbar-toggle-icon class="uk-icon uk-navbar-toggle-icon text-white"></div>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <div id="uk-dialog-mobile" class="uk-dropbar uk-padding-remove"
                uk-drop="{&quot;clsDrop&quot;:&quot;uk-dropbar&quot;,&quot;flip&quot;:&quot;false&quot;,&quot;container&quot;:&quot;.uk-header-mobile&quot;,&quot;target-y&quot;:&quot;.uk-header-mobile .uk-navbar-container&quot;,&quot;mode&quot;:&quot;click&quot;,&quot;target-x&quot;:&quot;.uk-header-mobile .uk-navbar-container&quot;,&quot;stretch&quot;:true,&quot;bgScroll&quot;:&quot;false&quot;,&quot;animation&quot;:&quot;reveal-top&quot;,&quot;animateOut&quot;:true,&quot;duration&quot;:300,&quot;toggle&quot;:&quot;false&quot;}">
                <div class="uk-height-min-1-1 uk-flex uk-flex-column">
                    <div class="uk-margin-auto-bottom">
                        <div class="uk-grid uk-child-width-1-1 uk-grid-stack" uk-grid="">
                            <div>
                                <div class="uk-panel" id="module-menu-dialog-mobile">
                                    <ul class="uk-nav uk-nav-primary  uk-nav-divider uk-nav-accordion uk-canvas"
                                        uk-nav="targets: > .js-accordion">
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        @if($about_us->post_type)
                                            <li>
                                                <a
                                                    href="{{ route('page.posttype_detail', $about_us->uri) }}">{{$about_us->post_type}}</a>
                                            </li>
                                        @endif
                                        @if($expeditions->count() > 0)
                                            <li class="js-accordion uk-parent">
                                                <a href="{{ route('page.posttype_detail', $nav_expeditions->uri) }}"
                                                    aria-expanded="false">{{$nav_expeditions->post_type}}<span
                                                        uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">

                                                    @foreach (trip_byDestinations([1, 2, 3, 4])->slice(0, 8) as $_keyEx => $row)
                                                        <li>
                                                            <a
                                                                href="{{ url('page/' . tripurl($row->uri)) }}">{{$row->trip_title }}</a>
                                                        </li>

                                                    @endforeach

                                                </ul>
                                            </li>
                                        @endif
                                        @if($regions->count() > 0)
                                            <li class="js-accordion uk-parent">
                                                <a href="{{ route('page.posttype_detail', $nav_trekkings->uri) }}"
                                                    aria-expanded="false">{{$nav_trekkings->post_type}} <span
                                                        uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($regions as $row)
                                                        @if(tripbyregions($row->id)->count() > 0)
                                                            <li>
                                                                <a
                                                                    href="{{ route('page.regionlist', $row->uri) }}">{{$row->title}}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                        @if($contact_us != NULL)
                                            <li>
                                                <a
                                                    href="{{ route('page.posttype_detail', $contact_us->uri) }}">{{$contact_us->post_type}}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="uk-padding-small bg-secondary uk-margin-large-top uk-position-bottom">
                            <div class="uk-flex uk-flex-middle uk-text-center uk-flex-center ">
                                <div class="uk-margin-medium-right text-white">Follow us on</div>
                                <div>
                                    <div class="uk-child-width-1-4  uk-grid-small uk-text-left@l  uk-text-center uk-social-media"
                                        uk-grid="">
                                        <div>
                                            <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer"
                                                href="{{$setting->facebook_link}}" uk-icon="icon: facebook;"
                                                target="_blank"></a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer"
                                                href="{{$setting->youtube_link}}" uk-icon="icon: youtube;"
                                                target="_blank"></a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer"
                                                href="{{$setting->twitter_link}}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20"
                                                    height="20" viewBox="0 0 50 50">
                                                    <path
                                                        d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer"
                                                href="{{$setting->instagram_link}}" uk-icon="icon: instagram;"
                                                target="_blank"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end mobile menu -->
    </div>
    <!-- end header    -->
    <!--  -->
