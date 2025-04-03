<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ cms_config('hotel.name.short') }} ~ @yield('title')</title>
    <link href="/web/styles/style.css" type="text/css" rel="stylesheet" />
    <link href="/web/styles/ads.css" type="text/css" rel="stylesheet" />
    <link href="/web/styles/boxes.css" type="text/css" rel="stylesheet" />
    <link href="/web/styles/process.css" type="text/css" rel="stylesheet" />

    <link rel="icon" href="{{ url('/') }}/web/images/favicon.gif" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/') }}/web/images/favicon.gif" type="image/x-icon">

    <script language="JavaScript" type="text/javascript">
        var habboReqPath = "{{ url('/') }}/";
        var habboStaticFilePath = "/web/";
        var habboImagerUrl = "/habbo-imaging/";
        document.habboLoggedIn = false;
        window.name = "habboMain";
    </script>
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
    <script type="text/javascript" src="{{ url('/') }}/web/js/profile/swfobject.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web/js/prototype.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web/js/builder.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web/js/habbo.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web/js/hobojax.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web/js/validation.js"></script>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta name="build" content="{{ config('cms.name') }} v{{ config('cms.version') }} - [{{ config('cms.title') }}] - {{ config('cms.stable') }} - {{ config('cms.build') }}" />
</head>
</head>

<body id="process">
    <div id="overlay"></div>
    <h1 id="main-header">{{ cms_config('hotel.name.short') }}</h1>
    <div id="wrapper">
        @yield('content')
        @include('includes.footer')
    </div>
</body>

</html>
