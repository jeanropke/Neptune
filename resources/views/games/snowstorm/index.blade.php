@extends('layouts.master', ['menuId' => '27', 'submenuId' => '35', 'headline' => true])

@section('title', 'SnowStorm')

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
                                    @include('games.snowstorm.include.menu', ['page' => 'index'])
                                    @foreach (boxes('games.snowstorm.index', 1) as $box)
                                        <div class="v2box blue light">
                                            <div class="headline">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="border">
                                                <div></div>
                                            </div>
                                            <div class="body">
                                                {!! $box->content !!}
                                                <div class="clear"></div>
                                            </div>
                                            <div class="bottom">
                                                <div></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="portlet-scale gold">
                                        <div class="portlet-scale-header">
                                            <h3>SnowStorm has arrived!</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <div align="center"><img
                                                        src="{{ url('/') }}/c_images/album1618/Snowstorm_LandingP_505x236.gif"
                                                        alt="">
                                                </div>

                                                <p><img hspace="5" align="right"
                                                        src="{{ url('/') }}/c_images/album1478/ss_button_level_003.gif"
                                                        alt="">Welcome to Snowstorm, the latest and greatest online multiplayer game to hit Habbo. Using strategy, teamwork, and
                                                    precision accuracy, your job is to defeat the opposing team on the battlefield. Weather the clouds of snowballs and take your team
                                                    to victory!</p>

                                                <p><img hspace="5" align="left"
                                                        src="{{ url('/') }}/c_images/album1478/ss_button_level_004.gif"
                                                        alt=""><a href="{{ url('/') }}/games/snowstorm/rules">Learn how to
                                                        play SnowStorm!</a></p>
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
