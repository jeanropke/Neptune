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
                                        <a href="{{ url('/') }}/entertainment/habbowood/sharemovie/{{ $movie->id }}" class="hwood_toolbutton tell">
                                            <span>Share a movie</span>
                                        </a>
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
                                    <div class="portlet-director-header">
                                        {{-- Missing habbowood images: https://github.com/jeanropke/Neptune/issues/3 --}}
                                        <img src="{{ url('/') }}/web/images/box-scale/habbomovies_klaffi-tl.gif">
                                    </div>
                                    <div class="portlet-director-header-b"></div>
                                    <div class="portlet-director-body">
                                        <div class="portlet-director-content">
                                            <div class="habbomovies-movie-info">
                                                <span class="habbomovies-movie-name">{{ $movie->title }}</span>
                                                <span class="habbomovies-movie-created">Created: {{ $movie->created_at->format('M j, Y h:i:s A') }}</span>
                                                <span class="habbomovies-movie-by">By: <b><a
                                                            href="{{ url('/') }}//home/{{ $movie->getAuthor()->username }}">{{ $movie->getAuthor()->username }}</a></b></span>
                                                <span class="habbomovies-movie-category">Category: {{ $movie->getGenre() }}</span>
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
                                <h3>
                                    <img width="15" hspace="3" height="15" border="0" alt="golden star" id="galleryImage" src="{{ cms_config('site.c_images.url') }}/album2201/golden_star.gif"> Related Movies</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    @include('entertainment.habbowood.includes.moviesrelated')
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
