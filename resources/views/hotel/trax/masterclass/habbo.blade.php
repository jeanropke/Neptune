@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax'], ['url' => url('/hotel/trax/masterclass'), 'title' => 'Trax Masterclasses']]
])

@section('title', '8-bit / Habbo')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'habbo'])
                                    @foreach (boxes('hotel.trax.masterclass.habbo', 1) as $box)
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
                                            <h3>HABBO/8BIT</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">


                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="2"><img vspace="15" hspace="4" border="0"
                                                                    src="{{ url('/') }}/c_images/album1895/tm_room_habbo_8bit.gif"
                                                                    alt=""><br></td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br><img vspace="10" hspace="10" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1395/dj_habbo_8bit.gif"
                                                                    alt="">Habbo Hotel's graphical style is reminiscent of old C64 and Atari
                                                                computer games. Habbo's pixel-style is very recognisable and so the Habbo sound and music has a similar retro
                                                                approach. In music this means the use of limited polyphony, simple
                                                                melodies, clearly synthetic instruments and 4bit or 8bit lo-fi sounds.
                                                                <br><br>
                                                                The composers of 8bit music were often 'composing' using a programming language and many of them didn't have any musical
                                                                training. As a result, the melodies were often very simple and even
                                                                childish. All these elements make the Habbo audio-visual experience
                                                                easily approachable, fun and pleasant. But Habbo-like music
                                                                still shouldn't sound as rough as the original C64 music did.
                                                                <br><br>
                                                                Some elements which are often present in Habbo music are wild
                                                                arpeggios, lo-fi 8bit drum samples, simple one-note melodies, funky
                                                                analogue basslines, vocodered vocals, percussion created with white
                                                                noise or heavily shuffled old Roland drum machine hi-hat grooves.
                                                            </td>
                                                            <td bgcolor="#c0c0c0">
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/sounddesign2_trax.gif">
                                                                        <img"><img
                                                                                src="{{ url('/') }}/c_images/album1390/sounddesign2_200x131.gif"
                                                                                alt=""></img">
                                                                    </a></p>
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/sounddesign2_trax.gif">Click
                                                                        here to see the full track and recreate it yourself</a></p>
                                                                <p>&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:</span><br>
                                                                    <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif"
                                                                        alt="">
                                                                    Compu FX<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif"
                                                                        alt="">
                                                                    Abe Normal<br>
                                                                    <br><br> Listen now <a
                                                                        href="{{ url('/') }}/c_images/album2354/traxexample14_sounddesign2.mp3"><img
                                                                            vspace="0" hspace="0" border="0" align="absmiddle"
                                                                            src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif"
                                                                            alt=""></a>
                                                                </p>
                                                                <p></p>
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
