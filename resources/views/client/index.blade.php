<!DOCTYPE html>

<html xmlns="XHTML namespace">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>{{ cms_config('hotel.name.short') }} ~ Client</title>
    <link href="{{ url('/') }}/web/styles/style.css" type="text/css" rel="stylesheet" />

    <script language="JavaScript" type="text/javascript">
        var habboClient = true;
        var habboReqPath = "{{ url('/') }}";
        var habboStaticFilePath = "{{ url('/') }}/web";
        document.habboLoggedIn = {{ Auth::check() }};
    </script>
    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/prototype.js"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/effects.js"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/habbo.js"></script>


    <script>
        Ajax.Responders.register({
            onCreate: function(request) {
                request.options.requestHeaders = request.options.requestHeaders || {};
                request.options.requestHeaders['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
            }
        });
    </script>

    <script language="JavaScript" type="text/javascript">
        window.onload = resizeWin;
        window.onerror = function() {
            return true;
        };
        window.onunload = clearOpener;
        ensureOpenerIsLoggedIn();
        addClientUnloadHook();
        Event.observe(document, "keypress", function(e) {
            if (e.keyCode == Event.KEY_BACKSPACE) {
                Event.stop(e);
            }
        });
    </script>

    <!--[if IE]>
   <link href="{{ url('/') }}/web/styles/ie-all.css" type="text/css" rel="stylesheet" />
   <![endif]-->
    <!--[if lt IE 7]>
   <link href="{{ url('/') }}/web/styles/ie6.css" type="text/css" rel="stylesheet" />
   <![endif]-->
    <link href="{{ url('/') }}/web/styles/styles/style_custom_default.css" type="text/css" rel="stylesheet" />
    <meta name="build" content="{{ config('app.version') }} - {{ config('app.build') }} - {{ config('app.locale') }}" />
</head>

<body id="client">
    <div id="client-topbar" style="display:none">
        <div class="logo"><img src="{{ url('/') }}/web/images/popup/popup_topbar_habbologo.gif" alt="" align="middle" /></div>
        <div class="habbocount">
            <div id="habboCountUpdateParent">
                @if (is_hotel_online())
                    <span id="habboCountUpdateTarget">{{ emu_config('players.online') }}</span>
                    {{ trans_choice('master.hotel_online', emu_config('players.online'), ['count' => '', 'short_name' => cms_config('hotel.name.short')]) }}
                @else
                    {{ trans('master.hotel_offline') }}
                @endif

            </div>
            <script language="JavaScript" type="text/javascript">
                HabboCounter.init(600);
            </script>
        </div>
        <div class="logout">
            @auth
                <a href="{{ url('/') }}/account/disconnected?origin=popup">logout</a>
            @endauth
            @guest
                <a href="#" onclick="javascript:window.close(); return false;">close</a>
            @endguest
        </div>
    </div>
    <div>
        <object classid="clsid:166B1BCA-3F9C-11CF-8075-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=10,8,5,1,0" id="habbo"
            width="720" height="540">
            <param name="src" value="{{ cms_config('connection.mus.host') }}">
            <param name="swRemote"
                value="swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Themehotel' swContextMenu='true' ">
            <param name="swStretchStyle" value="none">
            <param name="swText" value="">
            <param name="bgColor" value="#000000">
            <param name="sw6" value="{{ Auth::check() ? 'use.sso.ticket=1;sso.ticket=' . user()->setAuthTicket() : 'use.sso.ticket=0' }}">
            <param name="sw2" value="connection.info.host={{ cms_config('connection.info.host') }};connection.info.port={{ cms_config('connection.info.port') }}">
            <param name="sw4" value="connection.mus.host={{ cms_config('connection.mus.host') }};connection.mus.port={{ cms_config('connection.mus.port') }}">
            <param name="sw3" value="client.reload.url={{ url('/') }}/account/reauthenticate?page=/client">
            <param name="sw1" value="site.url={{ url('/') }};url.prefix={{ url('/') }}">
            <param name="sw5" value="external.variables.txt={{ cms_config('external.variables.txt') }};external.texts.txt={{ cms_config('external.texts.txt') }}">
            <!--[if IE]>You need Shockwave plugin (free and safe to download) in order to enter Habbo Hotel. <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/how_to_get_started'>Read more >></a><![endif]-->

            <object classid="clsid:166B1BCA-3F9C-11CF-8075-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=10,8,5,1,0" id="habbo" width="720" height="540">
            <embed src="{{ cms_config('habbo.dcr.url') }}" bgColor="#000000" width="720" height="540"
            swRemote="swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true'"
            swStretchStyle="none" swText="" type="application/x-director" pluginspage="https://www.macromedia.com/shockwave/download/" sw6="{{ Auth::check() ? 'use.sso.ticket=1;sso.ticket=' . user()->setAuthTicket() : 'use.sso.ticket=0' }}"
            @if ($shortcut == 'roomomatic') sw9="shortcut.id=1;account_id={{ user()->username }}"
            @elseif(isset($forwardId) && isset($roomId))
            sw9="forward.type={{ $forwardId }};forward.id={{ $roomId }};processlog.url=" @endif

   {{-- count($this->forwardData) == 2 ? "sw9="forward.type=2;forward.id=1146;processlog.url="" :''; --}}
   {{-- isset($_GET['shortchut']) && $_GET['shortchut'] == 'roomomatic" ? "sw9="shortcut.id=1;account_id=".$this->habbo->get_habboName()."')" :	""; --}}




     sw2="connection.info.host={{ cms_config('connection.info.host') }};connection.info.port={{ cms_config('connection.info.port') }}"
     sw4="connection.mus.host={{ cms_config('connection.mus.host') }};connection.mus.port={{ cms_config('connection.mus.port') }}"
     sw3="client.reload.url={{ url('/') }}/account/reauthenticate?page=/client"
     sw1="site.url={{ url('/') }};url.prefix={{ url('/') }}"
     sw5="external.variables.txt={{ cms_config('external.variables.txt') }};external.texts.txt={{ cms_config('external.texts.txt') }}">
    </embed>
    <noembed>You need Shockwave plugin (free and safe to download) in order to enter Habbo Hotel. <a href="{{ url('/') }}/hotel/welcome_to_habbo_hotel/how_to_get_started">Read more >></a></noembed>
   </object>
  </div>
 </body>
</html>
