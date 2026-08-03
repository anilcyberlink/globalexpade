<!-----------------------------Footer-------------------------------->
<div class="container-fluid footer py-5">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12">
                <img src="{{ asset('themes-assets/img/global1.png') }}" width="70" alt="Logo">
            </div>
        </div>

        <div class="row">

            <!-- Contact -->
            <div class="col-lg-5 col-md-6 mb-4">
                <h4 class="footer-title">GET IN TOUCH</h4>

                <p>
                    <i class="fa fa-map-marker mr-2"></i>
                    {{ $setting->address }}
                </p>

                <p>
                    <i class="fa fa-phone mr-2"></i>
                    {{ $setting->phone }}
                </p>

                <p>
                    <i class="fa fa-envelope mr-2"></i>
                    {{ $setting->email_primary }}
                </p>
            </div>

            <!-- Expeditions -->
            <div class="col-lg-3 col-md-3 mb-4">
                <h4 class="footer-title">
                    <a href="{{ route('page.expeditions') }}">EXPEDITIONS</a>
                </h4>

                @foreach($expeditions as $row)
                    <a class="footer-link d-block mb-2"
                       href="{{ route('page.expedition',$row->uri) }}">
                        {{ $row->title }}
                    </a>
                @endforeach
            </div>

            <!-- Other Links -->
            <div class="col-lg-4 col-md-3 mb-4">
                <h4 class="footer-title">OTHER LINKS</h4>

                @foreach($pagetypes as $row)
                    <a class="footer-link d-block mb-2"
                       href="{{url('info/' . $row->uri)}}">
                        {{ $row->page_type }}
                    </a>
                @endforeach
            </div>

        </div>

        <hr class="footer-divider">

        <div class="row align-items-center">

            <div class="col-md-6 text-center text-md-left">
                <p class="mb-0">
                    &copy; {{ $setting->copyright_text }}
                </p>
            </div>

            <div class="col-md-6 text-center text-md-right">

                @foreach($posttypes as $row)
                    <a class="footer-link mr-3"
                       href="{{ route('page.posttype_detail',$row->uri) }}">
                        {{ $row->post_type }}
                    </a>
                @endforeach

            </div>

        </div>

    </div>
</div>

{{-- <script src="{{ asset('themes-assets/js/jquery.modal.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="{{ asset('themes-assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/js/swiper.js"></script>
<script src="{{ asset('themes-assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
        },
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 80,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        },
        breakpoints: {
            360: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
            1560: {
                slidesPerView: 3,
            },
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    })
</script>
</body>

</html>
