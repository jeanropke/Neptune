@extends('layouts.master', ['menuId' => 'home_private', 'skipHeadline' => true])

@section('title', 'Page could not be shown')

@section('content')

    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-home">
        <tbody>
            <tr>
                <td colspan="6" style="height: 4px;"></td>
            </tr>
            <tr>
                <td rowspan="2" style="width: 8px;">&nbsp;</td>
                <td valign="top" style="width: 740px;">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 202px;" class="habboPage-col">
                                    <div class="v3box orange">
                                        <div class="v3box-top">
                                            <h3>Did you know?</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                That you can make your Habbo Home private through in your Habbo Profile?<br><br>Well, now you do!<br>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col">
                                    <div class="v3box red">
                                        <div class="v3box-top">
                                            <h3>Sorry!</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">
                                                <span style="font-weight: bold;">
                                                    <img vspace="0" hspace="0" border="0" align="right"
                                                        src="{{ cms_config('site.c_images.url') }}/album1358/frank_stop_001.gif" alt="">
                                                    {{ $owner->username }}
                                                </span> marked this page as private.
                                                <br><br>Sorry!<br><br>
                                                <a href="{{ url('/') }}/hotel/" target="_self">New to Habbo?</a>
                                                <br><br>
                                                <a href="{{ url('/') }}/home" target="_self">Habbo Home main page</a>
                                                <br><br><br>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td rowspan="2" style="width: 4px;"></td>
                <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br style="clear: both;">
@stop
