@extends('layouts.master', ['menuId' => '404', 'submenuId' => '404', 'headline' => true])

@section('title', 'Page not found')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">

    <tbody>
    <tr>
        <td colspan="5" style="height: 4px;"></td>
    </tr>

    <tr>
        <td rowspan="2" style="width: 8px;"></td>

        <td valign="top" style="width: 740px;">

            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <td colspan="2" style="padding-bottom: 3px;"></td>
                </tr>
                <tr>

                    <td align="left" valign="top" style="width: 430px; height: 400px;" class="habboPage-col">
                        <div class="v3box yellow">
                            <div class="v3box-top"><h3>Page not found</h3></div>
                            <div class="v3box-content">
                                <div class="v3box-body">

                                    <img width="113" vspace="0" hspace="0" height="100" border="0" align="right"
                                         alt="maintenance.gif" id="galleryImage"
                                         src="{{ url('/') }}/web/images/maintenance/workman_habbo_error.gif">We're
                                    sorry, but the page you have requested cannot be found.<br><br>Perhaps it's lost, or
                                    it might have run off... <span style="font-weight: bold;">OR</span>, Kedo might have
                                    thought it was a Twinkie and eaten it!<br><br>Please try typing the URL again, if
                                    that doesn't work visit the <a target="_self"
                                                                   href="{{ url('/') }}">Home
                                        Page</a> and click the links to find the page you're looking for.<br><br>If you
                                    have come to this page from the Hotel after clicking 'Buy Credits' then please <a
                                            target="_self"
                                            href="{{ url('/') }}/credits/">Click
                                        Here</a>.<br>

                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="v3box-bottom">
                                <div></div>
                            </div>
                        </div>
                    </td>
                    <td align="left" valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">


                    </td>

                </tr>
                </tbody>
            </table>

        </td>

        <td rowspan="2" style="width: 4px;"></td>

        <td rowspan="2" valign="top" style="width: 176px;">
            <div id="ad_sidebar">
                @include('includes.partners')
                @include('includes.ad160')
            </div>
        </td>
    </tr>

    </tbody>
</table>
@stop
