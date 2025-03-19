@extends('layouts.master', ['menuId' => '4', 'submenuId' => '20', 'headline' => true])

@section('title', 'Others Currencis')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
        <tr>
            <td rowspan="2" style="width: 8px;"></td>
            <td valign="top" style="width: 740px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <td align="left" valign="top" style="width: 430px; height: 400px;" class="habboPage-col">
                            <div class="v3box purple">
                                <div class="v3box-top"><h3>Duckets</h3></div>
                                <div class="v3box-content">
                                    <div class="v3box-body">
                                        Write here about Duckets
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="v3box-bottom"><div></div></div>
                            </div>
                        </td>
                        <td align="left" valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">

                            <div class="ad-scale ad300">
                                @include('includes.ad300')
                            </div>

                            <div class="v3box diamond">
                                <div class="v3box-top"><h3>Diamonds</h3></div>
                                <div class="v3box-content">
                                    <div class="v3box-body">

                                        Write here about Diamonds

                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="v3box-bottom"><div></div></div>
                            </div>

                        </td>
                    </tr>
                    </tbody></table>

            </td>

            <td rowspan="2" style="width: 4px;"></td>

            <td rowspan="2" valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@stop
