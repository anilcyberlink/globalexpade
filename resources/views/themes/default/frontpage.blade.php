@extends('themes.default.common.master')
@section('content')

<div class="container-fluid">
    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3000">

            <div class="carousel-inner">
                @foreach ($banner as $row)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                        <img class="d-block w-100"
                            src="{{ $row->picture ? asset('uploads/banners/'.$row->picture) : asset('themes-assets/img/main.jpg') }}"
                            alt="{{ $row->title }}">

                        <div class="carousel-caption">
                            <h2>
                                <span class="text-primary--main">
                                    {{ $row->title }}
                                </span>

                                @if($row->caption)
                                    <br>
                                    <span class="text-primary--sub">
                                        {{ $row->caption }}
                                    </span>
                                @endif
                            </h2>

                            @if($row->link)
                                <a href="{{ $row->link }}" class="btn-header" target="_blank">
                                    Join the Thrill
                                </a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</div>

<!--offers-section-->
<section class="offers-section spad mb-2 mb-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offers-content">
                <h1 class="heading-section">Travel With Us</h1>
                <p class="section-details ">
                    Lorem ipsum dolor it amet consectetur adipisicing elit. Natus voluptatum temporibus sapiente laudantium sequi, saepe consequatur.
                </p>
                <p class="section-details ">
                    Lorem ipsum dolor it amet consectetur adipisicing elit. Natus voluptatum temporibus sapiente laudantium sequi, consequatur repellendus molestiae omnis magnam placeat? Ad nesciunt aliquid eveniet ipsam exercitationem amet eveniet ipsam exercitationem amet eveniet ipsam exercitationem amet eveniet ipsam exercitationem amet .
                </p>
                <a href="list.php" class="btn btn-tour">Join the Thrill</a>
            </div>
            <div class="col-md-6">
                <img src="assets/img/offer-img2.jpg" class="img-fluid" height="500" width="100%" alt="">
            </div>
        </div>
    </div>
</section>
<!--offers-section-end-->

<!-- Tab section -->

<!-- Rounded tabs -->
<div class="container-fluid spad bg-white rounded tab-section">
    <div class="container">
        <center>
            <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav " style=" margin-bottom:20px; ">
                <li class="nav-item flex-sm-fill ">
                    <a id="home-tab" data-toggle="tab" href="#pills-home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active tab-head">All</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold tab-head">8000</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold tab-head">7000</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#pills-contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold tab-head">6000</a>
                </li>
            </ul>
        </center>
    </div>
    <div class="tab-content" id="pills-tabContent p-3">
        <!-- 1st card -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <section class="tour-section ppad">
                <div class="container-fluid ">
                    <div class="row align-items-center ">
                        <div class="col-lg-7">
                            <a href="detail.php">
                                <img src="./assets/img/list/1.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Everest Base Camp
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <a href="detail.php">
                                <img src="./assets/img/list/3.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Gosaikunda Heli Tour
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-5 order-2 order-md-1">
                            <a href="detail.php">
                                <img src="./assets/img/list/6.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Upper Mustang
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-7 order-1 order-md-2">
                            <a href="detail.php">
                                <img src="./assets/img/list/4.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Annapurna Base Camp
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row align-items-center ">
                        <div class="col-lg-7">
                            <a href="detail.php">
                                <img src="./assets/img/list/5.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Mardi Himal
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-5">
                            <a href="detail.php">
                                <img src="./assets/img/list/2.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Langtang Heli Tour
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="list.php" class="btn btn-more">View More</a>
                </div>
            </section>
        </div>
        <!-- 2nd card -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <section class="tour-section ppad">
                <div class="container-fluid ">
                    <div class="row align-items-center ">
                        <div class="col-lg-7">
                            <a href="detail.php">
                                <img src="./assets/img/trees.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <a href="detail.php">
                                <img src="./assets/img/tour-img4.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-5 order-2 order-md-1">
                            <a href="detail.php">
                                <img src="./assets/img/trek.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-7 order-1 order-md-2">
                            <a href="detail.php">
                                <img src="./assets/img/tour-img2.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row align-items-center ">
                        <div class="col-lg-7">
                            <a href="detail.php">
                                <img src="./assets/img/tour-img3.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-5">
                            <a href="detail.php">
                                <img src="./assets/img/wp2609068.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="list.php" class="btn btn-more">View More</a>
                </div>
            </section>
        </div>
        <!-- 3nd card -->
        <div class="tab-pane fade third" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <section class="tour-section ppad">
                <div class="container-fluid ">
                    <div class="row align-items-center ">
                        <div class="col-lg-7">
                            <a href="detail.php">
                                <img src="./assets/img/trees.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <a href="detail.php">
                                <img src="./assets/img/tour-img4.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-5 order-2 order-md-1">
                            <a href="detail.php">
                                <img src="./assets/img/trek.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-7 order-1 order-md-2">
                            <a href="detail.php">
                                <img src="./assets/img/tour-img2.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row align-items-center ">
                        <div class="col-lg-7">
                            <a href="detail.php">
                                <img src="./assets/img/tour-img3.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-5">
                            <a href="detail.php">
                                <img src="./assets/img/wp2609068.jpg" class="img-fluid" alt="">
                                <div class="text-box">
                                    <p class="textbox-main">
                                        Lorem Ipsim
                                    </p>
                                    <p class="textbox-details">
                                        Lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="list.php" class="btn btn-more">View More</a>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- End rounded tabs -->
