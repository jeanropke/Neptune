@extends('layouts.master', ['menuId' => '27'])

@section('title', 'Freefall Dive')

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
                                    @foreach (boxes('games.dive', 1) as $box)
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
                                            <h3>Freefall Dive</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <p>Do you have what it takes on the high board? It’s a long way down… dare you take the plunge? Experiment with a variety of different
                                                    combinations to stun the audience with your brilliant moves! <br><br><strong><img vspace="0" hspace="0" border="0"
                                                            align="right" src="{{ url('/') }}/c_images/content/tour5_content_1.gif" alt="">Instructions<br></strong>In
                                                    order to dive you first need game tickets and a swimming suit! You can purchase 5
                                                    Game Tickets for 2 Habbo Credits in the ticket machine by the lift.<br>To change into your swimsuit, click on one of the stalls (not
                                                    pictured) and select one of many outfits.<br>Then stand in line and wait your turn!<br><br>Once up on the board, it's a long way
                                                    down!<br><br>You can use various keys on your keyboard to perform different moves like the Somersault or the Star. Here's a short
                                                    guide to some of the moves:<br><br></p>
                                                <p></p>
                                                <p align="center"></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216"><img width="143" height="103" border="0" id="galleryImage" alt="W dive"
                                                                    src="{{ url('/') }}/c_images/album209/W_dive.png"></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><strong>Star<br></strong>Throw your hands out! Just be sure not to land
                                                                    like this... It might hurt ;)<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <p align="center"></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216"><img width="143" height="115" border="0" id="galleryImage" alt="Dive A"
                                                                    src="{{ url('/') }}/c_images/album209/Dive_A.png"></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><strong>Air Guitar<br></strong>This one goes up to 11...</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <p align="center"></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216"><img width="144" height="108" border="0" id="galleryImage" alt="Dive E"
                                                                    src="{{ url('/') }}/c_images/album209/Dive_E.png"></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><br><strong>The Flex<br></strong>Show off those muscles and impress all
                                                                    onlookers.</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <p align="center"><br></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216"><img width="143" height="112" border="0" id="galleryImage" alt="Dive Z"
                                                                    src="{{ url('/') }}/c_images/album209/Dive_Z.png"></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"></p>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><strong>Cannonball<br></strong>Make a splash with this move that'll
                                                                    flood any bystanders in your glory!<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <p align="center"></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216"><img width="144" height="106" border="0" id="galleryImage" alt="Dive X"
                                                                    src="{{ url('/') }}/c_images/album209/Dive_X.png"> </td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><strong>Air Punch<br></strong>Because the air hates you too.<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <p align="center"></p>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="216"> <img width="143" height="108" border="0" id="galleryImage" alt="Dive S"
                                                                    src="{{ url('/') }}/c_images/album209/Dive_S.png"></td>
                                                            <td>
                                                                <p style="margin-top: 0pt; margin-bottom: 0pt;"><br><strong>Flip/Dive<br></strong>The perfect finishing move for the
                                                                    most graceful divers.<br></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
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
