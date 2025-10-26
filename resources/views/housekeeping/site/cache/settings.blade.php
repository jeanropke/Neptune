@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Cached Settings')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'cache.settings'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    <form action="{{ route('housekeeping.site.cache.settings.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Cached Settings</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Enable Figure Cache</b>
                                        <div class="graytext">Cache user figures for faster display and reduced server load.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="habboimaging.figure.cached" class="dropdown">
                                            <option value="1" {{ cms_config('habboimaging.figure.cached') ? 'selected="selected"' : '' }}>Enabled</option>
                                            <option value="0" {{ cms_config('habboimaging.figure.cached') ? '' : 'selected="selected"' }}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Enable Group Badges Cache</b>
                                        <div class="graytext">Cache group badges for faster display and reduced server load.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="habboimaging.badges.cached" class="dropdown">
                                            <option value="1" {{ cms_config('habboimaging.badges.cached') ? 'selected="selected"' : '' }}>Enabled</option>
                                            <option value="0" {{ cms_config('habboimaging.badges.cached') ? '' : 'selected="selected"' }}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Enable Photos Cache</b>
                                        <div class="graytext">Cache photos for faster display and reduced server load.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="habboimaging.photos.cached" class="dropdown">
                                            <option value="1" {{ cms_config('habboimaging.photos.cached') ? 'selected="selected"' : '' }}>Enabled</option>
                                            <option value="0" {{ cms_config('habboimaging.photos.cached') ? '' : 'selected="selected"' }}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Configuration" class="realbutton" accesskey="s">
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
