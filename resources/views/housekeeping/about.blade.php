@extends('layouts.admin.master', ['menu' => 'dashboard', 'submenu' => 'about'])

@section('title', 'About')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/web/housekeeping/icons/about.png" class="pticon">
        <span class="page_name_shadow">About</span>
        <span class="page_name">About</span>
    </div>
    <div class="page_main">

        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%" />
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                    <div class="hr"></div>
                    <div class="loginuser"><strong>{{ config('app.name') }} Version {{ config('app.version') }}</strong></div>
                    <div class="hr"></div>
                    <div class="text">
                        Build: {{ config('app.build') }}<br /><br />
                        {{ config('app.name') }} is, always has been, and always will be, free software. <strong>If you paid for this software, please report the seller to us <i><a href="https://github.com/jeanropke/Neptune">here</a></i> and demand your money back.</strong>
                        To help keep the developer happy and allow him to buy a pizza every now and then, you can make a donation.
                        This is completely optional, and if you decide not to donate, you won't miss out on any advantages, besides the developer's gratitude.
                        All donations are processed by PayPal.<br /><br />
                </td>
                <td class="page_main_right">

                    <table>
                        <tr>
                            <td valign="top">
                                <div class="text">
                                    <h1>Coders</h1>
                                    <div class="credits">
                                        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                                            <tr>
                                                <td width="25%"><strong><a href="https://x.com/_JeanRopke">Jean</a></strong></td>
                                                <td width="75%">Main coder</td>
                                            </tr>
                                        </table>
                                    </div><br />
                                    <h1>Designers</h1>
                                    <div class="credits">
                                        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                                            <tr>
                                                <td width="25%"><strong><a href="http://www.sulake.com/">Sulake</a>*</strong></td>
                                                <td width="75%">All images, CSS styles, JavaScript, and content are created and copyrighted by Sulake Ltd.</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong><a href="http://pixelarts.habbohack.servegame.org/">Tsuka</a>*</strong></td>
                                                <td width="75%">Housekeeping designer</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong><a href="http://www.ukumo.com/">xsixteen</a>*</strong></td>
                                                <td width="75%">Housekeeping co-designer</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong><a href="http://pixelspread.com/blog/289/css-drop-down-menu">Pixelspread</a>*</strong></td>
                                                <td width="75%">CSS dropdown menu used in housekeeping</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong><a href="http://woork.blogspot.com/2008/03/css-message-box-collection.html">Antonio Lupetti</a>*</strong>
                                                </td>
                                                <td width="75%">CSS message boxes used in housekeeping</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong><a href="http://www.famfamfam.com/lab/icons/silk/">FamFamFam</a>*</strong></td>
                                                <td width="75%">Silk icons used in housekeeping headers</td>
                                            </tr>
                                        </table>
                                    </div><br />
                                    <h1>Special Thanks</h1>
                                    <div class="credits">
                                        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                                            <tr>
                                                <td width="25%"><strong><a href="#">Yifan Lu</a></strong></td>
                                                <td width="75%">Creating HoloCMS, the basis of PHPRetro</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong><a href="#">Meth0d</a></strong></td>
                                                <td width="75%">Creating PHPRetro, the basis of {{ config('app.name') }}</td>
                                            </tr>
                                        </table>
                                    </div><br />
                                <div class="text">
                                    <h1>Help</h1>
                                    <div class="credits">
                                        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                                            <tr>
                                                <td width="25%"><strong><a href="https://github.com/jeanropke/Neptune">Offical Repository</a></strong></td>
                                                <td width="75%">Download the latest version of {{ config('app.name') }} and submit any bugs you find and/or suggestions you may have.</td>
                                            </tr>
                                        </table>
                                    </div><br />
                                    <h1>License</h1>
                                    <p>This program is free software: you can redistribute it and/or modify
                                        it under the terms of the GNU General Public License as published by
                                        the Free Software Foundation, either version 3 of the License, or
                                        (at your option) any later version.
                                        <br /><br />
                                        This program is distributed in the hope that it will be useful,
                                        but WITHOUT ANY WARRANTY; without even the implied warranty of
                                        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
                                        GNU General Public License for more details.
                                        <br /><br />
                                        You should have received a copy of the GNU General Public License
                                        along with this program. If not, see <a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>.
                                    </p><br />
                                    <h4>* Represents people/groups that are not affiliated with the {{ config('app.name') }} project.</h4>
                                </div>
                            </td>
                        </tr>
                    </table>
    </div>
    </td>
    </tr>
    </tbody>
    </table>

    </div>
@stop
