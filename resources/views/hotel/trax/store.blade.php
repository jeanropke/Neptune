@extends('layouts.master', ['menuId' => '2', 'submenuId' => '38', 'headline' => true])

@section('title', 'TraxStore')

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
                                    @include('hotel.trax.include.menu', ['page' => 'store'])
                                    @foreach (boxes('hotel.trax.store', 1) as $box)
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
                                            <h3>TRAXSTORE</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p align="center"><img src="{{ url('/') }}/c_images/album2304/Trax_Headline_image_2.gif" alt=""></p>
                                                <img vspace="10" hspace="10" border="0" align="left" src="{{ url('/') }}/c_images/album2304/tm_dancing_habbos_001.gif"
                                                    alt=""> <span style="font-weight: bold;"><br></span>Take your room into the next dimension today with a Traxmachine. Take
                                                advantage of our introductory offer of <span style="font-weight: bold;">only 10 Habbo Coins</span>, with a free Traxpack.<span
                                                    style="font-weight: bold;"></span><br>
                                                <div id="purchase_5" class="purchase-component">




                                                    TraxMachine Starter Pack costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
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
                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                            Dialog.appendDialogBody(dialog,
                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                true);
                                                            Dialog.moveDialogToCenter(dialog);
                                                            Overlay.show();
                                                            new Ajax.Request(
                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                    method: "post",
                                                                    parameters: "product=" + encodeURIComponent("sound_machine_deal"),
                                                                    onComplete: function(req, json) {
                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                    }
                                                                }
                                                            );
                                                        }, false);
                                                    </script>
                                                    <noscript>
                                                        <form action="{{ url('/') }}/hotel/trax/store#purchase_5" method="post">
                                                            <input type="hidden" name="purchase_5_task" value="purchase" />
                                                            <input type="hidden" name="purchase_5_product" value="sound_machine_deal" />
                                                            <input type="hidden" name="__app_key" value="ayECQXVTtikhEfdDsw" />
                                                            <input type="submit" value="Purchase" class="process-button" />
                                                        </form>
                                                    </noscript>


                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Traxpacks - Just 5 Coins Each!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <table width="100%" cellspacing="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_2_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><b><u>DJ
                                                                        Fuse's </u></b><u><b>Habbo Theme</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Habbo_Theme.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                A collection of rocking party sounds<br><br>
                                                                <b>Price: </b><span style="font-weight: bold;">5 Credits</span><b>&nbsp;</b><br>
                                                                <div id="purchase_6" class="purchase-component">
                                                                    DJ Fuse's Habbo Theme costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
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
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_2"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_18_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><b><u>Little Tanga Beach</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Little_Tanga_Beach.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Brazilian rhythms<br><br><b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_7" class="purchase-component">
                                                                    Little Tanga Beach costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
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
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_18"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_3_small.png" alt="">
                                                            </td>
                                                            <td width="600"><u><b>BattleBall Theme</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/BattleBall_Theme.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                8bit music madness<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_8" class="purchase-component">
                                                                    Snow Storm Theme costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
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
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_3"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_4_small.png" alt="">
                                                            </td>
                                                            <td width="672"><u><b>Sunset Adventures</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Sunset_Adventures.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a><br>
                                                                For chilling moments<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_9" class="purchase-component">
                                                                    Sunset Adventure costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_9_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_9_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_4"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_5_small.png" alt="">
                                                            </td>
                                                            <td width="600" bgcolor="#c0c0c0"><u><b>Dark Skies</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Dark_Skies.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                The dark side of Habbo<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_10" class="purchase-component">
                                                                    Dark Skies costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_10_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_10_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_5"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_6_small.png" alt="">
                                                            </td>
                                                            <td width="672" bgcolor="#c0c0c0"><u><b>Ambience</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Ambiences.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a><br>
                                                                Background ambient loops<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_11" class="purchase-component">
                                                                    Ambiences costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_11_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_11_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_6"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_7_small.png" alt="">
                                                            </td>
                                                            <td width="600"><u><b>Furni Sounds Vol. 1</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Furni_Sounds_1.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Sound effects for Furni<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_12" class="purchase-component">
                                                                    Furni Sounds 1 costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_12_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_12_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_7"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_8_small.png" alt="">
                                                            </td>
                                                            <td width="672"><b><u>Electronica</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Electronica.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Mellow electric grooves<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_13" class="purchase-component">
                                                                    Electronica costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_13_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_13_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_8"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_9_small.png" alt="">
                                                            </td>
                                                            <td width="600" bgcolor="#c0c0c0"><b><u>Mysto Magica</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Mysto_Magica.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Mystical ambient soundscapes<br><br>
                                                                <b>Price: 5 Credits <br></b>
                                                                <div id="purchase_14" class="purchase-component">
                                                                    Mysto Magica costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_14_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_14_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_9"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_19_small.png" alt="">
                                                            </td>
                                                            <td width="672" bgcolor="#c0c0c0"><b><u>MnM</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/MnM.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Fan and Funky<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_15" class="purchase-component">
                                                                    MnM costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin pages</a><br>
                                                                    <span id="purchase_15_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_15_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_19"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600"><br></td>
                                                            <td>&nbsp;</td>
                                                            <td width="672"><br></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_11_small.png" alt="">
                                                            </td>
                                                            <td width="600"><b><u>Spicey Donna</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Spicey_Donna.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                D.I.S.C.O. grooves<br><br>
                                                                <b>Price: 5 Credits <br></b>
                                                                <div id="purchase_16" class="purchase-component">
                                                                    Spicey Donna costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_16_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_16_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_11"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_12_small.png" alt="">
                                                            </td>
                                                            <td width="672"><b><u>Abe Normal</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Abe_Normal.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Weirdness for the open minded<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_17" class="purchase-component">
                                                                    Abe Normal costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_17_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_17_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_12"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_13_small.png" alt="">
                                                            </td>
                                                            <td width="600" bgcolor="#c0c0c0"><b><u>Cafe Muzzakh</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Cafe_Muzzakh.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                For that special elevator<br><br>
                                                                <b>Price: 5 Credits <br></b>
                                                                <div id="purchase_18" class="purchase-component">
                                                                    Cafe Muzzakh costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_18_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_18_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_13"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_14_small.png" alt="">
                                                            </td>
                                                            <td width="672" bgcolor="#c0c0c0"><b><u>Cameron's Ex</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Camerons_Ex.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Just in grooves<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_19" class="purchase-component">
                                                                    Cameron's Ex costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_19_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_19_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_14"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_15_small.png" alt="">
                                                            </td>
                                                            <td width="600"><b><u>El Generico</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/El_Generico.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                R'n'B massivo<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_20" class="purchase-component">
                                                                    El Generico costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_20_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_20_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_15"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_16_small.png" alt="">
                                                            </td>
                                                            <td width="672"><b><u>Ferry Nultado</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Ferry_Nultado.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a><br>
                                                                Chic melodies<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_21" class="purchase-component">
                                                                    Ferry Nultado costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_21_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_21_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_16"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td width="600">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td width="672">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_17_small.png" alt="">
                                                            </td>
                                                            <td width="600" bgcolor="#c0c0c0"><b><u>Jive Sideburns</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Jive_Sideburns.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Funky disco loops<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_22" class="purchase-component">
                                                                    Jive Sideburns costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_22_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_22_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_17"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_18_small.png" alt="">
                                                            </td>
                                                            <td width="672" bgcolor="#c0c0c0"><b><u>Little Tanga Beach</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Little_Tanga_Beach.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                The
                                                                Brazilian rhythms as above<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span>
                                                                <div id="purchase_23" class="purchase-component">
                                                                    Little Tanga Beach costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_23_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_23_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_18"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
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
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>More Traxpacks - Just 5 Coins Each!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <table width="100%" cellspacing="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_20_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><b><u>Monkey Paradise</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Monkey_Paradise.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Sounds of the deepest jungle<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_24" class="purchase-component">
                                                                    Monkey Paradise costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_24_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_24_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_20"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_21_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><b><u>Snotty Day</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Snotty_Day.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Headbanging riffs<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits </span><br>
                                                                <div id="purchase_25" class="purchase-component">
                                                                    Snotty Day costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_25_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_25_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_21"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_22_small.png" alt="">
                                                            </td>
                                                            <td><u><b>A Day In The Park</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/A_Day_In_The_Park.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Nature sound effects<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_26" class="purchase-component">
                                                                    A Day in the Park costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_26_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_26_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_22"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_23_small.png" alt="">
                                                            </td>
                                                            <td><u><b>Nature Nightlight</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Nature_Nightlife.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""><br></a>
                                                                Can you cricket? Owling good sound effects<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span> <br>
                                                                <div id="purchase_27" class="purchase-component">
                                                                    Nature Nightlife costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_27_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_27_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_23"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_24_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><u><b>Compu FX</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Compu_FX.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Sci-Fi sound effects<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_28" class="purchase-component">
                                                                    Compu FX costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_28_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_28_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_24"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_25_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><u><b>Parteh Pack</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Party_Pack.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""><br></a>
                                                                Happy and jolly party sounds<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits</span> <br>
                                                                <div id="purchase_29" class="purchase-component">
                                                                    Party Pack costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_29_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_29_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_25"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_26_small.png" alt="">
                                                            </td>
                                                            <td><u><b>Bhangra Mangra</b></u><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Bhangra_Mangra.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Indian rhythms<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_30" class="purchase-component">
                                                                    Bhangra Mangra costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_30_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_30_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_26"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                            <td valign="top" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_27_small.png" alt="">
                                                            </td>
                                                            <td><b><u>Rasta.Claus's Pack</u></b><a
                                                                    href="https://web.archive.org/web/20071012043842/http://images.habbohotel.fi/c_images/album2348/Rasta_Santa.mp3"><img
                                                                        vspace="0" hspace="9" border="0" align="right"
                                                                        src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                <br>
                                                                Reggae flavors<br><br>
                                                                <b>Price:</b> <span style="font-weight: bold;">5 Credits </span><br>
                                                                <div id="purchase_31" class="purchase-component">
                                                                    Rasta.Claus's Pack costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_31_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_31_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_27"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51" valign="top" bgcolor="#c0c0c0" align="justify">
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_28_small.png" alt="">
                                                            </td>
                                                            <td bgcolor="#c0c0c0"><b><u>Moshy Metal</u></b>
                                                                <br>
                                                                Mosh pit time<br><br>
                                                                <b>Price: 5 Credits </b><br>
                                                                <div id="purchase_32" class="purchase-component">
                                                                    Moshy Metal costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <span id="purchase_32_purchase"></span>
                                                                    <script language="JavaScript">
                                                                        var purchaseButton = Builder.node("a", {
                                                                            href: "#",
                                                                            className: "colorlink orange"
                                                                        }, [Builder.node("span", "Purchase")]);
                                                                        $("purchase_32_purchase").appendChild(purchaseButton);
                                                                        Event.observe(purchaseButton, "click", function(e) {
                                                                            Event.stop(e);
                                                                            var dialog = Dialog.createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
                                                                            Dialog.appendDialogBody(dialog,
                                                                                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                                                                                true);
                                                                            Dialog.moveDialogToCenter(dialog);
                                                                            Overlay.show();
                                                                            new Ajax.Request(
                                                                                habboReqPath + "/furnipurchase/purchase_confirmation", {
                                                                                    method: "post",
                                                                                    parameters: "product=" + encodeURIComponent("A0 sound_set_28"),
                                                                                    onComplete: function(req, json) {
                                                                                        Dialog.setDialogBody(dialog, req.responseText);
                                                                                    }
                                                                                }
                                                                            );
                                                                        }, false);
                                                                    </script>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="51">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
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
