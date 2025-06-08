@props(['id', 'product'])
<span id="{{ $id }}_purchase"></span>
<script language="JavaScript">
    var purchaseButton = Builder.node("a", {
        href: "#",
        className: "colorlink orange"
    }, [Builder.node("span", "Purchase")]);
    $("{{ $id }}_purchase").appendChild(purchaseButton);
    Event.observe(purchaseButton, "click", function(e) {
        Event.stop(e);
        var dialog = createDialog("purchase_dialog", "Confirm purchase", 9001, 0, -1000, closePurchase);
        appendDialogBody(dialog,
            "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
            true);
        moveDialogToCenter(dialog);
        showOverlay();
        new Ajax.Request(
            habboReqPath + "/furnipurchase/purchase_confirmation", {
                method: "post",
                parameters: "product=" + encodeURIComponent("{{ $product }}"),
                onComplete: function(req, json) {
                    setDialogBody(dialog, req.responseText);
                }
            }
        );
    }, false);
</script>
