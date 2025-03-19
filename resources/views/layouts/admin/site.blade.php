<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Configuration & Setup</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site') }}" style="text-decoration:none;{{ $submenu == 'site' ? 'font-weight: bold;' : '' }}">General Configuration</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.maintenance') }}" style="text-decoration:none;{{ $submenu == 'maintenance' ? 'font-weight: bold;' : '' }}">Turn your site on/off</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.loader') }}" style="text-decoration:none;{{ $submenu == 'loader' ? 'font-weight: bold;' : '' }}">Loader Configuration</a>
    </div>
</div>
<br />
{{--
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Collectables</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.collectables') }}" style="text-decoration:none;{{ $submenu == 'collectables' ? 'font-weight: bold;' : '' }}">Collectables over-view</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.collectables_edit') }}" style="text-decoration:none;{{ $submenu == 'collectables_edit' ? 'font-weight: bold;' : '' }}">Add collectables</a>
    </div>
</div>
<br />
--}}
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Content Management</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.content') }}" style="text-decoration:none;{{ $submenu == 'content' && empty($category) ? 'font-weight: bold;' : '' }}">Manage Site Content</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.banners') }}" style="text-decoration:none;{{ $submenu == 'banners' ? 'font-weight: bold;' : '' }}">Manage Site Banners</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.add_homes') }}" style="text-decoration:none;{{ $submenu == 'add_homes' ? 'font-weight: bold;' : '' }}">Add stickers, backgrounds to homes catalogue</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.faq') }}" style="text-decoration:none;{{ $submenu == 'faq' ? 'font-weight: bold;' : '' }}">Manage FAQ Items</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.newsletter') }}" style="text-decoration:none;{{ $submenu == 'newsletter' ? 'font-weight: bold;' : '' }}">Compose Newsletter</a>
    </div>
    --}}
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.news_compose') }}" style="text-decoration:none;{{ $submenu == 'news_compose' ? 'font-weight: bold;' : '' }}">Compose News Item</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.news_manage', false) }}" style="text-decoration:none;{{ $submenu == 'news_manage' ? 'font-weight: bold;' : '' }}">Manage Existing News Items</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Box Management</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.box_create') }}" style="text-decoration:none;{{ $submenu == 'box_create' ? 'font-weight: bold;' : '' }}">Create Boxes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.box_edit', false) }}" style="text-decoration:none;{{ $submenu == 'box_edit' ? 'font-weight: bold;' : '' }}">Manage Existing Boxes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.box_pages', false) }}" style="text-decoration:none;{{ $submenu == 'box_pages' ? 'font-weight: bold;' : '' }}">Set Box Pages</a>
    </div>
</div>
<br />
{{--<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Database Tools</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.dboptimize') }}" style="text-decoration:none;{{ $submenu == 'dboptimize' ? 'font-weight: bold;' : '' }}">Optimize Tables</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.dbrepair') }}" style="text-decoration:none;{{ $submenu == 'dbrepair' ? 'font-weight: bold;' : '' }}">Check/Repair Tables</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('admin.site.dbquery') }}" style="text-decoration:none;{{ $submenu == 'dbquery' ? 'font-weight: bold;' : '' }}">Database Query</a>
    </div>
</div>--}}
<br />
