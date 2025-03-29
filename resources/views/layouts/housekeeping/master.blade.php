<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <title>{{ env('APP_NAME') }} ~ @yield('title')</title>
    <link href="/web/housekeeping/styles/style.css" type="text/css" rel="stylesheet" />
    <script src="/web/housekeeping/js/scripts.js"></script>
    <script src="/web/housekeeping/js/jquery-3.5.1.min.js"></script>
    <script>
        var habboReqPath = "{{ url('/') }}/housekeeping/";
        var habboStaticFilePath = "/web/";
        var habboImagerUrl = "/habbo-imaging/";

        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
    </script>
    <meta name="build"
        content="{{ Config::get('app.version') }} - {{ Config::get('app.build') }} - {{ Config::get('app.locale') }}" />
    <link rel="icon" href="{{ url('/') }}/web/housekeeping/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/') }}/web/housekeeping/images/favicon.png" type="image/x-icon">

</head>

<body>
    <div id="overlay" style="display: none; height: 1122px; z-index: 9000;"></div>
    <div id="tooltip" style="display: none; z-index: 9999" class="tooltip tooltip-bottom">...</div>
    <div id="loading-layer" style="display:none">
        <div id="loading-layer-shadow">
            <div id="loading-layer-inner">
                <img src="{{ url('/') }}/web/housekeeping/images/loading_anim.gif" style="vertical-align:middle" border="0"
                    alt="Loading..." />
                <br />
                <span style="font-weight:bold" id="loading-layer-text">Loading Data. Please Wait...</span>
            </div>
        </div>
    </div>
    <div id="ipdwrapper">
        <!-- IPDWRAPPER -->
        <!-- TOP TABS -->
        <div class="tabwrap-main">
            <div class="tab{{ $menu == 'dashboard' ? 'on' : 'off' }}-main">
                <img src="{{ url('/') }}/web/housekeeping/images/dashboard.png" style="vertical-align:middle" />
                <a href="/housekeeping/dashboard">Dashboard</a>
            </div>
            <div class="tab{{ $menu == 'server' ? 'on' : 'off' }}-main">
                <img src="{{ url('/') }}/web/housekeeping/images/system.png" style="vertical-align:middle" />
                <a href="/housekeeping/server">Server</a></div>
            <div class="tab{{ $menu == 'site' ? 'on' : 'off' }}-main">
                <img src="{{ url('/') }}/web/housekeeping/images/tools.png" style="vertical-align:middle" />
                <a href="/housekeeping/site">Site & Content</a>
            </div>
            <div class="tab{{ $menu == 'catalogue' ? 'on' : 'off' }}-main">
                <img src="{{ url('/') }}/web/housekeeping/images/catalogue.png" style="vertical-align:middle" />
                <a href="/housekeeping/catalogue">Catalogue & Furnis</a>
            </div>
            <div class="tab{{ $menu == 'solariumcms' ? 'on' : 'off' }}-main">
                <img src="{{ url('/') }}/web/housekeeping/images/components.png" style="vertical-align:middle" />
                <a href="/housekeeping/solariumcms">SolariumCMS</a></div>
            <div class="tab{{ $menu == 'users' ? 'on' : 'off' }}-main">
                <img src="{{ url('/') }}/web/housekeeping/images/admin.png" style="vertical-align:middle" />
                <a href="/housekeeping/users">Users & Moderation</a></div>

            {{--<div class="tab{{ $menu == 'help' ? 'on' : 'off' }}-main">
            <img src="{{ url('/') }}/web/housekeeping/images/help.png" style="vertical-align:middle" />
            <a href="/housekeeping/help">Help</a>
        </div>--}}
        <div class="logoright">

        </div>
    </div>
    <!-- / TOP TABS -->
    <div class="sub-tab-strip">
        <div class="global-memberbar">
            Welcome <strong>{{ user()->username }}</strong>
            [<a href="{{ url('/') }}" target="_blank">Site Home</a>]
        </div>
        <div class="navwrap">
            <a href="/housekeeping/dashboard"> {{ env('APP_NAME') }} Housekeeping</a>
        </div>
    </div>
    <div class="outerdiv" id="global-outerdiv">
        @yield('content')
        <!-- / OUTERDIV -->
        <div align="center">
            Time: {{ round(microtime(true) - LARAVEL_START, 5) }}
        </div>
        <div class="copy" align="center">{{ config('cms.name') }} v{{ config('cms.version') }} [{{ config('cms.title') }}] {{ config('cms.stable') }}<br />
            <font size="1">Build {{ config('cms.build') }} {{ config('cms.gmt') }}</font>
        </div>
    </div>
    </div>
</body>

</html>
