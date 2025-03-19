@extends('layouts.admin.master', ['menu' => 'server'])

@section('title', 'Wordfilter Options')

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

                @if($word)
                <form action="{{ route('admin.server.wordfilter_edit.save', $word->key) }}" method="post"
                    name="theAdminForm" id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Edit Word ({{ $word->key }})</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle">
                                    <b>Word</b>
                                    <div class="graytext">The word to filter.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="key" value="{{ $word->key }}" size="30" class="textinput">
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle">
                                    <b>Worldfilter replacement</b>
                                    <div class="graytext">What the word should be replaced with.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="replacement" value="{{ $word->replacement }}" size="30"
                                        class="textinput">
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
                                        <option value="0" @if($word->hide == 0) selected="selected" @endif>No</option>
                                        <option value="1" @if($word->hide == 1) selected="selected" @endif>Yes</option>
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
                                        <option value="0" @if($word->report == 0) selected="selected" @endif>No</option>
                                        <option value="1" @if($word->report == 1) selected="selected" @endif>Yes
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Mute</b>
                                    <div class="graytext">Time user gets muted for mentioning this word.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="mute">
                                        <option value="0" @if($word->mute == 0) selected="selected" @endif>No</option>
                                        <option value="1" @if($word->mute == 1) selected="selected" @endif>Yes</option>
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
                @else
                <form action="{{ route('admin.server.wordfilter.save') }}" method="post" name="theAdminForm"
                    id="theAdminForm">
                    {{ csrf_field() }}
                    <div class="tableborder">
                        <div class="tableheaderalt">Wordfilter Options</div>
                        <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Enable woldfilter</b></td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <select name="wordfilter_enable" class="dropdown">
                                        <option value="1" @if($settings['wordfilter.enabled']==1) selected="selected"
                                            @endif>Enabled</option>
                                        <option value="0" @if($settings['wordfilter.enabled']==0) selected="selected"
                                            @endif>Disabled</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tablerow1" width="40%" valign="middle"><b>Worldfilter censor</b>
                                    <div class="graytext">The word that will replace filtered words.</div>
                                </td>
                                <td class="tablerow2" width="60%" valign="middle">
                                    <input type="text" name="wordfilter_censor"
                                        value="{{ $settings['wordfilter.replacement'] }}" size="30" class="textinput">
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
                @endif
                <br />
                <div class="tableborder">
                    <div class="tableheaderalt">Words</div>
                    <div style="text-align: center; vertical-align: middle;">{{ $words->links() }}</div>
                    <table cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td class="tablesubheader" width="15%">Word</td>
                            <td class="tablesubheader" width="15%" align="center">Replacement</td>
                            <td class="tablesubheader" width="10%" align="center">Hide</td>
                            <td class="tablesubheader" width="10%" align="center">Report</td>
                            <td class="tablesubheader" width="10%" align="center">Mute</td>
                            <td class="tablesubheader" width="10%" align="center">Edit</td>
                            <td class="tablesubheader" width="12%" align="center">Delete</td>
                        </tr>
                        @forelse($words as $w)
                        <tr>
                            <td class="tablerow2">
                                <strong>{{ $w->key }}</strong>
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $w->replacement }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $w->hide ? 'yes' : 'no'  }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $w->report ? 'yes' : 'no'  }}
                            </td>
                            <td class="tablerow2" align="center">
                                {{ $w->mute ? 'yes' : 'no'  }}
                            </td>
                            <td class="tablerow2" align="center"><a
                                    href="{{ route('admin.server.wordfilter.edit', $w->key) }}"><img
                                        src="{{ url('/') }}/web/admin/images/edit.gif" alt="Edit"></a></td>
                            <td class="tablerow2" align="center"><a
                                    href="{{ route('admin.server.wordfilter.delete', $w->key) }}"><img
                                        src="{{ url('/') }}/web/admin/images/delete.gif" alt="Delete"></a></td>
                        </tr>
                        @empty
                        <tr align="center">
                            <td colspan="7" class="tablerow1"><strong>No words added.</strong></td>
                        </tr>
                        @endforelse
                    </table>
                    <div class="tablefooter" align="center">
                        <div class="fauxbutton-wrapper"><span class="fauxbutton"><a
                                    href="{{ route('admin.server.wordfilter.add') }}">Add New Word</a></span></div>
                    </div>
                </div>
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
