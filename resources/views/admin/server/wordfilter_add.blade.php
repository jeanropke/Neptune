@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'Wordfilter add new')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="22%" valign="top" id="leftblock">
            <div>
                @include('layouts.admin.server', ['submenu' => 'wordfilter'])
            </div>
        </td>
        <td width="78%" valign="top" id="rightblock">
            <div>
                @if (session('message'))
                <p><strong>{{ session('message') }}</strong></p>
                @endif
                <form action="{{ route('admin.server.wordfilter.add') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Add New Word</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle">
                                    <b>Word</b>
                                    <div class="graytext">The word to filter.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="key" value="" size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle">
                                    <b>Worldfilter replacement</b>
                                    <div class="graytext">What the word should be replaced with.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="replacement" value="" size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle">
                                    <b>Hide message</b>
                                    <div class="graytext">Wether the whole message that contains this word should be
                                        hidden from being displayed.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="hide">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Report</b>
                                    <div class="graytext">Wether the message should be reported as auto-report to the
                                        moderators.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="report">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Mute</b>
                                    <div class="graytext">Time user gets muted for mentioning this word.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="mute">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="tablesubheader" colspan="2">
                                    <input type="submit" value="Save Options" class="realbutton" accesskey="s">
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
