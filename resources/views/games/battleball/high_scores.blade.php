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
                                                    @include('games.scores', ['gameId' => 1, 'scores' => collect([
                                                        ["name" => "xX_Master_Xx", "games" => 12, "best" => 98, "total" => 850],
                                                        ["name" => "Dark_Lord77", "games" => 20, "best" => 105, "total" => 1200],
                                                        ["name" => "Princesa_Anjinha", "games" => 15, "best" => 97, "total" => 1025],
                                                        ["name" => "SkateBoy_99", "games" => 8, "best" => 110, "total" => 650],
                                                        ["name" => "PandaFofo_123", "games" => 22, "best" => 120, "total" => 1950],
                                                        ["name" => "MestreDoGame", "games" => 14, "best" => 95, "total" => 900],
                                                        ["name" => "Shadow_Knight", "games" => 10, "best" => 99, "total" => 720],
                                                        ["name" => "Rainbow_Queen", "games" => 17, "best" => 108, "total" => 1350],
                                                        ["name" => "Xx_Legendary_xX", "games" => 9, "best" => 92, "total" => 680],
                                                        ["name" => "DivaDoHabbo", "games" => 11, "best" => 101, "total" => 850],
                                                        ["name" => "Tigre_Feroz", "games" => 18, "best" => 113, "total" => 1470],
                                                        ["name" => "GamerPro_777", "games" => 21, "best" => 118, "total" => 1600],
                                                        ["name" => "Ninja_Sombrio", "games" => 13, "best" => 94, "total" => 970],
                                                        ["name" => "Docinho_Pink", "games" => 16, "best" => 107, "total" => 1290],
                                                        ["name" => "Xx_HabboKing_xX", "games" => 19, "best" => 115, "total" => 1505],
                                                        ["name" => "Dark_Fenix", "games" => 7, "best" => 90, "total" => 570],
                                                        ["name" => "SuperNoob_99", "games" => 23, "best" => 125, "total" => 2050],
                                                        ["name" => "Xx_AnjoNegro_xX", "games" => 12, "best" => 102, "total" => 890],
                                                        ["name" => "Habbo_Legend", "games" => 15, "best" => 109, "total" => 1100],
                                                        ["name" => "Fofoleta_22", "games" => 20, "best" => 117, "total" => 1780],
                                                        ["name" => "Dragao_Vermelho", "games" => 10, "best" => 100, "total" => 720],
                                                        ["name" => "LoboSolito_88", "games" => 14, "best" => 98, "total" => 940],
                                                        ["name" => "Xx_FlameKing_xX", "games" => 16, "best" => 111, "total" => 1300],
                                                        ["name" => "FadaEncantada_12", "games" => 11, "best" => 96, "total" => 770],
                                                        ["name" => "MagoSupremo_42", "games" => 13, "best" => 103, "total" => 980],
                                                        ["name" => "ZumbiLoko_66", "games" => 9, "best" => 95, "total" => 690],
                                                        ["name" => "Xx_MitoDoHabbo_xX", "games" => 17, "best" => 114, "total" => 1400],
                                                        ["name" => "VingadorSombrio_5", "games" => 19, "best" => 119, "total" => 1550],
                                                        ["name" => "Xx_CatLover_xX", "games" => 22, "best" => 121, "total" => 1900],
                                                        ["name" => "ManoDoHabbo_33", "games" => 8, "best" => 97, "total" => 600],
                                                        ["name" => "SuperHabbiano_10", "games" => 21, "best" => 116, "total" => 1650],
                                                        ["name" => "Xx_LordeDasTrevas_xX", "games" => 15, "best" => 112, "total" => 1250],
                                                        ["name" => "Fofuxo_123", "games" => 12, "best" => 99, "total" => 880],
                                                        ["name" => "Habbo_Supremo_7", "games" => 18, "best" => 109, "total" => 1450],
                                                        ["name" => "Xx_CavaleiroDourado_xX", "games" => 14, "best" => 105, "total" => 990],
                                                        ["name" => "PinguimFofo_99", "games" => 11, "best" => 94, "total" => 750],
                                                        ["name" => "Xx_HabboQueen_xX", "games" => 16, "best" => 110, "total" => 1270],
                                                        ["name" => "Rex_Terror_666", "games" => 20, "best" => 118, "total" => 1750],
                                                        ["name" => "SenhorDoHabbo_01", "games" => 10, "best" => 101, "total" => 780]
                                                    ])])
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
