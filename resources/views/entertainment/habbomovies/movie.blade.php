{{--
    Thanks to =dj.matias= on RageZone (https://forum.ragezone.com/threads/habbowood-2007-movie-maker-player.914221/)
    The HabboWood Movie Editor wouldn't have been possible without him. <3
--}}
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Habbowood</title>
    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/swfobject.js"></script>
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
</head>

<body bgcolor="#292929">
    {{--<object type="application/x-shockwave-flash"
        data="{{ url('/') }}/web/flash/habbowood/movie_player_skin.swf?figuredata_url={{ url('/') }}/web/xml/figure_data_xml_hc.xml
        &movie_data_url={{ url('/') }}/habbomovies/movie_xml_data/{{ $movie->id }}&localization_url={{ url('/') }}/web/xml/habbowood_locale.xml&shoot_movie_url=/private/openeditor
        &share_this_movie=share_movie&meet_filmmakers_url=meet"
        width="536" height="360">
        <param name="base" value="{{ url('/') }}/habbomovies/" />
        <param name="allowScriptAccess" value="always" />
    </object>--}}

    <div id="flashcontent" style="text-align:center"></div>
    <script>
        var swfobj = new SWFObject("{{ url('/') }}/web/flash/habbowood/movie_player_skin.swf", "movie_player_skin", "536", "360", "7");
        swfobj.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml_hc.xml");
        swfobj.addVariable("movie_data_url", "{{ url('/') }}/habbomovies/movie_xml_data/{{ $movie->id }}");
        swfobj.addVariable("localization_url", "{{ url('/') }}/web/xml/habbowood_locale.xml");
        swfobj.addVariable("shoot_movie_url", "/habbomovies/private/openeditor");
        swfobj.addVariable("meet_filmmakers_url", "/entertainment/habbowood/filmakers");
        swfobj.addVariable("share_this_movie", "/habbomovies/share/{{ $movie->id }}");
        swfobj.addParam("base", "{{ url('/') }}/web/flash/habbowood/");
        swfobj.addParam("allowScriptAccess", "always");
        swfobj.write("flashcontent");
    </script>

</body>

</html>
