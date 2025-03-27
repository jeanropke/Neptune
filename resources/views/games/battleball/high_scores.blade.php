@extends('layouts.master', ['menuId' => '27', 'submenuId' => '34', 'headline' => true])

@section('title', 'High Scores')

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
                                    @include('games.battleball.include.menu', ['page' => 'high_scores'])

                                    @foreach (boxes('games.battleball.high_scores', 1) as $box)
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
                                            <h3>High Scores</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <img width="195" hspace="0" height="76" border="0" align="right" id="galleryImage" alt="bb logo"
                                                    src="{{ url('/') }}/c_images/album329/bb_logo.gif">
                                                <p>At the end of every Battle Ball game, a single player’s score will be added to his/her Habbos cumulative Score. The best Scorers will
                                                    then appear in the High Scores tables below (Weekly, Monthly and All-Time). The top scorers of each week will receive an exclusive
                                                    Battle Ball badge!</p>
                                                <p><br></p>
                                                <div id="scores_1" class="component">
                                                    {{--include('games.scores', ['gameId' => 1, 'scores' => ''])--}}
                                                </div>
                                                <script type="text/javascript">
                                                    hijaxLinks("scores_1", "/components/scores");
                                                </script>
                                                <br>
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
