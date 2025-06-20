@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'My Movies')

@section('content')
    <script type="text/javascript">
        var xmov;
    </script>
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 202px;" class="habboPage-col">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Something about my movies</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 539px;" class="habboPage-col rightmost">
                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3>My Movies</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    <table class="search-result">
                                        @foreach ($movies as $movie)
                                            <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                                <td class="image">
                                                    <img src="{{ url('/') }}/web/images/habbomovies/genres/{{ $movie->genre }}.gif" border="0">
                                                </td>
                                                <td class="text">
                                                    <strong>{{ $movie->title }}</strong><br>
                                                    {{ $movie->subtitle }}<br>
                                                </td>
                                                <td valign="middle">
                                                    <ul class="rater-list">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <li class="rater-list-item">
                                                                @if ($movie->rating > $i)
                                                                    <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                                @else
                                                                    <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt="">
                                                                @endif
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </td>
                                                <td class="text">
                                                    Views: {{ $movie->views }}<br>
                                                    Votes: {{ $movie->votes }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-film-bottom">
                                <div class="portlet-film-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 4px;"></td>
                    <td valign="top" style="width: 176px;">
                        <div id="ad_sidebar">
                            @include('includes.partners')
                            @include('includes.ad160')
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br style="clear: both;">
@stop
