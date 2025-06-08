@extends('layouts.master', ['menuId' => '2'])

@section('title', 'Latin & Reggae')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'groove'])
                                    @foreach (boxes('hotel.trax.masterclass.groove', 1) as $box)
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
                                            <h3>LATIN &amp; REGGAE</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">


                                                <br>
                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="2"><img vspace="15" hspace="4" border="0"
                                                                    src="{{ url('/') }}/c_images/album1895/tm_room_latingroove_2.gif"
                                                                    alt=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br><img vspace="5" hspace="5" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1395/flamenco_2.gif"
                                                                    alt="">Latin American music, sometimes simply called Latin music, includes
                                                                the music of many countries and comes in many varieties, from the
                                                                simple, rural Conjunto music of northern Mexico to the sophisticated Habanera of Cuba, from the symphonies of Heitor
                                                                Villa-Lobos to the
                                                                simple and moving Andean flute. <br>
                                                                <p></p>
                                                                <p>The
                                                                    only truly unifying thread in Latin music is the use of the Spanish language, or
                                                                    the Portuguese language, in Brazil. Latin music has strong emphasis
                                                                    on rhythm with percussion elements playing important part in most songs.<br>
                                                                    <br>
                                                                    Reggae is a music genre developed in Jamaica in the late 1960s. The
                                                                    term is sometimes used in a broad sense to refer to most types of
                                                                    Jamaican music, including Ska, Rocksteady and Dub. Reggae includes
                                                                    two sub-genres: Roots Reggae (the original Reggae) and Dancehall Reggae, which originated in the late 70s.<br>
                                                                    <br>
                                                                    Reggae is founded upon a rhythm style characterised by regular chops
                                                                    on the off-beat, known as the 'skank' or the 'bang'. The tempo is
                                                                    generally slower than that found in Reggae's precursors, Ska and Rocksteady.
                                                                </p>
                                                            </td>
                                                            <td bgcolor="#c0c0c0">
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/reggae_trax.gif">
                                                                        <img"><img
                                                                                src="{{ url('/') }}/c_images/album1390/reggae_200x131.gif"
                                                                                alt=""></img">
                                                                    </a></p>
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/reggae_trax.gif">Click
                                                                        here to see the full track and recreate it yourself</a></p>
                                                                <p>&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:<br>
                                                                        <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                            src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif"
                                                                            alt="">
                                                                    </span>Rasta Santa's Mix<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif"
                                                                        alt="">
                                                                    Little Tanga Beach<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_blue.gif"
                                                                        alt=""> Bhangra Mangra<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_green.gif"
                                                                        alt=""> Jive Sideburns<span style="font-weight: bold;"></span></p>
                                                                <p style="margin-left: 10px;">
                                                                    <br><br> Listen now <a
                                                                        href="{{ url('/') }}/c_images/album2354/traxexample8_oriental.mp3"><img
                                                                            vspace="0" hspace="0" border="0" align="absmiddle"
                                                                            src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif"
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
