@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Remote Banning')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'moderation.ban'])
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
                    <!-- RIGHT CONTENT BLOCK -->
                    <form action="{{ route('housekeeping.moderation.remote.ban') }}" method="post" name="theAdminForm" id="theAdminForm">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">(Remote) Banning</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>User ID</b>
                                        <div class="graytext">The ID of the user you want to ban. To retrive a User's ID, use <a href="{{ route('housekeeping.users.listing') }}">the
                                                User Tool</a>.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="id" value="{{ $user ? $user->id : old('id') }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ban Reason</b>
                                        <div class="graytext">The reason for this ban that will be shown to the user.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="reason" value="{{ old('reason') }}" size="50" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Ban Length</b></td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="length" class="dropdown">
                                            <option value="7200" {{ old('length') == 7200 ? 'selected' : '' }}>2 Hours</option>
                                            <option value="14400" {{ old('length') == 14400 ? 'selected' : '' }}>4 Hours</option>
                                            <option value="43200" {{ old('length') == 43200 ? 'selected' : '' }}>12 Hours</option>
                                            <option value="86400" {{ old('length') == 86400 ? 'selected' : '' }}>24 Hours</option>
                                            <option value="172800" {{ old('length') == 172800 ? 'selected' : '' }}>2 Days</option>
                                            <option value="604800" {{ old('length') == 604800 ? 'selected' : '' }}>7 Days</option>
                                            <option value="1209600" {{ old('length') == 1209600 ? 'selected' : '' }}>2 Weeks</option>
                                            <option value="2678400" {{ old('length') == 2678400 ? 'selected' : '' }}>1 Month</option>
                                            <option value="16070400" {{ old('length') == 16070400 ? 'selected' : '' }}>6 Months</option>
                                            <option value="31536000" {{ old('length') == 31536000 ? 'selected' : '' }}>1 Year</option>
                                            <option value="788400000" {{ old('length') == 788400000 ? 'selected' : '' }}>Permenantly (25 Years)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="submit" value="Ban" class="realbutton" accesskey="s">
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
