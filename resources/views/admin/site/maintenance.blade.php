@extends('layouts.admin.master', ['menu' => 'site'])

@section('title', 'Maintenance Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.site', ['submenu' => 'maintenance'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.site.maintenance') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Turn your site on/off</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Close Site</b>
                                    <div class="graytext">If enabled, your site will be closed and show a maintenance
                                        page to regular users.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="hotel_maintenance" class="dropdown">
                                        <option value="1" @if($settings['hotel.maintenance']==1) selected="selected"
                                            @endif>Site Closed</option>
                                        <option value="0" @if($settings['hotel.maintenance']==0) selected="selected"
                                            @endif>Site Open</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Apply" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
