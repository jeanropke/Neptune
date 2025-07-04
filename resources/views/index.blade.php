@extends('layouts.master', ['menuId' => '1', 'skipHeadline' => true])

@section('title', 'Welcome to ' . cms_config('hotel.name.short'))

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
                                <td colspan="3" style="padding-bottom: 3px;">
                                    @include('includes.news')
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('index', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('index', 2) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">
                                    @include('includes.ad300')
                                    @foreach (boxes('index', 3) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td rowspan="2" style="width: 4px;"></td>
                <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br style="clear: both;">
@stop
