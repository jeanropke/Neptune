<div class="menuouterwrap">
    <div class="menucatwrap"><img src="{{ url('/') }}/web/admin/images/menu_title_bullet.gif" style="vertical-align:bottom" border="0" /> Help Topics</div>
    <div class="menulinkwrap">&nbsp;
      <img src="{{ url('/') }}/web/admin/images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
      <a href="{{ route('admin.help.index') }}" style="text-decoration: none; font-weight: {{ $submenu == 'help' ? 'font-weight: bold;' : '' }}">Main Page</a>
    </div>
    <div class="menulinkwrap ">&nbsp;
      <img src="?php echo $housekeeping; ?>images/item_bullet.gif " border="0 " alt="" valign="absmiddle">&nbsp;
      <a href="index.php?p=help_bugs" style="text-decoration: none; font-weight: ?php echo ($p == 'help_bugs' ? 'bold' : 'normal'); ?>">Found a bug?</a>
    </div>
    <div class="menulinkwrap">&nbsp;
      <img src="?php echo $housekeeping; ?>images/item_bullet.gif" border="0" alt="" valign="absmiddle">&nbsp;
      <a href="index.php?p=help_svn" style="text-decoration: none; font-weight: ?php echo ($p == 'help_svn' ? 'bold' : 'normal'); ?>">SVN Releases</a>
    </div>
  </div>
  <br />
