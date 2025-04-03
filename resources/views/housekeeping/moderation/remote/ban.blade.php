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
                            <div class="tableheaderalt">(Remote) Banning </div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>User ID</b>
                                        <div class="graytext">The ID of the user you want to ban. To retrive a User's ID, use <a href="{{ route('housekeeping.users.listing') }}">the
                                                User Tool</a>.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="id" value="{{ old('id') }}" size="30" class="textinput">
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
                                            @foreach ($lengths as $length)
                                                <option value="{{ $loop->index }}" {{ old('length') == $loop->index ? 'selected' : '' }}>{{ $length }}</option>
                                            @endforeach
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
