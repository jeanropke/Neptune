@extends('layouts.admin.master', ['menu' => 'site'])

@section('title', 'Loader Configuration')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.site', ['submenu' => 'loader'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.site.loader') }}" method="post" name="theAdminForm" id="theAdminForm"
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
                                    <input type="text" name='texts' value="{{ $settings['client.external.texts'] }}"
                                        size="50" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Override External Texts</b>
                                    <div class="graytext">URL that points to your override external texts.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name='texts_override'
                                        value="{{ $settings['client.external.texts.override'] }}" size="50"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>External Variables</b>
                                    <div class="graytext">URL that points to your external variables.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="vars" value="{{ $settings['client.external.vars'] }}"
                                        size="50" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Override External Variables</b>
                                    <div class="graytext">URL that points to your override external variables.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="vars_override"
                                        value="{{ $settings['client.external.vars.override'] }}" size="50"
                                        class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Habbo SWF folder</b>
                                    <div class="graytext">URL that points to your Habbo SWF folder.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="swf_file" value="{{ $settings['client.swf.file'] }}"
                                        size="50" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Habbo SWF</b>
                                    <div class="graytext">URL that points to your Habbo SWF file.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="swf_folder" value="{{ $settings['client.swf.folder'] }}"
                                        size="50" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Gamedata Prefix</b>
                                    <div class="graytext">URL that points to your Gamedata folder.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="gamedata_prefix"
                                        value="{{ $settings['client.gamedata.prefix'] }}" size="50" class="textinput">
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
