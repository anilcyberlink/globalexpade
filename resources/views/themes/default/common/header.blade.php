<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes-assets/css/bootstrap.min.css') }}">
    <!--hompage css-->
    <link rel="stylesheet" href="{{ asset('themes-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes-assets/css/jquery.modal.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.css">
    <title>{{ $setting->site_name }}</title>
</head>

<body>
    <header class="header">
        <div class="content">
            <div class="row v-center">
                <div class="header-item item-left">
                    <div class="logo">
                        <a href="index.php"><img src="{{ asset('themes-assets/img/logo.png') }}" width="75"
                                alt=""></a>
                    </div>
                </div>
                <!-- menu start here -->
                <div class="header-item item-center">
                    <div class="menu-overlay">
                    </div>
                    <nav class="menu">
                        <div class="mobile-menu-head">
                            <div class="go-back"><i class="fa fa-angle-left"></i></div>
                            <div class="current-menu-title"></div>
                            <div class="mobile-menu-close">&times;</div>
                        </div>
                        <ul class="menu-main m-0 p-0">
                            <li>
                                <a href="index.php"><span class="menu-u">Home</span></a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#"><span class="menu-u">Expedition</span> <i
                                        class="fa fa-angle-down"></i></a>
                                <div class="sub-menu mega-menu mega-menu-column-4">
                                    <div class="list-item">
                                        <h4 class="title">Fast Tracks</h4>
                                        <ul>
                                            <li><a href="detail.php"> Everest</a></li>
                                            <li><a href="detail.php">Lhotse</a></li>
                                            <li><a href="detail.php">K2</a></li>
                                            <li><a href="detail.php">Kanchanjungha</a></li>
                                            <li><a class="nav-more" href="list.php"> More <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        fill="currentColor" class="bi bi-caret-right-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                    </svg></a></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <h4 class="title">8000ers</h4>
                                        <ul>
                                            <li><a href="detail.php"> Everest</a></li>
                                            <li><a href="detail.php">Lhotse</a></li>
                                            <li><a href="detail.php">K2</a></li>
                                            <li><a href="detail.php">Kanchanjungha</a></li>
                                            <li><a class="nav-more" href="list.php"> More <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        fill="currentColor" class="bi bi-caret-right-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                    </svg></a></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <h4 class="title">7000ers</h4>
                                        <ul>
                                            <li><a href="detail.php"> Everest</a></li>
                                            <li><a href="detail.php">Lhotse</a></li>
                                            <li><a href="detail.php">K2</a></li>
                                            <li><a href="detail.php">Kanchanjungha</a></li>
                                            <li><a class="nav-more" href="list.php"> More <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        fill="currentColor" class="bi bi-caret-right-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                    </svg></a></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <h4 class="title">6000ers</h4>
                                        <ul>
                                            <li><a href="detail.php"> Everest</a></li>
                                            <li><a href="detail.php">Lhotse</a></li>
                                            <li><a href="detail.php">K2</a></li>
                                            <li><a href="detail.php">Kanchanjungha</a></li>
                                            <li><a class="nav-more" href="list.php"> More <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="14"
                                                        height="14" fill="currentColor"
                                                        class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                    </svg></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="list.php"><span class="menu-u">Discover</span></a>
                            </li>
                            <li>
                                <a href="about.php"><span class="menu-u">About Us </span> </a>
                            </li>
                            <li>
                                <a href="contact.php"><span class="menu-u">Contact </span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- menu end here -->
                <div class="header-item item-right">
                    <!-- mobile menu trigger -->
                    <div class="mobile-menu-trigger">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>>
