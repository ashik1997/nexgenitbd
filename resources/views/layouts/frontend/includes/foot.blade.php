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
