<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stoic Advice</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- Meta for google -->
    <meta name="description" content="Stoic Advice provides random wisdom from stoic philosophers." />
    <meta name="keywords" content="stoic, advice, stoicism, Epictetus, Seneca, Marcus Aurelius, wisdom, philosophy">



    <!-- meta for social media -->
    <meta property="og:url"           content="http://stoicadvice.com/{{ $advices->advice_id or "" }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Stoic Advice" />

    @if(isset($advices->advice))
        <meta property="og:description"   content="{{ strip_tags($advices->advice) }}" />
    @else
        <meta property="og:description"   content="" />

    @endif
    <meta property="og:image"         content="{{ asset('image/philosophy.jpg') }}" />

    <meta name="apple-mobile-web-app-title" content="Stoic Advice">
    <meta name="application-name" content="Stoic Advice">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Favicon code -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">




    <!-- My Own Css -->
    <link href="{{ asset('css/shit.css') }}" rel="stylesheet" type="text/css">



    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic&subset=latin,latin-ext"' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Domine:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Jquery -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type='text/css'>
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/npm.js') }}"></script>


    <!-- Cannonical link -->
    <link rel="canonical" href="http://stoicadvice.com/{{ $advices->advice_id or "" }}" />


</head>
<body>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68621588-2', 'auto');
    ga('send', 'pageview');

</script>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ asset('/') }}"><span style="color: deepskyblue">STOIC ADVICE</span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(isset($advices->advice))
                    <li class="active"><a href="{{ asset('/') }}">Home</a></li>
                    <li><a href="{{ asset('about') }}">About</a></li>
                @else
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li class="active"><a href="{{ asset('about') }}">About</a></li>
                @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="https://www.facebook.com/StoicAdvice" target="_blank"><img src="{{ asset('image/facebookLogo.png') }}" alt="FacebookLogo" /></a>
                </li>
            </ul>
        </div>
    </div>
</nav>


@yield('content')


</body>
</html>
