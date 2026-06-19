<section class="crumina-module crumina-module-slider crumina-main-slider">

    <div class="swiper-btn-next">
        <svg class="crumina-icon" width="40" height="30">
            <use xlink:href="#icon-nav-next"></use>
        </svg>
    </div>
    <div class="swiper-btn-prev">
        <svg class="crumina-icon" width="40" height="30">
            <use xlink:href="#icon-nav-prev"></use>
        </svg>
    </div>
    <div class="swiper-container swiper-unique-id-0 initialized swiper-container-fade swiper-container-initialized swiper-container-horizontal"
        data-effect="fade" data-show-items="1" data-change-handler="thumbsParent" data-prev-next="1"
        data-autoplay="4000" id="swiper-unique-id-0">

        <div class="swiper-wrapper">
            @foreach ($website_banners as $website_banner)
                <div class="swiper-slide @if ($loop->odd) bg-grey-theme @else bg-primary-themes @endif">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0">
                                <div class="slider-content">
                                    <div class="hero-eyebrow" data-swiper-parallax="-50">Digital solutions that move you forward</div>
                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100">{{ $website_banner->title }}</h2>
                                    <p class="slider-content-text @if ($loop->odd) c-dark @else c-white @endif" data-swiper-parallax="-200">{{ $website_banner->description }}</p>
                                    <div class="universal-btn-wrapper">
                                        <a href="{{ $website_banner->purchase_btn_url }}"
                                            class="crumina-button button--dark button--l">Explore Service</a>
                                        <a href="{{ $website_banner->view_btn_url }}"
                                            class="crumina-button button--white button--bordered button--with-icon button--icon-right button--l">Watch Overview<svg class="crumina-icon" width="12" height="10">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="hero-trust-row">
                                        <span>✓ Reliable delivery</span>
                                        <span>✓ Dedicated support</span>
                                        <span>✓ Built to scale</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">
                                    <img loading="lazy" src="{{ asset($website_banner->image ?: 'assets/frontend/img/demo-content/illustrations/img13.png') }}" alt="{{ $website_banner->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="slider-slides main-slider-slides">
            <div class="main-slider-slides-wrap">
                @foreach ($website_banners as $website_short_banner)
                    <div class="slides-item @if ($loop->odd) bg-grey-theme @else bg-primary-themes  @endif">
                            <div class="h5 slides-item-title">{{ $website_short_banner->title }}</div>
                            <div class="slides-item-text">{{ $website_short_banner->short_description }}</div>
                            <img width="70px;" height="70px;" loading="lazy" class="slides-item-icon" src="{{ asset($website_short_banner->short_image ?: 'assets/frontend/img/demo-content/icons/01-slide.svg') }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
</section>
