<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.frontend.includes.head')
	<!-- google adsence -->
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9520904692692556"
     crossorigin="anonymous"></script>
   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GCMVN3MJPP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GCMVN3MJPP');
</script>
</head>
<body class="nexgen-site route-{{ str_replace('.', '-', optional(request()->route())->getName() ?? 'page') }}">
    <!-- MAIN HEADER -->
    @include('layouts.frontend.includes.main-header')
    <!-- /MAIN HEADER -->

    <!-- RIGHT MENU -->
    @include('layouts.frontend.includes.right-menu')
    <!-- /RIGHT MENU -->

    <!-- SEARCH POPUP -->
    @include('layouts.frontend.includes.search-popup')
    <!-- /SEARCH POPUP -->


    <!-- MAIN CONTENT WRAPPER -->
    <div class="main-content-wrapper">
        @yield('content')
    </div>
    <!-- /MAIN CONTENT WRAPPER -->
    <!-- FOOTER -->
    @include('layouts.frontend.includes.footer')
    <!-- /FOOTER -->
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endif
    @include('layouts.frontend.includes.foot')
@if(frontend_whatsapp_url())
    <a class="dynamic-whatsapp-button" href="{{ frontend_whatsapp_url() }}" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
        <span class="dynamic-whatsapp-pulse"></span>
        <img src="{{ asset('assets/frontend/img/theme-content/social-icons/whatsapp.png') }}" alt="">
        <span class="dynamic-whatsapp-label"><small>Need help?</small>WhatsApp us</span>
    </a>
@endif
</body>


</html>
