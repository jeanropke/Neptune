@extends('layouts.housekeeping.master', ['menu' => 'site'])

@section('title', 'Loader Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('housekeeping.site.include.menu', ['submenu' => 'loader'])
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
                <form action="{{ route('housekeeping.site.loader') }}" method="post" name="theAdminForm" id="theAdminForm"
                    autocomplete="off">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Loader setup</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>External Texts</b>
                                    <div class="graytext">URL that points to your external texts.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="external.texts.txt" value="{{ cms_config('external.texts.txt') }}"
                                        size="50" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>External Variables</b>
                                    <div class="graytext">URL that points to your external variables.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="external.variables.txt" value="{{ cms_config('external.variables.txt') }}"
                                        size="50" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Habbo DCR</b>
                                    <div class="graytext">URL that points to your Habbo.dcr file.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="habbo.dcr.url" value="{{ cms_config('habbo.dcr.url') }}"
                                        size="50" class="textinput">
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
