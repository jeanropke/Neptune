<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> User Management</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users') }}" style="text-decoration:none;@if($submenu == 'users') font-weight: bold;@endif">User Listing</a>
    </div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.edituser', false) }}" style="text-decoration:none; @if($submenu == 'edituser') font-weight: bold;@endif" >Edit User</a>
    </div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.ip') }}" style="text-decoration:none;@if($submenu == 'ip') font-weight: bold;@endif">Retrive IP Address</a>
    </div>
    {{--<div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.uid') }}" style="text-decoration:none;@if($submenu == 'uid') font-weight: bold;@endif">Retrive User ID</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.clonechecker') }}" style="text-decoration:none;@if($submenu == 'clonechecker') font-weight: bold;@endif">Clone Checker</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.ranktool') }}" style="text-decoration:none;@if($submenu == 'ranktool') font-weight: bold;@endif">Manage User Ranks</a>
    </div>
    --}}
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.badgetool') }}" style="text-decoration:none;@if($submenu == 'badgetool') font-weight: bold;@endif">Give User Badge</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.massstuff') }}" style="text-decoration:none;@if($submenu == 'massa_stuff') font-weight: bold;@endif">Massa stuff</a>
    </div>

</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Editors</div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor.guestroom', false) }}" style="text-decoration:none;@if($submenu == 'editor_guestroom') font-weight: bold;@endif">Guestroom editor</a>
    </div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor_publicrooms') }}" style="text-decoration:none;@if($submenu == 'editor_publicrooms') font-weight: bold;@endif">Publicroom editor</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor_categoriesh') }}" style="text-decoration:none;@if($submenu == 'editor_categoriesh') font-weight: bold;@endif">Category editor - hotel</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor_categorieshh') }}" style="text-decoration:none;@if($submenu == 'editor_categorieshh') font-weight: bold;@endif">Category editor - homes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor_ads') }}" style="text-decoration:none;@if($submenu == 'editor_ads') font-weight: bold;@endif">Public Room ads editor</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor_deals') }}" style="text-decoration:none;@if($submenu == 'editor_deals') font-weight: bold;@endif">"Deals" editor (catalogue)</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.editor.catalogue') }}" style="text-decoration:none;@if($submenu == 'editor_catalogue') font-weight: bold;@endif">Catalogue editor</a>
    </div>
    --}}
</div>
<br />
{{--
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Application management</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.application_edit') }}" style="text-decoration:none;@if($submenu == 'application_edit') font-weight: bold;@endif">Application forms</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.applications') }}" style="text-decoration:none;@if($submenu == 'applications') font-weight: bold;@endif">Read and answer to application <b>(2)</b></a>
    </div>

</div>
<br />
--}}
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Credits</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.credits.transactions') }}" style="text-decoration:none;@if($submenu == 'transactions') font-weight: bold;@endif">Transaction logs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.credits.vouchers') }}" style="text-decoration:none;@if($submenu == 'vouchers') font-weight: bold;@endif">Voucher Management</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Moderation</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.ban') }}" style="text-decoration:none;@if($submenu == 'ban') font-weight: bold;@endif">Remote Banning</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.unban') }}" style="text-decoration:none;@if($submenu == 'unban') font-weight: bold;@endif">Unbanning</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.alert') }}" style="text-decoration:none;@if($submenu == 'alert') font-weight: bold;@endif">Site/Remote Alert</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.massalert') }}" style="text-decoration:none;@if($submenu == 'massalert') font-weight: bold;@endif">Mass Site/Remote Alert</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.minimail') }}" style="text-decoration:none;@if($submenu == 'minimail') font-weight: bold;@endif">Send minimail</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.massmail') }}" style="text-decoration:none;@if($submenu == 'massmail') font-weight: bold;@endif">Mass minimail</a>
    </div>
    --}}
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Customer Support</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.helper') }}" style="text-decoration:none;@if($submenu == 'helper') font-weight: bold;@endif">Help Queries</a>
    </div>
    --}}
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Logs & Statistics</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.logs') }}" style="text-decoration:none;@if($submenu == 'logs') font-weight: bold;@endif">Staff Logs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.banlist') }}" style="text-decoration:none;@if($submenu == 'banlist') font-weight: bold;@endif">Ban Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.alertlist') }}" style="text-decoration:none;@if($submenu == 'alertlist') font-weight: bold;@endif">Alert Listing</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.chatlogs') }}" style="text-decoration:none;@if($submenu == 'chatlogs') font-weight: bold;@endif">Chatlogs</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.users.onlinelist') }}" style="text-decoration:none;@if($submenu == 'onlinelist') font-weight: bold;@endif">Online Users</a>
    </div>
    --}}
</div>
<br />
