@extends('layouts.housekeeping', ['menu' => 'site'])

@section('title', 'Generate CSS')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.site.include.menu', ['submenu' => 'hh_assets.generate'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif

                    <!-- RIGHT CONTENT BLOCK -->
                    <div id="acp-update-wrapper">
                        <div class="homepage_pane_border" id="acp-update-normal">
                            <div class="homepage_section">Generate CSS</div>
                            <div style="font-size:12px;padding:4px; text-align:left">
                                <p>
                                    This tool is responsible for creating the <i>backgrounds.css</i> and <i>stickers.css</i> files.
                                    <br />
                                    <br /> Please do not abuse this tool.
                                </p>
                            </div>
                        </div>
                    </div>
                    <br />
                    <form action="{{ route('housekeeping.site.hh_assets.generate.post') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="tableborder">
                            <div class="tableheaderalt">Generate</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Type</b>
                                        <div class="graytext">Choose which CSS file you want to generate.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="type" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="b">Backgrounds</option>
                                            <option value="s">Stickers</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Format</b>
                                        <div class="graytext">Should this file be formatted or compressed into a single line?
                                            <br />A single-line version reduces the file size by approximately 10%.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="formatted" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="1">Formatted</option>
                                            <option value="0" selected>Single-line</option>
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
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
