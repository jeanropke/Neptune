@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'User Furniture Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'tools.furniture'])
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
                    <form action="{{ route('housekeeping.users.furniture.give') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Furniture Manager</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Username</strong>
                                        <div class="graytext">The username of who this action will apply to.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="username" value="{{ $user->username ?? '' }}" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Furni</strong>
                                        <div class="graytext"></div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <a href="{{ route('furnipicker.listing') }}" id="furni-picker">Pick</a>
                                        <div id="furni-picked"></div>
                                        <input name="items" value="" type="text" hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="submit" value="Give furniture" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    @if (isset($user))
                        <div class="tableborder">
                            <div class="tableheaderalt">User Furniture On Hand <i>(Click to remove)</i></div>
                            <div id="furni-picker-listing">
                                @foreach ($user->getInventory() as $furni)
                                    <div class="slot remove-furni" data-id="{{ $furni->id }}" style="height: 56px; line-height: 9;">
                                        <div title="{{ $furni->getSprite() }}" class="image"
                                            style="background: url({{ cms_config('furni.small.url') }}/{{ $furni->getSprite() }}_icon.png) center no-repeat">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clear"></div>
                            </div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="submit" value="Empty hand" class="realbutton empty-hand" accesskey="s" data-id="{{ $user->id }}">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <script>
                            FurniPicker.initialise();
                            GenericManager.initialise('.remove-furni', '<p>Are you sure you want to remove this furni? This cannot be undone!</p>', '{{ route('housekeeping.users.furniture.remove') }}');
                            GenericManager.initialise('.empty-hand', '<p>Are you sure you want to empty {{ $user->username }} hand? This cannot be undone!</p>', '{{ route('housekeeping.users.empty.hand') }}');
                        </script>
                    @endif
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
