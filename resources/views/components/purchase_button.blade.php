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
            "<p style=\"text-align:center\"><img src=\"{{ cms_config('site.web.url') }}/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>",
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

{{--
<noscript>
    <form action="{{ url('/') }}/hotel/furniture/starterpacks#purchase_2" method="post">
        <input type="hidden" name="purchase_2_task" value="purchase" />
        <input type="hidden" name="purchase_2_product" value="starter_tv" />
        <input type="hidden" name="__app_key" value="dcazA2DGf22H8dDCEkJyr" />
        <input type="submit" value="Purchase" class="process-button" />
    </form>
</noscript>
--}}