<!-- Tab section close-->

<!-- Slider main container -->
<div class=" detail-trip-icon">
    <div class="row mb-5 d-flex justify-content-center">
         <h1 class="heading-section1">Enjoy Our Various Exclusive Trips</h1>
    </div>
    <div class="row">
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./assets/img/list/6.jpg" alt="" />
                    <div class="overlay">
                        <div class="overlay-content">
                            <p class="textbox-main">
                                Upper Mustang
                            </p>
                            <a href="detail.php" class="btn btn-tour">View More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./assets/img/list/4.jpg" alt="" />
                    <div class="overlay">
                        <div class="overlay-content">
                            <p class="textbox-main">
                                Annapurna Base Camp
                            </p>
                            <a href="detail.php" class="btn btn-tour">View More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./assets/img/list/2.jpg" alt="" />
                    <div class="overlay">
                        <div class="overlay-content">
                            <p class="textbox-main">
                                Langtang Heli Tour
                            </p>
                            <a href="detail.php" class="btn btn-tour">View More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./assets/img/list/5.jpg" alt="" />
                    <div class="overlay">
                        <div class="overlay-content">
                            <p class="textbox-main">
                                Mardi Himal
                            </p>
                            <a href="detail.php" class="btn btn-tour">View More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./assets/img/list/6.jpg" alt="" />
                    <div class="overlay">
                        <div class="overlay-content">
                            <p class="textbox-main">
                                Upper Mustang
                            </p>
                            <a href="detail.php" class="btn btn-tour">View More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>
<!-- About Section -->
<div class="about-section ">
    <div class="container">
        <div class="row">

            <div class="col-md-12  align-self-center about-content">
                <h1 class="heading-section">Keepn it real</h1>
                <p><span style="font-weight:700;">We understand Outdoor as a state of mind: simplicity, purity and the power of mankind’s connection with nature. We see our mission in offering a story based, intimate, highly aesthetic opposition to random avocado sunsets.</span> <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae deserunt dolorum, ipsam in tempore eveniet perspiciatis voluptatum pariatur minus et. Obcaecati cumque nobis, debitis facilis omnis cupiditate ut odit perspiciatis.</p>
                <a href="about.php" class="btn btn-tour">About us</a>
            </div>
        </div>
    </div>
</div>


<div class="sponsers-section">

    <div class="container-fluid">
        <div class="row">
            <div id="carousel" class="carousel slide carousel2" data-ride="carousel" style="padding:0px 80px;">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item  carousel2-item active">
                        <div class="d-none d-lg-block">
                            <div class="slide-box">
                                <img src="assets/img/Breeze.jpg" alt="First slide">
                                <img src="assets/img/Shatterproof.jpeg" alt="First slide">
                                <img src="assets/img/images.png" alt="First slide">
                                <img src="assets/img/Breeze.jpg" alt="First slide">
                            </div>
                        </div>
                        <div class="d-none d-md-block d-lg-none">
                            <div class="slide-box">
                                <img src="assets/img/Breeze.jpg" alt="First slide">
                                <img src="assets/img/Shatterproof.jpeg" alt="First slide">
                                <img src="assets/img/images.png" alt="First slide">
                            </div>
                        </div>
                        <div class="d-none d-sm-block d-md-none">
                            <div class="slide-box">
                                <img src="assets/img/Breeze.jpg" alt="First slide">
                                <img src="assets/img/images.png" alt="First slide">
                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <img class="d-block w-100" src="assets/img/Shatterproof.jpeg" alt="First slide">
                        </div>
                    </div>
                    <div class="carousel-item carousel2-item">
                        <div class="d-none d-lg-block">
                            <div class="slide-box">
                                <img src="assets/img/Breeze.jpg" alt="Second slide">
                                <img src="assets/img/images.png" alt="Second slide">
                                <img src="assets/img/Shatterproof.jpeg" alt="Second slide">
                                <img src="assets/img/Breeze.jpg" alt="Second slide">
                            </div>
                        </div>
                        <div class="d-none d-md-block d-lg-none">
                            <div class="slide-box">
                                <img src="assets/img/images.png" alt="Second slide">
                                <img src="assets/img/Shatterproof.jpeg" alt="Second slide">
                                <img src="assets/img/images.png" alt="Second slide">
                            </div>
                        </div>
                        <div class="d-none d-sm-block d-md-none">
                            <div class="slide-box">
                                <img src="assets/img/images.png" alt="Second slide">
                                <img src="assets/img/Breeze.jpg" alt="Second slide">
                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <img class="d-block w-100" src="assets/img/images.png" alt="Second slide" class="img-fluid">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <div class="slider-border"><span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <div class="slider-border"><span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
