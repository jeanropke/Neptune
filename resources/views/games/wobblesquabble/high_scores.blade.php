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
                                    @include('games.wobblesquabble.include.menu', ['page' => 'high_scores'])
                                    @foreach (boxes('games.wobblesquabble.high_scores', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="portlet-scale gold">
                                        <div class="portlet-scale-header">
                                            <h3>High Scores</h3>
                                        </div>
                                        <div class="portlet-scale-body">
                                            <div class="portlet-scale-content">

                                                <p><img width="452" height="130" border="0" id="galleryImage" alt="ws title"
                                                        src="{{ url('/') }}/c_images/album209/ws_title.gif"></p>
                                                <p>Each month the player that comes top of the High Scores table will get their name published in Habbo Today and win themselves a small
                                                    Gold Trophy. So what are you waiting for? Get moving, slapping &amp; nudging your way to an excellent prize!<br></p>
                                                <p></p>
                                                <div id="wobble_scores_1" class="component">
                                                    @include('games.wobblescores')
                                                </div>
                                                <script type="text/javascript">
                                                    hijaxLinks("wobble_scores_1", "/components/wobble_scores");
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
