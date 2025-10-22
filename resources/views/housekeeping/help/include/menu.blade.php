<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ cms_config('site.web.url') }}/housekeeping/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Help Topics</div>
    <div class="menulinkwrap">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.help.index') }}" style="text-decoration: none; {{ $submenu == 'help' ? 'font-weight: bold;' : '' }}">Main Page</a>
    </div>
    <div class="menulinkwrap ">&nbsp;
        <img src="{{ cms_config('site.web.url') }}/housekeeping/images/item_bullet.gif " border="0 " alt="" valign="absmiddle">&nbsp;
        <a href="{{ route('housekeeping.help.bugs') }}" style="text-decoration: none; {{ $submenu == 'help.bugs' ? 'font-weight: bold;' : '' }}">Found a bug?</a>
    </div>
</div>
<br />
