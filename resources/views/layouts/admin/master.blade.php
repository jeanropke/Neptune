<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>{{ config('app.name') }}: @yield('title')</title>
    <link rel="shortcut icon" href="{{ url('/') }}/web/housekeeping/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="{{ url('/') }}/web/housekeeping/styles/style.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/web/housekeeping/styles/boxes.css" type="text/css">

    {{-- ?php if($page['scrollbar'] == true){ ?>
    <script type="text/javascript" src="{{ url('/') }}/housekeeping/images/js/jsScroller.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/housekeeping/images/js/jsScrollbar.js"></script>
    <script type="text/javascript">
        var scroller = null;
        var scrollbar = null;
    </script>
    ?php } ?> --}}
    {{-- ?php if($page['second_scrollbar'] == true){ ?>
    <script type="text/javascript" src="{{ url('/') }}/housekeeping/images/js/jsScroller2.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/housekeeping/images/js/jsScrollbar2.js"></script>
    <script type="text/javascript">
        var scroller2 = null;
        var scrollbar2 = null;
    </script>
    ?php } ?> --}}
    {{--
    <script type="text/javascript">
        window.onload = function() {
             ?php if($page['scrollbar'] == true){ ?>
            scroller = new jsScroller(document.getElementById("listview"), 244, 96);
            scrollbar = new jsScrollbar(document.getElementById("Scrollbar-Container"), scroller, false);
            ?php } ?>
            ?php if($page['second_scrollbar'] == true){ ?>
            scroller2 = new jsScroller2(document.getElementById("listview2"), 244, 96);
            scrollbar2 = new jsScrollbar2(document.getElementById("Scrollbar2-Container"), scroller2, false);
            ?php } ?>
        };
    </script>
    --}}

    <meta name="build" content="{{ config('app.name') }} {{ config('app.version') }} - {{ config('app.build') }} - {{ config('app.locale') }}" />
</head>

<body>

    <div class="panel">

        <div class="header_left">&nbsp;<br />&nbsp;<br />&nbsp;<br /><a href="http://www.phpretro.com/"><img src="{{ url('/') }}/web/housekeeping/images/header_logo.png"
                    alt="{{ config('app.name') }}"></a>
        </div>
        <div class="header_right"><img src="{{ url('/') }}/web/housekeeping/images/header_tm1.gif"></div>

        <div class="panel_title">
            <span class="text">{{ config('app.name') }} {{ config('app.version') }} - {{ config('app.build') }}
                Housekeeping</span>
            <div class="close_button">
                <a href="{{ url('/') }}/housekeeping/logout"><img src="{{ url('/') }}/web/housekeeping/images/button_close.gif" alt="Logout"></a>
            </div>
        </div>

        <div class="panel_header">
            <ul {{ $menu == 'dashboard' ? 'class=selected' : '' }} id="item">
                <li class="top">
                    <div style="text-align:center"><a href="#">Dashboard</a></div>
                </li>
                @if (user()->hasPermission('can_access_housekeeping'))
                    <li class="item"><a href="{{ url('/') }}/housekeeping/dashboard" style="width: 100%">Home</a></li>
                @endif
                @if (user()->hasPermission('can_check_updates'))
                    <li class="item"><a href="{{ url('/') }}/housekeeping/updates">Updates</a></li>
                @endif
                <li class="item"><a href="{{ url('/') }}/housekeeping/about">About</a></li>
            </ul>
            <div class="border"></div>

            <ul {{ $menu == 'settings' ? 'class=selected' : '' }} id="item">
                <li class="top">
                    <div style="text-align:center"><a href="#">Settings</a></div>
                </li>
                @if (user()->hasPermission('can_settings_hotel'))
                    <li class="item"><a href="{{ url('/') }}/housekeeping/settings/hotel">Hotel</a></li>
                @endif
                @if (user()->hasPermission('can_settings_site'))
                    <li class="item"><a href="{{ url('/') }}/housekeeping/settings/site">Site</a></li>
                @endif
            </ul>
            <div class="border"></div>

            <ul {{ $menu == 'tools' ? 'class=selected' : '' }} id="item">
                <li class="top">
                    <div style="text-align:center"><a href="#">tools</a></div>
                </li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/banners">banners</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/campaigns">
                        campaigns</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/catalogue">
                        catalogue</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/collectables">
                        collectables</a>
                </li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/faq">faq</a>
                </li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/news">news</a>
                </li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/newsletter">
                        newsletter</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/recommended">
                        recommended</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/vouchers">
                        vouchers</a></li>
            </ul>
            <div class="border"></div>
            <ul {{ $menu == 'users' ? 'class=selected' : '' }} id="item">
                <li class="top">
                    <div style="text-align:center"><a href="#">users</a></div>
                </li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/users">users</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/bans">bans</a>
                </li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/alerts">alerts</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/help">help</a>
                </li>
            </ul>
            <div class="border"></div>
            <ul {{ $menu == 'logs' ? 'class=selected' : '' }} id="item">
                <li class="top">
                    <div style="text-align:center"><a href="#">Logs</a></div>
                </li>

                @if (user()->hasPermission('can_check_logs'))
                    <li class="item"><a href="{{ url('/') }}/housekeeping/roomlogs">Room</a></li>
                @endif
                <li class="item"><a href="{{ url('/') }}/housekeeping/consolelogs">Console</a></li>
                <li class="item"><a href="{{ url('/') }}/housekeeping/stafflogs">Staff</a></li>
            </ul>
        </div>
        <div class="clear"></div>


        <div class="topborder"></div>
        @yield('content')

        <div class="page_footer">
            <div class="buttons">

                <input type="button" class="footer_button" value="Home page" onclick="window.location.href='{{ url('/') }}/'"></input>
            </div>
        </div>
        {{--
            <?php /*@@* DO NOT EDIT OR REMOVE THE LINE BELOW WHATSOEVER! *@@ You ARE allowed to remove the links though*/ ?>
            <div class="copylight">Powered by <a href="http://www.phpretro.com/">PHPRetro</a><br />Housekeeping design &copy; 2009 <a href="http://www.ukumo.com/">xsixteen</a>, <a href="http://pixelarts.habbohack.servegame.org">Tsuka</a><br /><copyright.habbo</div>
            <?php /*@@* DO NOT EDIT OR REMOVE THE LINE ABOVE WHATSOEVER! *@@ You ARE allowed to remove the links though*/ ?>
            --}}
    </div>

</body>

</html>
