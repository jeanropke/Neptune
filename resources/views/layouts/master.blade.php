<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <title>{{ cms_config('hotel.name.short') }} ~ @yield('title')</title>
    <link href="{{ cms_config('site.web.url') }}/styles/style.css" type="text/css" rel="stylesheet" />
    <link href="{{ cms_config('site.web.url') }}/styles/ads.css" type="text/css" rel="stylesheet" />
    <link href="{{ cms_config('site.web.url') }}/styles/boxes.css" type="text/css" rel="stylesheet" />
    <link href="{{ cms_config('site.web.url') }}/styles/voltericons.css" type="text/css" rel="stylesheet" />

    <link rel="icon" href="{{ cms_config('site.web.url') }}/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{ cms_config('site.web.url') }}/images/favicon.ico" type="image/x-icon">

    <script language="JavaScript" type="text/javascript">
        var habboReqPath = "{{ url('/') }}";
        var habboStaticFilePath = "/web/";
        var habboImagerUrl = "/habbo-imaging/";
        document.habboLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
        window.name = "habboMain";
    </script>
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
    <script>
        window.RufflePlayer = window.RufflePlayer || {};
        window.RufflePlayer.config = {
            "autoplay": "on",
            "unmuteOverlay": "hidden",
            "splashScreen": false,
            "allowScriptAccess": true,
            "playerVersion": 11,
            "quality": "low",
            "logLevel": "info" // trace or debug or info
        };
    </script>
    <script language="JavaScript" type="text/javascript" src="{{ cms_config('site.web.url') }}/js/prototype.js"></script>
    <script language="JavaScript" type="text/javascript" src="{{ cms_config('site.web.url') }}/js/scriptaculous.js?load=effects"></script>
    <script language="JavaScript" type="text/javascript" src="{{ cms_config('site.web.url') }}/js/builder.js"></script>
    <script language="JavaScript" type="text/javascript" src="{{ cms_config('site.web.url') }}/js/habbo.js"></script>
    <script language="JavaScript" type="text/javascript" src="{{ cms_config('site.web.url') }}/js/habbowood.js"></script>
    <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/swfobject.js"></script>

    <script>
        Ajax.Responders.register({
            onCreate: function(request) {
                request.options.requestHeaders = request.options.requestHeaders || {};
                request.options.requestHeaders['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
            }
        });
    </script>
    @if ($menuId == 'profile')
        <link href="{{ cms_config('site.web.url') }}/styles/profile.css" type="text/css" rel="stylesheet" />
    @endif

    <meta name="keywords" content="">
    <meta name="description" content="">


    @if ($menuId == 'home_group')

        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/control.textarea.css" type="text/css" rel="stylesheet" />
        {{-- <!--link href="{{ cms_config('site.web.url') }}/styles/profile.css" type="text/css" rel="stylesheet"/-->
    <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/assets.css" type="text/css" rel="stylesheet" /> --}}
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo-store.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/myhabbo.css" type="text/css" rel="stylesheet" />

        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/myhabbo.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/skins.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/dialogs.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/buttons.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/boxes.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/backgrounds.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/stickers.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/other.css" type="text/css" rel="stylesheet" />
        <link href="{{ cms_config('site.web.url') }}/styles/profile.css" type="text/css" rel="stylesheet" />

        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/inheritance.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/effects.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/dragdrop.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/slider.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo-dialogs.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo-discussions.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo-widgets.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/control.textarea.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/control.textarea.bbcode.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo/myhabbo-noteeditor.js"></script>
        <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo/myhabbo-store.js"></script>

        @if ($menuId == 'home_group')
            <link href="{{ cms_config('site.web.url') }}/styles/grouptabs.css" type="text/css" rel="stylesheet" />
        @endif
        <style type="text/css">
            #playground,
            #playground-outer {
                width: 910px;
                height: 1360px;
            }
        </style>


        @if ($body == 'editmode')
            <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/myhabbo-edit.js"></script>
        @endif
    @endif

    @isset($submenuType)
        @if ($submenuType == 'collectibles')
            <link href="{{ cms_config('site.web.url') }}/styles/collectibles.css" type="text/css" rel="stylesheet" />
            <script type="text/javascript" src="{{ cms_config('site.web.url') }}/js/collectibles.js"></script>
        @endif
    @endisset

    <meta name="build"
        content="{{ config('cms.name') }} v{{ config('cms.version') }} - [{{ config('cms.title') }}] - {{ config('cms.stable') }} - {{ config('cms.build') }}" />
</head>
<style>
    body {
        background-image: url({{ cms_config('site.style.background') }});
    }

    #top {
        background-image: url({{ cms_config('site.style.hotelview') }});
    }

    #top-elements #enter-hotel a#enter-hotel-link {
        background-image: url({{ cms_config('site.style.enter') }});
    }
