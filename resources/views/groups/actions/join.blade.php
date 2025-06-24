<div class="dialog-grey-top dialog-grey-handle">
    <div>
        <h3><span>Join</span></h3>
    </div>
</div>
<div class="dialog-grey-content">
    <div id="join-group-dialog-body" class="dialog-grey-body">
        <p>{{ $message }}</p>
        <a href="#" class="toolbutton" id="group-action-ok" style="float: right">
            <span>Ok</span>
        </a>
        <div class="clear"></div>
    </div>
</div>
<div class="dialog-grey-bottom">
    <div></div>
</div>
<script>
    makeDialogDraggable($("join-group-dialog"));
    Event.observe($("group-action-ok"), "click", function(e) {
        Event.stop(e);
        location.href = habboReqPath + "/groups/{{ $group->getUrl() }}";
    });
</script>
