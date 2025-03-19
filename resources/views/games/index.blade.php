@extends('layouts.master', ['menuId' => '27', 'submenuId' => '31', 'headline' => true])

@section('title', 'Games')

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
                                @foreach(boxes('games.index', 1) as $box)
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
                            <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                @foreach(boxes('games.index', 2) as $box)
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
                            <td valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">


                                <div class="v3box green">
                                    <div class="v3box-top">
                                        <h3>Top 10 Battle Ballers this Week</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            <div id="scores_1" class="component">


                                                <table class="scores">
                                                    <thead>
                                                        <tr class="scores-header">
                                                            <th class="scores-position"></th>
                                                            <th class="scores-name">Habbo name</th>
                                                            <th class="scores-total">Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td class="scores-position">#.</td>
                                                            <td class="scores-name"><a
                                                                    href="{{ url('/') }}/home/username">username</a>
                                                            </td>
                                                            <td class="scores-total">score</td>
                                                        </tr>
                                                        <tr class="even">
                                                            <td class="scores-position">#.</td>
                                                            <td class="scores-name"><a
                                                                    href="{{ url('/') }}/home/username">username</a>
                                                            </td>
                                                            <td class="scores-total">score</td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                            <br>

                                            <img width="37" vspace="0" hspace="5" height="37" border="0" align="left"
                                                src="{{ url('/') }}/c_images/album1584/TC1.png" id="galleryImage"
                                                alt="TC1">Each week, the top 20 Battle Ball players
                                            earn this special badge that you can't get anywhere else!

                                            <br><br>See all <a href="{{ url('/') }}/games/battleball/high_scores"
                                                target="_self">High Scores</a><br>
                                            Read about <a href="{{ url('/') }}/games/battleball/challenge"
                                                target="_self">The Challenge</a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                @include('includes.ad300')
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
