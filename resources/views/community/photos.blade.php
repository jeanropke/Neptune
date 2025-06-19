@extends('layouts.master', ['menuId' => '25'])

@section('title', 'Photos')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            @for ($row = 0; $row < ceil(count($photos) / 4); $row++)
                                <tr>
                                    @for ($column = 0; $column < 4; $column++)
                                        @php
                                        if(count($photos) <= 4 * $row + $column) break;
                                        $photo = $photos[4 * $row + $column];
                                        @endphp

                                        <td valign="top" style="width: 215px; height: 200px;" class="habboPage-col">
                                            <div class="v3box blue">
                                                <div class="v3box-top">
                                                    <h3>Photo</h3>
                                                </div>
                                                <div class="v3box-content">
                                                    <div class="v3box-body">
                                                        <img src="{{ url('/') }}/habbo-imaging/photo/{{ $photo->photo_id }}">
                                                        <i>{{ $photo->getData()->date }}</i>
                                                        <p>{{ $photo->getData()->text }}</p>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="v3box-bottom">
                                                    <div></div>
                                                </div>
                                            </div>
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
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
