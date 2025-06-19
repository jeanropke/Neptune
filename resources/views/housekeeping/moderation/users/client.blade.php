<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <title>Habbo ~ Client</title>
    <link rel="shortcut icon" href="{{ URL::asset('/web/images/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/web/styles/habboflashclient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/web/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/web/styles/habboclient.css') }}">

    <script type="text/javascript" src="/web/js/prototype.js"></script>
    <script type="text/javascript" src="/web/js/effects.js"></script>

    <script type="text/javascript" src="/web/js/swfobject.js"></script>
    <script type="text/javascript" src="/web/js/habboclient.js"></script>
    <script type="text/javascript" src="/web/js/visual.js"></script>
    <script type="text/javascript">
        var flashvars = {
            "avatareditor.promohabbos": "https://www.habbo.com/api/public/lists/hotlooks",
            "flash.client.origin": "popup",
            "client.cache.override": "{{ cms_config('client.cache.override') }}",
            "client.notify.cross.domain": "1",
            "connection.info.host": "{{ cms_config('client.emulator.ip') }}",
            "connection.info.port": "{{ cms_config('client.emulator.port') }}",
            "site.url": "/",
            "url.prefix": "{{ cms_config('client.gamedata.prefix') }}",
            "url.ugc": "{{ url('/') }}/ugc",
            "url.badge_base": "/",
            "client.reload.url": "/client",
            "client.fatal.error.url": "/client",
            "client.connection.failed.url": "/client",
            "logout.disconnect.url": "/client/disconnected",
            "external.variables.txt": "{{ cms_config('client.external.vars') }}?{{ cms_config('client.cache.override') }}",
            "external.texts.txt": "{{ cms_config('client.external.texts') }}?{{ cms_config('client.cache.override') }}",
            "external.figurepartlist.txt": "{{ cms_config('client.gamedata.prefix') }}/gamedata/figuredata.xml?{{ cms_config('client.cache.override') }}",
            "external.override.texts.txt": "{{ cms_config('client.external.texts.override') }}?{{ cms_config('client.cache.override') }}",
            "external.override.variables.txt": "{{ cms_config('client.external.vars.override') }}?{{ cms_config('client.cache.override') }}",
            "productdata.load.url": "{{ cms_config('client.gamedata.prefix') }}gamedata/productdata.txt?{{ cms_config('client.cache.override') }}",
            "client.starting.revolving":"Quando voc\u00EA menos esperar...terminaremos de carregar...\/Carregando mensagem divertida! Por favor espere.\/Voc\u00EA quer batatas fritas para acompanhar?\/Siga o pato amarelo.\/O tempo \u00E9 apenas uma ilus\u00E3o.\/J\u00E1 chegamos?!\/Eu gosto da sua camiseta.\/Olhe para um lado. Olhe para o outro. Pisque duas vezes. Pronto!\/N\u00E3o \u00E9 voc\u00EA, sou eu.\/Shhh! Estou tentando pensar aqui.\/Carregando o universo de pixels.",
            @if($user->rank > 5)
            "furnidata.load.url": "{{ cms_config('client.gamedata.prefix') }}gamedata/furnidata_staff.xml?{{ cms_config('client.cache.override') }}",
            @else
            "furnidata.load.url": "{{ cms_config('client.gamedata.prefix') }}gamedata/furnidata.xml?{{ cms_config('client.cache.override') }}",
            @endif
            "sso.ticket": "{{ $user->setAuthTicket() }}",
            "account_id": "{{ $user->id }}",
            "client.allow.cross.domain": "1",
            "unique_habbo_id": "{{ $user->id }}",
            "flash.client.url": "{{ cms_config('client.swf.folder') }}",
            "user.hash": "",
            "supersonic_custom_css": "{gallery_url}}/web-img/css/sonic.css",
            "client.starting": "Por favor aguarde! O { setting.hotel_name }} está carregando...",
            "supersonic_application_key": "2abb40ad",
            "has.identity": "1",
            "landing.view.style":"default"
        };
    </script>


    <script type="text/javascript">
        var params = {
            "base": "{{ cms_config('client.swf.folder') }}",
            "allowScriptAccess": "always",
            "menu": "false",
            "wmode": "opaque"
        };
        swfobject.embedSWF('{{ cms_config('client.swf.file') }}?{{ cms_config('client.cache.override') }}', 'flash-container', '100%', '100%', '11.1.0', '/web-img/swf/expressInstall.swf', flashvars, params, null);
    </script>

