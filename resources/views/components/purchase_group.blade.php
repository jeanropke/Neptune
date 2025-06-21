@props(['id', 'product'])
<div id="{{ $id }}">
    <span id="{{ $id }}_group_purchase"></span>
    <script type="text/javascript">
        var groupPurchaseButton = Builder.node("a", {
            href: "#",
            className: "colorlink orange"
        }, [Builder.node("span", "Create a Group")]);
        $("{{ $id }}_group_purchase").appendChild(groupPurchaseButton);
        var dialog;
        Event.observe(groupPurchaseButton, "click", function(e) {
            Event.stop(e);
            dialog = createDialog("group_purchase_form", "Create a Group", 9001, 0, -1000, cancelGroupPurchase);
            appendDialogBody(dialog,
                "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
                true);
            moveDialogToCenter(dialog);
            makeDialogDraggable(dialog);
            showOverlay();
            new Ajax.Request(
                habboReqPath + "/grouppurchase/group_create_form", {
                    method: "post",
                    parameters: "product=" + encodeURIComponent("{{ $product }}"),
                    onComplete: function(req, json) {
                        setDialogBody(dialog, req.responseText);
                    }
                }
            );
        }, false);
    </script>
</div>
