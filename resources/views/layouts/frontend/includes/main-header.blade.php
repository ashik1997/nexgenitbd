<!-- MAIN HEADER -->
<nav id="site-header" class="site-header navigation navigation-justified sticky-top">
    <div class="top-bar top-bar-dark">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-item">
                    @if(frontend_phone_href())
                        <a href="{{ frontend_phone_href() }}">{{ get_static_option('company_phone') }}</a>
                    @endif
                </div>
                <div class="top-bar-item">
                    <a href="mailto:{{ get_static_option('company_email') }}"> {{ get_static_option('company_email') }}</a>
                </div>
                <div class="top-bar-item">
                    <span>{{ get_static_option('company_office_hour') }}</span>
                </div>
                <div class="top-bar-item follow_us">
                    <span>Follow us:</span>
                    <div class="socials">
                        <a class="social-item" target="_blank" href="{{ get_static_option('company_facebook_link') }}">
                            <img loading="lazy" width="32" height="32" class="crumina-icon"  src="{{  asset('assets/frontend/img/theme-content/social-icons/facebook.svg') }}" alt="facebook">
                        </a>
                        <a class="social-item" target="_blank" href="{{ get_static_option('company_twitter_link') }}">
                            <img loading="lazy" width="32" height="32" class="crumina-icon"  src="{{  asset('assets/frontend/img/theme-content/social-icons/twitter.svg') }}" alt="twitter">
                        </a>
                        <a class="social-item" target="_blank" href="{{ get_static_option('company_youtube_link') }}">
                            <img loading="lazy" width="32" height="32" class="crumina-icon"  src="{{  asset('assets/frontend/img/theme-content/social-icons/youtube.svg') }}" alt="youtube">
                        </a>
                        <a class="social-item" target="_blank" href="{{ get_static_option('company_instagram_link') }}">
                            <img loading="lazy" width="32" height="32" class="crumina-icon"  src="{{  asset('assets/frontend/img/theme-content/social-icons/instagram.png') }}" alt="instagram">
                        </a>
                        <a class="social-item" target="_blank" href="{{ get_static_option('company_linkedin_link') }}">
                            <img loading="lazy" width="32" height="32" class="crumina-icon"  src="{{  asset('assets/frontend/img/theme-content/social-icons/linkedin.png') }}" alt="linkedin">
                        </a>
                        @if(frontend_whatsapp_url())
                            <a class="social-item" target="_blank" rel="noopener" href="{{ frontend_whatsapp_url() }}">
                                <img loading="lazy" width="32" height="32" class="crumina-icon" src="{{ asset('assets/frontend/img/theme-content/social-icons/whatsapp.png') }}" alt="whatsapp">
                            </a>
                        @endif
                    </div>
                </div>
                @if(Auth::check())
                <div class="top-bar-item login-block">
                    <a class="js-window-popup" href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
                    <svg class="crumina-icon" width="20" height="16">

                    </svg>
                    <a class="js-window-popup logout-btn" href="javascript:0">Logout</a>
                </div>
                @else
                <div class="top-bar-item login-block">
                    <svg class="crumina-icon" width="20" height="16">

                    </svg>
                    <a target="_blank" class="js-window-popup" href="{{ route('login') }}">Login</a>
                </div>
                @endif
            </div>
            <a href="#" class="top-bar-close" id="top-bar-close-js">
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
    <!-- MAIN HEADER CONTAINER -->
    <div class="container">
        <!-- MAIN HEADER RESPONSIVE -->
        <div class="navigation-header">
            <!-- MAIN HEADER RESPONSIVE LOGO -->
            <div class="navigation-logo">
                <!-- MAIN HEADER RESPONSIVE LOGO LINK-->
                <a class="site-logo" href="{{ route('frontend.home') }}">
                    <!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
                    @if(get_static_option('frontend_logo'))
                        <img loading="lazy" src="{{ asset(get_static_option('frontend_logo')) }}" alt="{{ config('app.name') }}" width="70">
                    @else
                        <span class="brand-fallback"><span class="brand-mark">N</span><span>{{ config('app.name') }}</span></span>
                    @endif
                    <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->
                </a>
                <!-- /MAIN HEADER RESPONSIVE LOGO LINK-->
            </div>
            <!-- /MAIN HEADER RESPONSIVE LOGO -->

            <!-- TOP BAR RESPONSIVE BUTTON-OPEN -->
            <div id="top-bar-js" class="top-bar-link">
                <svg class="crumina-icon" width="20" height="16">

                </svg>
            </div>
            <!-- /TOP BAR RESPONSIVE BUTTON-OPEN -->

            <!-- MAIN HEADER RESPONSIVE BUTTON-OPEN -->
            <div class="navigation-button-toggler">

                <!-- MAIN HEADER RESPONSIVE BUTTON-OPEN ICON -->
                <i class="hamburger-icon"></i>
                <!-- /MAIN HEADER RESPONSIVE BUTTON-OPEN ICON -->

            </div>
            <button type="button" class="ng-mobile-menu-trigger" aria-label="Open navigation menu"
                aria-controls="mobile-navigation" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            <!-- /MAIN HEADER RESPONSIVE BUTTON-OPEN -->

        </div>
        <!-- /MAIN HEADER RESPONSIVE -->

        <!-- MAIN HEADER BODY -->
        <div class="navigation-body" id="mobile-navigation">

            <!-- MAIN HEADER BODY HEADER -->
            <div class="navigation-body-header">

                <!-- MAIN HEADER LOGO -->
                <div class="navigation-logo">

                    <!-- MAIN HEADER LOGO LINK -->
                    <a class="site-logo" href="{{ route('frontend.home') }}">

                        <!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
                        @if(get_static_option('frontend_logo'))
                            <img loading="lazy" src="{{ asset(get_static_option('frontend_logo')) }}" alt="{{ config('app.name') }}" class="mr-3">
                        @else
                            <span class="brand-fallback"><span class="brand-mark">N</span><span>{{ config('app.name') }}</span></span>
                        @endif
                        <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->



                    </a>
                    <!-- /MAIN HEADER LOGO LINK -->

                </div>
                <!-- /MAIN HEADER LOGO -->

                <!-- MAIN HEADER RESPONSIVE BUTTON-CLOSE ICON -->
                <span class="navigation-body-close-button">&#10005;</span>
                <!-- /MAIN HEADER RESPONSIVE BUTTON-CLOSE ICON -->

            </div>
            <!-- /MAIN HEADER BODY HEADER -->

            <!-- MAIN HEADER MENU -->
            <ul class="navigation-menu">
                <!-- MAIN HEADER MENU ITEM -->
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.home') }}">Home</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <!-- /MAIN HEADER MENU ITEM -->
                <!-- MAIN HEADER MENU ITEM -->
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="javascript:0">Services</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                    <!-- MAIN HEADER MENU DROPDOWN -->
                    <ul class="navigation-dropdown">
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        <li class="navigation-dropdown-item menu-item-info">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM TITLE -->
                            <h5 class="menu-item-info-title">Software Services</h5>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM TITLE -->
                            <!-- MAIN HEADER MENU DROPDOWN ITEM TEXT -->
                            <p class="menu-item-info-text">From idea to launch and beyond</p>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM TEXT -->
                        </li>
                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="{{ route('frontend.mobileAppDevelopment') }}">
                                <svg class="crumina-icon" width="30" height="30">
                                </svg>Mobile App Development</a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="{{ route('frontend.webDesign') }}">
                                <svg class="crumina-icon" width="30" height="30">
                                </svg>Web & SaaS Development</a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="{{ route('frontend.cloudAutomation') }}">
                                <svg class="crumina-icon" width="30" height="30">
                                </svg>Cloud, API & Automation</a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="{{ route('frontend.graphicDesign') }}">
                                <svg class="crumina-icon" width="30" height="30">
                                </svg>UI/UX & Product Design</a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="{{ route('frontend.domainSearch') }}">
                                <svg class="crumina-icon" width="30" height="30">

                                </svg>Technology Consultation</a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                    </ul>
                    <!-- /MAIN HEADER MENU DROPDOWN -->
                </li>
                <!-- /MAIN HEADER MENU ITEM -->
                <!-- MAIN HEADER MENU ITEM -->
                <!-- MAIN HEADER MENU ITEM -->
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="javascript:0">About</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                    <!-- MAIN HEADER MENU DROPDOWN -->
                    <ul class="navigation-dropdown">
                        <!-- MAIN HEADER MENU DROPDOWN ITEM -->
                        @foreach(custom_pages()->where('status', true) as $page)
                            <li class="navigation-dropdown-item">
                                <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                                <a class="navigation-dropdown-link" href="{{ $page->slug === 'our-process' ? route('frontend.ourProcess') : route('frontend.page.show', $page->slug) }}">
                                    <svg class="crumina-icon" width="30" height="30">
                                    </svg>{{ $page->name }}</a>
                                <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            </li>
                        @endforeach

                        <!-- /MAIN HEADER MENU DROPDOWN ITEM -->
                    </ul>
                    <!-- /MAIN HEADER MENU DROPDOWN -->
                </li>
                <!-- /MAIN HEADER MENU ITEM -->
                <!-- MAIN HEADER MENU ITEM -->
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.gallery') }}">Gallery</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.projects') }}">Projects</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.blog.index') }}">Blog</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.testimonials') }}">Testimonials</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.faqs') }}">Faqs</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="{{ route('frontend.contact') }}">Contact</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <!-- /MAIN HEADER MENU ITEM -->
            </ul>
            <!-- /MAIN HEADER MENU -->
            <!-- MAIN HEADER ADDITIONAL MENU -->
            <div class="navigation-body-section navigation-additional-menu">
                @if(frontend_phone_href())
                    <a class="header-cta header-call-cta" href="{{ frontend_phone_href() }}">
                        <span class="header-call-icon">&#9742;</span>
                        <span><small>Let's talk</small>Call Now</span>
                    </a>
                @endif
            </div>
            <!-- /MAIN HEADER ADDITIONAL MENU -->
        </div>
        <!-- MAIN HEADER BODY -->
    </div>
    <!-- /MAIN HEADER CONTAINER -->
    <div class="user-menu">
        <a href="#" class="user-menu-content" data-toggle="modal" data-target="#right-menu">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
</nav>
<!-- /MAIN HEADER -->
