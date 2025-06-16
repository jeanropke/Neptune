@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Create New Habbo Home Asset')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('housekeeping.site.include.menu', ['submenu' => 'hh_assets.create'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if($errors->any())
                <p><strong>{{ $errors->first() }}</strong></p>
                @endif
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('housekeeping.site.hh_assets.create.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Create New Habbo Home Asset</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Class</b>
                                    <div class="graytext">The CSS class name without prefixes like <i>s_</i> or <i>b_</i> and suffixes like <i>_pre</i>.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="class" value="{{ old('class') }}" size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Path</b>
                                    <div class="graytext">The file path for this asset.
                                        <br />This file needs to exist in the background or stickers folder.
                                        <br />TODO: add an upload pic?
                                    </div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="path" value="{{ old('path') }}" size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Type</b>
                                    <div class="graytext">This asset type: background or sticker</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="type" class="textinput" style="margin-top: 5px;" size="1">
                                        <option value="b" {{ old('type') == 'b' ? 'selected' : '' }}>Background</option>
                                        <option value="s" {{ old('type') == 's' ? 'selected' : '' }}>Sticker</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Create Asset" class="realbutton" accesskey="s">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
            </div>
        </td>
    </tr>
</table>
@stop
