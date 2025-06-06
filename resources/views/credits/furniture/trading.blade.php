@extends('layouts.master', [
    'menuId' => '4',
    'breadcrums' => [['url' => url('/credits'), 'title' => 'Credits'], ['url' => url('/credits/furniture'), 'title' => 'Furniture']]
])

@section('title', 'Trading')

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
                                    @include('credits.furniture.include.menu', ['page' => 'trading'])
                                    @foreach (boxes('credits.furniture.trading', 1) as $box)
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
                                            <h3>Trading</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <p>Thinking about redecorating or desperate to get your hands on some must have Rare items? Trading is the answer!</p>

                                                <p>You can trade safely with another Habbo by asking around to see what other Habbos have to offer. This is best done in Trading rooms
                                                    which can be
                                                    found in the Trading Floor on the Navigator. When you have found someone, click on them and then click the trade button that will
                                                    appear below their
                                                    avatar in the bottom right of the screen.</p>

                                                <p>Now you can simply follow the on screen instructions but remember to only accept the trade if you are happy with what the other Habbo
                                                    has placed in
                                                    the trading boxes. Don't forget, <a href="{{ url('/') }}/credits/furniture/exchange">you can use
                                                        Habbo Coins in a trade too</a>!</p>

                                                <div align="center"><img src="{{ url('/') }}/c_images/album1774/trading_handshake.gif" alt=""></div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Words of Wisdom</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <table cellpadding="10">
                                                    <tbody>
                                                        <tr>
                                                            <td width="25%" valign="top">You can't trade accounts, game tickets, pets or presents.</td>
                                                            <td width="25%" valign="top">No one can double your Furni. Or your Coins. Or your luck ;)</td>
                                                            <td width="25%" valign="top">Always use the trading box. Never click accept if you aren't sure.</td>
                                                            <td width="25%" valign="top">Check that teleports link before you trade: ask for a demo.</td>
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
