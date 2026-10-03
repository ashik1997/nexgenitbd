    <!-- JS-scripts for Header Main Navigation -->
    <script src="{{  asset('assets/frontend/js/js-plugins/navigation.min.js') }}" defer></script>
    <!-- /JS-scripts for Header Main Navigation -->

    <!-- JQuery -->
    <script src="{{  asset('assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
    <!-- /JQuery -->

    <!-- JS-scripts Bootstrap -->
    <script src="{{  asset('assets/frontend/js/Bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- JS-scripts Bootstrap -->

    <!-- JS-scripts Waypoints -->
    <script src="{{  asset('assets/frontend/js/js-plugins/waypoints.js') }}"></script>
    <!-- JS-scripts Waypoints -->

    <!-- JS-scripts for Main Slider -->
    <script src="{{  asset('assets/frontend/js/js-plugins/imagesloaded.pkgd.min.js') }}"></script>
    <!-- /JS-scripts for Main Slider -->

    <!-- JS-scripts custom Crumina select -->
    <script src="{{  asset('assets/frontend/js/js-plugins/select2.min.js') }}"></script>
    <!-- /JS-scripts custom Crumina select -->

    <!-- JS-scripts for Sliders -->
    <script src="{{  asset('assets/frontend/js/js-plugins/swiper.min.js') }}"></script>
    <!-- /JS-scripts for Sliders -->

    <!-- JS-scripts for ANIMATION -->
    <script src="{{  asset('assets/frontend/js/js-plugins/anime.min.js') }}"></script>
    <!-- /JS-scripts for ANIMATION -->

    <!-- MAIN JS -->
    <script src="{{  asset('assets/frontend/js/main.js') }}"></script>
    <!-- /MAIN JS -->

    <!-- SVG icons loader -->
    <script src="{{  asset('assets/frontend/js/svg-loader.js') }}"></script>
    <!-- /SVG icons loader -->

{!! get_static_option('custom_foot_code') !!}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v10.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/bn_IN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution="install_email"
         page_id="{{ get_static_option('fb_page_id') }}"
         theme_color="{{ get_static_option('fb_page_color') }}">
    </div>

@include('sweetalert::alert')
@stack('script')

<script>
    (function () {
        var header = document.getElementById('site-header');
        var ticking = false;

        if (!header) {
            return;
        }

        function syncStickyHeader() {
            header.classList.toggle('is-scrolled', window.scrollY > 24);
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(syncStickyHeader);
                ticking = true;
            }
        }, { passive: true });

        syncStickyHeader();
    }());
</script>

<script>
    (function () {
        var mobileBreakpoint = window.matchMedia('(max-width: 991px)');
        var header = document.getElementById('site-header');
        var trigger = header ? header.querySelector('.ng-mobile-menu-trigger') : null;
        var menu = document.getElementById('mobile-navigation');

        if (!header || !trigger || !menu) {
            return;
        }

        function syncMobileMenuState() {
            var isOpen = mobileBreakpoint.matches && menu.classList.contains('is-visible');

            trigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            trigger.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
            document.body.classList.toggle('ng-mobile-menu-open', isOpen);
        }

        function setMobileMenuOpen(isOpen) {
            if (!mobileBreakpoint.matches) {
                return;
            }

            var overlay = header.querySelector('.overlay-panel');

            menu.classList.remove('is-invisible');
            menu.classList.toggle('is-visible', isOpen);

            if (overlay) {
                overlay.classList.remove('is-invisible');
                overlay.classList.toggle('is-visible', isOpen);
            }

            window.requestAnimationFrame(syncMobileMenuState);
        }

        function toggleMobileMenu() {
            setMobileMenuOpen(!menu.classList.contains('is-visible'));
        }

        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            toggleMobileMenu();
        });

        menu.querySelector('.navigation-body-close-button').addEventListener('click', function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            setMobileMenuOpen(false);
        }, true);

        header.addEventListener('click', function (event) {
            if (event.target.classList.contains('overlay-panel')) {
                event.preventDefault();
                event.stopImmediatePropagation();
                setMobileMenuOpen(false);
            }
        }, true);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && menu.classList.contains('is-visible')) {
                setMobileMenuOpen(false);
            }
        });

        window.addEventListener('resize', syncMobileMenuState, { passive: true });
        new MutationObserver(syncMobileMenuState).observe(menu, {
            attributes: true,
            attributeFilter: ['class']
        });

        syncMobileMenuState();
    }());
</script>
