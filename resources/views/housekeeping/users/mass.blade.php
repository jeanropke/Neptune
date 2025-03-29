@extends('layouts.admin.master', ['menu' => 'users'])

@section('title', 'Massa Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('layouts.admin.users', ['submenu' => 'massa_stuff'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    <form action="{{ route('admin.users.massstuff.credits') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Massa credits</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Amount</strong>
                                        <div class="graytext">The amount of credits everybody gets.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="credits" value="" size="3" maxlength="5" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Users online</strong>
                                        <div class="graytext">Only users online will receive credits or everyone.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="online">
                                            <option value="1">Only users online</option>
                                            <option value="0">Everyone</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Give" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <form action="{{ route('admin.users.massstuff.points') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Massa points</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Amount</strong>
                                        <div class="graytext">The amount of points everybody gets.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="points" value="" size="3" maxlength="5" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Users online</strong>
                                        <div class="graytext">Only users online will receive points or everyone.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="online">
                                            <option value="1">Only users online</option>
                                            <option value="0">Everyone</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Points type</strong>
                                        <div class="graytext">Some types are disabled and need some configurations.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="type">
                                            <option value="0">Duckets</option>
                                            <option value="1">Snowflakes</option>
                                            <option value="2">Hearts</option>
                                            <option value="3">MadCoins</option>
                                            <option value="4">Shells</option>
                                            <option value="5">Diamonds</option>
                                            <option value="100">Pumpkins</option>
                                            <option value="101">Horseshoes</option>
                                            <option value="102">Nuts</option>
                                            <option value="103">Stars</option>
                                            <option value="104">Clouds</option>
                                            <option value="105">Loyalty</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Give" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>

                    <br />
                    <form action="{{ route('admin.users.massstuff.badge') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Massa badge</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Badge code</strong>
                                        <div class="graytext">What's the badgecode everybody gets?</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="code" value="" size="3" maxlength="3" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Users online</strong>
                                        <div class="graytext">Only users online will receive the badge or everyone.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="online">
                                            <option value="1">Only users online</option>
                                            <option value="0">Everyone</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Give" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <form action="{{ route('admin.users.massstuff.removebadge') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Take badge from all users</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Badge code</strong>
                                        <div class="graytext">What badge do you want to take off, fill in the badge code.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="code" value="" size="3" maxlength="3" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Remove" class="realbutton" accesskey="s">
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
