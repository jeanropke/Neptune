<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Catalogue Configuration</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.furniture.catalogue.pages') }}" style="text-decoration:none;{{ $submenu == 'catalogue.pages' ? 'font-weight: bold;' : '' }}">Catalogue Editor</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.furniture.catalogue.items') }}" style="text-decoration:none;{{ $submenu == 'catalogue.items' ? 'font-weight: bold;' : '' }}">Catalogue Items</a>
    </div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.furniture.catalogue.packages') }}" style="text-decoration:none;{{ $submenu == 'catalogue.packages' ? 'font-weight: bold;' : '' }}">Catalogue Packages</a>
    </div>
</div>
<br>
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Furniture Configuration</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.furniture.items') }}" style="text-decoration:none;{{ $submenu == 'furniture.items' ? 'font-weight: bold;' : '' }}">Items Definitions</a>
    </div>
</div>
<br>
<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Website Offers</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.furniture.weboffers') }}" style="text-decoration:none;{{ $submenu == 'furniture.weboffers' ? 'font-weight: bold;' : '' }}">Offers</a>
    </div>
</div>
