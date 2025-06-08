@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax']],
])

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
                                                    <x-purchase_button id="purchase_5" product="sound_machine_deal" />
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
                                            <h3>Traxpacks - Just 3 Coins Each!</h3>
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
                                                                <b>Price: </b><span style="font-weight: bold;">3 Credits</span><b>&nbsp;</b><br>
                                                                <div id="purchase_6" class="purchase-component">
                                                                    DJ Fuse's Habbo Theme costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_6" product="A0 sound_set_2" />
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
                                                                Brazilian rhythms<br><br><b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_7" class="purchase-component">
                                                                    Little Tanga Beach costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_7" product="A0 sound_set_18" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_8" class="purchase-component">
                                                                    Snow Storm Theme costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_8" product="A0 sound_set_3" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_9" class="purchase-component">
                                                                    Sunset Adventure costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_9" product="A0 sound_set_4" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_10" class="purchase-component">
                                                                    Dark Skies costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_10" product="A0 sound_set_5" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_11" class="purchase-component">
                                                                    Ambiences costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_11" product="A0 sound_set_6" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_12" class="purchase-component">
                                                                    Furni Sounds 1 costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_12" product="A0 sound_set_7" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_13" class="purchase-component">
                                                                    Electronica costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_13" product="A0 sound_set_8" />
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
                                                                <b>Price: 3 Credits <br></b>
                                                                <div id="purchase_14" class="purchase-component">
                                                                    Mysto Magica costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_14" product="A0 sound_set_9" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_15" class="purchase-component">
                                                                    MnM costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin pages</a><br>
                                                                    <x-purchase_button id="purchase_15" product="A0 sound_set_19" />
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
                                                                <b>Price: 3 Credits <br></b>
                                                                <div id="purchase_16" class="purchase-component">
                                                                    Spicey Donna costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_16" product="A0 sound_set_11" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_17" class="purchase-component">
                                                                    Abe Normal costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_17" product="A0 sound_set_12" />
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
                                                                <b>Price: 3 Credits <br></b>
                                                                <div id="purchase_18" class="purchase-component">
                                                                    Cafe Muzzakh costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_18" product="A0 sound_set_13" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_19" class="purchase-component">
                                                                    Cameron's Ex costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_19" product="A0 sound_set_14" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_20" class="purchase-component">
                                                                    El Generico costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_20" product="A0 sound_set_15" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span>
                                                                <div id="purchase_21" class="purchase-component">
                                                                    Ferry Nultado costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_21" product="A0 sound_set_16" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_22" class="purchase-component">
                                                                    Jive Sideburns costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_22" product="A0 sound_set_17" />
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
                                            <h3>More Traxpacks - Just 3 Coins Each!</h3>
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_24" class="purchase-component">
                                                                    Monkey Paradise costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_24" product="A0 sound_set_20" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits </span><br>
                                                                <div id="purchase_25" class="purchase-component">
                                                                    Snotty Day costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_25" product="A0 sound_set_21" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_26" class="purchase-component">
                                                                    A Day in the Park costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_26" product="A0 sound_set_22" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span> <br>
                                                                <div id="purchase_27" class="purchase-component">
                                                                    Nature Nightlife costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_27" product="A0 sound_set_23" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_28" class="purchase-component">
                                                                    Compu FX costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_28" product="A0 sound_set_24" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits</span> <br>
                                                                <div id="purchase_29" class="purchase-component">
                                                                    Party Pack costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_29" product="A0 sound_set_25" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_30" class="purchase-component">
                                                                    Bhangra Mangra costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_30" product="A0 sound_set_26" />
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
                                                                <b>Price:</b> <span style="font-weight: bold;">3 Credits </span><br>
                                                                <div id="purchase_31" class="purchase-component">
                                                                    Rasta.Claus's Pack costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_31" product="A0 sound_set_27" />
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
                                                                <b>Price: 3 Credits </b><br>
                                                                <div id="purchase_32" class="purchase-component">
                                                                    Moshy Metal costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_32" product="A0 sound_set_28" />
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
