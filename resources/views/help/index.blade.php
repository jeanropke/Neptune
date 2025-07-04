@extends('layouts.master', ['menuId' => '5'])

@section('title', 'Help & Safety Home')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-3col">
        <tbody>
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
                                    @foreach (boxes('help.index', 1) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('help.index', 2) as $box)
                                        @include('includes.boxes.' . $box->type, compact('box'))
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">
                                    @include('includes.ad300')
                                    @foreach (boxes('help.index', 3) as $box)
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
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
