var Collectibles = function () {
    var D;
    var B = function () {
        if($("collectibles-dialog")) return;
        Overlay.show();
        D = Dialog.createDialog("collectibles-dialog", L10N.get("collectibles.purchase.title"), 9001, 0, -1000, C);
        Dialog.setAsWaitDialog(D);
        Dialog.moveDialogToCenter(D);
        Dialog.makeDialogDraggable(D);
        new Ajax.Request(habboReqPath + "/habblet/ajax/collectiblesConfirm", {
            onComplete: function (E) {
                Dialog.setDialogBody(D, E.responseText);
                if (!!$("collectibles-close")) {
                    $("collectibles-close").observe("click", C)
                }
                if (!!$("collectibles-purchase")) {
                    $("collectibles-purchase").observe("click", function (F) {
                        Event.stop(F);
                        A()
                    })
                }
            }
        })
    };
    var A = function () {
        Dialog.setAsWaitDialog(D);
        new Ajax.Request(habboReqPath + "/habblet/ajax/collectiblesPurchase", {
            onComplete: function (E) {
                Dialog.setDialogBody(D, E.responseText);
                if (!!$("collectibles-close")) {
                    $("collectibles-close").observe("click", C)
                }
            }
        })
    };
    var C = function (E) {
        if (!!E) {
            Event.stop(E)
        }
        $("collectibles-dialog").remove();
        Overlay.hide();
        D = null
    };
    return {
        init: function (secondsToEnd) {
            if (secondsToEnd > 0) {
                timerEl = $("collectibles-timeleft-value");
                if (!!timerEl) {
                    setInterval(
                        function () {
                            var days = Math.floor(secondsToEnd / (3600 * 24));
                            var hours = Math.floor(secondsToEnd % (3600 * 24) / 3600);
                            var minutes = Math.floor(secondsToEnd % 3600 / 60);
                            var seconds = Math.floor(secondsToEnd % 60);

                            timerEl.update(`${days}d ${hours}h ${minutes}min ${seconds}s`);
                            secondsToEnd--;
                        }, 1000);
                }
                $$(".collectibles-purchase-current").invoke("observe", "click", function (F) {
                    Event.stop(F);
                    B()
                })
            }
        }
    }
}();
