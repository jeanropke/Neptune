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
                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.co.uk/c_images/album1644/unknown_4.gif"
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

                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Target Top Ten</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <p align="center"><a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/target/hdma_top10.html"><img
                                                width="130" height="100" border="0"
                                                src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/c_images/album2544/top10button.gif"
                                                alt=""></a></p>
                                    <p align="center"><a href="https://web.archive.org/web/20071003010249/http://www.habbo.com/entertainment/target/hdma_top10.html">Check out</a> the
                                        daily <span style="font-weight: bold;">Top Ten</span> Habbowood Movies brought to you by <span style="font-weight: bold;">Target</span>. </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
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
                                        src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.co.uk/c_images/album2627/unknown.gif" alt="">
                                    Everyday, a movie will be added to this list by Habbo Staff from the daily Top 10 Rated movies (on the left). The movies in this list will then
                                    become our finalists!<br><br><br>
                                    <div class="habbomovie-scrollable-component">
                                        <table border="0" cellpadding="2" cellspacing="0" width="90%">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/2549">Stop That Hacker!</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071003010249/http://www.habbo.com/home/:Poptart">:Poptart</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">49795</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/24619">Objective Impossible</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071003010249/http://www.habbo.com/home/riley66">riley66</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">18030</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/adventure.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/38119">Abnormal</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071003010249/http://www.habbo.com/home/Tidning">Tidning</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">8980</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/1303">Mission: Habbowood</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071003010249/http://www.habbo.com/home/Mathew">Mathew</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">9488</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/romantic.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/46237">I Love You.</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071003010249/http://www.habbo.com/home/Warmness">Warmness</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">10379</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/scifi.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/29010">Aliens of Terror</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071003010249/http://www.habbo.com/home/Mutata">Mutata</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">5224</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/scifi.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/31273">Inactive Galaxy</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a
                                                            href="/web/20071003010249/http://www.habbo.com/home/skamanjab">skamanjab</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">5934</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/romantic.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/3051">Chicken Sandwich</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a
                                                            href="/web/20071003010249/http://www.habbo.com/home/Funkipenguin">Funkipenguin</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">20415</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/scifi.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071003010249/http://www.habbo.com/entertainment/habbowood/movies/46317">The Other Hotel</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a
                                                            href="/web/20071003010249/http://www.habbo.com/home/gamerguy821">gamerguy821</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif" alt="">
                                                            </li>
                                                            <li class="rater-list-item"><img
                                                                    src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif" alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">7736</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
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
