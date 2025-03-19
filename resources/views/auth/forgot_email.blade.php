<!doctype html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>{{ cms_config('hotel.name.short') }} ~ Forgotten password!</title>

    <script language="JavaScript" type="text/javascript">
        var habboReqPath = "http://127.0.0.1/";
        var habboStaticFilePath = "/web/";
        var habboImagerUrl = "/habbo-imaging/";
        document.habboLoggedIn = false;
        window.name = "habboMain";
    </script>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta name="build" content="5.0.18 - 20070906104719 - com">
</head>
<style>
    body {
        text-align: center;
        background-color: #083940;
        background-image: url(/web/images/bg_patterns/habbo.gif);
        margin: 0;
        padding: 0;
        font-size: 11px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        text-align: center;
    }

    #main-header {
        display: none;
    }

    #wrapper {
        margin: 0 auto 9px auto;
        text-align: left;
        width: 928px;
    }

    #process-wrapper {
        text-align: left;
        margin: 9px auto;
        width: 736px;
    }

    #process-header {
        height: 79px;
        background: url(../web/images/process/top-l.gif) no-repeat;
        position: relative;
    }

    #process-header-body {
        height: 79px;
        margin-left: 9px;
        background: url(../web/images/process/top-r.gif) no-repeat top right;
    }

    #process-header-content {
        padding: 5px 20px;
    }

    #habbologo {
        position: relative;
        top: 0;
        left: 0;
        background-image: url(/web/images/logos/habbo_logo_nourl.gif);
        background-repeat: no-repeat;
        height: 66px;
        width: 160px;
    }

    #habbologo a {
        display: block;
        height: 66px;
        width: 160px;
    }

    #outer {
        background: url(/web/images/template/outer-tl.gif) no-repeat;
    }

    #outer-content {
        margin-left: 9px;
        padding: 9px 9px 0 0;
        background: url(/web/images/template/outer-tr.gif) no-repeat top right;
    }

    #process-wrapper {
        text-align: left;
        margin: 9px auto;
        width: 736px;
    }

    div.processbox div.headline {
        position: relative;
        background: url(/web/images/process/headline-l.gif) no-repeat;
        height: 100%;
    }

    div.processbox div.headline-content {
        margin-left: 5px;
        padding: 5px 5px 0 0;
        background: url(/web/images/process/headline-r.gif) no-repeat top right;
    }

    div.processbox div.headline-wrapper {
        background-color: #A43700;
        padding: 1px 1px 2px 1px;
    }

    div.processbox div.headline h2 {
        margin: 0;
        padding: 2px 9px 3px 9px;
        border-top: 2px solid #EE9800;
        font-size: 11px;
        font-family: Verdana;
        background-color: #D75C03;
        color: white;
        text-transform: uppercase;
    }

    div.processbox div.content-top {
        background: #E3E3E3 url(/web/images/process/content-tl.gif) repeat-y;
    }

    div.processbox div.content {
        margin-left: 9px;
        padding: 9px 9px 4px 0;
        background: url(/web/images/process/content-tr.gif) no-repeat top right;
        min-height: 230px;
    }

    img {
        border: 0;
    }

    div.processbox h4 {
        padding-bottom: 1em;
    }

    div.processbox h4 {
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        margin: 0;
    }

    #process-wrapper p,
    #process-wrapper form {
        margin: 0;
    }

    .process-button {
        background-color: #FC6303;
        border: 2px solid black;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        cursor: hand;
        font-size: 11px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        padding: 2px 10px;
        text-decoration: none;
    }

    div.processbox div.content-bottom {
        height: 5px;
        background: url(/web/images/process/content-bl.gif) no-repeat;
    }

    div.processbox div.content-bottom-content {
        height: 5px;
        margin-left: 5px;
        background: url(/web/images/process/content-br.gif) no-repeat top right;
    }

    .clear {
        clear: both;
    }

    #outer-bottom {
        height: 9px;
        background: url(/web/images/template/outer-bl.gif) no-repeat;
    }

    #outer-bottom-content {
        height: 9px;
        margin-left: 9px;
        background: url(/web/images/template/outer-br.gif) no-repeat top right;
    }
</style>

<body id="process">
    <h1 id="main-header">{{ cms_config('hotel.name.short') }}</h1>
    <div id="wrapper">
        <div id="process-wrapper">
            <div id="process-header">
                <div id="process-header-body">
                    <div id="process-header-content">
                        <div id="habbologo"><a href="http://127.0.0.1"></a></div>
                    </div>
                </div>
            </div>
            <div id="outer">
                <div id="outer-content">
                    <div id="accountlist" class="processbox grey">
                        <div class="processbox grey">
                            <div class="headline">
                                <div class="headline-content">
                                    <div class="headline-wrapper">
                                        <h2>&nbsp;</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="content-top">
                                <div class="content">
                                    <img vspace="0" hspace="10" border="0" align="left"
                                        src="http://127.0.0.1/gordon/c_images/album1358/frank_thumbup.gif" alt="">
                                    <h4>Hey there {{ $user->username }}</h4>
                                    <p>Um patinho de borracha nos disse que você precisou mudar a senha da conta {{ cms_config('hotel.name.short') }}
                                        registrada com o seguinte e-mail: {{ $user->mail }}</p>
                                    <br>
                                    <p>O link abaixo perderá a validade em 12 horas, portanto seja rápido!!</p>
                                    <br>
                                    <p>
                                        <a href="{{ $link }}" target="_blank" class="process-button"
                                            id="accountlist-submit"><span>Mudar
                                                senha</span></a>
                                    </p>
                                    <p><a href="{{ $link }}" target="_blank">{{ $link }}</a>
                                    <br>
                                    <p>Você não pediu essa mudança? Ok, pedimos desculpas por essa mensagem. Basta
                                        ignorá-la e a sua senha atual continuará a mesma!</p>
                                    <br>
                                    <p>Até mais!</p>
                                </div>
                            </div>
                            <div class="content-bottom">
                                <div class="content-bottom-content"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="outer-bottom">
                <div id="outer-bottom-content"></div>
            </div>
        </div>
    </div>
</body>

</html>