</head>

<body class="flashclient" id="client" style="margin: 0">

    @if(cms_config('hotel.client.online_users'))
    <style>
        body.flashclient {
            height: calc(100% - 29px);
        }
    </style>
    <div id="client-topbar">
        <div class="logo"><img src="{{ url('/') }}/web/images/popup/popup_topbar_habbologo.gif" alt="" align="middle" />
        </div>
        <div class="habbocount">
            <div id="habboCountUpdateParent">
                <span id="habboCountUpdateTarget">0</span> {{ cms_config('hotel.name.short') }}s online
            </div>
            <script language="JavaScript" type="text/javascript">
                setTimeout(function () {
                HabboCounter.init(10); //600 = 10min
            }, 1);

            </script>
        </div>
        <div class="logout"><a href="#" onclick="self.close(); return false;">Close Hotel</a></div>
    </div>
    @endif
    <div id="client-ui">
        <div id="flash-wrapper">
            <div id="flash-container">
                <div id="page-container">
                    <div id="header-container">
                        <div
                            style="margin: 0 auto; padding-top: 44px; background: url({{ url('/') }}/web/images/logos/habbo_logo_nourl.gif) center no-repeat; width: 160px; height: 66px;">
                        </div>
                    </div>
                    <div id="maintenance-container">
                        <div id="content-container">
                            <div id="inner-container">
                                <div id="left_col">
                                    <!-- bubble -->
                                    <div class="bubble">
                                        <div class="bubble-body">
                                            <img src="{{ url('/') }}/web/images/maintenance/alert_triangle.gif"
                                                width="30" height="29" alt="" border="0" align="left"
                                                class="triangle" />
                                            <b>I think you hit the wrong switch, Greggers! All of just vanished!</b>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="bubble-bottom">

                                        <div class="bubble-bottom-body">
                                            <img src="{{ url('/') }}/web/images/maintenance/bubble_tail_left.gif" alt=""
                                                width="22" height="31" />
                                        </div>
                                    </div>
                                    <!-- \bubble -->

                                    <img src="{{ url('/') }}/web/images/maintenance/frank_habbo_down.gif" width="57"
                                        height="87" alt="" border="0" />

                                </div>

                                <div id="right_col">

                                    <!-- bubble -->
                                    <div class="bubble">
                                        <div class="bubble-body">
                                            <!--Oh, calm down Frank. We're just working on something quick and had we took the website down to work on. Just check back again in a little while to see if we're back up. -->
                                            Oh, calm down Frank. The Flash Player needs be allowed in order to play
                                            {{ cms_config('hotel.name.short') }} Hotel.
                                            <a href="https://get.adobe.com/flashplayer" target="_blank">Enable
                                                Flash</a>.

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="bubble-bottom">

                                        <div class="bubble-bottom-body">
                                            <img src="{{ url('/') }}/web/images/maintenance/bubble_tail_left.gif" alt=""
                                                width="22" height="31" />
                                        </div>
                                    </div>
                                    <!-- \bubble -->

                                    <img src="{{ url('/') }}/web/images/maintenance/workman_habbo_down.gif" width="125"
                                        height="118" alt="" border="0" />

                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="footer-container"></div>
                </div>
            </div>
        </div>
        <div id="content" class="client-content"></div>

    </div>

</body>

</html>
