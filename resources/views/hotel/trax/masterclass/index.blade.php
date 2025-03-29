@extends('layouts.master', ['menuId' => '2', 'submenuId' => '38', 'headline' => true])

@section('title', 'Trax Machine')

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
                                    @include('hotel.trax.masterclass.include.menu', ['page' => 'index'])
                                    @foreach (boxes('hotel.trax.masterclass', 1) as $box)
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
                                <td valign="top" style="width: 336px;" class="habboPage-col">
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Tip 1: Basic elements of good music</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                Every good track has bass, drums and a melody. This fills the sound spectrum nicely, from fat bottom to chiming high end. <br>Remember
                                                that there aren't any bands with 2 bass players, so try to avoid mixing basslines or main melodies!
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Tip 2: Surprise your listeners and be creative</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <img vspace="10" hspace="10" border="0" align="left"
                                                    src="{{ url('/') }}/c_images/album2304/tm_beginners_traxgirl.gif"
                                                    alt="">
                                                Be creative with your sample use. Combining sounds from different packs will produce more interesting results. <br><br>Have ambient
                                                intro in your party song or add some horror sound effects to your Habbo grooves. Use all four slots to maximize the impact and variety
                                                of your tracks.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Tip 3: Setting the mood with sound effects</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                Try your hand at being a Hollywood sound designer by making your own soundscapes and atmospheres!<br><br>Use nature sounds for your
                                                outdoorsy rooms, computer FX for sci-fi themes, horror sounds for gothic mansions, and a crackling fire for your cosy retreats.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="v3box blue">
                                        <div class="v3box-top">
                                            <h3>Tip 4: Beats and bars</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                Songs are usually constructed from four-beat sections called bars. Song sections (verse/chorus) are usually made of sections containing
                                                4, 8 or 16 bars. <br><br>One Traxmachine timeline grid is one bar and there are 1, 2 and 4 bar pieces. Try doing sections of 8 or 16
                                                bars and you will notice how your tracks' flow will seem more natural.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                                <td valign="top" style="width: 202px;" class="habboPage-col rightmost">
                                    <div class="v3box green">
                                        <div class="v3box-top"><h3>Tip 5: Length and structure</h3></div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                    It's been said that perfect pop song is 3 minutes long. That's also the average length of music videos. <br><br>In a good pop song there are usually two or three different sections which last around 30 seconds each. Intro-verse-chorus-verse-chorus-outro is the typical form pop songs take. <br>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom"><div></div></div>
                                    </div>
                                    <div class="v3box green">
                                        <div class="v3box-top"><h3>Tip 6: Is less more?</h3></div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                    Sometimes in life less is more. Try having some dynamics in your tracks, featuring more minimalist sections than full-on extravaganzas. It's less tiring on your listeners' ears if there isn't too much happening all the time in your track.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom"><div></div></div>
                                    </div>
                                    <div class="v3box green">
                                        <div class="v3box-top"><h3>Tip 7: Music and sound effects</h3></div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                    <img vspace="10" hspace="10" border="0" align="middle" src="{{ url('/') }}/c_images/album2304/tm_beginners_image1.gif" alt="">
                                    <br>Try using music for the first three minutes of your track, with a minute of sound effects or even silence at the end.
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom"><div></div></div>
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
