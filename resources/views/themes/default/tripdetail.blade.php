@extends('themes.default.common.master')
@section('title', $data->trip_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->thumbnail)
@section('brief', $data->trip_excerpt)
@section('content')

    <!-- Banner Section -->
    <div class="detail-trip-header d-flex justify-content-center flex-column">
        <div class="section-padding">
            <p class="page-title--secondary "> <a href="index.php">Home</a> • <a class="active-list" href="about.php">About</a>
            </p>
            <h1 class="header-font">Mt. Everest Expedition <br>(8848.86M) - SOUTH</h1>
            <p class="small-header-font">Mt. Everest Expedition is a lifetime mountaineering experience that allows you to
                stand on the highest point in the world.</p>
        </div>
    </div>
    <!-- Icon Section -->
    <div class="container-fluid detail-trip-icon">
        <div class="row">
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content "><img src="assets/icons/mountain.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Country <br> <span class="trip-right-content-lower">Nepal </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/country.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Country <br> <span class="trip-right-content-lower">Nepal </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/calendar.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Duration <br> <span class="trip-right-content-lower">46 Days </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/route.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Route<br> <span class="trip-right-content-lower">S-Col; SE- Ridge </span> </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/top-three.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Rank <br> <span class="trip-right-content-lower">1 </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/globe.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Co-ordinates <br> <span class="trip-right-content-lower">27°59'17"N 86°55'31"E </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/clear-sky.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1> Weather Reports <br> <span class="trip-right-content-lower">Report </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 detail-trip-icon-content ">
                <div class="trip-left-content"><img src="assets/icons/hills.png" alt="" height="40"
                        width="40"></div>
                <div class="trip-right-content d-flex justify-content-center">
                    <h1>Range <br> <span class="trip-right-content-lower">Mahalangur Range </span> </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Date Section -->
    <div class="container date-section">
        <div class="row">
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="assets/icons/mountain.png" alt="" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Start Date: <br> <span class="trip-right-content-lower">15 Feb </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="assets/icons/mountain.png" alt="" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Duration: <br> <span class="trip-right-content-lower">2 Days 3 Nights </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="assets/icons/mountain.png" alt="" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Walking Per Day: <br> <span class="trip-right-content-lower">6 hours </span> </h1>
                </div>
            </div>
            <div class=" col-lg-3 col-6 date-content ">
                <div class="date-left-content "><img src="assets/icons/mountain.png" alt="" height="35"
                        width="35"></div>
                <div class="date-right-content">
                    <h1> Start Date: <br> <span class="trip-right-content-lower">15 Feb </span> </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Overview Section -->
    <div class="container-fluid overview-section">
        <div class="row ">
            <div class=" col-lg-6 d-flex align-items-center justify-content-center flex-column ">
                <h1 class="heading-section mt-5">TRIP OVERVIEW</h1>
                <p class="para-font">Ask an adventurer about their dream, and they will answer you with a word; EVEREST.
                    Who would not want to reach the top of the world? Who would not want to touch the sky? It’s the trip of
                    the lifetime, the Everest Expedition. Mount Everest, also known as The Sagarmatha in Nepali is the
                    tallest peak on earth with an altitude of 8848.86m. The southern face lies in Nepal whereas the northern
                    face is in Tibet. In 1715, China surveyed the mountain for the first time while they were mapping
                    Chinese territory and depicted it as Mount Qomolangma.also known as The Sagarmatha in Nepali is the
                    tallest peak on earth with an altitude of 8848. surveyed the mountain for the first time while they were
                    mapping Chinese territory and depicted it as Mount Qomolangma.also known as The Sagarmatha in Nepali is
                    the tallest peak on earth with an altitude of 8848.</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center pl-3"style="background-color:white;">
                <img src="assets/img/trip-detail/climb1.png" height="500" width="500" alt=""
                    class="img-fluid">
            </div>
        </div>
    </div>
    <!-- Itenary Section and map and cost section -->
    <div class=" container-fluid itenary-section">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="heading-section mt-5">ITENARY</h1>

                <div class="row itenary-row">
                    <div class="container itenary-div-section">
                        <div class="row itenary-div ">
                            <div class=" d-flex justify-content-between" style="width:100%;">
                                <div>
                                    <p class="itenary-top"><span
                                            style="color: #007bff;font-family: 'Playfair Display', serif;">Day 01:</span>
                                        Arrival in Kathmandu (1400m) & Transfer to Hotel </p>
                                </div>
                                <div style="padding-top:7px;"><a data-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                            src="assets/icons/down.png" alt="" height="20"
                                            width="20"></a></div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body itenary-bottom">
                                    Upon your arrival at Kathmandu airport, a Seven Summit Treks representative will receive
                                    you and accompany you to the hotel. The end of the day will be marked by a welcome
                                    dinner organized by the company during which you will be introduced to the member of the
                                    team that will accompany you to the summit of Mt. Everest.
                                </div>
                            </div>
                        </div><br>
                        <div class="row itenary-div ">
                            <div class=" d-flex justify-content-between" style="width:100%;">
                                <div>
                                    <p class="itenary-top"><span
                                            style="color: #007bff;font-family: 'Playfair Display', serif;">Day 02:</span>
                                        Flight from Kathmandu to Lukla (2,860m) </p>
                                </div>
                                <div style="padding-top:7px;"><a data-toggle="collapse" href="#collapseExample1"
                                        role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                            src="assets/icons/down.png" alt="" height="20"
                                            width="20"></a></div>
                            </div>
                            <div class="collapse" id="collapseExample1">
                                <div class="card card-body itenary-bottom">
                                    You will take a flight to Lukla after having a breakfast. It takes around 35 minutes to
                                    reach lukla. You will be staying overnight in Lukla.
                                </div>
                            </div>
                        </div><br>
                        <div class="row itenary-div ">
                            <div class=" d-flex justify-content-between" style="width:100%;">
                                <div>
                                    <p class="itenary-top"><span
                                            style="color:#007bff;font-family: 'Playfair Display', serif;">Day 03:</span>
                                        Rest Day in Lukla (Acclimatization Hike) </p>
                                </div>
                                <div style="padding-top:7px;"><a data-toggle="collapse" href="#collapseExample2"
                                        role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                            src="assets/icons/down.png" alt="" height="20"
                                            width="20"></a></div>
                            </div>
                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body itenary-bottom">
                                    Upon your arrival at Kathmandu airport, a Seven Summit Treks representative will receive
                                    you and accompany you to the hotel. The end of the day will be marked by a welcome
                                    dinner organized by the company during which you will be introduced to the member of the
                                    team that will accompany you to the summit of Mt. Everest.
                                </div>
                            </div>
                        </div><br>
                        <div class="row itenary-div ">
                            <div class=" d-flex justify-content-between" style="width:100%;">
                                <div>
                                    <p class="itenary-top"><span
                                            style="color: #007bff;font-family: 'Playfair Display', serif;">Day 04:</span>
                                        Helicopter flight from Everest View Hotel to Dingboche (4,240m) </p>
                                </div>
                                <div style="padding-top:7px;"><a data-toggle="collapse" href="#collapseExample3"
                                        role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                            src="assets/icons/down.png" alt="" height="20"
                                            width="20"></a></div>
                            </div>
                            <div class="collapse" id="collapseExample3">
                                <div class="card card-body itenary-bottom">
                                    Since it is a luxury expedition, you will be provided with a helicopter for your
                                    transportation. We will not insist you on walking until it is necessary for you to walk
                                    or if you will be missing out on a very important part of the adventure. Dingboche is
                                    another step of our journey. It is a magnificent place that offers a stunning view of
                                    the Himalayas. A hotel will be reserved for your accommodation and food will be made
                                    available according to your taste until
                                </div>
                            </div>
                        </div><br>
                        <div class="row itenary-div ">
                            <div class=" d-flex justify-content-between" style="width:100%;">
                                <div>
                                    <p class="itenary-top"><span
                                            style="color: #007bff;font-family: 'Playfair Display', serif;">Day 05:</span>
                                        Arrival in Kathmandu (1400m) & Transfer to Hotel </p>
                                </div>
                                <div style="padding-top:7px;"><a data-toggle="collapse" href="#collapseExample4"
                                        role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                            src="assets/icons/down.png" alt="" height="20"
                                            width="20"></a></div>
                            </div>
                            <div class="collapse" id="collapseExample4">
                                <div class="card card-body itenary-bottom">
                                    Upon your arrival at Kathmandu airport, a Seven Summit Treks representative will receive
                                    you and accompany you to the hotel. The end of the day will be marked by a welcome
                                    dinner organized by the company during which you will be introduced to the member of the
                                    team that will accompany you to the summit of Mt. Everest.
                                </div>
                            </div>
                        </div><br>
                        <div class="row itenary-div ">
                            <div class=" d-flex justify-content-between" style="width:100%;">
                                <div>
                                    <p class="itenary-top"><span
                                            style="color: #007bff;font-family: 'Playfair Display', serif;">Day 06:</span>
                                        Transfer to International Airport for final departure </p>
                                </div>
                                <div style="padding-top:7px;"><a data-toggle="collapse" href="#collapseExample5"
                                        role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                            src="assets/icons/down.png" alt="" height="20"
                                            width="20"></a></div>
                            </div>
                            <div class="collapse" id="collapseExample5">
                                <div class="card card-body itenary-bottom">
                                    Transfer to International Airport for final departure
                                </div>
                            </div>
                        </div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="container-fluid map">
                        <h1 class="heading-section">ROUTE MAP</h1>
                        <img src="assets/img/list/map.jpg" alt="" class="img-fluid"
                            style="border:1px solid #FFCC00;">
                    </div>
                </div>
                <div class="row">
                    <div class="container cost-includes">
                        <h1 class="heading-section">COST INCLUDES</h1>
                        <ul class=list-ul>
                            <li>Airport - Hotel transfers – Airport (Pick Up and Drop), by private vehicle.</li>
                            <li>Round Kathmandu-Lukla-Kathmandu air Ticket</li>
                            <li>Breakfast, lunch, dinner climbing period.</li>
                            <li>Airport - Hotel transfers – Airport (Pick Up and Drop), by private vehicle.</li>
                            <li>Group Climbing Equipment</li>
                            <li>Airport - Hotel transfers – Airport (Pick Up and Drop), by private vehicle.</li>
                            <li>Guide, Cook, Kitchen staffs and porters/mules.</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="container cost-includes">
                        <h1 class="heading-section">COST EXCLUDES</h1>
                        <ul class=list-ul1>
                            <li>Airport - Hotel transfers – Airport (Pick Up and Drop), by private vehicle.</li>
                            <li>Round Kathmandu-Lukla-Kathmandu air Ticket</li>
                            <li>Breakfast, lunch, dinner climbing period.</li>
                            <li>Airport - Hotel transfers – Airport (Pick Up and Drop), by private vehicle.</li>
                            <li>Group Climbing Equipment</li>
                            <li>Airport - Hotel transfers – Airport (Pick Up and Drop), by private vehicle.</li>
                            <li>Guide, Cook, Kitchen staffs and porters/mules.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3 sidebar ">
                <div class="container-fluid sticky ">
                    <div class="container sticky-sidebar ">

                        <!-- Modal HTML embedded directly into document -->
                        <div id="ex1" class="modal">
                            <div class="popup-content">
                                <h1 class="heading-section mt-3">Inquiry Form</h1>
                                <p>We will get in touch with you shortly</p>
                                <hr>
                                <form action="POST">
                                    <div class="form-group">
                                        <label for="uname">Name(required)</label>
                                        <input class="form-control" type="text" name="name" id="uname">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email(required)</label>
                                        <input class="form-control" type="email" name="email" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="subj">Subject</label>
                                        <input class="form-control" type="text" name="subject" id="subj">
                                    </div>

                                    <div class="form-group">
                                        <label for="msg">Message</label>
                                        <textarea class="form-control" name="message" id="msg" cols="20"
                                            rows="5
                                "></textarea>
                                    </div>
                                    <input type="submit" class="contact-btn" value="Send Message">
                                </form>
                            </div>

                        </div>

                        <!-- Link to open the modal -->
                        <button class="button-yellow itenary-top"><a href="#ex1" rel="modal:open">INQUIRY
                                NOW</a></button>
                        <br>

                        <a href="book.php"><button class="button-white itenary-top">BOOK NOW</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="section-padding similar-trip pt-5 pb-5 mt-5">

        <h1 class="heading-section">SIMILAR TRIP</h1>
        <div class="row">
            <div class="col-lg-4 mx-auto mb-3 card-deck ">
                <div class="card">
                    <img src="assets/img/list/1.jpg" class="card-img-top exp-img ">
                    <div class="card-body">
                        <h5 class="card-title ">
                            <center>
                                <p class="exped-section-title"> Everest Base Camp </p>
                            </center>
                        </h5>
                        <div class="row">
                            <div class="col-md-6  ">
                                <p><img src="assets/icons/time.png" height="23" width="23" class="mr-3"
                                        alt=""> 5 days</p>
                                <p><img src="assets/icons/altitude.png" height="23" width="23" class="mr-3"
                                        alt="">8,848m</p>
                            </div>
                            <div class="col-md-6">
                                <p><img src="assets/icons/people.png" height="23" width="23" class="mr-3"
                                        alt=""> 5-20 people</p>
                                <p><img src="assets/icons/map.png" height="23" width="23" class="mr-3"
                                        alt="">Everest</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 mx-auto mb-3 card-deck ">
                <div class="card">
                    <img src="assets/img/list/2.jpg" class="card-img-top exp-img">
                    <div class="card-body">
                        <h5 class="card-title ">
                            <center>
                                <p class="exped-section-title"> Langtang Heli Tour </p>
                            </center>
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><img src="assets/icons/time.png" height="23" width="23" class="mr-3"
                                        alt=""> 5 days</p>
                                <p><img src="assets/icons/altitude.png" height="23" width="23" class="mr-3"
                                        alt="">8,848m</p>
                            </div>
                            <div class="col-md-6">
                                <p><img src="assets/icons/people.png" height="23" width="23" class="mr-3"
                                        alt=""> 5-20 people</p>
                                <p><img src="assets/icons/map.png" height="23" width="23" class="mr-3"
                                        alt="">Everest</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mx-auto mb-3 card-deck">
                <div class="card">
                    <img src="assets/img/list/3.jpg" class="card-img-top exp-img">
                    <div class="card-body">
                        <h5 class="card-title ">
                            <center>
                                <p class="exped-section-title"> Gosaikunda Heli Tour </p>
                            </center>
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><img src="assets/icons/time.png" height="23" width="23" class="mr-3"
                                        alt=""> 5 days</p>
                                <p><img src="assets/icons/altitude.png" height="23" width="23" class="mr-3"
                                        alt="">8,848m</p>
                            </div>
                            <div class="col-md-6">
                                <p><img src="assets/icons/people.png" height="23" width="23" class="mr-3"
                                        alt=""> 5-20 people</p>
                                <p><img src="assets/icons/map.png" height="23" width="23" class="mr-3"
                                        alt="">Everest</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
