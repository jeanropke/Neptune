<!doctype html>
<html lang="en">

<head>
    <title>Habbo Help Tool</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <link href="{{ cms_config('site.web.url') }}/iot/styles/style.css" type="text/css" rel="stylesheet">
    <link href="{{ cms_config('site.web.url') }}/iot/styles/style-iot.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div id="">
        <table id="" border="0" cellpadding="0" cellspacing="0" width="720">
            <tbody>
                <tr>
                    <td style="background: url({{ cms_config('site.web.url') }}/iot/images/process/top_left.gif) no-repeat; width: 8px; height: 77px;">
                        &nbsp;</td>
                    <td style="background: url({{ cms_config('site.web.url') }}/iot/images/process/top_mid.gif) repeat-x;" valign="top">
                        <div style="margin: 0; padding: 10px 0 0 27px; height: 67px;"><img src="{{ url('/') }}/c_images/WebLogos/habbo_logo_br.gif">
                        </div>
                    </td>
                    <td style="background: url({{ cms_config('site.web.url') }}/iot/images/process/top_header_left.gif) no-repeat; width: 3px; height: 77px;">
                    </td>
                    <td style="background: url({{ cms_config('site.web.url') }}/iot/images/process/top_header_mid.gif) repeat-x; height: 77px;">
                        <div style="height: 43px; padding: 31px 0 0 4px; margin: 0; color: #fff; text-transform: uppercase; font-weight: bold; display: block;">
                            Habbo Help Tool</div>
                    </td>
                    <td style="background: url({{ cms_config('site.web.url') }}/iot/images/process/top_header_mid.gif) repeat-x; height: 54px; padding: 23px 0 0 0;" align="right"
                        valign="top"></td>
                    <td style="background: url({{ cms_config('site.web.url') }}/iot/images/process/top_right.gif) no-repeat; width: 26px; height: 77px;">
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
                    @if(!isset($no_faq))
                    <b>Remember that the answers to the most common questions from {{ cms_config('hotel.name.short') }}s and their parents are already available in our <a
                            href="{{ url('/') }}/help">Frequently
                            Asked Questions (FAQs)</a>.
                        If the answer to your email is included there, the Customer Support Team will not reply to your message in order to prioritize other matters.
                    </b>
                    <br>
                    <br>
                    @endif
                    @yield('content')
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
