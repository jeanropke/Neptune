@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'Furnidata Generator')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.server', ['submenu' => 'furnidata'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <b>DO NOT GENERATE FURNIDATA CONSTANTLY.</b>
                <form action="{{ route('admin.server.furnidata.generate') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Generate Furnidata</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Furnidata Type</b>
                                    <div class="graytext">This is the type of furnidata generated. Only Staff generate one with a button to 'Buy' in the furni viewer.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="furnidata_type" class="dropdown">
                                        <option value="1" selected="selected">
                                            Only Staff</option>
                                        <option value="0">
                                            Users</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Generate" class="realbutton" accesskey="s">
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
