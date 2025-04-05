@extends('layouts.master', ['menuId' => '4', 'submenuId' => '17', 'headline' => true])

@section('title', 'Credits')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td align="left" valign="top" style="width: 430px; height: 400px;" class="habboPage-col">
                                    <div class="nobox">
                                        <div class="nobox-content">
                                            <div class="v2box brown darkest">
                                                <div class="headline">
                                                    <h3>My {{ cms_config('hotel.name.short') }} Purse</h3>
                                                </div>
                                                <div class="border">
                                                    <div></div>
                                                </div>
                                                <div class="body">
                                                    <p>
                                                        You can use {{ cms_config('hotel.name.short') }} Coins for buying furniture and playing
                                                        games in
                                                        {{ cms_config('hotel.name.full') }} or enhancing your {{ cms_config('hotel.name.short') }} Home page
                                                        content. <a href="{{ url('/') }}/credits">Learn more!</a>
                                                    </p>

                                                    @if (Auth::check())
                                                        <div class="purse-balance">
                                                            You has <span class="purse-balance-amount">&nbsp;<span class="habbocredits">{{ Auth::user()->credits }}</span>&nbsp;</span>
                                                            {{ cms_config('hotel.name.short') }} Credits
                                                        </div>
                                                    @endif


                                                    <p>
                                                        <a href="{{ url('/') }}/credits" class="colorlink"><span>Buy more
                                                                coins</span></a>
                                                    </p>

                                                    <div id="purse-redeem">
                                                        @if (Auth::check())
                                                            <div id="purse-form-container">
                                                                If you have a Credit or furniture redemption code, enter it below
                                                                <form method="post" action="{{ url('/') }}/credits/redeem" id="purse-redeem-form">
                                                                    <input type="text" name="redeem-code" size="35" id="redeem-code" />
                                                                    <a href="#" class="colorlink orange last" align="top" id="redeem-button"><span>Redeem</span></a>
                                                                </form>

                                                            </div>

                                                            <script>
                                                                Event.observe($("redeem-button"), "click", function(e) {
                                                                    Event.stop(e);

                                                                    var dialog = Dialog.createDialog("voucher_dialog", "Redeem voucher", 9001, 0, -1000, closeVoucherDialog);
                                                                    Dialog.setAsWaitDialog(dialog);
                                                                    Dialog.moveDialogToCenter(dialog);
                                                                    Overlay.show();
                                                                    Dialog.makeDialogDraggable(dialog);
                                                                    new Ajax.Request(habboReqPath + "/habblet/ajax/redeemVoucher", {
                                                                        parameters: {
                                                                            code: $("redeem-code").value
                                                                        },
                                                                        method: "post",
                                                                        onComplete: function(req, json) {
                                                                            Dialog.setDialogBody(dialog, req.responseText);

                                                                            Event.observe($("voucher-dialog-ok"), "click", closeVoucherDialog);
                                                                        },
                                                                        evalScripts: true
                                                                    });
                                                                });

                                                                function closeVoucherDialog(e) {
                                                                    Event.stop(e);
                                                                    Element.remove("voucher_dialog");
                                                                    Overlay.hide();
                                                                }
                                                            </script>
                                                        @else
                                                            <div>
                                                                <div class="content-beige">
                                                                    <div class="content-beige-body">
                                                                        You are not logged in.
                                                                        <div class="clear"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="content-beige-bottom">
                                                                    <div class="content-beige-bottom-body"></div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="bottom">
                                                    <div></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- <div class="v3box green">
                                    <div class="v3box-top">
                                        <h3>Buy {{ cms_config('hotel.name.short') }} Coins</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            @if (session('message') == 'OK')
                                            Thank you for buying coins!
                                            @elseif(session('message') == 'ERROR')
                                            Not possible to buy coins now! Try again later.
                                            @else
                                            @foreach ($offers as $offer)
                                            <a href="{{ route('credits.buy.setup') }}/{{ $offer->id }}"
                                                class="colorlink orange last" align="top">
                                                <span>Comprar (R${{ $offer->price }})</span>
                                            </a>
                                            <p><b>{{ $offer->name }}</b></p>
                                            <p>{{ $offer->description }}</p>
                                            <div id="purse-redeem"></div>
                                            @endforeach
                                            @endif


                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div> --}}

                                </td>
                                <td align="left" valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">
                                    {{--
                            <div class="purse">
                                <div class="purse-header">
                                    <h3>header<a class="close">s</a></h3>
                                </div>
                                <div class="purse-header-bottom">
                                    <div></div>
                                </div>
                                <div class="purse-body">
                                    <div class="purse-content">
                                        purse-content
                                    </div>
                                </div>
                                <div class="purse-bottom">
                                    <div></div>
                                </div>
                            </div>
                            <br>
                            --}}
                                    @include('includes.ad300')
                                    <div class="v3box green">
                                        <div class="v3box-top">
                                            <h3>{{ cms_config('hotel.name.short') }} Coins</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img width="110" height="103" border="0" align="right" style="font-weight: bold;" id="galleryImage"
                                                    src="{{ url('/') }}/web/images/credits/coins_big.gif" alt=""><span
                                                    style="font-weight: bold;">{{ cms_config('hotel.name.short') }}
                                                    Coins are the Hotel's currency, they are kept in your {{ cms_config('hotel.name.short') }}
                                                    Purse and
                                                    can be used for a variety of things! </span><br><br>Cool
                                                stuff you can spend your coins on:<br>
                                                <ul>
                                                    <li>decorate your room
                                                        with <a href="{{ url('/') }}/hotel/furniture" target="_self">{{ cms_config('hotel.name.short') }}
                                                            Furni</a></li>
                                                    <li><a href="{{ url('/') }}/hotel/pets">{{ cms_config('hotel.name.short') }}
                                                            Pets</a> (how about a crocodile?)<br></li>
                                                    <li>join <a href="{{ url('/') }}/club/" target="_self">{{ cms_config('hotel.name.short') }}
                                                            Club</a>, our exclusive VIP club
                                                    </li>
                                                    <li>play <a href="{{ url('/') }}/games">games</a>
                                                        like SnowStorm or Battle Ball! <br></li>
                                                </ul><span style="font-weight: bold;">{{ cms_config('hotel.name.short') }}
                                                    Coins only cost around 20 cents each - that's five for one
                                                    dollar!</span><br><br>We have a lot of different ways for you
                                                to buy {{ cms_config('hotel.name.short') }} Coins. Take a look at the list to the left.<span style="font-weight: bold;"><br><br>Please
                                                    note</span>, {{ cms_config('hotel.name.short') }}
                                                Coins have
                                                no monetary value and can't be used to buy third party products and
                                                services.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box green">
                                        <div class="v3box-top">
                                            <h3>{{ cms_config('hotel.name.short') }} Coins Help</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img vspace="0" hspace="0" border="0" align="right" src="{{ url('/') }}/web/images/credits/habbos_w_credits.gif"
                                                    alt="">
                                                If you are having problems buying {{ cms_config('hotel.name.short') }} Coins then please use
                                                the <a target="_blank" href="{{ url('/') }}/help/contact_us">{{ cms_config('hotel.name.short') }}
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
@stop