</style>

<body id="{{ isset($body) != null ? $body : 'home' }}">
    <div id="overlay"></div>
    <h1 id="main-header">{{ cms_config('hotel.name.short') }}</h1>

    <div id="wrapper">
        <div id="ad-leader-container" align="center"></div>

        <div id="top_wrap">
            <div id="top">
                <div id="topdim"></div>
                <div id="top-elements">
                    <table id="topbar">
                        <tr>
                            <td id="topbar-count">
                                @if (is_hotel_online())
                                    {{ trans_choice('master.hotel_online', emu_config('players.online'), ['count' => emu_config('players.online'), 'short_name' => cms_config('hotel.name.short')]) }}
                                @else
                                    {{ trans('master.hotel_offline') }}
                                @endif
                            </td>
                            <td id="topbar-menu" align="center">
                                <ul>
                                    <li id="myhabbo" class="selected" onmouseover="switchTab('myhabbo')">
                                        <div><a href="/" class="topbar-menu-link"
                                                onclick="return false;">{{ trans('master.my_habbo', ['short_name' => cms_config('hotel.name.short')]) }}</a>
                                        </div>
                                    </li>
                                    <li id="mycredits" onmouseover="if (switchTab('mycredits') && document.habboLoggedIn) updateCredits()" onmouseout="fadeTab('myhabbo')">
                                        <div><a href="/credits" class="topbar-menu-link" onclick="return false;">{{ trans('master.my_credits') }}</a></div>
                                    </li>
                                    <li id="habboclub" onmouseover="if (switchTab('habboclub') && document.habboLoggedIn) updateHabboClub()" onmouseout="fadeTab('myhabbo')">
                                        <div><a href="/club" class="topbar-menu-link" onclick="return false;">
                                                {{ trans('master.habbo_club', ['short_name' => cms_config('hotel.name.short')]) }}</a></div>
                                    </li>
                                </ul>
                            </td>
                            @auth
                                <td id="topbar-status" class="loggedin">
                                    {{ trans('master.welcome', ['name' => user()->username]) }}
                                </td>
                            @endauth
                            @guest
                                <td id="topbar-status" class="notloggedin">
                                    {{ trans('master.not_logged_in', ['short_name' => cms_config('hotel.name.short')]) }}
                                </td>
                            @endguest
                        </tr>
                    </table>
                    <div id="habbologo"><a href="/"></a></div>
                    <div id="enter-hotel">
                        <a href="/client" id="enter-hotel-link" target="client" onclick="openOrFocusHabbo(this); return false;"></a>
                    </div>
                    <div id="tabmenu" onmouseover="lockCurrentTab();" onmouseout="fadeTab('myhabbo')">
                        <div id="tabmenu-content">
                            <div id="myhabbo-content" class="tabmenu-inner selected">
                                @auth
                                    <img src="{{ cms_config('site.avatarimage.url') }}{{ user()->figure }}&gesture=sml&action=wav&direction=3&head_direction=3" alt=""
                                        width="64" height="110" class="tabmenu-image">
                                    <h3>{{ trans('master.hello', ['name' => user()->username]) }}</h3>
                                    <div class="tabmenu-inner-content">
                                        @if (user()->hasPermission('can_access_housekeeping'))
                                            <p>
                                                <a href="/housekeeping" class="arrow">
                                                    <span>{{ trans('master.housekeeping') }}</span>
                                                </a>
                                            </p>
                                        @else
                                            <p>
                                                <a href="/client" class="arrow" target="client" onclick="openOrFocusHabbo(this); return false;">
                                                    <span>{{ trans('master.enter_hotel') }}</span>
                                                </a>
                                            </p>
                                        @endif
                                        <p>
                                            <a href="/home/{{ user()->username }}" class="arrow">
                                                <span>{{ trans('master.my_home', ['short_name' => cms_config('hotel.name.short')]) }}</span>
                                            </a>
                                        </p>
                                        <p>
                                            <a href="/profile" class="arrow">
                                                <span>{{ trans('master.update_profile') }}</span>
                                            </a>
                                        </p>
                                        <p>
                                            <a href="/account/logout" class="colorlink orange last">
                                                <span>{{ trans('master.logout') }}</span>
                                            </a>
                                        </p>
                                    </div>
                                @endauth
                                @guest
                                    <img src="/web/images/top_bar/myhabbo_frank.gif" alt="" width="60" height="85" class="tabmenu-image" />
                                    <h3>{{ trans('master.welcome_signin') }}</h3>
                                    <div class="tabmenu-inner-content">
                                        @php
                                            $page = ltrim(request()->getRequestUri(), '/');
                                            if (strlen($page) > 0) {
                                                $page = urlencode($page);
                                                $page = "?page=/$page";
                                            }
                                        @endphp
                                        <p>
                                            <a href="{{ route('auth.login') . $page }}" class="colorlink orange"><span>{{ trans('master.register_now') }}</span></a>
                                        </p>
                                        <p>
                                            <a href="{{ route('auth.login') . $page }}" class="colorlink orange last"><span>{{ trans('master.signin') }}</span></a>
                                        </p>
                                    </div>
                                @endguest
                            </div>
                            <div id="mycredits-content" class="tabmenu-inner">
                                <div id="credits-status">
                                    @include('includes.topbar.credits')
                                </div>
                            </div>
                            <div id="habboclub-content" class="tabmenu-inner">
                                <div id="habboclub-status">
                                    @include('includes.topbar.habboclub')
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="tabmenu-bottom"></div>
                    </div>
                </div>
                <script language="JavaScript" type="text/javascript">
                    $("tabmenu").style.left = (Position.cumulativeOffset($("myhabbo"))[0] - Position.cumulativeOffset($("top"))[0]) + "px";
                </script>
                <div id="mainmenu">
                    <ul>
                        <li id="leftspacer">&nbsp;</li>
                        @foreach (cms_menu() as $item)
                            <li {{ $item->id == $menuId ? 'id=active' : '' }} {{ $loop->last ? 'class=last' : '' }}>
                                <span class="left"></span>
                                <a href="{{ url('/') }}/{{ $item->url }}">
                                    <img src="{{ url('/') }}/c_images/navi_icons/{{ $item->icon }}.gif" alt="" />{{ $item->caption }}</a>
                                <span class="right"></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="submenu">
                    <div class="subnav">
                        @foreach (cms_menu($menuId) as $subitem)
                            @if ($subitem->url == trim(request()->path(), '/'))
                                {{ $subitem->caption }}
                            @else
                                <a href="{{ url('/') }}/{{ $subitem->url }}">{{ $subitem->caption }}</a>
                            @endif
                            @if (!$loop->last)
                                |
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div id="main-content">
            @if ((isset($skipHeadline) && !$skipHeadline) || !isset($skipHeadline))
                <div id="page-headline">
                    <div id="page-headline-breadcrums">
                        @isset($breadcrums)
                            @foreach ($breadcrums as $breadcrum)
                                <a href="{{ $breadcrum['url'] }}">{{ $breadcrum['title'] }}</a> »
                            @endforeach
                            @yield('title')
                        @endisset
                    </div>
                    <div id="page-headline-text">@yield('title')</div>
                </div>
            @endif
            @yield('content')
        </div>

        @include('includes.footer')
        <script type="text/javascript" language="JavaScript">
            // $("ad-leader-container").appendChild($("ad-leader"));
        </script>
    </div>

</body>

</html>
