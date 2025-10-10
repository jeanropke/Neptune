<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> User management</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.listing') }}" style="text-decoration:none;{{ $submenu == 'users.listing' ? 'font-weight: bold;' : '' }}">User listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.tools.badge') }}" style="text-decoration:none;{{ $submenu == 'tools.badge' ? 'font-weight: bold;' : '' }}">Give user badge</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.tools.mass') }}" style="text-decoration:none;{{ $submenu == 'tools.mass' ? 'font-weight: bold;' : '' }}">Massa stuff</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Editors</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.editor.guestroom.listing', false) }}"
            style="text-decoration:none;{{ $submenu == 'guestroom.listing' ? 'font-weight: bold;' : '' }}">Guestroom editor</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.editor.publicroom.listing') }}" style="text-decoration:none;{{ $submenu == 'publicroom.listing' ? 'font-weight: bold;' : '' }}">Publicroom
            editor</a>
    </div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.editor.navigator') }}" style="text-decoration:none;{{ $submenu == 'editor_categoriesh' ? 'font-weight: bold;' : '' }}">Category editor - Navigator</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor_categorieshh') }}" style="text-decoration:none;{{ $submenu == 'editor_categorieshh' ? 'font-weight: bold;' : '' }}">Category editor - homes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor_deals') }}" style="text-decoration:none;{{ $submenu == 'editor_deals' ? 'font-weight: bold;' : '' }}">"Deals" editor (catalogue)</a>
    </div>
    --}}
</div>
<br />

<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Application management
    </div>
    {{-- <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.application_edit') }}" style="text-decoration:none;{{ $submenu == 'application_edit' ? 'font-weight: bold;' : '' }}">Application forms</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.applications') }}" style="text-decoration:none;{{ $submenu == 'applications' ? 'font-weight: bold;' : '' }}">Read and answer to application <b>(2)</b></a>
    </div>
--}}

</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Credits</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.credits.transactions') }}" style="text-decoration:none;{{ $submenu == 'transactions' ? 'font-weight: bold;' : '' }}">Transaction logs</a>
    </div>
    --}}
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.credits.vouchers') }}" style="text-decoration:none;{{ $submenu == 'vouchers' ? 'font-weight: bold;' : '' }}">Voucher Management</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.credits.vouchers.history') }}" style="text-decoration:none;{{ $submenu == 'vouchers_history' ? 'font-weight: bold;' : '' }}">Voucher
            History</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Moderation</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.moderation.reports.website') }}" style="text-decoration:none;{{ $submenu == 'reports.website' ? 'font-weight: bold;' : '' }}">Website Reports</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.moderation.remote.ban') }}" style="text-decoration:none;{{ $submenu == 'moderation.ban' ? 'font-weight: bold;' : '' }}">Remote Banning</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.moderation.unban') }}" style="text-decoration:none;{{ $submenu == 'moderation.unban' ? 'font-weight: bold;' : '' }}">Unbanning</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Habbo Home Moderation</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.moderation.homes.guestbook') }}" style="text-decoration:none;{{ $submenu == 'hh_moderation.guestbook' ? 'font-weight: bold;' : '' }}">Guestbook Messages</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.moderation.homes.stickies') }}" style="text-decoration:none;{{ $submenu == 'hh_moderation.stickies' ? 'font-weight: bold;' : '' }}">Stickies</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Customer Support</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.moderation.support.listing') }}" style="text-decoration:none;{{ $submenu == 'support.listing' ? 'font-weight: bold;' : '' }}">Help Queries</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Logs & Statistics</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.logs.staff') }}" style="text-decoration:none;{{ $submenu == 'logs.staff' ? 'font-weight: bold;' : '' }}">Staff Logs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.logs.bans') }}" style="text-decoration:none;{{ $submenu == 'logs.bans' ? 'font-weight: bold;' : '' }}">Ban Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.logs.alerts') }}" style="text-decoration:none;{{ $submenu == 'logs.alerts' ? 'font-weight: bold;' : '' }}">Alert Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.logs.chats') }}" style="text-decoration:none;{{ $submenu == 'logs.chats' ? 'font-weight: bold;' : '' }}">Chatlogs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.logs.console') }}" style="text-decoration:none;{{ $submenu == 'logs.console' ? 'font-weight: bold;' : '' }}">Console logs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.online') }}" style="text-decoration:none;{{ $submenu == 'online' ? 'font-weight: bold;' : '' }}">Online Users</a>
    </div>
</div>
<br />
