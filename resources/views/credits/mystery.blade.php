@extends('layouts.master', ['menuId' => '4', 'submenuId' => '24'])

@section('title', 'Mystery Box')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
    <tbody>
        <tr>
            <td colspan="6" style="height: 4px;"></td>
        </tr>
        <tr>
            <td rowspan="2" style="width: 8px;"></td>
            <td valign="top" style="width: 740px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td align="left" valign="top" style="width: 430px; height: 400px;" class="habboPage-col">
                                <div class="v3box red">
                                    <div class="v3box-top">
                                        <h3>Mystery box</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <img width="200" height="99" border="0" align="right"
                                                style="font-weight: bold;" id="galleryImage"
                                                src="{{ url('/') }}/web/images/pages/gifts.gif" alt="">
                                            <span style="font-weight: bold;">text about mystery box </span>
                                            <p>
                                                <a class="colorlink orange last" onclick="openRedeemBox()"
                                                    id="1"><span>Redeem a box</span></a>
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                            </td>
                            <td align="left" valign="top" style="width: 310px; height: 400px;"
                                class="habboPage-col rightmost">
                                <div class="v3box blue">
                                    <div class="v3box-top">
                                        <h3>Information</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">

                                            <img vspace="0" hspace="0" border="0" align="right"
                                                src="{{ url('/') }}/web/images/credits/habbos_w_credits.gif" alt="">
                                            If you are having problems buying {{ cms_config('hotel.name.short') }} Coins then please use
                                            the <a target="_blank"
                                                href="{{ url('/') }}/help/contact_us">{{ cms_config('hotel.name.short') }}
                                                Help Tool</a> to contact Player Support. <br><br>Make sure you select
                                            the
                                            relevant Payments heading from the drop down list.

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>

                                <div class="ad-scale ad300">
                                    @include('includes.ad300')
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>

            <td rowspan="2" style="width: 4px;"></td>

            <td rowspan="2" valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
function openRedeemBox(){
    var dialog = createDialog("subscription_dialog", "Redeem mystery box", 9001, 0, -1000, closeSubscription);
    appendDialogBody(dialog, "<p style=\"text-align:center\"><img src=\"http://127.0.0.1/web/images/progress_habbos.gif\" alt=\"\" /></p><div style=\"clear\"></div>", true);
    showOverlay();
    new Ajax.Request("http://127.0.0.1/credits/mystery/redeem",{
        method: "post", parameters: { _token: _token }, onComplete: function(req, json) {
            setDialogBody(dialog, req.responseText);
            moveDialogToCenter(dialog);
        }
    });
};
</script>

@stop
