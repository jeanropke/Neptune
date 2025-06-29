    var el = $("guestbook-type");
    if (el) {
        if (el.hasClassName("public")) {
            el.className = "private";
            new Effect.Pulsate(el, {
                duration: 1.0,
                afterFinish: function() {
                    Element.setOpacity(el, 1);
                }
            });
        } else {
            new Effect.Pulsate(el, {
                duration: 1.0,
                afterFinish: function() {
                    Element.setOpacity(el, 0);
                    el.className = "public";
                }
            });
        }
    }
