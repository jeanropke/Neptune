@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'Movies')

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
                                <h3>Management of your own movies</h3>
                            </div>
                            <div class="portlet-film-header-b"></div>
                            <div class="portlet-film-body">
                                <div class="portlet-film-content">
                                    You can make changes to the movie as well as hide or delete it, even after you have already published and shared it.
                                    <br><br>
                                    Click the "My Movies" link in the top menu of the Habbowood pages to access the management of your own movies. <br><br><br><br>
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
                                <h3>Publish your movie and share it!</h3>
                            </div>
                            <div class="portlet-goldenfilm-header-b"></div>
                            <div class="portlet-goldenfilm-body">
                                <div class="portlet-goldenfilm-content">
                                    <p>So that other {{ cms_config('hotel.name.short') }}s can see your movie, you first need to <span style="font-weight: bold;">publish it</span>.<br></p>
                                    <br><b><br></b>Tell your friends about your movie by sharing it.<br><br> <br>
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
