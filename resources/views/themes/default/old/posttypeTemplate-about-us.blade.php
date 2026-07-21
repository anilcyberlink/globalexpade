@extends('themes.default.common.master') @section('title',$data->post_type)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail',$data->banner) @section('brief',$data->brief)
@section('content')

<style>
  .about-excerpt-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 8;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.7;
  }
  .about-excerpt-clamp.expanded {
    display: block;
    -webkit-line-clamp: unset;
    overflow: visible;
  }
  .about-item-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-primary, #c8a96e);
    margin-bottom: 10px;
    letter-spacing: 0.02em;
  }
  .about-section-divider {
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 30px 0;
  }
  .about-section-divider .divider-line {
    flex: 1;
    height: 1px;
  }
  .about-section-divider .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--color-primary, #c8a96e);
  }
  .about-section-divider .dot.dim {
    opacity: 0.4;
  }
</style>

<!-- HEADER START -->
<div
  uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;"
>
  <div class="uk_header" uk-scrollspy-class>
    <div class="uk_header_image uk-position-relative">
      <img
        src="@if($data->banner){{ asset('uploads/medium/' . $data->banner) }}@else {{asset('themes-assets/images/default/default-banner.jpg')}}@endif"
        class="uk-image"
        alt="{{$data->post_title}}"
        loading="eager"
      />
    </div>
    <div class="uk-position-cover uk-banner-overlay"></div>
    <div class="uk-panel uk_header_image_content uk-position-bottom">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div
            class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow"
          >
            {{$data->post_type}}
          </div>
          <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">
            {{$data->post_tag}}
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="texture">
  <img src="{{ asset('themes-assets/images/highertexture.png') }}" alt="" />
</div>
<!-- HEADER END -->

<!-- SECTION HEADING -->
@if($data->post_title)
<div class="uk-container uk-text-center uk-padding-large uk-padding-remove-bottom">
  <h2 class="f-w-600 uk-margin-small-bottom" style="color: var(--color-primary, #c8a96e); letter-spacing: 0.03em;">
    {{ $data->post_title }}
  </h2>
  <div style="width: 60px; height: 3px; background: var(--color-primary, #c8a96e); margin: 0 auto;"></div>
</div>
@endif
<!-- END SECTION HEADING -->

