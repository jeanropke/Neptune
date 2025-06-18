@extends('layouts.master', ['menuId' => '25'])

@section('title', 'Send link to your friend')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 741px;" class="habboPage-col rightmost">

                    <div class="content-white-outer">
                        <div class="content-white">
                            <div class="content-white-body">

                                <div class="content-white-content">
                                    <div id="invite_1" align="center">
                                        <div class="invitation-component">
                                            WIP
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="content-white-bottom">
                            <div class="content-white-bottom-body"></div>
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
@stop
