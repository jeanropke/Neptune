@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Habbowood')

@section('content')
    <script type="text/javascript">
        var xmov;
    </script>
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
                                    <script language="JavaScript" type="text/javascript" src="{{ cms_config('site.web.url') }}/js/swfobject.js"></script>
                                    <div id="flashcontent" style="text-align:center"></div>
                                    <script>
                                        var swfobj = new SWFObject("{{ cms_config('site.c_images.url') }}/album2045/frontpageloop_04_05.swf", "frontpageloop", "534", "325", "7");
                                        swfobj.addVariable("localization_url", "/web/xml/habbowood_intro.xml");
                                        swfobj.addVariable("shoot_movie_url", "/habbomovies/private/openeditor");
                                        swfobj.addVariable("watch_movie_url", "/entertainment/habbowood/movies");
                                        swfobj.addVariable("meet_filmmakers_url", "/entertainment/habbowood/filmakers");
                                        swfobj.addVariable("competition_url", "/entertainment/habbowood");
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
                        @include('entertainment.habbowood.includes.habbowoodmenu')
                        {{--
                        <div class="portlet-goldenfilm goldenfilm">
                            <div class="portlet-goldenfilm-header">
                                <h3>Target Top Ten</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">

                                    <p align="center"><a href="{{ url('/') }}/entertainment/target/hdma_top10.html"><img width="130"
                                                height="100" border="0"
                                                src="https://web.archive.org/web/20071003010249im_/http://images.habbohotel.com/c_images/album2544/top10button.gif" alt=""></a>
                                    </p>
                                    <p align="center"><a href="{{ url('/') }}/entertainment/target/hdma_top10.html">Check out</a> the
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
                                    @include('entertainment.habbowood.includes.topdaily')
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
                                    <img vspace="5" hspace="5" border="0" align="left" src="{{ cms_config('site.c_images.url') }}/album2627/unknown.gif" alt="">
                                    @include('entertainment.habbowood.includes.staffpick')
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
