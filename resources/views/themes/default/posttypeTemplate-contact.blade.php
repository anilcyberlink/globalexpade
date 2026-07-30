@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('brief', $data->content)
@section('content')

    <div class="contactus">
        <div class="contact-banner d-flex justify-content-center flex-column"
            @if (!empty($data->banner)) style="background-image: url('{{ asset('uploads/original/' . $data->banner) }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;" @endif>
            <div class="section-padding">
                <p class="page-title--secondary "> <a class="home-list" href="{{ url('/') }}">Home</a> • <a
                        class="active-list">{{ $data->post_type }}</a></p>
                <h3 class="page-title ">{{ $data->post_tag }}</h3>
            </div>
        </div>
        <div class="section-padding mt-4 pb-0">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-section">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('themes-assets/icons/location.png') }}" height="50" width="50"
                                class="mr-3">
                            <div>
                                <p class="mb-1 "><b>Location</b></p>
                                <p class="m-0">{{ $setting->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-section">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('themes-assets/icons/call.png') }}" height="35" width="35"
                                class="mr-3">
                            <div>
                                <p class="mb-1 "><b>Contact No</b></p>
                                <p class="m-0">{{ $setting->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-section">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('themes-assets/icons/mail.png') }}" height="35" width="35"
                                class="mr-3">
                            <div>
                                <p class="mb-1 "><b>Email us</b></p>
                                <p class="m-0">{{ $setting->email_primary }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-section">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('themes-assets/icons/web.png') }}" height="35" width="35"
                                class="mr-3">
                            <div>
                                <p class="mb-1 "><b>Visit Us</b></p>
                                <p class="m-0">{{ url('/') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="spad pt-0">
            <div class="section-padding pt-0">
                <div class="contact-section p-0">
                    <div class="row contact-details">
                        <div class="col-lg-12">
                            <form action="{{ route('post.contact') }}" class="uk-grid-small" method="POST" uk-grid>
                                @csrf
                                <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="full_name">Full Name*</label>
                                        <input class="form-control" type="text" name="full_name" id="full_name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="number">Contact*</label>
                                        <input class="form-control" type="text" name="number" id="number" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email*</label>
                                        <input class="form-control" type="email" name="email" id="email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subj">Subject</label>
                                        <input class="form-control" type="text" name="subject" id="subject" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="msg">Message</label>
                                    <textarea class="form-control" name="message" id="msg" cols="20" rows="5"></textarea>
                                </div>
                                <button type="submit" class="contact-btn">Send Message</button>
                            </form>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <!--Google map-->
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="width: 100%;">
                                {!! $setting->google_map2 !!}
                            </div>
                            <!--Google Maps-->
                        </div>
                    </div>
                    <div class="contact-mountain"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function() {
            function executeRecaptcha() {
                grecaptcha.execute('<?php echo env('SITE_KEY'); ?>', {
                    action: 'homepage'
                }).then(function(token) {
                    document.getElementById('g_recaptcha_response').value = token;
                });
            }

            // Initial execution of reCAPTCHA
            executeRecaptcha();

            // Refresh the reCAPTCHA token every 100 seconds (less than 2 minutes)
            setInterval(executeRecaptcha, 900000);
        });
    </script>
@stop
