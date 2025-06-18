@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Help')

@section('content')
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 202px;" class="habboPage-col">
                        <div class="portlet-film film">
                            <div class="portlet-film-header">
                                <h3>Good tips for top moviemaking</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    <ol>
                                        <li>Keep it <span style="font-weight: bold;">short</span> and <span style="font-weight: bold;">funny!</span></li>
                                        <li>Use plenty of <span style="font-weight: bold;">zoom</span> and <span style="font-weight: bold;">double zoom</span></li>
                                        <li>Come up with some snappy and witty <span style="font-weight: bold;">dialogue</span></li>
                                        <li>Let the <span style="font-weight: bold;">visual</span> and <span style="font-weight: bold;">sound FX</span> serve your story and not vice
                                            versa</li>
                                        <li>Go crazy. It's <span style="font-weight: bold;">Habbo,</span> after all :)</li>
                                    </ol>

                                    <p>Enjoy your Habbowood experience!</p>
                                    <p>Back to <a target="_self" href="{{ url('/') }}/entertainment/habbowood">Habbowood
                                            main</a><br></p>

                                    <center><img width="38" height="51" border="0" alt="Clapperboard HWIII" id="galleryImage"
                                            src="{{ cms_config('site.c_images.url') }}/album2051/Clapperboard_HWIII.gif"></center>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-film-bottom">
                                <div class="portlet-film-bottom-body"></div>
                            </div>
                        </div>
                    </td>
                    <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Habbowood MovieMaker Demo</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/web/js/swfobject.js"></script>
                                    <div id="flashcontent" style="text-align:center"></div>
                                    <script>
                                        var swfobj = new SWFObject("{{ cms_config('site.c_images.url') }}/album2426/tutorial_player.swf", "demo", "512", "288", "7");
                                        swfobj.addVariable("localization_url", "{{ url('/') }}/web/xml/habbowood_demo.xml");
                                        swfobj.addParam("allowScriptAccess", "always");
                                        swfobj.addParam("menu", "false");
                                        swfobj.write("flashcontent");
                                    </script>
                                    <br><br>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="portlet-goldenfilm-bottom">
                                <div class="portlet-goldenfilm-bottom-body"></div>
                            </div>
                        </div>
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>How to create a Habbowood Movie</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    Wanna direct a blockbuster in a few minutes time? Then follow this drill!<br>

                                    <ol>
                                        <li>Click any of the <a href="{{ url('/') }}/habbomovies/private/openeditor"
                                                target="_self">shoot a movie</a> links<br></li>
                                        <li>Log in with your Habbo account (or create one first, if you don't have one already)<br></li>
                                        <li><span style="font-weight: bold;">Cast</span> your and your friends' Habbos, or choose a fictional actor; then click <span
                                                style="font-weight: bold;">"Edit Movie"</span><br></li>
                                        <li>The mighty <b>MovieMaker</b> will open up in all its glory! Watch the <b>Demo</b> on the left and you'll learn the ropes in a sec!<br></li>

                                        <li>Add and edit <span style="font-weight: bold;">new scenes</span> to your movie (there's a nice button for that)<br></li>
                                        <li>Proceed to <span style="font-weight: bold;">Saving,</span> <span style="font-weight: bold;">Publishing</span> and <b>Sharing</b> if by
                                            following the onsite instructions<br></li>
                                    </ol>

                                    <p>Et voila, a new <span style="font-weight: bold;">Habbowood Director</span> is born!</p>
                                    <p>Now go <a href="{{ url('/') }}/habbomovies/private/openeditor" target="_self">shoot a movie</a>
                                        and good luck with your creative career!</p>

                                    <p>Back to <a href="{{ url('/') }}/entertainment/habbowood" target="_self">Habbowood
                                            Main
                                        </a></p>
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
