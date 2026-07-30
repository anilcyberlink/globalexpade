@extends('themes.default.common.master')

@section('title', 'Booking Successful')

@section('content')

<div class="contactus">

    <!-- Success Section -->
    <section class="section-padding">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card border-0 shadow-sm text-center p-5">

                        <div class="mb-4">
                            <i class="fa fa-check-circle text-success" style="font-size:70px;"></i>
                        </div>

                        <h2 class="text-success font-weight-bold mb-3">
                            Booking Request Submitted Successfully!
                        </h2>

                        <p class="text-muted mb-4" style="font-size:16px;">
                            Thank you for choosing
                            <strong>{{ $setting->site_name }}</strong>.
                            We have successfully received your booking request.
                        </p>

                        <p class="text-muted">
                            A booking confirmation email has been sent to your registered email address.
                            Please check your inbox (and spam/junk folder if you don't see it). Our travel experts will review your request and contact you shortly with the next steps.
                        </p>

                        <hr>

                        <p class="mb-4">
                            If you have any urgent questions, feel free to contact us.
                        </p>

                        <div class="row text-left mb-4">

                            <div class="col-md-6 mb-3">
                                <strong>Email</strong><br>
                                {{ $setting->email_primary }}
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Phone</strong><br>
                                {{ $setting->phone }}
                            </div>

                        </div>

                        <div>
                            <a href="{{ url('/') }}" class="btn btn-primary mr-2">
                                Back to Home
                            </a>
                        </div>

                        <hr class="mt-5">

                        <p class="mb-0 text-muted">
                            Best Regards,<br>
                            <strong>{{ $setting->site_name }}</strong>
                        </p>

                    </div>

                </div>
            </div>

        </div>
    </section>

</div>

@stop
