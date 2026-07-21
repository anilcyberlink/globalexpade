@extends('themes.default.common.master') @section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner) @section('brief', $data->brief)
@section('content')
    <style>
        .testimonial-grid-card {
            position: relative;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            transition: .35s;
            border: 1px solid #ececec;
            height: 100%;
        }

        .testimonial-grid-card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 15px 40px rgba(0, 0, 0, .08);
        }

        .testimonial-card-content {
            padding: 30px;
            min-height: 220px;
            position: relative;
        }

        .testimonial-card-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #444;
        }

        .testimonial-card-quote {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            color: #CD8D06;
            opacity: 0.4;
        }

        .testimonial-card-footer {
            padding: 25px;
            border-top: 1px solid #f2f2f2;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .testimonial-card-image img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
        }

        .testimonial-card-footer h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--color-primary, #c8a96e);
            margin-bottom: 10px;
            letter-spacing: 0.02em;
        }

        .testimonial-card-footer span {
            color: #888;
        }

        .testimonial-card-overlay {
            position: absolute;
            inset: 0;
            z-index: 5;
        }

        /* Premium Modal
                                                            .uk-modal {
                                                                display: flex !important;
                                                                align-items: center;
                                                                justify-content: center;
                                                                padding: 20px;
                                                            } */
        .uk-modal.uk-open {

            display: flex !important;

            align-items: center;

            justify-content: center;

            padding: 20px;
        }

        .uk-modal-dialog.testimonial-modal {
            width: 50%;
            max-width: 450px;
            margin: 0;
            padding: 70px 60px 45px;
            border-radius: 16px;
            background: #fff;
            position: relative;
            overflow: hidden;
            box-shadow:
                0 30px 80px rgba(0, 0, 0, .12);
        }

        /* Decorative Quote */
        .testimonial-modal::before {
            content: "“";
            position: absolute;
            top: -40px;
            left: 20px;
            font-size: 280px;
            font-family: Georgia, serif;
            color: #CD8D06;
            opacity: .07;
            line-height: 1;
            pointer-events: none;
        }

        /* Content */
        .testimonial-content {
            font-size: 20px;
            line-height: 2;
            color: #374151;
            text-align: left;
            position: relative;
            z-index: 2;
            margin-bottom: 30px;
        }

        .testimonial-author {

            margin-top: 40px;

            padding-top: 30px;

            border-top: 1px solid #f2f2f2;

            display: flex;

            align-items: center;

            gap: 18px;
        }

        .testimonial-author img {

            width: 75px;
            height: 75px;

            border-radius: 50%;

            object-fit: cover;

            border: 3px solid #fff;

            box-shadow:
                0 8px 20px rgba(0, 0, 0, .08);
        }

        .testimonial-author-info {

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .testimonial-author-info h4 {

            margin: 0;

            font-size: 1.25rem;

            font-weight: 700;

            color: var(--color-primary, #c8a96e);

            line-height: 1.2;
        }

        .testimonial-author-info span {

            margin-top: 4px;

            color: #888;

            font-size: 14px;
        }

        .stars {

            margin-top: 8px;

            color: #CD8D06;

            font-size: 15px;

            letter-spacing: 3px;
        }

        /* Close Button */
        .uk-modal-close-default {
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f8f8;
        }

        .uk-modal-close-default:hover {
            background: #CD8D06;
            color: #fff;
        }

        @media(max-width:959px) {
            .uk-modal-dialog.testimonial-modal {
                padding: 50px 30px 30px;
                width: 80%;
            }

            .testimonial-modal::before {
                font-size: 180px;
                top: -20px;
            }

            .testimonial-content {
                font-size: 17px;
                line-height: 1.9;
            }

            .testimonial-author img {
                width: 70px;
                height: 70px;
            }

            /* .testimonial-author-info h3 {
                                                    font-size: 18px;
                                                } */
        }

        @media(max-width:639px) {
            .uk-modal-dialog.testimonial-modal {
                padding: 45px 20px 25px;
                border-radius: 12px;
                width: 90%;
            }

            .testimonial-content {
                font-size: 15px;
                line-height: 1.8;
            }

            .testimonial-author {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }


            .testimonial-author-info {

                align-items: center;
            }

            .testimonial-author-info h4 {
                font-size: 18px;
            }

            .testimonial-author img {

                width: 65px;
                height: 65px;
            }


            .testimonial-modal::before {
                font-size: 120px;
                left: 10px;
            }
        }
    </style>
    <!-- HEADER START -->
    <div
        uk-scrollspy="target:[uk-scrollspy-class], h1, .uk-h5, p;cls: uk-animation-slide-top-medium; delay: 100; repeat: false;">
        <div class="uk_header" uk-scrollspy-class>
            <div class="uk_header_image uk-position-relative">
                <img src="@if ($data->banner) {{ asset('uploads/medium/' . $data->banner) }}@else {{ asset('themes-assets/images/default/default-banner.jpg') }} @endif"
                    class="uk-image" alt="{{ $data->post_title }}" loading="eager" />
            </div>
            <div class="uk-position-cover uk-banner-overlay"></div>
            <div class="uk-panel uk_header_image_content uk-position-bottom">
                <div class="uk-container">
                    <div class="uk-padding-large uk-padding-remove-horizontal">
                        <div class="uk-h5 text-white uk-margin-small-bottom uk-text-uppercase f-w-600 uk-text-shadow">
                            {{ $data->post_type }}
                        </div>
                        <h1 class="f-w-600 text-white uk-margin-remove uk-text-shadow">
                            {{ $data->post_tag }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="texture">
        <img src="{{ asset('themes-assets/images/highertexture.png') }}" alt="" />
    </div>
    <!-- HEADER END -->
    <!-- SECTION HEADING -->
    @if ($data->post_title)
        <div class="uk-container uk-text-center uk-padding-large uk-padding-remove-bottom">
            <h2 class="f-w-600 uk-margin-small-bottom"
                style="color: var(--color-primary, #c8a96e); letter-spacing: 0.03em;">
                {{ $data->post_title }}
            </h2>
            <div style="width: 60px; height: 3px; background: var(--color-primary, #c8a96e); margin: 0 auto;"></div>
        </div>
    @endif
    <!-- END SECTION HEADING -->
    <section class="uk-section uk-padding-remove-top" style="padding-top:50px !important;">
        <div class="uk-container"
            uk-scrollspy="target: [uk-scrollspy-class], h2, span, p, a; cls: uk-animation-slide-top-medium;delay: 100; repeat: false;">
            <div class="uk-text-center uk-margin-large-bottom">
                <span class="text-primary">
                    REAL EXPERIENCES
                </span>
                <h2 class="uk-text-bold text-secondary-light uk-margin-small-top">
                    Stories From Around The World
                </h2>
                <p class="uk-width-2-3@m uk-margin-auto text-secondary-light" uk-scrollspy-class>
                    {{-- Discover inspiring experiences shared by trekkers,
                    climbers and adventurers who trusted
                    {{ $setting->site_name }} to make their Himalayan journey unforgettable. --}}
                    {!! $data->content !!}
                </p>
            </div>
            <div class="uk-child-width-1-1@s
uk-child-width-1-2@m
                          uk-child-width-1-3@l
                          uk-grid-medium"
                uk-grid uk-scrollspy-class>
                @foreach ($testimonials as $testimonial)
                    <div>
                        <div class="testimonial-grid-card">
                            <div class="testimonial-card-content">
                                <span class="testimonial-card-quote">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>
                                    " {!! Str::limit(strip_tags($testimonial->testimonial), 220) !!} "
                                </p>
                            </div>
                            <div class="testimonial-card-footer" uk-scrollspy-class>
                                <div class="testimonial-card-image">
                                    <img src="@if ($testimonial->picture) {{ asset('uploads/testimonials/' . $testimonial->picture) }}
                        @else
                        {{ asset('themes-assets/images/default/default-profile.jpg') }} @endif"
                                        alt="{{ $testimonial->name }}">
                                </div>
                                <div>
                                    <h4>
                                        {{ $testimonial->name }}
                                    </h4>
                                    <span>
                                        {{ $testimonial->country }}
                                    </span>
                                </div>
                            </div>
                            <a href="#testimonial-modal-{{ $testimonial->id }}" uk-toggle class="testimonial-card-overlay">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @foreach ($testimonials as $testimonial)
        <div id="testimonial-modal-{{ $testimonial->id }}" uk-modal="center:true"
            uk-scrollspy="target: [uk-scrollspy-class], h2, span, p, a; cls: uk-animation-slide-top-medium;delay: 100; repeat: false;">
            <div class="uk-modal-dialog testimonial-modal" uk-scrollspy-class>
                <button class="uk-modal-close-default" type="button" uk-close>
                </button>
                <div class="testimonial-content">
                    {!! nl2br(e(strip_tags($testimonial->testimonial))) !!}
                </div>
                {{-- <div class="testimonial-author">
                    <img src="@if ($testimonial->picture) {{ asset('uploads/testimonials/' . $testimonial->picture) }}
            @else
            {{ asset('themes-assets/images/default/default-profile.jpg') }} @endif"
                        alt="{{ $testimonial->title }}">
                    <div class="testimonial-author-info">
                        <h4>{{ $testimonial->title }}</h4>
                        <span>{{ $testimonial->country }}</span>
                        <div class="stars">
                            @for ($i = 1; $i <= $testimonial->rating; $i++)
                                ★
                            @endfor
                        </div>
                    </div>
                </div> --}}
                <div class="testimonial-author">

                    <img src="@if ($testimonial->picture) {{ asset('uploads/testimonials/' . $testimonial->picture) }}
        @else
            {{ asset('themes-assets/images/default/default-profile.jpg') }} @endif"
                        alt="{{ $testimonial->title }}">
                    <div class="testimonial-author-info">
                        <h4>{{ $testimonial->title }}</h4>
                        <span>{{ $testimonial->country }}</span>
                        <div class="stars">
                            @for ($i = 1; $i <= $testimonial->rating; $i++)
                                ★
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
