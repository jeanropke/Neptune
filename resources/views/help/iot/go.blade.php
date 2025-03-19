<!doctype html>
<html lang="en">

<head>
    <title>Habbo Help Tool</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <link href="{{ url('/') }}/web/iot/styles/style.css" type="text/css" rel="stylesheet">
    <link href="{{ url('/') }}/web/iot/styles/style-iot.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div id="">
        <table id="" border="0" cellpadding="0" cellspacing="0" width="720">
            <tbody>
                <tr>
                    <td
                        style="background: url({{ url('/') }}/web/iot/images/process/top_left.gif) no-repeat; width: 8px; height: 77px;">
                        &nbsp;</td>
                    <td style="background: url({{ url('/') }}/web/iot/images/process/top_mid.gif) repeat-x;"
                        valign="top">
                        <div style="margin: 0; padding: 10px 0 0 27px; height: 67px;"><img
                                src="{{ url('/') }}/c_images/WebLogos/habbo_logo_br.gif">
                        </div>
                    </td>
                    <td
                        style="background: url({{ url('/') }}/web/iot/images/process/top_header_left.gif) no-repeat; width: 3px; height: 77px;">
                    </td>
                    <td
                        style="background: url({{ url('/') }}/web/iot/images/process/top_header_mid.gif) repeat-x; height: 77px;">
                        <div
                            style="height: 43px; padding: 31px 0 0 4px; margin: 0; color: #fff; text-transform: uppercase; font-weight: bold; display: block;">
                            Ferramenta de Ajuda Habbo</div>
                    </td>
                    <td style="background: url({{ url('/') }}/web/iot/images/process/top_header_mid.gif) repeat-x; height: 54px; padding: 23px 0 0 0;"
                        align="right" valign="top"></td>
                    <td
                        style="background: url({{ url('/') }}/web/iot/images/process/top_right.gif) no-repeat; width: 26px; height: 77px;">
                        &nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="main-content-process">
        <div style="height: 4px;"></div>
        <div style="height: 18px; padding: 0 0 0 12px;">&nbsp;</div>
        <div class="portlet">
            <div class="portlet-top-process">
                <div class="portlet-process-header">&nbsp;</div>
            </div>
            <div class="portlet-body-process">
                <div class="imaindiv">
                    <form method="post" action="go"><input type="hidden" name="sid" value="51">
                        <table border="0" cellspacing="0" cellpadding="0" class="ihead">
                            <tbody>
                                <tr>
                                    <td class="icon"><img
                                            src="{{ url('/') }}/web/iot/header_images/Western2/1.gif"
                                            alt=" " width="47" height="37"></td>
                                    <td class="text">
                                        <h2>What do you need help with?</h2>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <table border="0" cellspacing="0" cellpadding="0" class="content-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="iinfodiv">
                                            To search our FAQs, please type your question here.
                                            <p>If you need help from a real person email our Player Support Team using
                                                the link below.</p>
                                            <p><b>Note: use the link below if you are having problems registering, using
                                                    a new account, or if you need a new password.</b></p><br><br>
                                            <textarea name="text" class="imessageform"></textarea>
                                        </div>
                                        <br>
                                        <div align="center">
                                            <table height="21" border="0" cellpadding="0" cellspacing="0"
                                                class="button">
                                                <tbody>
                                                    <tr>
                                                        <td class="button-left-side"></td>
                                                        <td class="middle"><button type="submit" name="submit"
                                                                class="proceedbutton">Search FAQs</button></td>
                                                        <td class="button-right-side-arrow"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <div class="iinfodiv">

                                            <a href="?event=Continue&amp;sid=51">Email us</a><br>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="portlet-bottom-process"></div>
        </div>
    </div>
    <div id="footer-process">
        <div id="footer-top-process" style="font-size:8px">&nbsp;</div>
        <div id="footer-body-process">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td align="center">© 2006 Sulake Corporation Ltd. HABBO is a registered trademark of Sulake
                            Corporation Oy in the European Union, the USA, Japan, the People's Republic of China and
                            various other jurisdictions. All rights reserved.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="footer-bottom-process">&nbsp;</div>
    </div>
</body>
</html>
