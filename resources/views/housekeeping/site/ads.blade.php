@extends('layouts.housekeeping.master', ['menu' => 'site'])

@section('title', 'Site Configuration')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'ads'])
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
                    <form action="{{ route('housekeeping.site.ads.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Advertisements Configuration</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ad 160</b>
                                        <div class="graytext">Is this vertical advertisements enabled?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.ads_160.enabled" class="dropdown">
                                            <option value="1" {{ cms_config('site.ads_160.enabled') ? 'selected="selected"' : ''}}>Enabled</option>
                                            <option value="0" {{ cms_config('site.ads_160.enabled') ? '' : 'selected="selected"'}}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ads 160 code</b>
                                        <div class="graytext">The advertisements HTML code.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="site.ads_160.content" rows="5" cols="50" class="textinput">{{ cms_config('site.ads_160.content') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ad 300</b>
                                        <div class="graytext">Is this squared advertisements enabled?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.ads_300.enabled" class="dropdown">
                                            <option value="1" {{ cms_config('site.ads_300.enabled') ? 'selected="selected"' : ''}}>Enabled</option>
                                            <option value="0" {{ cms_config('site.ads_300.enabled') ? '' : 'selected="selected"'}}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ads 300 code</b>
                                        <div class="graytext">The advertisements HTML code.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="site.ads_300.content" rows="5" cols="50" class="textinput">{{ cms_config('site.ads_300.content') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ad footer</b>
                                        <div class="graytext">Is this footer advertisements enabled?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.ads_footer.enabled" class="dropdown">
                                            <option value="1" {{ cms_config('site.ads_footer.enabled') ? 'selected="selected"' : ''}}>Enabled</option>
                                            <option value="0" {{ cms_config('site.ads_footer.enabled') ? '' : 'selected="selected"'}}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ads footer code</b>
                                        <div class="graytext">The advertisements HTML code.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="site.ads_footer.content" rows="5" cols="50" class="textinput">{{ cms_config('site.ads_footer.content') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Ads Configuration" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <form action="{{ route('housekeeping.site.tracking.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Tracking Configuration</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Tracking</b>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="site.tracking.enabled" class="dropdown">
                                            <option value="1" {{ cms_config('site.tracking.enabled') ? 'selected="selected"' : ''}}>Enabled</option>
                                            <option value="0" {{ cms_config('site.tracking.enabled') ? '' : 'selected="selected"'}}>Disabled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Tracking code</b>
                                        <div class="graytext">The tracking HTML code.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="site.tracking.content" rows="5" cols="50" class="textinput">{{ cms_config('site.tracking.content') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Save Tracking Configuration" class="realbutton" accesskey="s">
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
