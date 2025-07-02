@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Movies')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-3col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 202px;" class="habboPage-col">
                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3></h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">

                                    <div class="portlet-director director">
                                        <div class="portlet-director-header"><img
                                                src="{{ cms_config('site.web.url') }}/images/box-scale/habbomovies_klaffi-tl.gif">
                                        </div>
                                        <div class="portlet-director-header-b"></div>
                                        <div class="portlet-director-body">
                                            <div class="portlet-director-content">
                                                <div class="habbomovies-movie-info">
                                                    <span class="habbomovies-movie-name">{{ $movie->title }}</span>
                                                    <span class="habbomovies-movie-created">Created: {{ $movie->created_at->format('M j, Y h:i:s A') }}</span>
                                                    <span class="habbomovies-movie-by">By: <b><a href="{{ url('/') }}/home/{{ $movie->author->username }}">{{ $movie->author->username }}</a></b></span>
                                                    <span class="habbomovies-movie-category">Category: {{ $movie->getGenre() }}</span>
                                                    <span class="habbomovies-movie-url">URL:</span>
                                                </div>
                                                <div class="habbomovies-director-avatar">
                                                    <img alt="" src="{{ cms_config('site.avatarimage.url') }}{{ $movie->author->figure }}114400">
                                                </div>
                                                <input type="text" value="{{ url('/') }}/entertainment/habbowood/movies/{{ $movie->id }}"
                                                    class="habbomovies-movie-url-field">
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="portlet-director-bottom">
                                            <div class="portlet-director-bottom-body"></div>
                                        </div>
                                    </div>
                                    <p>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-film-bottom">
                                <div class="portlet-film-bottom-body"></div>
                            </div>
                        </div>
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Share the Movie URL</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    Copy the <span style="font-weight: bold;">Movie URL</span> above and share it via your own email or IM!
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 336px;" class="habboPage-col">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Share this movie the easy way...</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <p>Share this movie with all your friends!<br></p>
                                    <p><br></p>
                                    <p>
                                        <a class="colorlink orange" href="{{ url('/') }}/entertainment/habbowood/sharemovie_tell.html?page=/entertainment/habbowood/movies/{{ $movie->id }}">
                                            <span>Tell my friend about this movie</span>
                                        </a>
                                        <span style="font-weight: bold;">&nbsp;</span>
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
                                <h3>...or log in and use {{ cms_config('hotel.name.short') }}'s Sharing Tool</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <p>
                                        By logging in with your {{ cms_config('hotel.name.short') }} account <span style="font-weight: bold;">before</span> sharing this movie, you'll have much cooler sharing options, such as:
                                    </p>
                                    <ul>
                                        <li>Adding the recipient to your <b>Friends List</b> as soon as she/he registers</li>
                                        <li>Including your own <b>{{ cms_config('hotel.name.short') }}</b> in the email</li>
                                        <li>Writing a <b>personalized message</b></li>
                                    </ul>Log in and boost your sharing power!<br>
                                    <br><a class="colorlink orange"
                                        href="{{ url('/') }}/account/login?page=/entertainment/habbowood/sharemovie/{{ $movie->id }}"><span>Login</span></a>
                                    <br><br>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 202px;" class="habboPage-col rightmost">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Embed this movie on your website or blog</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <span style="font-weight: bold;">1.</span> Copy this code:<br>

                                    <form method="post" name="xform">
                                        <textarea rows="5" cols="20" name="xbox">&lt;embed
type="application/x-shockwave-flash"
src="http://export.cdn.habbo.com/web/export-habbowood2007/flash/habbowood/movie_player_embedded.swf"
base="http://export.cdn.habbo.com/web/export-habbowood2007/flash/habbowood/"
allowscriptaccess="always" height="360" width="536"
flashvars="figuredata_url=http://export.habbo.com/figure/figure_data_xml_hc&amp;localization_url=http://export.habbo.com/xml/habbowood_player.xml&amp;movie_data_url=http://export.habbo.com/habbomovies/ajax/getpublicmovie/MOVIEID"&gt;Made with habbo.com Habbowood Moviemaker</textarea>
                                    </form><span style="font-weight: bold;"><br>

                                        2.</span> Substitute the <span style="font-weight: bold;">movieId</span> (i.e. the <span style="font-weight: bold;">number</span> at the end of
                                    the <span style="font-weight: bold;">movie's URL</span> in the browser window) to the word <span style="font-weight: bold;">MOVIEID</span> in the
                                    code above (the word appears twice)<br><span style="font-weight: bold;">

                                        <br>
                                        3.</span> Copy the code into your website or blog!<br>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
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
