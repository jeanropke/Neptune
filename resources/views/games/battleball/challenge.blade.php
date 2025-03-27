@extends('layouts.master', ['menuId' => '27', 'submenuId' => '34', 'headline' => true])

@section('title', 'Battle Ball')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @include('games.battleball.include.menu', ['page' => 'challenge'])

                                    @foreach (boxes('games.battleball.challenge', 1) as $box)
                                        <div class="portlet-scale gold">
                                            <div class="portlet-scale-header">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="portlet-scale-body">
                                                <div class="portlet-scale-content">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="portlet-scale-bottom">
                                                <div class="portlet-scale-bottom-body"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="portlet-scale gold">
                                        <div class="portlet-scale-header">
                                            <h3>The Challenge</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <img width="195" hspace="0" height="76" border="0" align="right" id="galleryImage" alt="bb logo"
                                                    src="{{ url('/') }}/c_images/album329/bb_logo.gif">
                                                <p>Do you have what it takes to become a Battle Ball Champion? Can you stay in the top 10 and take home the coveted Gold Dragon? If you
                                                    think you have got the speed and the skills, read on!</p>
                                                <p>The Battle Ball Challenge isn't a very complex thing, so pay attention!<br></p>
                                                <p>Every Monday, the week’s Top 10 Scorers will be assigned the special Champion Badge, an exclusive badge given to the best scoring
                                                    Battle Ballers. The scores are taken from the previous weeks high score and are recorded every Monday morning. <br></p>
                                                <p>Each Monday these badges are added, or removed from the top 10, (removed if they are no longer in the top 10) and we keep a
                                                    record.<br></p>
                                                <div align="center"><img width="134" height="112" border="0"
                                                        src="{{ url('/') }}/c_images/album314/dragons.gif"
                                                        alt=""><br>The top 3 Battle Ballers of the month will recieve a <b>Gold Dragon</b>, <b>Silver Dragon</b>, or a <b>Bronze
                                                        Dragon</b>, depending on your standing!</div><br>
                                                <p></p>
                                                <p><b><b>Well, What are you waiting for? Get Battling!<br></b></b></p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="portlet-scale-bottom">
                                            <div class="portlet-scale-bottom-body"></div>
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
