{{--
    Thanks to =dj.matias= on RageZone (https://forum.ragezone.com/threads/habbowood-2007-movie-maker-player.914221/)
    The HabboWood Movie Editor wouldn't have been possible without him. <3
--}}
@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'My Movies')

@section('content')
    <script type="text/javascript">
        var xmov;
    </script>
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/swfobject.js"></script>
        <div id="flashcontent" style="height: 797px"></div>
        <script type="text/javascript">
            var habbowood = new FlashObject("{{ url('/') }}/web/flash/habbowood/habbowood_movie_editor.swf", "habbowoodtester", "100%", "100%", "7", "#292929");
            habbowood.addParam("allowScriptAccess", "always");
            habbowood.addParam("scale", "noscale");
            habbowood.addParam("name", "editor");
            habbowood.addParam("quality", "high");
            habbowood.addVariable("language", "fi");
            habbowood.addParam("base", "{{ url('/') }}/web/flash/habbowood/");

            habbowood.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml_hc.xml");
            habbowood.addVariable("movie_data_url", "{{ url('/') }}/web/xml/habbowood_blank.xml");
            habbowood.addVariable("avatar_name", "{{ user()->username }}");
            habbowood.addVariable("localization_url", "{{ url('/') }}/web/xml/habbowood_locale.xml");
            habbowood.addVariable("movie_id", "");
            habbowood.addVariable("cancel_url", "http://www.google.com");
            habbowood.addVariable("post_url", "{{ url('/') }}/habbomovies/savemovie?_token={{ csrf_token() }}");
            habbowood.addVariable("end_page_url", "{{ url('/') }}/habbomovies/movie");
            habbowood.addVariable("is_habbo_club_member", "true");
            habbowood.addVariable("usersearch_url", "{{ url('/') }}/habbomovies/private/ajax/getfiguredata");


            habbowood.write("flashcontent");
        </script>
    </div>
    <br style="clear: both;">
@stop
{{--

 <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="100%" height="100%" valign="top" id="flashcontent">

                <div style="margin:20px;padding:20px;background-color:#FFFFFF;">
                    <h2>Error!</h2>
                    <p>Please install <a href="http://www.adobe.com/go/EN_US-H-GET-FLASH">Flash</a>.</p>
                    <p><a href="http://www.adobe.com/go/EN_US-H-GET-FLASH"><img src="http://www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png"
                                alt="Please install Flash Player" width="88" height="31" border="0" /></a></p>
                </div>

            </td>
            <td width="1"></td>
        </tr>
        <tr>
            <td style="habbowoodnt-size:1px; height:1px;"></td>
            <td></td>
        </tr>
    </table>
    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/swfobject.js"></script>
    <script type="text/javascript">
        var habbowood = new FlashObject("{{ url('/') }}/web/flash/habbowood/habbowood_movie_editor.swf", "habbowoodtester", "100%", "100%", "7", "#292929");
        habbowood.addParam("allowScriptAccess", "always");
        habbowood.addParam("scale", "noscale");
        habbowood.addParam("name", "editor");
        habbowood.addParam("quality", "high");
        habbowood.addVariable("language", "fi");
        habbowood.addParam("base", "{{ url('/') }}/web/flash/habbowood/");

        habbowood.addVariable("figuredata_url", "{{ url('/') }}/web/xml/figure_data_xml_hc.xml");
        habbowood.addVariable("movie_data_url", "{{ url('/') }}/web/xml/habbowood_blank.xml");
        habbowood.addVariable("avatar_name", "{{ user()->username }}");
        habbowood.addVariable("localization_url", "{{ url('/') }}/web/xml/habbowood_locale.xml");
        habbowood.addVariable("movie_id", "");
        habbowood.addVariable("cancel_url", "http://www.google.com");
        habbowood.addVariable("post_url", "{{ url('/') }}/habbomovies/savemovie?_token={{ csrf_token() }}");
        habbowood.addVariable("end_page_url", "{{ url('/') }}/habbomovies/movie");
        habbowood.addVariable("is_habbo_club_member", "true");
        habbowood.addVariable("usersearch_url", "{{ url('/') }}/habbomovies/private/ajax/getfiguredata");


        habbowood.write("flashcontent");
    </script>



 --}}

{{--

<script>
var swfobj = new SWFObject("http://images.habbohotel.co.uk/web/web-R14.1-b21/flash/habbowood/habbowood_movie_editor.swf", "MovieEditor", "913", "642", "8");
swfobj.addParam("base", "http://images.habbohotel.co.uk/web/web-R14.1-b21/flash/habbowood/");
swfobj.addVariable("figuredata_url", "http://www.habbo.co.uk/figure/figure_data_xml_hc");
swfobj.addVariable("movie_data_url", "http://www.habbo.co.uk/xml/habbowood_blank.xml");
swfobj.addVariable("movie_id", "");
swfobj.addVariable("localization_url", "http://www.habbo.co.uk/xml/habbowood_editor.xml");
swfobj.addVariable("end_page_url", "http://www.habbo.co.uk/entertainment/habbowood/end.html");
swfobj.addVariable("cancel_url", "http://www.habbo.co.uk/entertainment/habbowood/index.html");
swfobj.addVariable("usersearch_url", "http://www.habbo.co.uk/habbomovies/private/ajax/getfiguredata");
swfobj.addVariable("post_url", "http://www.habbo.co.uk/habbomovies/private/ajax/savemovie");
swfobj.addVariable("avatar_name", "Hellomoto2003");
swfobj.addVariable("session_id", "cuF0TFBPufGg122S4p");
swfobj.addVariable("is_habbo_club_member", "false");
swfobj.addVariable("session_update_url", "http://www.habbo.co.uk/components/updateHabboCount");
swfobj.addParam("allowScriptAccess", "always");
swfobj.addParam("menu","false");
swfobj.write("flashcontent");
</script>
--}}
