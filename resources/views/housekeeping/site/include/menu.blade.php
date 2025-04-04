<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Configuration & Setup</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site') }}" style="text-decoration:none;{{ $submenu == 'site' ? 'font-weight: bold;' : '' }}">General Configuration</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.maintenance') }}" style="text-decoration:none;{{ $submenu == 'maintenance' ? 'font-weight: bold;' : '' }}">Turn your site on/off</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.loader') }}" style="text-decoration:none;{{ $submenu == 'loader' ? 'font-weight: bold;' : '' }}">Loader Configuration</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.ads') }}" style="text-decoration:none;{{ $submenu == 'ads' ? 'font-weight: bold;' : '' }}">Advertisements & Tracking Configuration</a>
    </div>
</div>
<br />
{{--
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Collectables</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.collectables') }}" style="text-decoration:none;{{ $submenu == 'collectables' ? 'font-weight: bold;' : '' }}">Collectables over-view</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.collectables_edit') }}" style="text-decoration:none;{{ $submenu == 'collectables_edit' ? 'font-weight: bold;' : '' }}">Add collectables</a>
    </div>
</div>
<br />
--}}
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Content Management</div>
    {{--
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.content') }}" style="text-decoration:none;{{ $submenu == 'content' && empty($category) ? 'font-weight: bold;' : '' }}">Manage Site Content</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.banners') }}" style="text-decoration:none;{{ $submenu == 'banners' ? 'font-weight: bold;' : '' }}">Manage Site Banners</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.add_homes') }}" style="text-decoration:none;{{ $submenu == 'add_homes' ? 'font-weight: bold;' : '' }}">Add stickers, backgrounds to homes catalogue</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.faq') }}" style="text-decoration:none;{{ $submenu == 'faq' ? 'font-weight: bold;' : '' }}">Manage FAQ Items</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.newsletter') }}" style="text-decoration:none;{{ $submenu == 'newsletter' ? 'font-weight: bold;' : '' }}">Compose Newsletter</a>
    </div>
    --}}
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.articles.create') }}" style="text-decoration:none;{{ $submenu == 'articles.create' ? 'font-weight: bold;' : '' }}">Compose News Item</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.articles', false) }}" style="text-decoration:none;{{ $submenu == 'articles' ? 'font-weight: bold;' : '' }}">Manage Existing News Items</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Box Management</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.boxes.create') }}" style="text-decoration:none;{{ $submenu == 'boxes.create' ? 'font-weight: bold;' : '' }}">Create Boxes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.boxes', false) }}" style="text-decoration:none;{{ $submenu == 'boxes' ? 'font-weight: bold;' : '' }}">Manage Existing Boxes</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.boxes.pages.create', false) }}" style="text-decoration:none;{{ $submenu == 'boxes.pages.create' ? 'font-weight: bold;' : '' }}">Create Box Pages</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.boxes.pages', false) }}" style="text-decoration:none;{{ $submenu == 'boxes.pages' ? 'font-weight: bold;' : '' }}">Manage Existing Box Pages</a>
    </div>
</div>
<br />
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Website Menu</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.menu.categories.listing') }}" style="text-decoration:none;{{ $submenu == 'menu.categories.listing' ? 'font-weight: bold;' : '' }}">Main Categories</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.menu.subcategories.listing') }}" style="text-decoration:none;{{ $submenu == 'menu.subcategories.listing' ? 'font-weight: bold;' : '' }}">Sub Categories</a>
    </div>
</div>
<br />
{{--<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Database Tools</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.dboptimize') }}" style="text-decoration:none;{{ $submenu == 'dboptimize' ? 'font-weight: bold;' : '' }}">Optimize Tables</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.dbrepair') }}" style="text-decoration:none;{{ $submenu == 'dbrepair' ? 'font-weight: bold;' : '' }}">Check/Repair Tables</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ url('/') }}/web/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.site.dbquery') }}" style="text-decoration:none;{{ $submenu == 'dbquery' ? 'font-weight: bold;' : '' }}">Database Query</a>
    </div>
</div>--}}
