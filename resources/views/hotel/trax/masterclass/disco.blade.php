@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax'], ['url' => url('/hotel/trax/masterclass'), 'title' => 'Trax Masterclasses']],
])

@section('title', 'Disco')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'disco'])
                                    @foreach (boxes('hotel.trax.masterclass.disco', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>DISCO</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">


                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p align="center">
                                                                    <img vspace="15" hspace="0" border="0" align="middle"
                                                                        src="{{ url('/') }}/c_images/album2304/tm_partyroom_2.gif" alt=""><br>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br><img vspace="2" hspace="2" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1395/AfroKirl_1.gif" alt="">Disco is a genre of dance-oriented pop
                                                                music that blends elements of Funk and Soul first popularized
                                                                in dance clubs
                                                                (discosthèques) in the mid-1970s. Disco songs went on to dominate mainstream pop
                                                                for the entire decade. <br><br>Disco songs usually have soaring vocals over a
                                                                steady four-on-the-floor beat; hi-hat pattern with an open hi-hat on
                                                                the off-beat; and a prominent, syncopated electric bass line.
                                                                Strings, horns, electric pianos, and electric guitars create a lush
                                                                background sound, with orchestral instruments are used for solo melodies.<br>
                                                                <br>
                                                                Major disco performers include Donna Summer, The Jackson
                                                                5, Barry White, The Bee Gees, and ABBA. Films such as Saturday Night
                                                                Fever and Thank God It's Friday contributed to Disco's rise in
                                                                mainstream popularity. <br><br>While disco music declined in popularity in
                                                                the early 80s, it was an important influence on the development of
                                                                the 80s and 90s Electronic dance music genres of House and Techno.
                                                            </td>
                                                            <td bgcolor="#c0c0c0">
                                                                <p align="center"><a href="{{ url('/') }}/c_images/album949/chillout_trax.gif">
                                                                    </a><a href="{{ url('/') }}/c_images/album949/Disco_Trax_2.gif">
                                                                        <br><img align="middle" src="{{ url('/') }}/c_images/album1390/Disco_Trax_200x131_2.gif"
                                                                            alt=""></a></p>
                                                                <p align="center"><a href="{{ url('/') }}/c_images/album949/Disco_Trax_2.gif"><br></a><a
                                                                        href="{{ url('/') }}/c_images/album949/Disco_Trax_2.gif">Click
                                                                        here to see the full track and recreate it yourself</a><span style="font-weight: bold;"><br></span></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;"><br>Trax used in this composition:</span><br>
                                                                    <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif" alt="">
                                                                    Spicey Donna<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif" alt="">
                                                                    Little Tanga Beach<br>
                                                                    <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_green.gif" alt=""> Jive Sideburns<br>
                                                                    <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_blue.gif" alt=""> Cafe Muzzakh<br><br> Listen
                                                                    here <a href="{{ url('/') }}/c_images/album2354/traxexample13_disco.mp3"><img vspace="0" hspace="0"
                                                                            border="0" align="absmiddle" src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif"
                                                                            alt=""></a>
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
