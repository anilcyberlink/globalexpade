@extends('themes.default.common.master')
@section('content')

    <div class="book-section">
        <div class="book-banner d-flex justify-content-center flex-column"
            @if (!empty($booking->banner)) style="background-image: url('{{ asset('uploads/banners/' . $booking->banner) }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;"
            @endif>
            <div class="section-padding">
                <p class="page-title--secondary "> <a href="{{ url('/') }}">Home</a> • <a class="active-list">Book</a></p>
                <h3 class="page-title ">Book a Trip</h3>
                <p class="exped-title">
                    {{ $booking->trip_title }}
                </p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="section-padding">
                <div class="row">
                    <div class="col-lg-8 form-content">
                        <form action="{{ route('post-tripbooking') }}" method="POST">
                            @csrf
                            <div class="form1 ">
                                <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />
                                <input type="hidden" id="trip_uri" name="trip_uri" value="{{ $booking->uri }}"/>

                                <p class="form-font">Personal Detail</p>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="uname">Full Name*</label>
                                        <input class="form-control" type="text" name="name" id="uname" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="email">Email*</label>
                                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="uname">Contact*</label>
                                        <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="country">Country*</label>
                                        <select id="country" name="country" class="form-control" required>
                                            @include('themes.default.common.country')
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form2 mt-4 mb-4">
                                <p class="form-font">Trip Details</p>

                                <div class="alert alert-light border-left border-warning mb-3" style="border-left:4px solid #ff7a00!important;">
                                    <small class="text-muted d-block">Selected Trip</small>
                                    <strong style="font-size:20px;">{{ $booking->trip_title }}</strong>
                                    <div class="mt-3 d-flex flex-wrap text-muted" style="gap:25px; font-size:14px;">
                                        <div>
                                            <img src="{{ asset('themes-assets/icons/time.png') }}" width="18" class="mr-1" alt="">
                                            <strong>{{ $booking->duration }}</strong> Days
                                        </div>
                                        <div>
                                            <img src="{{ asset('themes-assets/icons/altitude.png') }}" width="18" class="mr-1" alt="">
                                            <strong>{{ $booking->max_altitude }}</strong>
                                        </div>
                                        <div>
                                            <img src="{{ asset('themes-assets/icons/map.png') }}" width="18" class="mr-1" alt="">
                                            <strong>{{ $booking->peak_name }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="arrival">Arrival Date*</label>
                                        <input class="form-control" type="date" min="{{ date('Y-m-d') }}" name="arrival" id="arrival" value="{{ old('arrival') }}" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="departure">Departure Date*</label>
                                        <input class="form-control" type="date" min="{{ date('Y-m-d') }}" name="departure" id="departure" value="{{ old('arrival') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="find_us">How do you find us?</label>
                                        <select id="find_us" name="find_us" class="form-control">
                                            <option value="" disabled {{ old('find_us') ? '' : 'selected' }} hidden>Select Option</option>
                                            <option value="referral" {{ old('find_us') == 'Referral' ? 'selected' : '' }}>Client Referral</option>
                                            <option value="web" {{ old('find_us') == 'Web' ? 'selected' : '' }}>Web Search</option>
                                            <option value="social" {{ old('find_us') == 'social' ? 'selected' : '' }}>Social Media</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form3">
                                <div class="form-group col-12">
                                    <label for="msg">Let us know all your inquiries or any special requirements</label>
                                    <textarea class="form-control" name="message" id="msg" cols="20" rows="5">{{ old('message') }}</textarea>
                                    <br>
                                    <input type="checkbox" id="terms" name="terms" value="1" {{ old('terms') ? 'checked' : '' }} required>
                                    <label for="terms">
                                        I have read and agree to the
                                        <a href="{{ url('info/' . $terms->uri) }}" target="_blank">
                                            <strong>Terms &amp; Conditions</strong>
                                        </a>.
                                    </label>
                                </div>
                                <center><button type="submit" class="contact-btn">BOOK NOW</button></center>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 form-image-section">
                        <div class="form-image sticky">
                            <div class="card">
                                <img src="{{ $booking->thumbnail ? asset('/uploads/original/' . $booking->thumbnail) : asset('themes-assets/img/list/1.jpg') }}"
                                    class="card-img-top exp-img ">
                                <div class="card-body">
                                    <h2 class="card-title ">
                                        <a href="{{ route('page.tripdetail', $booking->uri) }}">
                                            <p> {{ $booking->trip_title }} </p>
                                        </a>
                                    </h2>
                                    <div class="row card-text1">
                                        <div class="col-md-6">
                                            <p><img src="{{ asset('themes-assets/icons/time.png') }}" height="23"
                                                    width="23" class="mr-3" alt=""> {{ $booking->duration }}
                                                Days</p>
                                            <p><img src="{{ asset('themes-assets/icons/altitude.png') }}" height="23"
                                                    width="23" class="mr-3"
                                                    alt="">{{ $booking->max_altitude }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><img src="{{ asset('themes-assets/icons/people.png') }}" height="23"
                                                    width="23" class="mr-3" alt="">
                                                {{ $booking->group_size }}</p>
                                            <p><img src="{{ asset('themes-assets/icons/map.png') }}" height="23"
                                                    width="23" class="mr-3"
                                                    alt="">{{ $booking->peak_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

        document.getElementById('arrival').addEventListener('change', function () {
            const arrival = this.value;
            const departure = document.getElementById('departure');

            // Departure cannot be before arrival
            departure.min = arrival;

            // Clear departure if it's before the selected arrival
            if (departure.value && departure.value < arrival) {
                departure.value = '';
            }
        });
    </script>
@stop
