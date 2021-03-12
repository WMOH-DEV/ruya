<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>RUYA - @yield('title')</title>

    <!-- additional meta -->
    <!-- Primary Meta Tags -->
    <meta name="أكاديمية رؤية" content="منصة أكاديمية رؤية التعليمية">
    <meta name="description" content="https://ruya.academy">

    <!-- Google Console -->
    {!!  $google_console ?? '<meta name="google-site-verification" content="xxxx" />' !!}
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ruya.academy">
    <meta property="og:title" content="RUYA Academy - @yield('title')">
    <meta property="og:description" content="منصة أكاديمية رؤية التعليمية">
    <meta property="og:image" content="https://i.imgur.com/nJgh9n8.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://ruya.academy">
    <meta property="twitter:title" content="RUYA Academy - @yield('title')">
    <meta property="twitter:description" content="منصة أكاديمية رؤية التعليمية">
    <meta property="twitter:image" content="https://i.imgur.com/nJgh9n8.png">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{asset('main')}}/assets/img/favicon.ico"
    />

    <!-- CSS here -->
<!--<link rel="stylesheet" href="{{asset('main')}}/assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="{{asset('main')}}/assets/css/cookieconsent.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/animate.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/nice-select.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/metisMenu.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/meanmenu.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/slick.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/alerts-css.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/main.css" />
    <!-- Main Css File -->
    @yield('css')
    <link rel="stylesheet" href="{{asset('main')}}/assets/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=DroidKufi-Regular" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>


    <!-- Adsense verification -->
    {!! $adsense ?? " <!-- Adsense Codes will be here --> " !!}
    <!-- End Adsense Verification -->

    <!-- Facebook verification -->
    {!! $facebook ?? " <!-- Facebook Codes will be here --> " !!}
    <!-- End Facebook Verification -->

    <!-- Header Codes -->
    {!! $headerCode ?? " <!-- Header Codes will be here --> " !!}
    <!-- / End Header Codes -->

</head>
