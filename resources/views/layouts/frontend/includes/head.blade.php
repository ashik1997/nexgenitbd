    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9520904692692556"
     crossorigin="anonymous"></script>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- bootstrap 4.3.1 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Essential META Tags -->
    <meta content="author" name="{{ $meta_author ?? config('app.name') }}">
    <meta content="keywords" name="{{ $meta_keywords ?? config('app.name') }}">
    <meta name="description" content="@yield('meta-description', $meta_description ?? get_static_option('website_meta_description'))">
    <meta property="og:title" content="{{ $meta_author ?? config('app.name') }}">
    <meta property="og:description" content="@yield('meta-description', $meta_description ?? get_static_option('website_meta_description'))">
    <meta property="og:image" content="{{ $meta_image ?? asset(get_static_option('website_meta_image')) }}">
    <meta property="og:url" content="{{ $meta_url ?? url('/') }}">
    <meta property="og:type" content="website"/>
    <meta name="twitter:card" content="summary_large_image">

    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta name="twitter:image:alt" content="{{ config('app.name') }}">

    <!--  Non-Essential, But Required for Analytics -->
    <meta property="fb:app_id" content="your_app_id" />
    <meta name="twitter:site" content="@website-username">

    <meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#5b4cf0">
    <title> @stack('title') | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/vendors/Bootstrap/bootstrap.css') }}">
	<!-- site header styles -->
	<link href="{{ asset('assets/frontend/css/plugins/navigation.css') }}" rel="stylesheet">
	<!-- main styles -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/professional.css') }}?v=21">
	<!-- theme font -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/theme-font.min.css') }}">
	<!-- styles for RTL -->
	<!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/rtl.min.css') }}">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{--  helper js cdn   --}}
    <script src="{{ asset('assets/helper.js') }}"></script>
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset(get_static_option('fav_icon') ?? get_static_option('no_image')) }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset(get_static_option('fav_icon') ?? get_static_option('no_image')) }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset(get_static_option('fav_icon') ?? get_static_option('no_image')) }}">
    {!! get_static_option('custom_head_code') !!}
    <!--====== AJAX ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '787978118533481');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=787978118533481&ev=PageView&noscript=1"
/></noscript>
<meta name="facebook-domain-verification" content="mst2721eb5e26dssrjqhiskmqglaia" />
<!-- End Facebook Pixel Code -->
@stack('style')
