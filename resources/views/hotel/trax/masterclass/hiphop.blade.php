@extends('layouts.master', ['menuId' => '2', 'submenuId' => '38', 'headline' => true])

@section('title', 'Hip-Hop')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 208px; height: 400px;" class="habboPage-col">
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'hiphop'])
                                    @foreach (boxes('hotel.trax.masterclass.hiphop', 1) as $box)
                                        <div class="v3box {{ $box->color }}">
                                            <div class="v3box-top">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="v3box-content">
                                                <div class="v3box-body">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="v3box-bottom">
                                                <div></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Hip-Hop</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p align="center">
                                                                    <img vspace="15" hspace="0" border="0" align="middle" src="{{ url('/') }}/c_images/album1895/tm_room_hiphop_001.gif" alt=""><br>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br>
                                                                <img vspace="5" hspace="5" border="0" align="left" src="{{ url('/') }}/c_images/album1395/bling.gif" alt="">
                                                                Hip-hop was born in late 1970s and early 1980s
                                                                mainly in the New York Bronx. Artists like Africa
                                                                Bambaata, Grandmaster Flash and The Sugar
                                                                Hill Gang were influental with their tracks Planet Rock, Rapper's
                                                                Delight and Adventures on Wheels of Steel. <br>
                                                                <p></p>
                                                                <p>Hip-hop started out as
                                                                    underground music movement but rapidly (with help of MTV) grew into a
                                                                    worldwide phenomenon.<br><br>

                                                                    Hip-hop was one of the first music genres to use sampling - taking
                                                                    snippets of already released music. In 80s this was still very
                                                                    common, but in the early 90s sampling required copyright clearance.
                                                                    Many hip-hop producers still use the old Akai samplers to create
                                                                    their grooves. Hip-hop music is usually slowish in tempo, with simple
                                                                    programming and heavily reliant on vocal performance and clever sampling.<br><br>

                                                                    Hip-hop culture is also closely related to breakdancing, graffiti
                                                                    and beatboxing. Today some of the most succesful Hip-Hop artists are
                                                                    Eminem, 50 Cent, Dr. Dre, Busta Rhymes, Jay Z and P. Diddy.</p>
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><a
                                                                    href="{{ url('/') }}/c_images/album949/clubrnb_trax.gif"><img
                                                                        vspace="10" hspace="10" border="0" src="{{ url('/') }}/c_images/album1390/club_rnb_200x131.gif"
                                                                        alt=""></a>
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/clubrnb_trax.gif"
                                                                        target="_self">Click here to see the full track and recreate it yourself</a><br></p>
                                                                <p>&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:</span><br>
                                                                    <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif" style="width: 8px; height: 8px;"
                                                                        alt="">
                                                                    Ferry Nultado<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif" alt="">
                                                                    MnM<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_green.gif" alt="">
                                                                    Boy Band Sensation<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_blue.gif" alt="">
                                                                    Cameron's Ex<br><br> Listen here <a
                                                                        href="{{ url('/') }}/c_images/album2354/traxexample9_moodyrnb.mp3"><img
                                                                            vspace="0" hspace="0" border="0" align="absmiddle"
                                                                            src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Buy Here Now!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0"><img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_19_small.png" alt=""> <b>MnM</b><br>
                                                                <div id="purchase_3" class="purchase-component">
                                                                    MnM costs 5 coins. To get more coins, please visit the <a href="/web/20071012043837/http://habbo.com/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_3_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_3_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"http://images.habbohotel.com/habboweb/16/11/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_19"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td><br></td>
                                                            <td height="68" bgcolor="#c0c0c0"><img vspace="0" hspace="5" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_14_small.png" alt=""> <b>Cameron's Ex</b><br>
                                                                <div id="purchase_4" class="purchase-component">
                                                                    Cameron's Ex costs 5 coins. To get more coins, please visit the <a
                                                                        href="/web/20071012043837/http://habbo.com/credits">Coin pages</a><br>
                                                                    <span id="purchase_4_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_4_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"http://images.habbohotel.com/habboweb/16/11/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_14"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div> <br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_16_small.png" alt=""><b> Ferry Nultado</b><br><span
                                                                    style="font-weight: 400;">
                                                                    <div id="purchase_5" class="purchase-component">




                                                                        Ferry Nultado costs 5 coins. To get more coins, please visit the <a
                                                                            href="/web/20071012043837/http://habbo.com/credits">Coin pages</a><br>
                                                                        <span id="purchase_5_purchase"></span>
                                                                        <script language="JavaScript">
                                                                            var purchaseButton = Builder.node("a", {
                                                                                href: "#",
                                                                                className: "colorlink orange"
                                                                            }, [Builder.node("span", "Purchase")]);
                                                                            $("purchase_5_purchase").appendChild(purchaseButton);
                                                                            Event.observe(purchaseButton, "click", function(e) {
                                                                                Event.stop(e);
                                                                                var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                                appendDialogBody(dialog,
                                                                                    "<p style=\"text-align:center\"><img src=\"http://images.habbohotel.com/habboweb/16/11/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                    true);
                                                                                moveDialogToCenter(dialog);
                                                                                showOverlay();
                                                                                new Ajax.Request(
                                                                                    habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                        method: "post",
                                                                                        parameters: "product=" + encodeURIComponent("A0 sound_set_16"),
                                                                                        onComplete: function(req, json) {
                                                                                            setDialogBody(dialog, req.responseText);
                                                                                        }
                                                                                    }
                                                                                );
                                                                            }, false);
                                                                        </script>
                                                                    </div>
                                                                </span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td rowspan="2" style="width: 4px;"></td>
            </tr>
        </tbody>
    </table>
@stop
