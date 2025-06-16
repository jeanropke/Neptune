@extends('layouts.master', ['menuId' => '42'])

@section('title', 'Habbowood')

@section('content')
    <script type="text/javascript">
        var xmov;
    </script>

    <div class="hwood-filmstrip">


        <a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/index.html">Habbowood Main</a> |
        <a href="/web/20071003010249/http://www.habbo.com/habbomovies/private/openeditor">Shoot a movie</a>|

        <a target="_self" href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/filmakers.html">Community</a> | <a
            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies.html" target="_self">Featured Movies</a> | <a
            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movieshc.html" target="_self">HC Extras</a> | <span
            style="text-decoration: underline;"></span><a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/embed.html"
            target="_self">Embed</a> | <a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/competition.html" target="_self">Awards</a> | <a
            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/help.html" target="_self">Demo</a>
    </div>
    <div class="habbomovies-custom-bg">

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td style="width:4px;">&nbsp;</td>
                    <td colspan="3" valign="top" style="width:553px;">
                        <div class="portlet-darkgrey darkgrey">
                            <div class="portlet-darkgrey-header">
                                <h3></h3>
                            </div>
                            <div class="portlet-darkgrey-body">
                                <div class="portlet-darkgrey-content">

                                    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/swfobject.js"></script>
                                    <div id="flashcontent" style="text-align:center">
                                    </div>
                                    <script>
                                        var swfobj = new SWFObject("{{ cms_config('site.c_images.url') }}/album2045/frontpageloop_04_05.swf", "frontpageloop", "534", "325", "7");
                                        swfobj.addVariable("localization_url", "/web/xml/habbowood_intro.xml");
                                        swfobj.addVariable("shoot_movie_url", "/habbomovies/private/openeditor");
                                        swfobj.addVariable("watch_movie_url", "/entertainment/habbowood/movies.html");
                                        swfobj.addVariable("meet_filmmakers_url", "/entertainment/habbowood/filmakers.html");
                                        swfobj.addVariable("competition_url", "/entertainment/habbowood/index.html");
                                        swfobj.addParam("base", "/flash/");
                                        swfobj.addParam("allowScriptAccess", "always");
                                        swfobj.addParam("menu", "false");
                                        swfobj.write("flashcontent");
                                    </script>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-darkgrey-bottom">
                                <div class="portlet-darkgrey-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td style="width:4px;" rowspan="2">&nbsp;</td>
                    <td valign="top" style="width:179px;" rowspan="2">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>
                                    <center><img src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/c_images/album2036/habbowood.gif" width="141"
                                            height="28" id="galleryImage" border="0" alt="habbowood"></center>
                                </h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    Welcome to the <span style="font-weight: bold;">Habbowood Digital Movie Awards</span>, the internet's coolest moviemaking competition!<br>
                                    <a target="_blank" href="https://web.archive.org/web/20071003010249/http://www.habbo.com/habbomovies/private/openeditor"><br>
                                        <img width="45" vspace="0" hspace="5" height="45" border="0" align="left"
                                            src="{{ cms_config('site.c_images.url') }}/album1644/unknown_4.gif"
                                            alt=""></a><br><a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/habbomovies/private/openeditor">Shoot a
                                        movie
                                        and WIN!</a><br>
                                    <p><span style="font-weight: bold;"><br></span></p>
                                    <p><span style="font-weight: bold;">Note</span>: You'll need to <span style="font-weight: bold;">log in</span> with your Habbo avatar or to
                                        participate <span style="font-style: italic;">(It's free!)</span></p>
                                    <p>
                                        <img width="15" height="15"
                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.fi/c_images/album2201/golden_star.gif" alt=""> <a
                                            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/competition.html">How to Participate</a><br>
                                        <img width="15" height="15"
                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.fi/c_images/album2201/golden_star.gif" alt=""> <a
                                            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/competition.html#PRIZES">The Prizes</a><br>
                                        <img width="15" height="15"
                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.fi/c_images/album2201/golden_star.gif" alt=""> <a
                                            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/embed.html">Embed your Movies</a><br>
                                        <img width="15" height="15"
                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.fi/c_images/album2201/golden_star.gif" alt=""> <a
                                            href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movieshc.html">Habbo Club Extras</a><br>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>

                        {{--
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Target Top Ten</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <p align="center"><a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/target/hdma_top10.html"><img width="130"
                                                height="100" border="0"
                                                src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/c_images/album2544/top10button.gif" alt=""></a>
                                    </p>
                                    <p align="center"><a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/target/hdma_top10.html">Check out</a> the
                                        daily <span style="font-weight: bold;">Top Ten</span> Habbowood Movies brought to you by <span style="font-weight: bold;">Target</span>. </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                        --}}
                    </td>

                    <td style="width:5px;" rowspan="2">&nbsp;</td>
                    <td valign="top" style="width: 168px;" rowspan="2">
                        <div id="ad_sidebar">
                            @include('includes.partners')
                            @include('includes.ad160')
                        </div>
                    </td>
                    <td style="width:4px;" rowspan="2">&nbsp;</td>
                </tr>

                <tr>
                    <td style="width:4px;">&nbsp;</td>
                    <td valign="top" style="width:274px;">
                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3>Daily Top Rated Movies</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">

                                    <div class="habbomovie-scrollable-component">
                                        <table border="0" cellpadding="2" cellspacing="0" width="90%">
                                            <tbody>
                                                @foreach ($top as $movie)
                                                    <tr>
                                                        <td valign="top" class="list-movie-item">
                                                            <img class="genre-image" src="{{ url('/') }}/web/images/habbomovies/genres/action.gif" border="0">
                                                        </td>
                                                        <td valign="top" class="list-movie-name">
                                                            <a href="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}">{{ $movie->title }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                        <td valign="middle" class="list-movie-creatorname"><a
                                                                href="{{ url('/') }}/home/{{ $movie->getAuthor()->username }}">{{ $movie->getAuthor()->username }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                        <td valign="middle">
                                                            <ul class="rater-list">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <li class="rater-list-item">
                                                                        @if($movie->rating > $i)
                                                                        <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                                        @else
                                                                        <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt="">
                                                                        @endif
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                        <td valign="middle">{{ $movie->views }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-film-bottom">
                                <div class="portlet-film-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td style="width:4px;">&nbsp;</td>
                    <td valign="top" style="width:275px;">
                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3>Staff Picks</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">

                                    <img vspace="5" hspace="5" border="0" align="left"
                                        src="{{ cms_config('site.c_images.url') }}/album2627/unknown.gif" alt="">
                                    Everyday, a movie will be added to this list by Habbo Staff from the daily Top 10 Rated movies (on the left). The movies in this list will then
                                    become our finalists!<br><br><br>
                                    <div class="habbomovie-scrollable-component">
                                        <table border="0" cellpadding="2" cellspacing="0" width="90%">
                                            <tbody>
                                                @foreach ($staff as $pick)
                                                @php($movie = $pick->getMovie())
                                                    <tr>
                                                        <td valign="top" class="list-movie-item">
                                                            <img class="genre-image" src="{{ url('/') }}/web/images/habbomovies/genres/action.gif" border="0">
                                                        </td>
                                                        <td valign="top" class="list-movie-name">
                                                            <a href="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}">{{ $movie->title }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                        <td valign="middle" class="list-movie-creatorname"><a
                                                                href="{{ url('/') }}/home/{{ $movie->getAuthor()->username }}">{{ $movie->getAuthor()->username }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                        <td valign="middle">
                                                            <ul class="rater-list">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <li class="rater-list-item">
                                                                        @if($movie->rating > $i)
                                                                        <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                                        @else
                                                                        <img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt="">
                                                                        @endif
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                        <td valign="middle">{{ $movie->views }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-film-bottom">
                                <div class="portlet-film-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <br style="clear: both;">
@stop
