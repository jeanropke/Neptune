@extends('layouts.master', ['menuId' => '5', 'submenuId' => '21', 'headline' => true])

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
                                @foreach(boxes('help.index', 1) as $box)
                                <div class="v3box {{ $box->color }}">
                                    <div class="v3box-top">
                                        <h3>{{ $box->title }}</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            {!! $box->content !!}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                @endforeach
                            </td>
                            <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                @foreach(boxes('help.index', 2) as $box)
                                <div class="v3box {{ $box->color }}">
                                    <div class="v3box-top">
                                        <h3>{{ $box->title }}</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            {!! $box->content !!}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
                                @endforeach
                            </td>
                            <td valign="top" style="width: 310px; height: 400px;" class="habboPage-col rightmost">
                                @include('includes.ad300')
                                @foreach(boxes('help.index', 3) as $box)
                                <div class="v3box {{ $box->color }}">
                                    <div class="v3box-top">
                                        <h3>{{ $box->title }}</h3>
                                    </div>
                                    <div class="v3box-content">
                                        <div class="v3box-body">
                                            {!! $box->content !!}
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="v3box-bottom">
                                        <div></div>
                                    </div>
                                </div>
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
