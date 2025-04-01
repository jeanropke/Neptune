@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'User Badge Management')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'tools.badge'])
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
                    <form action="{{ route('housekeeping.users.badges.give') }}" method="post" name="theAdminForm" id="theAdminForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Badge Manager</div>
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
                                    <td class="tablerow1" width="40%" valign="middle"><strong>Badgecode</strong>
                                        <div class="graytext">The bage code, eg. "ADM" or "XM8".</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <input type="text" name="badge" value="" size="30" class="textinput">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" name="submit" value="Give badge" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    @if (isset($user))
                        <div class="tableborder">
                            <div class="tableheaderalt">User Badges <i>(Click to remove)</i></div>
                            <div id="badge-manager">
                                @foreach ($user->getBadges(true) as $badge)
                                    <div class="slot" data-code="{{ $badge['badge'] }}" data-user-id="{{ $user->id }}">
                                        <div class="badge" style="background: url({{ cms_config('site.badges.url') }}/{{ $badge['badge'] }}.gif) center no-repeat">
                                        </div>
                                        <div class="code">{{ $badge['badge'] }}</div>
                                    </div>
                                @endforeach
                                <div class="clear"></div>
                            </div>
                        </div>
                        <script>
                            BadgesManager.initialise("{{ cms_config('site.badges.url') }}/");
                        </script>
                    @endif
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
