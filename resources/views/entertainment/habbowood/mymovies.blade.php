@extends('layouts.master', ['menuId' => '42', 'skipHeadline' => true])

@section('title', 'My Movies')

@section('content')
    <script type="text/javascript">
        var xmov;
    </script>
    @include('entertainment.habbowood.includes.menu')
    <div class="habbomovies-custom-bg">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
            <tbody>
                <tr>
                    <td style="width: 8px;"></td>
                    <td valign="top" style="width: 741px;" class="habboPage-col rightmost">
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
