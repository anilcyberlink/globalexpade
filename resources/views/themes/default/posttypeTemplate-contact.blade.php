@extends('themes.default.common.master')
@section('title',$data->post_type)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail',$data->banner)
@section('brief',$data->content)
@section('content') 

<!-- HEADER START -->
<div uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
  <div class="uk_header bg-light uk-border-light-dark-bottom" uk-scrollspy-class>
    <div class="uk-panel" style="background: #7d7d7d !important;">
      <div class="uk-container">
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div class="uk-h5 text-primary uk-margin-small-bottom uk-margin-top uk-text-uppercase f-w-600">{{$data->post_type}}</div>
          <h1 class="f-w-600 text-white uk-margin-remove ">Get in Touch</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- HEADER END -->
<!-- section -->
<section class="uk-section-large bg-white uk-position-relative">
  <div class="uk-container">
    @include('/themes/default/common/flash-message')
    <div class="uk-grid" uk-grid uk-scrollspy="target:[uk-scrollspy-class], h1, h2, h3, h4, h5, h6, a, p, i, li;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">   
      <div class="uk-width-1-1@s">
        {!!$setting->google_map2!!}
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d636390.5022484111!2d5.0654672!3d51.4599851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6dbb8e216cb21%3A0xc7c5490db11554be!2sSkanda%20Travels%20B.V!5e0!3m2!1sen!2snp!4v1674724503862!5m2!1sen!2snp" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
      </div>
      <div class="uk-width-expand@s">
        <p class="f-w-600">We will respond to your query within 12 hours!</p>
        <p class="f-14">Feel free to contact us with any questions or if you need assistance with planning.</p>
        <form action="{{ route('contact') }}" class="uk-grid-small" uk-grid method="POST">
          <!--  -->
          @csrf
          <div class="uk-width-1-3@s">
            <label class="uk-form-label formControlLabel" for="title">Title</label>
            <select name="title" id="title" class="rsform-select-box uk-select">
              <option value="">Select</option>
              <option value="Mr.">Mr.</option>
              <option value="Mrs.">Mrs.</option>
              <option value="Miss">Miss</option>
              <option value="Dr.">Dr.</option>
              <option value="Prof.">Prof.</option>
            </select>
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-1@s"></div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-2@s">
            <label class="uk-form-label formControlLabel" for="fullname">Full Name <span class="text-red">*</span>
            </label>
            <input type="text" name="first_name" id="fullname" class="rsform-input-box uk-input">
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-2@s">
            <label class="uk-form-label formControlLabel" for="phoneskype">Phone/Skype <span class="text-red">*</span>
            </label>
            <input type="text" name="number" id="phoneskype" class="rsform-input-box uk-input">
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-2@s">
            <label class="uk-form-label formControlLabel" for="country">Country <span class="text-red">*</span>
            </label>
            <select name="country" id="country" class="rsform-select-box uk-select">
              @include('themes.default.common.country')
            </select>
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-2@s">
            <label class="uk-form-label formControlLabel" for="email">Email <span class="text-red">*</span>
            </label>
            <input type="email" name="email"  id="email" class="rsform-input-box uk-input">
          </div>
          <!--  -->
          <!--  -->
          <div class="uk-width-1-1@s">
            <label class="uk-form-label formControlLabel" for="Message">Message</label>
            <textarea id="Message" name="message" class="uk-textarea" rows="4" placeholder="Message"></textarea>
          </div>
          <!--  -->
          {!! HCaptcha::renderJs() !!}
          {!! HCaptcha::display() !!}
          <!--  -->
          <div class="uk-width-1-1@s">
            <button class="uk-button button-primary button-primary-active" type="submit">Submit </button>
          </div>
          <!--  -->
        </form>
      </div>
      <div class="uk-width-2-5@s">
        <p class="f-w-600">Get in Touch</p>
        <ul class="uk-list  text-primary">
          @if($setting->addres)
          <li class="uk-flex uk-flex-middle">
            <i class="fa fa-map-marker uk-margin-small-right"></i>
            <a href="{!!$setting->google_map!!}" target="_blank" class="text-secondary">{{$setting->address}}</a>
          </li>
          @endif
          @if($setting->phone)
          <li class="uk-flex uk-flex-middle">
            <i class="fa fa-phone uk-margin-small-right"></i>
            <a href="tel:{{$setting->phone}}" class="text-secondary">{{$setting->phone}}</a>
          </li>
          @endif
          @if($setting->email_primary)
          <li class="uk-flex uk-flex-middle">
            <i class="fa fa-envelope uk-margin-small-right"></i>
            <a href="mailto:{{$setting->email_primary}}" class="text-secondary">{{$setting->email_primary}}</a>
          </li>
          @endif
        </ul>
        <div class="   uk-grid-small uk-text-left@l  uk-text-center" uk-grid="">
          <div>
            <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;" target="_blank"></a>
          </div>
          <!--<div>-->
          <!--  <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->youtube_link}}" uk-icon="icon: youtube;" target="_blank"></a>-->
          <!--</div>-->
          <!--<div>-->
          <!--  <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->twitter_link}}"  target="_blank">-->
          <!--      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"><path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path></svg>-->
          <!--  </a>-->
          <!--</div>-->
          <div>
            <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->google_plus}}" uk-icon="icon: instagram;" target="_blank"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop