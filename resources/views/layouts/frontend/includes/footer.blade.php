<!-- FOOTER -->
    <footer id="site-footer" class="footer dark-section">
        <div class="container">

            <!-- FOOTER CONTENT -->
            <div class="footer-content">
                <div class="row justify-content-between">

                    <div class="col-lg-7 col-md-6 col-sm-12 mb-md-0">

                        <!-- WIDGET INFO -->
                        <div class="widget w-info widget--footer mb-4">
                            <h4 class="widget-title">{{ config('app.name') }}</h4>
                            <p class="widget-text">{{ get_static_option('company_short_description') }}</p>
                            <h4 class="widget-title">Follow us: </h4>
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
                        <!-- /WIDGET INFO -->

                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 mb-4 mb-md-0">

                        <!-- WIDGET LINKS -->
                        <div class="widget widget_links widget--footer">
                            <h4 class="widget-title">Quick links</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('frontend.home') }}">
                                        <svg class="crumina-icon" width="4" height="6">
                                        </svg>Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.gallery') }}">
                                        <svg class="crumina-icon" width="4" height="6">
                                        </svg>Gallery
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.blog.index') }}">
                                        <svg class="crumina-icon" width="4" height="6">
                                        </svg>Blogs
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.faqs') }}">
                                        <svg class="crumina-icon" width="4" height="6">
                                        </svg>Faqs
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /WIDGET LINKS -->

                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 mb-4 mb-md-0">

                        <!-- WIDGET LINKS -->
                        <div class="widget widget_links widget--footer">
                            <h4 class="widget-title">About</h4>
                            <ul>
                                @foreach(custom_pages()->where('status', true) as $page)
                                    <li>
                                        <a href="{{ $page->slug === 'our-process' ? route('frontend.ourProcess') : route('frontend.page.show', $page->slug) }}">
                                            <svg class="crumina-icon" width="4" height="6">
                                            </svg>{{ $page->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('frontend.contact') }}">
                                        <svg class="crumina-icon" width="4" height="6">
                                        </svg>Contacts
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /WIDGET LINKS -->

                    </div>
                </div>
            </div>
            <!-- /FOOTER CONTENT -->

            <!-- FOOTER CONTACTS -->
            <div class="contacts">

                <!-- FOOTER CONTACTS ITEM -->
                <div class="contacts-item">
                    <div class="crumina-module js-animate-icon">
                        <svg class="crumina-icon c-yellow-themes" width="70" height="70" enable-background="new 0 0 64 64" version="1.1" viewBox="0 0 64 64"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="  M45.1,44.2C42.9,42,39.6,40,37,42.6c-1.8,1.8-2.6,3.9-2.6,3.9s-4.3,2.3-11.7-5.2s-5.2-11.7-5.2-11.7s2.1-0.8,3.9-2.6  c2.6-2.6,0.6-5.9-1.7-8.1c-2.7-2.7-6.2-4.9-8.2-2.9c-3.7,3.7-4.4,8.4-4.4,8.4S9,35.5,18.7,45.3s20.9,11.6,20.9,11.6s4.7-0.7,8.4-4.4  C50,50.4,47.8,46.9,45.1,44.2z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                            <path d="  M18.4,12.2C22.2,9.5,26.9,8,32,8c13.3,0,24,10.8,24,24c0,4-1.3,9-4.4,12.2" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2"/>
                            <path d="  M27.3,55.6c-9.8-1.9-17.5-9.8-19.1-19.7" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                            <path d="  M30,21c0,0,4.4,0,5.2,0c1.2,0,1.8,0.2,1.8,1.1s0,0.7,0,1.3c0,0.6,0,1.4-1.6,2.5c-2.3,1.6-5.6,3.8-5.6,5.1c0,1.6,0.7,2,1.8,2  s5.3,0,5.3,0"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2"/>
                            <path d="  M40,21c0,0,0,2.8,0,3.8S39.9,27,41.5,27c1.6,0,4.5,0,4.5,0v-6.1V33" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2"/></svg>
                    </div>
                    <div class="content">
                        <div class="title c-white"><a href="tel:{{ get_static_option('company_phone') }}">{{ get_static_option('company_phone') }}</a></div>
                        <p class="sub-title">{{ get_static_option('company_office_hour') }}</p>
                    </div>
                </div>
                <!-- /FOOTER CONTACTS ITEM -->

                <!-- FOOTER CONTACTS ITEM -->
                <div class="contacts-item">
                    <div class="crumina-module js-animate-icon">
                        <svg class="crumina-icon c-red-themes" width="70" height="70" enable-background="new 0 0 64 64" version="1.1"
                            viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" points="  54,17 32,36 10,17 " stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2" x1="10.9" x2="26" y1="48" y2="36"/>
                            <path d="  M32.7,49H13c-2.2,0-4-1.8-4-4V19c0-2.2,1.8-4,4-4h38c2.2,0,4,1.8,4,4v15.5" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="2"/>
                            <circle cx="44.9" cy="43.1" fill="none" r="10.1" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                            <path d="  M44,41.4c0,0-1.3,3.4-0.9,5.1c0.4,1.7,2.6,2.1,3.7,1.1" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                            <g><circle cx="45.4" cy="38.3" fill="none" stroke="currentColor" r="0.9"/>
                                <path d="M45.4,37.3c-0.5,0-0.9,0.4-0.9,0.9c0,0.5,0.4,0.9,0.9,0.9s0.9-0.4,0.9-0.9C46.4,37.8,46,37.3,45.4,37.3   L45.4,37.3z"
                                    fill="none" stroke="currentColor"/></g>
                        </svg>
                    </div>
                    <div class="content">
                        <a href="mailto:{{ get_static_option('company_email') }}" class="title c-white">{{ get_static_option('company_email') }}</a>
                        <p class="sub-title">Online support</p>
                    </div>
                </div>
                <!-- /FOOTER CONTACTS ITEM -->

                <!-- FOOTER CONTACTS ITEM -->
                <div class="contacts-item">
                    <div class="crumina-module js-animate-icon">
                        <svg class="crumina-icon c-green-themes" width="70" height="70" enable-background="new 0 0 64 64" version="1.1" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><polygon fill="none" points="  38.7,36.4 56,32 38.7,27.6 42,22 36.4,25.3 32,8 27.6,25.3 22,22 25.3,27.6 8,32 25.3,36.4 22,42 27.6,38.7 32,56 36.4,38.7 42,42   " stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></polygon><circle cx="32" cy="32" fill="none" r="4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></circle><path d="  M26.1,53.2c-7.9-2.2-13.9-8.6-15.6-16.7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path><path d="  M53.5,36.9c-1.8,8.1-8.2,14.6-16.3,16.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path><path d="  M36.9,10.5c8.2,1.9,14.7,8.3,16.6,16.6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path><path d="  M10.5,27.1c1.9-8.2,8.3-14.6,16.4-16.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path></svg>
                    </div>
                    <div class="content">
                        <div class="title c-white">{{ get_static_option('company_address') }}</div>
                        <p class="sub-title">Our address</p>
                    </div>
                </div>
                <!-- /FOOTER CONTACTS ITEM -->

            </div>
            <!-- /FOOTER CONTACTS -->

        </div>

        <!-- SUB FOOTER -->
        <div class="sub-footer">
            {!! get_static_option('footer_credit') !!}
        </div>
        <!-- /SUB FOOTER -->

    </footer>
    <!-- /FOOTER -->
