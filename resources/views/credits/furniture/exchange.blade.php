@extends('layouts.master', [
    'menuId' => '4',
    'breadcrums' => [['url' => url('/credits'), 'title' => 'Credits'], ['url' => url('/credits/furniture'), 'title' => 'Furniture']]
])

@section('title', 'Habbo Exchange')

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
                                    @include('credits.furniture.include.menu', ['page' => 'exchange'])
                                    @foreach (boxes('credits.furniture.exchange', 1) as $box)
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

                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Habbo Exchange</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img width="110" height="62" border="0" align="right" src="{{ url('/') }}/c_images/payment_icons/habbo_credits_2.gif"
                                                    alt="">Habbo Exchange can be found towards the top of your Habbo Catalog under the heading 'Habbo Exchange'. It is a system
                                                which allows you to purchase <b>tradable Coins</b> making it possible to legally trade for Coins for the first time.<br><br>

                                                You can purchase your tradable Coins in the quantities listed below:<br><br>

                                                <table width="100%" border="0" id="TradableCredits ">
                                                    <tbody>
                                                        <tr>
                                                            <td width="249" align="center">
                                                                <img width="23" height="18" border="0" src="{{ url('/') }}/c_images/album1774/Rel12_money_1credit.gif"
                                                                    alt=""><br>
                                                                <b>Bronze Coin<br><br></b>
                                                            </td>
                                                            <td height="21">This item is worth 1 Habbo Coin and costs 1
                                                                Habbo Coin</td>

                                                        </tr>
                                                        <tr>
                                                            <td width="249" height="21" align="center">
                                                                <img width="23" height="18" border="0" src="{{ url('/') }}/c_images/album1774/Rel12_money_5credits.gif"
                                                                    alt=""><br>
                                                                <b>Silver Coin<br><br></b>
                                                            </td>
                                                            <td height="21">This item is worth 5 Habbo Coins and
                                                                costs 5 Habbo Coins</td>
                                                        </tr>
                                                        <tr>

                                                            <td width="249" align="center">
                                                                <img width="23" height="18" border="0" src="{{ url('/') }}/c_images/album1774/Rel12_money_10credits.gif"
                                                                    alt=""><br>
                                                                <b>Gold Coin<br><br></b>
                                                            </td>
                                                            <td height="21">This item is worth 10 Habbo Coins and costs 10
                                                                Habbo Coins</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="249" align="center">
                                                                <img width="23" height="28" border="0" src="{{ url('/') }}/c_images/album1774/Rel12_moneybag_small.gif"
                                                                    alt=""><br>

                                                                <b>Money Bag<br><br></b>
                                                            </td>
                                                            <td height="21">This item is worth 20 Habbo Coins and costs 20
                                                                Habbo Coins</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="249" align="center">
                                                                <img width="60" height="39" border="0" src="{{ url('/') }}/c_images/album1774/Rel12_money_50credits.gif"
                                                                    alt=""><br>
                                                                <b>Gold Bars</b>
                                                            </td>

                                                            <td height="21">This item is worth 50 Habbo Coins and costs 50
                                                                Habbo Coins</td>
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
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Trading Coins for Furni</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <img width="200" height="200" border="0" align="right" src="{{ url('/') }}/c_images/album1774/HabboSleepingOnMoney.gif"
                                                    alt="">Once you have bought your tradable Coins you are then able to use them to trade for other Habbo items, such as <span
                                                    style="font-weight: bold;">Furni</span> via the safe trading box. You don’t have to just use them for trading, you could use them as
                                                a decoration in your guest room and make your very own private safe!<br><br>If at any point you want to
                                                redeem your Coins simply double click on them and then click <span style="font-weight: bold;">'Redeem'</span> on the pop-up that appears
                                                on screen. Once you have redeemed your credits they will appear in your purse as normal <span style="font-weight: bold;">Habbo
                                                    Coins</span>.
                                                The value of the tradable Coins is the exact same value that will appear in your purse - so don't worry, you
                                                do not<b>&nbsp;</b>lose anything by exchanging them back and forth.<br><br>When you have redeemed them you’ll be able to use them as
                                                normal to purchase items out of the Habbo Catalog or buy <span style="font-weight: bold;">Game Tickets</span> in order to play
                                                your favourite Habbo games!<br><b><br><br></b>
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
