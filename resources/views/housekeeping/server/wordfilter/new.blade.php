@extends('layouts.housekeeping', ['menu' => 'server'])

@section('title', 'Add new Wordfilter')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.server.include.menu', ['submenu' => 'wordfilter'])
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
                    <form action="{{ route('housekeeping.server.wordfilter.save') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="numeric" name="id" value="{{ $word->id ?? '' }}" readonly hidden>
                        <div class="tableborder">
                            <div class="tableheaderalt">Add New Word</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle">
                                        <b>Word</b>
                                        <div class="graytext">The word to filter.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="word" value="{{ $word->word ?? old('word') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Bannable</b>
                                        <div class="graytext">This wordfilter should trigger an auto ban?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="is_bannable">
                                            <option value="0" {{ ($word->is_bannable ?? old('is_bannable')) == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ ($word->is_bannable ?? old('is_bannable')) == 1 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Filterable</b>
                                        <div class="graytext">This wordfilter will be replaced by <i>bobba</i>?.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="is_filterable">
                                            <option value="0" {{ ($word->is_filterable ?? old('is_filterable')) == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ ($word->is_filterable ?? old('is_filterable')) == 1 ? 'selected' : '' }}>Yes</option>
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
