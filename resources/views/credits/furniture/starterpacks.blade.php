@extends('layouts.master', ['menuId' => '4', 'submenuId' => 'credits_furniture', 'headline' => true])

@section('title', 'Starter Packs')

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
                                    @include('credits.furniture.include.menu', ['page' => 'starterpacks'])
                                    @foreach (boxes('credits.furniture.starterpacks', 1) as $box)
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

                                    <div class="v3box orange">
                                        <div class="v3box-top">
                                            <h3>Starter Packs</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img vspace="2" hspace="2" border="0" align="right" style="font-weight: bold;"
                                                    src="{{ url('/') }}/c_images/album108/melt_habbotoday2.gif" alt=""><span style="font-weight: bold;">Looking to get
                                                    started on your very
                                                    first Habbo room? ..or just looking for a sweet deal? You're in the right place! Check it out...<br><br></span>You can log in and
                                                buy the packs
                                                directly off of this page here (they will still pop up in your hand inside the hotel!) or you can simply log in and check the "Deals"
                                                part of the
                                                catalog :)<br>
                                                <br>
                                                <script>
                                                    function purchaseFurnitureResult(code) {
                                                        setDialogBody($("purchase_dialog"),
                                                            "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                            true);
                                                        new Ajax.Request(habboReqPath + "/furnipurchase/purchase", {
                                                            method: "post",
                                                            parameters: "product=" + code,
                                                            onComplete: function(req, json) {
                                                                setDialogBody($("purchase_dialog"), req.responseText);
                                                            }
                                                        });
                                                    }
                                                </script>
                                                <table width="100%" cellspacing="2" cellpadding="3" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">A La Mode<br></td>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Tube Pack<br></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album109/combo_2.gif" alt=""></div><br>
                                                                <div id="purchase_1" class="purchase-component">
                                                                    A La Mode costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_1_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_1_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_mode"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_1" method="post">
                                                                            <input type="hidden" name="purchase_1_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_1_product" value="starter_mode" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album109/combo_4.gif" alt=""></div><br>
                                                                <div id="purchase_2" class="purchase-component">




                                                                    Tube Pack costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_2_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_2_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_tv"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_2" method="post">
                                                                            <input type="hidden" name="purchase_2_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_2_product" value="starter_tv" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Living Green<br></td>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Home, Sweet, Home<br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/deal03.gif" alt=""></div><br><br>
                                                                <div id="purchase_3" class="purchase-component">




                                                                    Living Green costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
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
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_green"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_3" method="post">
                                                                            <input type="hidden" name="purchase_3_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_3_product" value="starter_green" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/livingroomdeal2.gif" alt=""></div><br>
                                                                <div id="purchase_4" class="purchase-component">




                                                                    Home, Sweet, Home costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
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
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_home"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_4" method="post">
                                                                            <input type="hidden" name="purchase_4_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_4_product" value="starter_home" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Girl Talk<br></td>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Plastic Fantastic<br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/candydeal.gif" alt=""></div><br>
                                                                <div id="purchase_5" class="purchase-component">




                                                                    Girl Talk costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
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
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_candy"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_5" method="post">
                                                                            <input type="hidden" name="purchase_5_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_5_product" value="starter_candy" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/plasticdeal1.gif" alt=""></div><br>
                                                                <div id="purchase_6" class="purchase-component">




                                                                    Plastic Fantastic costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_6_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_6_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_plastic1"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_6" method="post">
                                                                            <input type="hidden" name="purchase_6_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_6_product" value="starter_plastic1" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Sleep In Style</td>
                                                            <td width="50%" align="center" style="background-color: rgb(157, 209, 231); font-weight: bold;">Bachelor Pad<br></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215">
                                                                    <div height="215"><img vspace="0" hspace="0" border="0"
                                                                            src="{{ url('/') }}/c_images/album2643/bedroomdeal.gif" alt=""></div>
                                                                </div><br><br>
                                                                <div id="purchase_7" class="purchase-component">




                                                                    Sleep In Style costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_7_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_7_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_bedroom"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_7" method="post">
                                                                            <input type="hidden" name="purchase_7_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_7_product" value="starter_bedroom" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/kitchendeal.gif" alt=""></div><br>
                                                                <div id="purchase_8" class="purchase-component">




                                                                    Bachelor Pad costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_8_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_8_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web-gallery/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            moveDialogToCenter(dialog);
                                                                            showOverlay();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("starter_kitchen"),
                                                                                    onComplete: function(req, json) {
                                                                                        setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                    <noscript>
                                                                        <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_8" method="post">
                                                                            <input type="hidden" name="purchase_8_task" value="purchase" />
                                                                            <input type="hidden" name="purchase_8_product" value="starter_kitchen" />
                                                                            <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
                                                                            <input type="submit" value="Purchase" class="process-button" />
                                                                        </form>
                                                                    </noscript>


                                                                </div>
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td rowspan="2" style="width: 4px;"></td>
                <td rowspan="2" valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
