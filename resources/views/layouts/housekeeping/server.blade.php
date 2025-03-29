<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Server Configuration</div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server') }}" style="text-decoration:none;{{ $submenu == 'server' ? 'font-weight: bold;' : '' }}">General Configuration</a>
    </div>
{{--
   <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server.wordfilter', false) }}" style="text-decoration:none;{{ $submenu == 'wordfilter' ? 'font-weight: bold;' : '' }}">Wordfilter Options</a>
    </div>
--}}

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server.welcomemsg') }}" style="text-decoration:none;{{ $submenu == 'welcomemsg' ? 'font-weight: bold;' : '' }}">Welcome Message Options</a>
    </div>
{{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server.startup') }}" style="text-decoration:none;{{ $submenu == 'server_startup' ? 'font-weight: bold;' : '' }}">Server Startup</a>
    </div>
--}}
</div>
<br>
{{--
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Gamedata Configuration</div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server.furnidata') }}" style="text-decoration:none;{{ $submenu == 'furnidata' ? 'font-weight: bold;' : '' }}">Furnidata Generator</a>
    </div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server.productdata') }}" style="text-decoration:none;{{ $submenu == 'productdata' ? 'font-weight: bold;' : '' }}">Productdata Generator</a>
    </div>

    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.server.texts') }}" style="text-decoration:none;{{ $submenu == 'texts_override' ? 'font-weight: bold;' : '' }}">Texts Override</a>
    </div>
</div>
--}}
