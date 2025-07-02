<div id="badge-editor-flash">
    <p>Adobe Flash player is required.</p>
    <p><a href="http://www.adobe.com/go/getflashplayer">Click here to install Adobe Flash player</a>.</p>
</div>
<script type="text/javascript" language="JavaScript">
    var swfobj = new SWFObject("{{ cms_config('site.web.url') }}/flash/BadgeEditor.swf", "badgeEditor", "280", "366", "8");
    swfobj.addParam("base", "{{ cms_config('site.web.url') }}/flash/");
    swfobj.addParam("bgcolor", "#e2e2e2");
    swfobj.addVariable("post_url", "{{ url('/') }}/groups/actions/update_group_badge?_token={{ csrf_token() }}");
    swfobj.addVariable("__app_key", "");
    swfobj.addVariable("groupId", "{{ $group->id }}");
    swfobj.addVariable("badge_data", "{{ $group->badge }}");
    swfobj.addVariable("localization_url", "{{ cms_config('site.web.url') }}/xml/badge_editor.xml");
    swfobj.addVariable("xml_url", "{{ cms_config('site.web.url') }}/xml/badge_data.xml");
    swfobj.addParam("allowScriptAccess", "always");
    swfobj.write("badge-editor-flash");
</script>
