@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/furniture'), 'title' => 'Furniture']],
])

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
                                    @include('hotel.furniture.include.menu', ['page' => 'starterpacks'])
                                    @foreach (boxes('hotel.furniture.starterpacks', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
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
                                                                    <x-purchase_button id="purchase_1" product="starter_mode" />
                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album109/combo_4.gif" alt=""></div><br>
                                                                <div id="purchase_2" class="purchase-component">
                                                                    Tube Pack costs 5 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_2" product="starter_tv" />
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
                                                                    <x-purchase_button id="purchase_3" product="starter_green" />
                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/livingroomdeal2.gif" alt=""></div><br>
                                                                <div id="purchase_4" class="purchase-component">
                                                                    Home, Sweet, Home costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_4" product="starter_home" />
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
                                                                    <x-purchase_button id="purchase_5" product="starter_candy" />
                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/plasticdeal1.gif" alt=""></div><br>
                                                                <div id="purchase_6" class="purchase-component">
                                                                    Plastic Fantastic costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_6" product="starter_plastic1" />
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
                                                                    <x-purchase_button id="purchase_7" product="starter_bedroom" />
                                                                </div>
                                                            </td>
                                                            <td width="50%" align="center" style="background-color: rgb(230, 239, 239);">
                                                                <div height="215"><img vspace="0" hspace="0" border="0"
                                                                        src="{{ url('/') }}/c_images/album2643/kitchendeal.gif" alt=""></div><br>
                                                                <div id="purchase_8" class="purchase-component">
                                                                    Bachelor Pad costs 10 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_8" product="starter_kitchen" />
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
