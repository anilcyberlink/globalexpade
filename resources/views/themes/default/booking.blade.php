@extends('themes.default.common.master')
@section('content')

    <div class="book-section">
        <div class="book-banner d-flex justify-content-center flex-column">
            <div class="section-padding">
                <p class="page-title--secondary "> <a href="{{ url('/') }}">Home</a> • <a class="active-list">Book</a></p>
                <h3 class="page-title ">Book a Trip</h3>
            </div>
        </div>
        <div class="container-fluid">
            <div class="section-padding">
                <div class="row">
                    <div class="col-lg-8 form-content">
                        <div class="form1 ">
                            <form action="POST">
                                <p class="form-font">Personal Detail</p>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="uname">Full Name(required)</label>
                                        <input class="form-control" type="text" name="name" id="uname">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="email">Email(required)</label>
                                        <input class="form-control" type="email" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="uname">Contact(required)</label>
                                        <input class="form-control" type="number" name="phone" id="phone">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="country">Country(required)</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="select">Select Nationality</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Korea">Korea</option>
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form2 mt-4 mb-4">
                            <p class="form-font">Trip Details</p>
                            <form action="POST">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="arrival">Arrival Date</label>
                                        <input class="form-control" type="date" name="arrival" id="arrival">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="departure">Departure Date</label>
                                        <input class="form-control" type="date" name="departure"" id="departure"">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="country">How do you find us?</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="Find">Select</option>
                                            <option value="cilent">Client Refrential</option>
                                            <option value="web">Web Search</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form3">
                            <div class="form-group col-12">
                                <label for="msg">Let us know all your inquiries and we will get back to you
                                    shortly</label>
                                <textarea class="form-control" name="message" id="msg" cols="20" rows="5"></textarea>
                                <br>
                                <input type="checkbox" id="vehicle1" name="terms" value="terms">
                                <label for="terms"> I accept terms and condition </label><br>
                            </div>
                            <center><input type="submit" class="contact-btn" value="BOOK NOW"></center>
                        </div>
                    </div>
                    <div class="col-lg-4 form-image-section">
                        <div class="form-image sticky">
                            <div class="card">
                                <img src="{{ $booking->thumbnail ? asset('/uploads/original/' . $booking->thumbnail) : asset('themes-assets/img/list/1.jpg')}}" class="card-img-top exp-img ">
                                <div class="card-body">
                                    <h2 class="card-title ">
                                        <a href="{{ route('page.tripdetail',$booking->uri )}}">
                                            <p> {{ $booking->trip_title }} </p>
                                        </a>
                                    </h2>
                                    <div class="row card-text1">
                                        <div class="col-md-6">
                                            <p><img src="{{asset('themes-assets/icons/time.png')}}" height="23" width="23" class="mr-3"
                                                    alt=""> {{ $booking->duration }} Days</p>
                                            <p><img src="{{asset('themes-assets/icons/altitude.png')}}" height="23" width="23"
                                                    class="mr-3" alt="">{{ $booking->max_altitude }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><img src="{{asset('themes-assets/icons/people.png')}}" height="23" width="23"
                                                    class="mr-3" alt=""> {{ $booking->group_size }}</p>
                                            <p><img src="{{asset('themes-assets/icons/map.png')}}" height="23" width="23"
                                                    class="mr-3" alt="">{{ $booking->peak_name }}</p>
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

@stop
