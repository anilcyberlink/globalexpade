@extends('themes.default.common.master')
@section('content')
<!-- HEADER START -->
<section class="bg-primary uk-cover-container uk-position-relative uk-flex uk-flex-bottom 
   uk-background-norepeat uk-background-cover uk-background-top-center"
    uk-height-viewport="expand: true; min-height: 500;" data-src="{{asset('images/trip/05.jpg')}}" uk-img alt="booking-success">
    <div class="uk-overlay-primary uk-position-cover"></div>
    <div class="uk-width-1-1 uk-position-z-index"
        uk-scrollspy="target:[uk-scrollspy-class], h1; cls: uk-animation-slide-top; delay: 50; repeat: false;">
        <div class="uk-container uk-container-small"
            uk-scrollspy="target:h1; cls: uk-animation-slide-top-small;   delay: 50; repeat: true;">
            <h1 class="f-w-600 text-white uk-margin-large-bottom">Booking </h1>
        </div>
    </div>
</section>
<!-- HEADER END -->
<!-- start section -->
<section class="uk-section uk-booking bg-white uk-position-relative">
    <div class="uk-container uk-container-small"
        uk-scrollspy="target:[uk-scrollspy-class], img, h1, h2, h3, h4, h5, h6, hr, .uk-button, li, p; cls: uk-animation-slide-top-small; delay: 50; repeat: false;">
        <div class="uk-text-center uk-card uk-card-default uk-card-body uk-border-rounded">
            <i class="fa fa-check  fa-2x text-green" aria-hidden="true"></i>
            <h1 class="uk-h3 text-green uk-margin-small uk-text-bold">Booking Success</h1>
            <h1 class="uk-h4  uk-margin-remove">Thank you for booking your trip with us!!!</h1>
            <p>We are proud of our reputation for quality, innovation and overall customer service with a focus on cultural and environmentally responsible travel.</p>
            <hr class="uk-divider-icon">
            <p><b>Best Regards</b>
                <br>Arnoldcoster Expeditions
            </p>
        </div>
    </div>
</section>
<!--end section  -->
@stop