<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> User Management</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.listing') }}" style="text-decoration:none;{{ $submenu == 'users.listing' ? 'font-weight: bold;' : '' }}">User Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.search') }}" style="text-decoration:none; {{ $submenu == 'users.search' ? 'font-weight: bold;' : '' }}" >Search User</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.tools.badge') }}" style="text-decoration:none;{{ $submenu == 'tools.badge' ? 'font-weight: bold;' : '' }}">Give User Badge</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.tools.mass') }}" style="text-decoration:none;{{ $submenu == 'tools.mass' ? 'font-weight: bold;' : '' }}">Massa stuff</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Editors</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.editor.guestroom.listing', false) }}" style="text-decoration:none;{{ $submenu == 'guestroom.listing' ? 'font-weight: bold;' : '' }}">Guestroom editor</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.editor.publicroom.listing') }}" style="text-decoration:none;{{ $submenu == 'publicroom.listing' ? 'font-weight: bold;' : '' }}">Publicroom editor</a>
    </div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor_categoriesh') }}" style="text-decoration:none;{{ $submenu == 'editor_categoriesh' ? 'font-weight: bold;' : '' }}">Category editor - hotel</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor_categorieshh') }}" style="text-decoration:none;{{ $submenu == 'editor_categorieshh' ? 'font-weight: bold;' : '' }}">Category editor - homes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor_ads') }}" style="text-decoration:none;{{ $submenu == 'editor_ads' ? 'font-weight: bold;' : '' }}">Public Room ads editor</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor_deals') }}" style="text-decoration:none;{{ $submenu == 'editor_deals' ? 'font-weight: bold;' : '' }}">"Deals" editor (catalogue)</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.editor.catalogue') }}" style="text-decoration:none;{{ $submenu == 'editor_catalogue' ? 'font-weight: bold;' : '' }}">Catalogue editor</a>
    </div>
    --}}
</div>
<br />

<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Application management</div>
    {{--<div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.application_edit') }}" style="text-decoration:none;{{ $submenu == 'application_edit' ? 'font-weight: bold;' : '' }}">Application forms</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.applications') }}" style="text-decoration:none;{{ $submenu == 'applications' ? 'font-weight: bold;' : '' }}">Read and answer to application <b>(2)</b></a>
    </div>
--}}

</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Credits</div>
    {{--<div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.credits.transactions') }}" style="text-decoration:none;{{ $submenu == 'transactions' ? 'font-weight: bold;' : '' }}">Transaction logs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.credits.vouchers') }}" style="text-decoration:none;{{ $submenu == 'vouchers' ? 'font-weight: bold;' : '' }}">Voucher Management</a>
    </div>--}}
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Moderation</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.ban') }}" style="text-decoration:none;{{ $submenu == 'ban' ? 'font-weight: bold;' : '' }}">Remote Banning</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.unban') }}" style="text-decoration:none;{{ $submenu == 'unban' ? 'font-weight: bold;' : '' }}">Unbanning</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.alert') }}" style="text-decoration:none;{{ $submenu == 'alert' ? 'font-weight: bold;' : '' }}">Site/Remote Alert</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.massalert') }}" style="text-decoration:none;{{ $submenu == 'massalert' ? 'font-weight: bold;' : '' }}">Mass Site/Remote Alert</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.minimail') }}" style="text-decoration:none;{{ $submenu == 'minimail' ? 'font-weight: bold;' : '' }}">Send minimail</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.massmail') }}" style="text-decoration:none;{{ $submenu == 'massmail' ? 'font-weight: bold;' : '' }}">Mass minimail</a>
    </div>
    --}}
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Customer Support</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.helper') }}" style="text-decoration:none;{{ $submenu == 'helper' ? 'font-weight: bold;' : '' }}">Help Queries</a>
    </div>
    --}}
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Logs & Statistics</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.logs') }}" style="text-decoration:none;{{ $submenu == 'logs' ? 'font-weight: bold;' : '' }}">Staff Logs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.banlist') }}" style="text-decoration:none;{{ $submenu == 'banlist' ? 'font-weight: bold;' : '' }}">Ban Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.alertlist') }}" style="text-decoration:none;{{ $submenu == 'alertlist' ? 'font-weight: bold;' : '' }}">Alert Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.chatlogs') }}" style="text-decoration:none;{{ $submenu == 'chatlogs' ? 'font-weight: bold;' : '' }}">Chatlogs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.users.onlinelist') }}" style="text-decoration:none;{{ $submenu == 'onlinelist' ? 'font-weight: bold;' : '' }}">Online Users</a>
    </div>
    --}}
</div>
<br />
