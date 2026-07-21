@extends('themes.default.common.master')
@section('content')

<!-- HEADER START -->
<div
    uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
    <div class="uk_header bg-light uk-border-light-dark-bottom" uk-scrollspy-class>
        <div class="uk-panel">
            <div class="uk-container">
                <div class="uk-padding-large uk-padding-remove-horizontal">
                    <!-- <div class="uk-h5 text-primary uk-margin-small-bottom uk-text-uppercase f-w-600">Contact Us</div> -->
                    <h1 class="f-w-600 text-black uk-margin-remove">Booking</h1>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADER END -->
<!-- start section -->
<section class="uk-section uk-booking bg-white uk-position-relative">
    <div class="uk-container"
        uk-scrollspy="target:[uk-scrollspy-class], img, h1, h2, h3, h4, h5, h6, hr, .uk-button, li, p; cls: uk-animation-slide-top-medium; delay: 50; repeat: false;">
        <div class="uk-grid-large uk-grid" uk-grid>
            <!--  -->
            <div class="uk-width-expand@m">
                <form class="uk-grid-medium" id="myForm" uk-grid method="POST" action="{{ route('post-trip') }}">
                    <!--  -->
                    @csrf
                    <input type="hidden" name="trip_id" value="{{$booking->id}}">
                    <input type="hidden" name="title" value="{{$booking->trip_title}}">
                    @include('themes.default.common.flash-message')
                    <div class="uk-width-1-1">
                        <h4 class="uk-margin-small text-primary uk-text-bold">Date & Travellers</h4>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Trip Start Date <span class="text-red">*</span>
                        </label>
                        <!-- <input class="uk-input" name="departure_date" id="date" type="date" placeholder=""> -->
                        <input class="uk-input" name="departure_date" id="date" type="date" min="{{ date('Y-m-d') }}">
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>No. of People <span class="text-red">*</span>
                        </label>
                        <input class="uk-input" name="num_people" id="noofpeople" type="number" placeholder="">
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-1">
                        <h4 class="uk-margin-small text-primary uk-text-bold">Lead Traveller Details</h4>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Full Name <span class="text-red">*</span>
                        </label>
                        <input class="uk-input" id="name" name="full_name" type="text" placeholder=" ">
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Email Address <span class="text-red">*</span>
                        </label>
                        <input class="uk-input" id="email" name="email" type="text" placeholder="">
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Country <span class="text-red">*</span>
                        </label>
                        <select name="country" class="uk-select" id="country">
                            @include('themes.default.common.country')
                        </select>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Contact Number <span class="text-red">*</span>
                        </label>
                        <input class="uk-input" name="phone" id="contactno" type="tel"
                            placeholder="Enter number with country code">
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-1">
                        <label>Extra Requirements</label>
                        <textarea name="comments" class="uk-textarea" rows="4" placeholder=""></textarea>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-1">
                        <label>
                            <input class="uk-checkbox" type="checkbox" value="1" name="terms_conditions" placeholder="">
                            I accept terms and Conditions <a href="{{url('info/' . $terms->uri)}}" target="_blank"
                                class="text-primary">
                                <i class="fa fa-question-circle"></i>
                            </a>
                        </label>
                    </div>
                    <!--  -->
                    {!! HCaptcha::renderJs() !!}
                    {!! HCaptcha::display() !!}
                    <!--  -->
                    <div class="uk-width-1-1">
                        <div class="uk-margin-small-top">
                            <button type="submit" class="uk-button button-primary button-primary-active uk-submit"> Book
                                Now </button>
                        </div>
                    </div>
                    <!--  -->
                </form>
            </div>
            <!--  -->
            <!--  -->
            <div class="uk-width-1-3@m uk-flex-first uk-flex-last@m">
                <div class="uk-booking-sidebar uk-clearfix">
                    @include('themes.default.common.booking-summary')
                </div>
            </div>
            <!--  -->
        </div>
        </ul>
    </div>
</section>

@stop