<!-- section -->
<section class="uk-section-large bg-white uk-position-relative">
  <div class="uk-container about-section">
    @foreach($items as $row)

      @if($loop->odd)
      {{-- ODD: Image LEFT, Content RIGHT --}}
      <div
        class="uk-grid uk-child-width-1-2@m uk-grid-match"
        uk-grid
        uk-scrollspy="target:[uk-scrollspy-class], h1, h2, h3, h4, h5, h6, a, p, i, li;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;"
      >
        {{-- Image --}}
        <div style="display: flex; align-items: center;">
          <div class="uk_trip uk-transition-toggle uk-link-toggle uk-width-1-1" uk-scrollspy-class>
            <div class="uk_trip_image uk-media-450 uk-position-relative">
              <img
                src="@if($row->page_thumbnail){{asset('uploads/original/' . $row->page_thumbnail)}}@else {{asset('themes-assets/images/default/default-profile.jpg')}}@endif"
                uk-img
                class="uk-image uk-transition-scale-up uk-transition-opaque"
                alt="{{$row->post_title}}"
                loading="eager"
              />
              <div class="uk-panel uk_trip_image_content uk-position-bottom">
                @if($loop->first)
                <div class="uk-flex-column uk-text-left uk-grid-small uk-light uk-margin-medium-bottom" uk-grid>
                  @if($setting->facebook_link)
                  <div><a class="" rel="noreferrer" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;" target="_blank" uk-tooltip="title:Facebook; pos:right;"></a></div>
                  @endif
                  @if($setting->twitter_link)
                  <div><a class="" rel="noreferrer" href="{{$setting->twitter_link}}" uk-icon="icon: twitter;" target="_blank" uk-tooltip="title:Twitter; pos:right;"></a></div>
                  @endif
                  @if($setting->instagram_link)
                  <div><a class="" rel="noreferrer" href="{{$setting->instagram_link}}" uk-icon="icon: instagram;" target="_blank" uk-tooltip="title:Instagram; pos:right;"></a></div>
                  @endif
                  @if($setting->linkedin_link)
                  <div>
                    <a class="" rel="noreferrer" href="{{$setting->linkedin_link}}" target="_blank">
                      <i class="fa fa-wikipedia-w" uk-tooltip="title:Wikipedia; pos:right;"></i>
                    </a>
                  </div>
                  @endif
                </div>
                @endif
                <div class="uk-margin-small-bottom">
                  <span class="f-w-600 f-17 text-primary uk-display-block">{{$row->post_title}}</span>
                  <div class="text-white f-13"><i>{{$row->sub_title}}</i></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Content --}}
        @if($row->post_excerpt || $row->post_content)
        <div style="display: flex; align-items: center;">
          <div class="uk-width-1-1">
            @if($row->post_title)
            <div class="about-item-title">{{ $row->post_title }}</div>
            @endif

            <div class="about-excerpt-clamp" id="excerpt-clamp-{{$loop->iteration}}">
              {!!$row->post_excerpt!!}
            </div>

            @if($row->post_content)
            <div class="uk-margin-top toggle000{{$loop->iteration}}" hidden id="toggle000{{$loop->iteration}}">
              {!! $row->post_content !!}
            </div>
            @endif

            @if($row->post_content)
            <a
              class="uk-button button-primary button-primary-active toggle000{{$loop->iteration}} uk-margin-small-top"
              href="#toggle000{{$loop->iteration}}"
              uk-toggle="target: .toggle000{{$loop->iteration}}; animation: uk-animation-fade"
              onclick="document.getElementById('excerpt-clamp-{{$loop->iteration}}').classList.add('expanded')"
            >Read More <i class="fa fa-plus"></i></a>
            <a
              class="uk-button button-red button-secondary-active toggle000{{$loop->iteration}} uk-margin-small-top"
              href="#toggle000{{$loop->iteration}}"
              uk-toggle="target: .toggle000{{$loop->iteration}}; animation: uk-animation-fade"
              hidden
              onclick="document.getElementById('excerpt-clamp-{{$loop->iteration}}').classList.remove('expanded')"
            >Read less <i class="fa fa-minus"></i></a>
            @endif
          </div>
        </div>
        @endif
      </div>

      @else
      {{-- EVEN: Content LEFT, Image RIGHT --}}
      <div
        class="uk-grid uk-child-width-1-2@m uk-grid-match"
        uk-grid
        uk-scrollspy="target:[uk-scrollspy-class], h1, h2, h3, h4, h5, h6, a, p, i, li;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;"
      >
        {{-- Content --}}
        @if($row->post_excerpt || $row->post_content)
        <div style="display: flex; align-items: center;">
          <div class="uk-width-1-1">
            @if($row->post_title)
            <div class="about-item-title">{{ $row->post_title }}</div>
            @endif

            <div class="about-excerpt-clamp" id="excerpt-clamp-{{$loop->iteration}}">
              {!!$row->post_excerpt!!}
            </div>

            @if($row->post_content)
            <div class="uk-margin-top toggle000{{$loop->iteration}}" hidden id="toggle000{{$loop->iteration}}">
              {!! $row->post_content !!}
            </div>
            @endif

            @if($row->post_content)
            <a
              class="uk-button button-primary button-primary-active toggle000{{$loop->iteration}} uk-margin-small-top"
              href="#toggle000{{$loop->iteration}}"
              uk-toggle="target: .toggle000{{$loop->iteration}}; animation: uk-animation-fade"
              onclick="document.getElementById('excerpt-clamp-{{$loop->iteration}}').classList.add('expanded')"
            >Read More <i class="fa fa-plus"></i></a>
            <a
              class="uk-button button-red button-secondary-active toggle000{{$loop->iteration}} uk-margin-small-top"
              href="#toggle000{{$loop->iteration}}"
              uk-toggle="target: .toggle000{{$loop->iteration}}; animation: uk-animation-fade"
              hidden
              onclick="document.getElementById('excerpt-clamp-{{$loop->iteration}}').classList.remove('expanded')"
            >Read less <i class="fa fa-minus"></i></a>
            @endif
          </div>
        </div>
        @endif

        {{-- Image --}}
        <div style="display: flex; align-items: center;">
          <div class="uk_trip uk-transition-toggle uk-link-toggle uk-width-1-1" uk-scrollspy-class>
            <div class="uk_trip_image uk-media-450 uk-position-relative">
              <img
                src="@if($row->page_thumbnail){{asset('uploads/original/' . $row->page_thumbnail)}}@else {{asset('themes-assets/images/default/default-profile.jpg')}}@endif"
                uk-img
                class="uk-image uk-transition-scale-up uk-transition-opaque"
                alt="{{$row->post_title}}"
                loading="eager"
              />
              <div class="uk-panel uk_trip_image_content uk-position-bottom">
                <div class="uk-margin-small-bottom">
                  <span class="f-w-600 f-17 text-primary uk-display-block">{{$row->post_title}}</span>
                  <div class="text-white f-13"><i>{{$row->sub_title}}</i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      {{-- Divider between items --}}
      @if(!$loop->last)
      <div class="about-section-divider">
        <div class="divider-line" style="background: linear-gradient(to right, transparent, #e0d5c5);"></div>
        <div class="dot"></div>
        <div class="dot dim"></div>
        <div class="dot"></div>
        <div class="divider-line" style="background: linear-gradient(to left, transparent, #e0d5c5);"></div>
      </div>
      @endif

    @endforeach
  </div>
</section>

@foreach($items as $row) @if($row->post_content)
<div id="ContentDetails{{$loop->iteration}}" class="uk-modal" uk-modal>
  <div class="uk-modal-dialog uk-bg-pattern-primary">
    <div class="uk-text-center uk-padding-remove uk-box-shadow-small">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <div class="uk-text-center" style="padding: 20px"></div>
    </div>
    <div class="uk-modal-body" uk-overflow-auto>{!!$row->post_content!!}</div>
    <div class="uk-padding-small"></div>
  </div>
</div>
@endif @endforeach @stop