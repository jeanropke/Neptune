@extends('layouts.master', ['menuId' => '27'])

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
                                    @include('games.snowstorm.include.menu', ['page' => 'high_scores'])
                                    @foreach (boxes('games.snowstorm.high_scores', 1) as $box)
                                    <div class="v2box blue light">
                                        <div class="headline"><h3>{{ $box->title }}</h3></div>
                                        <div class="border"><div></div></div>
                                        <div class="body">
                                            {!! $box->content !!}
                                            <div class="clear"></div>
                                        </div>
                                        <div class="bottom"><div></div></div>
                                    </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v2box blue light">
                                        <div class="headline">
                                            <h3>High Scores</h3>
                                        </div>
                                        <div class="border">
                                            <div></div>
                                        </div>
                                        <div class="body">
                                            <div align="center">
                                                <img width="265" vspace="5" hspace="5" height="80" border="0" align="absmiddle"
                                                    src="{{ url('/') }}/c_images/album1461/SnoStorm_logo.gif"
                                                    alt="">
                                            </div><br>
                                            At the end of each SnowStorm game (but not tournament) a player's score will be added to his/her total score.<br>
                                            <img vspace="5" hspace="5" border="0" align="right"
                                                src="{{ url('/') }}/c_images/album1481/tutorial_6.gif" alt=""><br>
                                            The <span style="font-weight: bold;">Best 20 Scorers of the Month</span> will get to wear an exclusive <span
                                                style="font-weight: bold;">SnowStorm</span> badge for the whole of the following month, making them the envy of other SnowStorm players
                                            and snow tabbies! They will also receive 20 game tickets to help them keep on pelting. :) The <span style="font-weight: bold;">Top 3 Scorers
                                                of the Month</span> win a <span style="font-weight: bold;">Gold</span>, <span style="font-weight: bold;">Silver</span>, and <span
                                                style="font-weight: bold;">Bronze Metal Dragon</span> each respectively, plus their names in the prestigious Gamers Hall of Fame on the
                                            homepage.<br>
                                            <br>
                                            Click to see the weekly scores, the monthly scores or the all time scores:<br>
                                            <br>
                                            <div id="scores_1" class="component">
                                                {{--include('games.scores', ['gameId' => 2, 'scores' => ''])--}}
                                            </div>
                                            <script type="text/javascript">
                                                hijaxLinks("scores_1", "/components/scores");
                                            </script>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="bottom">
                                            <div></div>
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
