@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Movie Embed')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">

        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 741px;" class="habboPage-col rightmost">
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Embed your Habbowood movies on your webpage or blog!</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    Feel like showing your Habbowood movies on your <span style="font-weight: bold;">homepage,</span> <span style="font-weight: bold;">MySpace</span>
                                    page or your networking site's personal homepage? Follow the drill below and in <span style="font-weight: bold;">3 min</span> time all your friends
                                    will be enjoying your masterpiece!<br><br>

                                    <ol>
                                        <li><b>Copy the code</b><br><br>
                                            If you want a <a href="http://www.myspace.com/habbowolf" target="_new">normal sized player</a>
                                            then copy the following HTML code:</li><br>

                                        <form
                                            method="post" name="xform">
                                            <textarea rows="5" cols="50" name="xbox">&lt;embed
type="application/x-shockwave-flash"
src="http://export.cdn.habbo.com/web/export-habbowood2007/flash/habbowood/movie_player_embedded.swf"
base="http://export.cdn.habbo.com/web/export-habbowood2007/flash/habbowood/"
allowscriptaccess="always" height="360" width="536"
flashvars="figuredata_url=http://export.habbo.com/figure/figure_data_xml_hc&amp;localization_url=http://export.habbo.com/xml/habbowood_player.xml&amp;movie_data_url=http://export.habbo.com/habbomovies/ajax/getpublicmovie/MOVIEID"&gt;Made with habbo.com Habbowood Moviemaker</textarea>
                                        </form><br>

                                        If you want a <a href="http://myspace.com/donniesantini" target="_new">DOUBLE sized player</a> then
                                        copy the following HTML code:<br><br>
                                        <form
                                            method="post" name="xform">
                                            <textarea rows="5" cols="50" name="xbox">&lt;embed
type="application/x-shockwave-flash"
src="http://export.cdn.habbo.com/web/export-habbowood2007/flash/habbowood/movie_player_embedded.swf"
base="http://export.cdn.habbo.com/web/export-habbowood2007/flash/habbowood/"
allowscriptaccess="always" height="720" width="1072"
flashvars="figuredata_url=http://export.habbo.com/figure/figure_data_xml_hc&amp;localization_url=http://export.habbo.com/xml/habbowood_player.xml&amp;movie_data_url=http://export.habbo.com/habbomovies/ajax/getpublicmovie/MOVIEID"&gt;Made with habbo.com Habbowood Moviemaker</textarea>
                                        </form><br>
                                        <li><b>Add your Movie Id number to the code</b><br>Paste the code you copied on a text editor and change the word <b>MOVIEID</b> in the text
                                            with the <span style="font-weight: bold;">ID number</span> of your movie (i.e. the number at the <span style="font-weight: bold;">end</span>
                                            of your movie's URL). <b>Example:</b> if your movie's URL is:<br><br>
                                            <center><span style="text-decoration: underline;"></span><u>{{ url('/') }}/entertainment/habbowood/movies/26857</u></center><br>its ID
                                            is <b>26857</b><br><br>
                                            Substitute <b>26857</b> to the word MOVIENUMBER (in <b>2</b> locations in the HTML code above) and you're done.<br><br>
                                            <b>Note:</b> you can get any of your <b>published</b> movies' URLs simply by clicking the "My Movies" link on the tab above, watching the
                                            movie you want to embed and copying its URL while you watch it. You can get any of your <b>buddies'</b> published movies' URLs just by
                                            visiting their <a target="_new" href="{{ url('/') }}/home">Habbo Home</a>, checking out
                                            their Habbowood Movie Widget and watching the movie you want to embed!<br>
                                        </li><br><br>
                                        <li><b>Paste the Habbowood HTML code to your webpage</b><br>
                                            Paste the HTML code to your <b>MySpace page</b> or other personal <b>webpage</b> HTML code, then publish the page!</li>
                                    </ol>

                                    <p>Et voila, the Habbowood Player will appear on your page, ready to delight, entrance and annoy all your friends!</p>

                                    <p>Back to <a href="{{ url('/') }}/entertainment/habbowood/" target="_self">Habbowood Main</a></p>
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
