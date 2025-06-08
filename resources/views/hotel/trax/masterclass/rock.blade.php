@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax'], ['url' => url('/hotel/trax/masterclass'), 'title' => 'Trax Masterclasses']],
])

@section('title', 'Rock & Heavy')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'rock'])
                                    @foreach (boxes('hotel.trax.masterclass.rock', 1) as $box)
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
                                            <h3>ROCK &amp; HEAVY</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">


                                                <p></p>
                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="2"><img vspace="15" hspace="4" border="0"
                                                                    src="{{ url('/') }}/c_images/album1895/tm_room_metal.gif" alt=""><br></td>

                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br><img vspace="5" hspace="5" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1395/sirkkelihevi.gif" alt="">
                                                                Rock and Roll has its roots in 1950s rockabilly when artists like
                                                                Chuck Berry and Little Richard developed the style influenced by
                                                                original Rhythm and Blues. In the late 60s, rock music was blended
                                                                with folk music, while in the 70s, rock incorporated influences from Soul and Funk. <br><br>In the 70s, a number of
                                                                sub-genres developed,
                                                                such as Soft Rock, Heavy Metal and Punk Rock. Rock
                                                                sub-genres from the 80s include Hard Rock, Indie Rock and Alternative Rock. The 90s brought with them Grunge and
                                                                Britpop.<br>
                                                                <br>Rock songs usually combine vocal melody with guitars, drums, and
                                                                often bass. Many styles of rock music also use keyboard instruments
                                                                such as organ, piano, or synthesizers. Rock music usually has a
                                                                strong back beat, and often revolves around somewhat distorted
                                                                electric guitar.<br><br>
                                                                Some of the most influential and succesful Rock artists include Elvis Presley, Bob Dylan, The Beatles, Sex Pistols,
                                                                Nirvana, Metallica, U2 and Green Day.<p></p>
                                                            </td>
                                                            <td bgcolor="#c0c0c0">
                                                                <p align="center"><a href="{{ url('/') }}/c_images/album949/Heavy_and_rock_trax.gif">
                                                                        <img"><img vspace="5" hspace="5" border="0"
                                                                                src="{{ url('/') }}/c_images/album1390/heavy_rock_200x131.gif" alt=""></img">
                                                                    </a></p>
                                                                <p align="center"><a href="{{ url('/') }}/c_images/album949/Heavy_and_rock_trax.gif" target="_self">Click here to
                                                                        see the full track and recreate it yourself</a><br></p>
                                                                <p>&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:</span><br>
                                                                    <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif" alt="">
                                                                    Snotty Day<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif" alt="">
                                                                    Moshy Meyal<br>
                                                                    <br><br> Listen here <a href="{{ url('/') }}/c_images/album2354/traxexample12_heavyrock.mp3"><img
                                                                            vspace="0" hspace="0" border="0" align="absmiddle"
                                                                            src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
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

                                                <table width="98%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <b>
                                                                    <img vspace="0" hspace="8" border="0" align="left"
                                                                        src="{{ url('/') }}/c_images/album1394/sound_set_21_small.png" alt="">Snotty
                                                                    Day</b><br>
                                                                <div id="purchase_3" class="purchase-component">
                                                                    Snotty Day costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_3" product="A0 sound_set_21" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img vspace="0" hspace="8" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1394/sound_set_28_small.png" alt=""><b>Moshy
                                                                    Metal</b><br>
                                                                <div id="purchase_4" class="purchase-component">
                                                                    Moshy Metal costs 3 coins. To get more coins, please visit the <a href="{{ url('/') }}/credits">Coin
                                                                        pages</a><br>
                                                                    <x-purchase_button id="purchase_4" product="A0 sound_set_28" />
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
            </tr>
        </tbody>
    </table>
@stop
