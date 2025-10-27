<!doctype html>
<html lang="en">
<style>
    table {
        font-size: 11px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        text-align: left;
    }

    p {
        padding: 0
    }

    #preview-response a, a {
        color: #f16100;
        font-weight: bold;
    }

    #preview-response a:link,
    #preview-response a:hover,
    #preview-response a:visited,
    #preview-response a:active {
    }

    .process-button,
    #preview-response .process-button {
        padding: 2px 8px;
        font-size: 12px;
        background-color: #FC6303;
        border: 2px solid black;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        text-decoration: none;
        text-rendering: auto;
        letter-spacing: normal;
        word-spacing: normal;
        line-height: normal;
        text-indent: 0px;
        text-shadow: none;
        display: inline-block;
        text-align: start;
        margin: 0em;
        padding: 1px 0px;
        border-width: 2px;
        border-style: inset;
        border-image: initial;
        padding-block: 1px;
        padding-inline: 2px;
        appearance: auto;
        user-select: none;
        align-items: flex-start;
        text-align: center;
        box-sizing: border-box;
        white-space: pre;
        padding-block: 1px;
        padding-inline: 6px;
        border-width: 2px;
    }
</style>
<table background="{{ url('/') }}/web/images/bg_patterns/habbo.gif" bgcolor="#e8eaed" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        <tr height="25px">
            <td align="center" valign="top" style="position: relative;"></td>
        </tr>
        <tr>
            <td align="center" valign="top" style="position: relative;">
                <!-- top -->
                <table width="736" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                        <td align="center" valign="top" background="{{ url('/') }}/web/images/mail/top.gif"
                            style="height:79px;max-height: 79px;min-height: 79px; background-repeat:no-repeat; background-position:center; background-size:cover; text-align:center;">
                            <img src="{{ url('/') }}/web/images/logos/habbo_logo_nourl.gif" alt="Logo" width="160"
                                style="display:block; margin-top: 11px; margin-left: 33px;">
                        </td>
                    </tr>
                </table>
                <!-- body -->
                <table width="736" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                        <td align="center" valign="top" background="{{ url('/') }}/web/images/mail/outer-body.gif">
                            <!-- headline -->
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="9"></td>
                                </tr>
                                <tr>
                                    <td width="718" height="30" align="center" valign="top" background="{{ url('/') }}/web/images/mail/headline.gif"></td>
                                </tr>
                            </table>
                            <!-- content -->
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="718" background="{{ url('/') }}/web/images/mail/content.gif">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="padding: 9px">
                                                    @yield('content')
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                            <!-- bottom -->
                            <table width="718" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td height="5px" align="center" valign="top" background="{{ url('/') }}/web/images/mail/content-bottom.gif"
                                        style="height:5px;max-height: 5px;min-height: 5px; background-repeat:no-repeat;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                {{--
                <div id="footer">
                    <div id="footer-top">
                        <div id="footer-content">© {{ date('Y') }} Sulake Corporation Ltd. HABBO is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the
                            People's Republic of China and various other jurisdictions. All rights reserved.</div>
                    </div>
                    <div id="footer-bottom">
                        <div id="footer-bottom-content"></div>
                    </div>
                </div>
                --}}
                <!-- bottom -->
                <table width="736" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                        <td align="center" height="9px" valign="top" background="{{ url('/') }}/web/images/mail/outer-bottom.gif"
                            style="height:9px;max-height: 9px;min-height: 9px; background-repeat:no-repeat;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="25px">
            <td align="center" valign="top" style="position: relative;"></td>
        </tr>
    </tbody>
</table>

</html>
