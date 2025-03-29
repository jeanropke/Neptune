@extends('layouts.housekeeping', ['menu' => 'dashboard', 'submenu' => 'dashboard'])

@section('title', 'Housekeeping')

@section('content')
<table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
        <td width="100%" valign="top" id="rightblock">
            <div>
                <!-- RIGHT CONTENT BLOCK -->
                <div style="font-size:30px; padding-left:7px; letter-spacing:-2px; border-bottom:1px solid #EDEDED">
                    {{ env('APP_NAME') }} Housekeeping
                </div>
                <br />
                <div id="ipb-get-members"
                    style="border:1px solid #000; background:#FFF; padding:2px;position:absolute;width:120px;display:none;z-index:100">
                </div>
                <!--in_dev_notes-->
                <!--in_dev_check-->
                <table border="0" width="100%" cellpadding="0" cellspacing="4">
                    <tr>
                        <td valign="top" width="75%">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <div class="homepage_pane_border">
                                            <div class="homepage_section">Tasks and Statistics</div>
                                            <table width="100%" cellspacing="0" cellpadding="4">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <div class="homepage_border">
                                                            <div class="homepage_sub_header">System Overview</div>
                                                            <table width="100%" cellpadding="4" cellspacing="0">
                                                                <tr>
                                                                    <td class="homepage_sub_row" width="60%">
                                                                        <strong>{{ config('cms.name') }} Version</strong></td>
                                                                    <td class="homepage_sub_row" width="40%">
                                                                        <strong>v{{ config('cms.version') }} [{{ config('cms.title') }}] {{ config('cms.stable') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row">
                                                                        <strong>Members</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                         {{ $users_total }} (<a
                                                                            href="{{ route('housekeeping.users.online') }}"> $stats['users_online'] }}
                                                                            online</a>)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>Rooms</strong>
                                                                    </td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ $rooms_users }}
                                                                        (of which
                                                                        {{ $rooms_public }} public rooms)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row">
                                                                        <strong>Furniture</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ $furnis }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>Groups</strong>
                                                                    </td>
                                                                    <td class="homepage_sub_row">
                                                                         {{ $groups }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>Stafflog
                                                                            Entries</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                         {{ $stafflogs }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>Active
                                                                            Bans</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                        <a href="/users/banlist">
                                                                             {{ $bans }}
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <div class="homepage_border">
                                                            <div class="homepage_sub_header">Server Setup</div>
                                                            <table width="100%" cellpadding="4" cellspacing="0">
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>Emulator
                                                                            Ip</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ cms_config('connection.info.host') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>Emulator
                                                                            Port</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ cms_config('connection.info.port') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>RCon Ip</strong>
                                                                    </td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ cms_config('connection.rcon.host') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>RCon
                                                                            Port</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ cms_config('connection.rcon.port') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>MUS Ip</strong>
                                                                    </td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ cms_config('connection.mus.host') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="homepage_sub_row"><strong>MUS
                                                                            Port</strong></td>
                                                                    <td class="homepage_sub_row">
                                                                        {{ cms_config('connection.mus.port') }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="homepage_pane_border">
                                            <div class="homepage_section">Communication</div>
                                            <table width="100%" cellspacing="0" cellpadding="4">
                                                <tr>
                                                    <td valign="top" width="50%">
                                                        <div class="homepage_border">
                                                            <div class="homepage_sub_header">Housekeeping Notes</div>
                                                            <br />
                                                            <div align="center">
                                                                <form action="{{ route('housekeeping.save_note') }}"
                                                                    method="post">
                                                                    {{ csrf_field() }}
                                                                    <textarea id="admin-notes" name="notes" rows="8"
                                                                        cols="25">{{ cms_config('site.admin.notes') }}</textarea>
                                                                    <div>
                                                                        <br />
                                                                        <input type="submit" value="Save Admin Notes"
                                                                            class="realbutton" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <br />
                                                        </div>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <div class="homepage_border">
                                                            <div class="homepage_sub_header">
                                                                {{ cms_config('hotel.name.short') }} Staffs</div>
                                                            <table width="100%" cellpadding="4" cellspacing="0">
                                                                @foreach($staffs as $staff)
                                                                <tr>
                                                                    <td class="tablerow1" align="center">
                                                                        <div style="font-size:12px">
                                                                            <a href="{{ route('housekeeping.users.edituser', $staff->id) }}"
                                                                                target="_blank">
                                                                                <strong>{{ $staff->username }}</strong>
                                                                            </a> (ID: {{ $staff->id }})
                                                                    </td>
                                                                    <td class="tablerow2">
                                                                        {{ $staff->mail }}
                                                                    </td>
                                                                    <td class="tablerow2">
                                                                        {{ $staff->getPermission()->name }}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top" width="25%">
                            <div id="acp-update-wrapper">
                                <div class="homepage_pane_border" id="acp-update-normal">
                                    <div class="homepage_section">{{ config('cms.name') }} Updater</div>
                                    <div style="font-size:12px;padding:4px; text-align:center">
                                        <p>{{ config('cms.name') }} v{{ config('cms.version') }} [{{ config('cms.title') }}] {{ config('cms.stable') }}<br />
                                            <font size="1">Build {{ config('cms.build') }} {{ config('cms.gmt') }}</font><br />
                                            Check out the <a href="https://github.com/jeanropke/Neptune">{{ config('cms.name') }} GitHub page</a> for the latest updates.
                                        </p>
                                    </div>
                                </div>
                                <br />
                            </div>
                            <div id="acp-update-wrapper">
                                <div class="homepage_pane_border" id="acp-update-normal">
                                    <div class="homepage_section">Support HoloCMS</div>
                                    <div style="font-size:12px;padding:4px; text-align:center">
                                        <p>
                                            HoloCMS is, always has been, and always will be, free software. To help keep
                                            the developer happy and allow him to buy a pizza <sup>every now and
                                                then</sup>, you can make a donation. This is completely optional, and if
                                            you decide not to donate, you won't miss out on any advantages, besides the
                                            developer's gratitude. All donations are processed by PayPal. Donate to the
                                            current developer to encourage development and get faster releases (results
                                            may vary).
                                            <br />
                                            <br /> Donate to Miguel González Aravena (the current HoloCMS developer):
                                            <br />
                                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post"
                                                target="_top">
                                                <input type="hidden" name="cmd" value="_s-xclick">
                                                <input type="hidden" name="hosted_button_id" value="SMY3KKLWK73QY">
                                                <input type="image"
                                                    src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif"
                                                    border="0" name="submit"
                                                    alt="PayPal - The safer, easier way to pay online!">
                                                <img alt="" border="0"
                                                    src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1"
                                                    height="1">
                                            </form>
                                            <br />
                                            <br /> Donate to Meth0d (the orginal HoloCMS developer):
                                            <br />
                                            <br />
                                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                <input type="hidden" name="cmd" value="_donations">
                                                <input type="hidden" name="business" value="meth0d@meth0d.org">
                                                <input type="hidden" name="item_name" value="HoloCMS Donation">
                                                <input type="hidden" name="no_shipping" value="0">
                                                <input type="hidden" name="no_note" value="1">
                                                <input type="hidden" name="currency_code" value="USD">
                                                <input type="hidden" name="tax" value="0">
                                                <input type="hidden" name="lc" value="GB">
                                                <input type="hidden" name="bn" value="PP-DonationsBF">
                                                <input type="image"
                                                    src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif"
                                                    border="0" name="submit"
                                                    alt="Donate to HoloCMS using PayPal - The safer, easier way to pay online.">
                                                <img alt="" border="0"
                                                    src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1"
                                                    height="1">
                                            </form>
                                            <br />
                                        </p>
                                    </div>
                                </div>
                                <br />
                            </div>
                            <div id="acp-update-wrapper">
                                <div class="homepage_pane_border" id="acp-update-normal">
                                    <div class="homepage_section">Need assistance?</div>
                                    <div style="font-size:12px;padding:4px; text-align:center">
                                        <p>
                                            If you need Help with your copy of HoloCMS, your first stop should be the
                                            'Help' tab in Housekeeping. If you still have problems, feel free to ask for
                                            support on <a href="http://forum.ragezone.com/f282"
                                                target="_BLANK">RaGEZONE</a> or <a href="http://www.meth0d.org"
                                                target="_BLANK">Meth0d dot org</a>.
                                        </p>
                                    </div>
                                </div>
                                <br />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- / RIGHT CONTENT BLOCK -->
        </td>
    </tr>
</table>
@stop
