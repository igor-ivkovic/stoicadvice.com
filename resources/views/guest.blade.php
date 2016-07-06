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
    <meta name="copyright" content="© www.stoicadvice.com" />
    <meta name="author" lang="en" content="Igor Ivkovic" />

    <!--meta for csrf -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- meta for social media -->
    @yield('meta')


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


    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic&subset=latin,latin-ext"' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Domine:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- CSS -->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/build.css') }}" rel="stylesheet" type="text/css">

    @if(isset($pic))
    <style type="text/css">

        .background {
            width:100%;
            height: 100%;

            background-image: url({{ asset('image/travel/' .$pic. '.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;

            display: table;
            margin-top: 0px;
        }

    </style>
    @endif


    <!-- Cannonical link -->
    <link rel="canonical" href="http://stoicadvice.com/advice/{{ $advices->advice_id or "" }}" />

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "a499bbb4-baeb-49f5-9211-1489057bb6b5", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

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

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ asset('/') }}"><img src="{{ asset('image/logo/StoicAdviceLogo.png') }}" alt="logo" height="100%" width="auto"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                    <li id="quotes"><a href="{{ asset('/') }}">Quotes</a></li>
                    <li id="advices"><a href="{{ asset('advice') }}">Advices</a></li>
                    <li id="books"><a href="{{ asset('books') }}">Books</a></li>
                    <li id="about"><a href="{{ asset('about') }}">About</a></li>
                    <li id="about"><a href="http://www.givesme.com" target="_blank">Gives Me</a></li>
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
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/npm.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/indonesia.js') }}"></script>

</body>
</html>
