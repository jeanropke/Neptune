@extends('layouts.master', [
    'menuId' => '2',
    'breadcrums' => [['url' => url('/hotel'), 'title' => 'New?'], ['url' => url('/hotel/trax'), 'title' => 'Trax'], ['url' => url('/hotel/trax/masterclass'), 'title' => 'Trax Masterclasses']],
])

@section('title', 'Electronic')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'electronic'])
                                    @foreach (boxes('hotel.trax.masterclass.electronic', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>ELECTRONIC</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="2"><img vspace="15" hspace="4" border="0"
                                                                    src="{{ url('/') }}/c_images/album1895/tm_room_electronic.gif" alt=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" rowspan="2"><br><img vspace="5" hspace="5" border="0" align="left"
                                                                    src="{{ url('/') }}/c_images/album1395/nerd_DJ_1.gif" alt="">Electronic music has existed since the
                                                                first machines that could create sound and music. It became more popular in the 1960s and 70s when synthesizers became
                                                                more accessible. Early pioneers
                                                                included BBC Radio in the UK and the creators of Moog synthesizers.<br>
                                                                <br>
                                                                Dance music has been very electronic since the
                                                                late 80s with the birth of Acid House and Techno. The making of Electronic music has changed radically
                                                                during the last ten years with more and more of the production
                                                                being done with computers, while in th early days, producers had to have large <br>
                                                                studios full of equipment.<br>
                                                                <br>
                                                                There is an endless list of Electronic sub-genres with more joining the ranks every year. Some of the most legendary
                                                                Electronic music producers
                                                                include Vangelis, Kraftwerk, The Prodigy, Daft Punk, Massive Attack,
                                                                Aphex Twin, Underworld, Moby and DJ Paul van Dyk , to name just a few.
                                                            </td>
                                                            <td bgcolor="#c0c0c0">
                                                                <p align="center"><br><a href="{{ url('/') }}/c_images/album949/electronica_trax_2.gif">
                                                                        <img"><img src="{{ url('/') }}/c_images/album1390/electronica_200x131.gif" alt=""></img">
                                                                    </a></p>
                                                                <p align="center"><a href="{{ url('/') }}/c_images/album949/electronica_trax_2.gif">Click here to see the full
                                                                        track and recreate it yourself</a></p>
                                                                <p>&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#c0c0c0">
                                                                <p style="margin-left: 10px;"><span style="font-weight: bold;">Trax used in this composition:</span><br>
                                                                    <br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_orange.gif" alt="">
                                                                    Mysto Magica<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2063/trax_bullet_magenta.gif" alt="">
                                                                    Sunset Adventures<br> <img vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_green.gif" alt=""> Electronica<br> <img
                                                                        vspace="0" hspace="0" border="0" align="bottom"
                                                                        src="{{ url('/') }}/c_images/album2304/trax_bullet_blue.gif" alt=""> BattleBall Theme
                                                                </p>
                                                                <p style="margin-left: 10px;"><br> Listen now <a
                                                                        href="{{ url('/') }}/c_images/album2354/traxexample5_electronica1.mp3"><img vspace="0" hspace="0"
                                                                            border="0" align="absmiddle" src="{{ url('/') }}/c_images/album2304/musicsample_icon.gif"
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
