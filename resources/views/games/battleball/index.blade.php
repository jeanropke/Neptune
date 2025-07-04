@extends('layouts.master', ['menuId' => '27'])

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
                                    @include('games.battleball.include.menu', ['page' => 'index'])

                                    @foreach (boxes('games.battleball.index', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="portlet-scale gold">
                                        <div class="portlet-scale-header">
                                            <h3>Battle Ball</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <p><img width="195" hspace="0" height="76" border="0" align="right" id="galleryImage" alt="bb logo"
                                                        src="{{ url('/') }}/c_images/album329/bb_logo.gif"></p>
                                                <p>Battle Ball can be found in the Public Room section of the Navigator. At the top of the Public Room list you will see "Battle Ball
                                                    Lobby" the category dedicated to Battle Ball! When you click on "Battle Ball Lobby" a drop down list will open showing five
                                                    different Lobbies; four of them is named after the minimum skill level necessary to play in that particular area and one is a free
                                                    for all where players at any level can get together to play!<br></p>
                                                <p>The four different skill levels, measured in scored points, are: "Beginner", "Amateur", "Intermediate" and “Expert”.</p>
                                                <p>The points-range for each levels are as follows:</p>
                                                <ul>
                                                    <li><b>Beginner:</b> 0 – 10,000</li>
                                                    <li><b>Amateur:</b> 10,001 – 100,000</li>
                                                    <li><b>Intermediate:</b> 100,001 – 500,000</li>
                                                    <li><b>Expert:</b> 500,001 &amp; More</li>
                                                </ul>
                                                <p>{{ cms_config('hotel.name.short') }}s can <b>ONLY </b>play games in the Lobby corresponding to their skill level. This way, more
                                                    advanced players can't score easy
                                                    points by beating new players constantly</p>
                                                <p><b>NOTE:</b> Lobbies of any skill level can be entered by any {{ cms_config('hotel.name.short') }}, only game creation and joining
                                                    are limited by skill level (i.e.
                                                    score). If you try to play a game at the wrong skill level an alert will appear.</p>
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
