@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax'], ['url' => url('/hotel/trax/masterclass'), 'title' => 'Trax Masterclasses']],
])

@section('title', 'Sound Design & SFX')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'sfx'])
                                    @foreach (boxes('hotel.trax.masterclass.sfx', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>SOUND DESIGN &amp; SFX</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">


                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="2">
                                                                <img vspace="15" hspace="4" border="0" src="{{ url('/') }}/c_images/album1895/tm_room_horror_2.gif"
                                                                    alt=""><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br><img vspace="5" hspace="5" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1395/dj_sounddesign.gif" alt="">The term 'sound design' comes
                                                                originally from the world of theatre and was
                                                                first used in Broadway in the 1950s. The first directors who used this term and at the same time realised
                                                                the creative potential of sound were Marting Scorsese, Steven
                                                                Spielberg, Francis Ford Coppola and Geord Lucas. The first movies which credited sound designers were Apocalypse Now and
                                                                Star Wars I.
                                                                <br>
                                                                <p></p>
                                                                <p>In movies, sound designer use recorded sounds from the film
                                                                    shootings, sound effect libraries, self-made sounds, foley sounds and
                                                                    music to create the film's soundscape. These days, often no sounds
                                                                    from the actual shooting are used and everything is created afterwards in
                                                                    studio.<br>
                                                                    <br>
                                                                    Sound design also plays highly important role in today's computer
                                                                    games, with sound providing much of the atmosphere. It is said
                                                                    that people are less capable of analyzing the sound than the picture and
                                                                    that is why sound is clever way to affect people's emotions.
                                                                </p>
                                                            </td>
                                                            <td valign="top" bgcolor="#c0c0c0">
                                                                <p align="center">
                                                                    <align="center">&nbsp;</align="center"><br><a href="{{ url('/') }}/c_images/album949/sounddesign1_trax.gif">
                                                                        <img"><img border="0" src="{{ url('/') }}/c_images/album1390/sounddesign_2_200x131.gif"
                                                                                alt=""><br></img">
                                                                    </a></p>
                                                                <p align="center"><a href="{{ url('/') }}/c_images/album949/sounddesign1_trax.gif">
                                                                        <img"><br>Click here to see the full track and recreate it yourself</img">
                                                                    </a></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">


                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:<br>
                                                                        <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                            src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif" alt="">
                                                                    </span>Monkey Paradise<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif" alt="">
                                                                    A Day In The Park<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_blue.gif" alt=""> Nature Nightlife<br> <img
                                                                        vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_green.gif" alt=""> Furni Sounds 1<span
                                                                        style="font-weight: bold;"></span><br><br>Listen now<span style="font-weight: bold;"> <a
                                                                            href="{{ url('/') }}/c_images/album2354/traxexample11_sounddesign.mp3"><img vspace="0"
                                                                                hspace="0" border="0" align="absmiddle"
                                                                                src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif" alt=""></a></span></p>
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
