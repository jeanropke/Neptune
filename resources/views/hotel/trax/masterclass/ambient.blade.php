@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax'], ['url' => url('/hotel/trax/masterclass'), 'title' => 'Trax Masterclasses']]
])

@section('title', 'Ambient')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'ambient'])
                                    @foreach (boxes('hotel.trax.masterclass.ambient', 1) as $box)
                                        <div class="v3box {{ $box->color }}">
                                            <div class="v3box-top">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="v3box-content">
                                                <div class="v3box-body">
                                                    {!! Blade::render($box->content) !!}
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
                                            <h3>AMBIENT</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">


                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p align="center">
                                                                    <img vspace="15" hspace="4" border="0" align="middle"
                                                                        src="{{ url('/') }}/c_images/album1895/tm_room_romantic_2.gif"
                                                                        alt="">
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2">
                                                                <p style="margin-left: 5px; margin-right: 5px;"><img vspace="5" hspace="5" border="0" align="left"
                                                                        src="{{ url('/') }}/c_images/album1395/dj_ambient.gif"
                                                                        alt="">The idea of Ambient music was born in the early 20th century with
                                                                    the search for music that could 'be in the background' at dinner parties. In the 1950s there was music constructed
                                                                    from real-world sounds. Composer Brian Eno made first used the
                                                                    term 'ambient music' in his 1978 release Ambient 1: Music For
                                                                    Airports.<br><br>
                                                                    Ambient music is often very relaxed, includes spacious smooth
                                                                    synthesizer sounds, deep basses and smooth, minimal (if any) drum
                                                                    programming. Ambient songs are often very long, with song lengths of
                                                                    10 to 30 minutes not being unusual.<br>
                                                                    <br>
                                                                    Some of the most notable Ambient artists include Tangerine Dream,
                                                                    Jean-Michel Jarre, KLF, Future Sound of London, Aphex Twin, The Orb
                                                                    and Boards of Canada.
                                                                </p>
                                                                <p></p>
                                                            </td>
                                                            <td bgcolor="#c0c0c0">
                                                                <br>
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/chillout_trax.gif"><img
                                                                            src="{{ url('/') }}/c_images/album1390/chillout_200x131.gif"
                                                                            alt=""><br></a></p>
                                                                <p align="center"><a
                                                                        href="{{ url('/') }}/c_images/album949/chillout_trax.gif">Click
                                                                        here to see the full track and recreate it yourself</a></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0"><span style="font-weight: bold;"><br></span>
                                                                <p></p>
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:</span><br>
                                                                    <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif"
                                                                        alt="">
                                                                    Mysto Magica<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif"
                                                                        alt="">
                                                                    Sunset Adventures<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_blue.gif"
                                                                        alt=""> Electronica<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_green.gif"
                                                                        alt=""> Ambiences<br>
                                                                </p>
                                                                <p style="margin-left: 10px;"><br> Listen now <a
                                                                        href="{{ url('/') }}/c_images/album2354/traxexample6_chillout.mp3"><img
                                                                            vspace="0" hspace="0" border="0" align="absmiddle"
                                                                            src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif"
                                                                            alt=""></a></p>
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
