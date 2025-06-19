@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Movies')

@section('content')
    @include('entertainment.habbowood.includes.menu')
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
                                    <div id="flashcontent"></div>
                                    <script type="text/javascript">
                                        var swfobj = new SWFObject("{{ url('/') }}/web/flash/habbowood/movie_player_skin.swf",
                                            "MoviePlayer", "537", "360", "8");
                                        swfobj.addParam("base", "{{ url('/') }}/web/flash/habbowood/");
                                        swfobj.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml_hc.xml");
                                        swfobj.addVariable("movie_data_url", "{{ url('/') }}/habbomovies/ajax/getpublicmovie/{{ $movie->id }}");
                                        swfobj.addVariable("localization_url", "{{ url('/') }}/web/xml/habbowood_player.xml");
                                        swfobj.addVariable("shoot_movie_url", "{{ url('/') }}/habbomovies/private/openeditor");
                                        swfobj.addVariable("share_this_movie", "{{ url('/') }}/entertainment/habbowood/sharemovie/{{ $movie->id }}");
                                        swfobj.addVariable("competition_url", "{{ url('/') }}/entertainment/habbowood/awards");
                                        swfobj.addVariable("meet_filmmakers_url", "{{ url('/') }}/entertainment/habbowood/filmakers");
                                        swfobj.addVariable("end_page_url", "{{ url('/') }}/entertainment/habbowood/end");
                                        swfobj.addParam("allowScriptAccess", "always");
                                        swfobj.addParam("menu", "false");
                                        swfobj.write("flashcontent");
                                    </script>
                                    <div class="habbomovies-player-floatcol1">

                                        <div id="hwood-rating-stars-{{ $movie->id }}" class="hwood-rating-stars">
                                            @include('entertainment.habbowood.includes.moviestats')
                                        </div>
                                    </div>

                                    <div class="habbomovies-player-floatcol2">
                                        <a href="{{ url('/') }}/entertainment/habbowood/sharemovie/{{ $movie->id }}" class="hwood_toolbutton tell"><span>Share a
                                                movie</span></a>
                                    </div>

                                    <div class="habbomovies-player-floatcol3">
                                    </div>
                                    <br>
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
                        <div class="nobox">
                            <div class="nobox-content">
                                <div class="portlet-director director">
                                    <div class="portlet-director-header"><img
                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/box-scale/habbomovies_klaffi-tl.gif">
                                    </div>
                                    <div class="portlet-director-header-b"></div>
                                    <div class="portlet-director-body">
                                        <div class="portlet-director-content">
                                            <div class="habbomovies-movie-info">
                                                <span class="habbomovies-movie-name">{{ $movie->getTitle() }}</span>
                                                <span class="habbomovies-movie-created">Created: {{ $movie->created_at->format('M j, Y h:i:s A') }}</span>
                                                <span class="habbomovies-movie-by">By: <b><a
                                                            href="{{ url('/') }}//home/{{ $movie->getAuthor()->username }}">{{ $movie->getAuthor()->username }}</a></b></span>
                                                <span class="habbomovies-movie-category">Category: Action</span>
                                                <span class="habbomovies-movie-url">URL:</span>
                                            </div>
                                            <div class="habbomovies-director-avatar">
                                                <img alt="" src="{{ cms_config('site.avatarimage.url') }}{{ $movie->getAuthor()->figure }}1144001">
                                            </div>
                                            <input type="text" value="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}" class="habbomovies-movie-url-field">
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="portlet-director-bottom">
                                        <div class="portlet-director-bottom-body"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('entertainment.habbowood.includes.habbowoodmenu')

                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3><img width="15" hspace="3" height="15" border="0" alt="golden star" id="galleryImage"
                                        src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/c_images/album2201/golden_star.gif"> Related Movies</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">

                                    <div class="habbomovie-scrollable-component">
                                        <table border="0" cellpadding="2" cellspacing="0" width="90%">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/24619">Objective Impossible</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/riley66">riley66</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">18438</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/pirate.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/1">Grouper the fish</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/La_Brea">La_Brea</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_color.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">16013</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/3">leahs
                                                            pretty</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/leahboo961">leahboo961</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">2923</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/7">Best
                                                            Movie EVER!!111</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a
                                                            href="/web/20071012020912/http://habbo.com/home/ToughGuY101">ToughGuY101</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">3392</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/drama.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/8">The
                                                            Day Death Came</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a
                                                            href="/web/20071012020912/http://habbo.com/home/SeaSharpies">SeaSharpies</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">4075</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/9">Cops
                                                            Habbo Version</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/Giggleness">Giggleness</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">13485</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/comedy.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/12">Paris
                                                            Hilton loves u</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/captivates">captivates</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">4621</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/comedy.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/15">The
                                                            Suite Life</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/SODO12">SODO12</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">2781</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/16">air
                                                            force 1</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a
                                                            href="/web/20071012020912/http://habbo.com/home/blackboy2283">blackboy2283</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">796</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><img class="genre-image"
                                                            src="https://web.archive.org/web/20071012020912im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/habbomovies/genres/action.gif"
                                                            border="0"></td>
                                                    <td valign="top" class="list-movie-name"><a
                                                            href="/web/20071012020912/http://habbo.com/entertainment/habbowood/movies/18">eXpert Battle</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>By:</span></td>
                                                    <td valign="middle" class="list-movie-creatorname"><a href="/web/20071012020912/http://habbo.com/home/AsaFar">AsaFar</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Rating:</span></td>
                                                    <td valign="middle">
                                                        <ul class="rater-list">
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                            <li class="rater-list-item"><img src="{{ url('/') }}/web/images/habbomovies/stars/icon_star_grey.gif"
                                                                    alt=""></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" class="list-movie-item"><span>Views:</span></td>
                                                    <td valign="middle">1243</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="height:15px;" colspan="2" class="habbomovies-component-divider"></td>
                                                </tr>
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
                                <h3>Daily Top Rated</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    @include('entertainment.habbowood.includes.topdaily')
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
                                <h3>Daily Staff Picks</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    <img vspace="5" hspace="5" border="0" align="left" src="{{ cms_config('site.c_images.url') }}/album2627/unknown.gif"
                                        alt="">
                                    @include('entertainment.habbowood.includes.staffpick')
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
