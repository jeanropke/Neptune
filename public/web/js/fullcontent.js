var ListPaging = Class.create();
ListPaging.prototype = {
    setOptions: function(a) {
        this.options = this.options || {};
        Object.extend(this.options, a || {})
    },
    initialize: function() {
        this.pageNumber = 1;
        this.bindElementsAndEvents()
    },
    bindElementsAndEvents: function() {
        this.contentElement = $(this.options.contentElementId);
        this.pagingElement = $(this.options.pagingElementId);
        if (this.pagingElement) {
            this.pagingElement.onclick = this._processClick.bindAsEventListener(this)
        }
    },
    _processClick: function(b) {
        var a = Event.element(b);
        if (a.nodeName.toLowerCase() == "a" && a.className == this.options.pagingListLinkClass) {
            Event.stop(b);
            this._findPage(b)
        }
    },
    _findPage: function(f) {
        var b = Event.element(f);
        var a = parseInt($F("pageNumber"));
        var d = parseInt($F("totalPages"));
        var c = 1;
        if (b.id == "list-first") {
            c = 1
        } else {
            if (b.id == "list-previous") {
                c = a - 1
            } else {
                if (b.id == "list-next") {
                    c = a + 1
                } else {
                    if (b.id == "list-last") {
                        c = d
                    }
                }
            }
        }
        this._processSearch(c)
    },
    _processSearch: function(a) {
        new Ajax.Updater(this.contentElement, habboReqPath + this.options.searchUrl, {
            method: "post",
            parameters: {
                pageNumber: encodeURIComponent(a),
                _token: $F('_token')
            },
            onComplete: function() {
                this.bindElementsAndEvents()
            }.bind(this)
        })
    }
};
var QuickMenuListPaging = Class.create(ListPaging, {
    initialize: function($super, a, b) {
        this.setOptions({
            searchUrl: b,
            contentElementId: "qtab-container-" + a,
            pagingElementId: "qtab-" + a + "-list-paging",
            pagingListLinkClass: "qtab-" + a + "-list-paging-link"
        });
        $super()
    }
});
var HabbletPaging = Class.create(ListPaging, {
    initialize: function($super, a) {
        this.setOptions({
            searchUrl: a
        });
        $super()
    },
    _findPage: function($super, f) {
        var b = Event.element(f);
        var a = parseInt($F(this.options.contentElementId + "-pageNumber"));
        var d = parseInt($F(this.options.contentElementId + "-totalPages"));
        var c = 1;
        if (b.id == this.options.contentElementId + "-list-first") {
            c = 1
        } else {
            if (b.id == this.options.contentElementId + "-list-previous") {
                c = a - 1
            } else {
                if (b.id == this.options.contentElementId + "-list-next") {
                    c = a + 1
                } else {
                    if (b.id == this.options.contentElementId + "-list-last") {
                        c = d
                    } else {
                        if (b.id.indexOf(this.options.contentElementId + "-list-page-") != -1) {
                            c = b.id.substring(this.options.contentElementId.length + 11)
                        }
                    }
                }
            }
        }
        this._processSearch(c)
    }
});
var HabbletGroupPaging = Class.create(HabbletPaging, {
    initialize: function($super, a) {
        this.setOptions({
            contentElementId: "groups-habblet-list-container",
            pagingElementId: "groups-habblet-list-container-list-paging",
            pagingListLinkClass: "groups-habblet-list-container-list-paging-link"
        });
        $super(a)
    }
});
var HabbletSearchPaging = Class.create(HabbletPaging, {
    initialize: function($super, a) {
        this.setOptions({
            contentElementId: "avatar-habblet-list-container",
            pagingElementId: "avatar-habblet-list-container-list-paging",
            pagingListLinkClass: "avatar-habblet-list-container-list-paging-link"
        });
        $super(a)
    },
    _processSearch: function($super, b) {
        var a = $F("avatar-habblet-search-string");
        new Ajax.Updater(this.contentElement, habboReqPath + this.options.searchUrl, {
            method: "post",
            parameters: {
                pageNumber: encodeURIComponent(b),
                searchString: encodeURIComponent(a),
                _token: $F('_token')
            },
            onComplete: function() {
                this.bindElementsAndEvents()
            }.bind(this)
        })
    }
});
var HabboSearchHabblet = Class.create();
HabboSearchHabblet.prototype = {
    minSearchLength: 0,
    maxSearchLength: 0,
    initialize: function(b, a) {
        this.maxSearchLength = a;
        this.minSearchLength = b;
        this.habbletPaging = new HabbletSearchPaging("/habblet/habbosearchcontent");
        Event.observe("avatar-habblet-search-button", "click", function(c) {
            Event.stop(c);
            this._processSearch(c)
        }.bind(this));
        Event.observe("avatar-habblet-search-string", "keypress", function(c) {
            if (c.keyCode == Event.KEY_RETURN) {
                this._processSearch(c)
            }
        }.bind(this));
        $("avatar-habblet-content").observe("click", Event.delegate({
            "a.add": function(f) {
                f.stop();
                var d = f.element();
                var h = d.readAttribute("avatarid");
                if (!!d && !!h) {
                    var g = function() {
                        Overlay.hide();
                        $("avatar-habblet-dialog").remove()
                    };
                    var c = Dialog.createDialog("avatar-habblet-dialog", L10N.get("habblet.search.add_friend.title"), 9001, 0, -1000, g);
                    $("avatar-habblet-dialog").observe("click", Event.delegate({
                        "a.done > *": function(i) {
                            i.stop();
                            g()
                        },
                        "a.add-continue > *": function(i) {
                            i.stop();
                            Dialog.setAsWaitDialog(c);
                            new Ajax.Request("/habblet/ajax/addFriend", {
                                parameters: {
                                    accountId: h
                                },
                                onComplete: function(e) {
                                    d.hide();
                                    Dialog.setDialogBody(c, e.responseText)
                                }
                            })
                        }
                    }));
                    Dialog.setAsWaitDialog(c);
                    Dialog.moveDialogToCenter(c);
                    Overlay.show();
                    new Ajax.Request("/habblet/ajax/confirmAddFriend", {
                        parameters: {
                            accountId: h
                        },
                        onComplete: function(e) {
                            Dialog.setDialogBody(c, e.responseText)
                        }
                    })
                }
            },
            "ul *:not(a)": function(d) {
                var c = d.findElement("li");
                if (!!c.readAttribute("homeurl")) {
                    location.href = c.readAttribute("homeurl")
                }
            }
        }));
        Utils.limitTextarea("avatar-habblet-search-string", this.maxSearchLength, function(c) {
            var d = $("habbo-search-error-container");
            if (c && !Element.visible(d)) {
                $("habbo-search-error").innerHTML = L10N.get("habblet.search.error.search_string_too_long");
                Element.show(d)
            } else {
                if (!c) {
                    Element.hide(d)
                }
            }
        })
    },
    _processSearch: function(b) {
        var a = $F("avatar-habblet-search-string");
        a = a.strip();
        if (this._isValidSearchString(a)) {
            Element.wait($("avatar-habblet-list-container"));
            new Ajax.Updater("avatar-habblet-list-container", habboReqPath + "/habblet/habbosearchcontent", {
                method: "post",
                parameters: {
                    searchString: encodeURIComponent(a),
                    _token: $F('_token')
                },
                onComplete: function() {
                    this.habbletPaging.bindElementsAndEvents()
                }.bind(this)
            })
        } else {
            Element.show($("habbo-search-error-container"))
        }
    },
    _isValidSearchString: function(a) {
        if (a.length < this.minSearchLength) {
            $("habbo-search-error").innerHTML = L10N.get("habblet.search.error.search_string_too_short");
            return !1
        } else {
            if (a.length > this.maxSearchLength) {
                $("habbo-search-error").innerHTML = L10N.get("habblet.search.error.search_string_too_long")
            }
        }
        return !0
    }
};
var InviteFriendHabblet = Class.create();
InviteFriendHabblet.prototype = {
    initialize: function(b) {
        Event.observe("send-friend-invite-button", "click", function(c) {
            Event.stop(c);
            this._sendInvite()
        }.bind(this));
        Event.observe("getlink-friend-invite-button", "click", function(c) {
            Event.stop(c);
            this._getInviteLink()
        }.bind(this));
        Utils.limitTextarea("invitation_message", b, function(c) {
            var e = $("invitation_message_error");
            if (c && !Element.visible(e)) {
                var d = $$("#invitation_message_error .rounded").first();
                d.innerHTML = L10N.get("invitation.error.message_too_long");
                Element.show(e)
            } else {
                if (!c) {
                    Element.hide(e)
                }
            }
        });
        for (var a = 1; a < 4; a++) {
            Event.observe($("invitation_recipient" + a), "focus", function(d) {
                var c = Event.element(d);
                if (c && c.value == L10N.get("invitation.form.recipient")) {
                    c.value = ""
                }
            });
            Event.observe($("invitation_recipient" + a), "blur", function(d) {
                var c = Event.element(d);
                if (c && c.value == "") {
                    c.value = L10N.get("invitation.form.recipient")
                }
            })
        }
    },
    _sendInvite: function() {
        var b = encodeURIComponent($("invitation_message").value);
        for (var a = 1; a < 4; a++) {
            if ($("invitation_recipient" + a).value != L10N.get("invitation.form.recipient")) {
                b += "&recipientEmails=" + encodeURIComponent($("invitation_recipient" + a).value)
            }
        }
        new Ajax.Updater("friend-invitation-habblet-container", habboReqPath + "/habblet/ajax/mgmsendinvite", {
            method: "post",
            parameters: "message=" + b,
            evalScripts: !0,
            onComplete: function(d, e) {
                if (e == "success") {
                    for (var c = 1; c < 4; c++) {
                        $("invitation_recipient" + c).value = L10N.get("invitation.form.recipient")
                    }
                }
            }
        })
    },
    _getInviteLink: function() {
        $("invitation-link-container").wait(75);
        new Ajax.Updater("invitation-link-container", habboReqPath + "/habblet/ajax/mgmgetinvitelink", {
            method: "post",
            evalScripts: !0,
            parameters: { _token: $F('_token') },
            onComplete: function(a, b) {}
        })
    }
};
var RedeemHabblet = Class.create({
    busy: !1,
    initialize: function() {
        Event.observe("voucher-form", "submit", this._redeemVoucher.bind(this));
        var a = $("purse-redeemcode-button");
        if (a) {
            a.observe("click", this._redeemVoucher.bind(this));
            document.observe("dom:loaded", function() {
                $("purse-habblet-redeemcode-string").setStyle({
                    width: ($(a.parentNode).getWidth() - a.getWidth() - 50) + "px"
                })
            })
        }
    },
    _redeemVoucher: function(a) {
        if (this.busy) {
            return
        }
        this.busy = !0;
        Event.stop(a);
        new Ajax.Request(habboReqPath + "/habblet/ajax/redeemvoucher", {
            method: "post",
            parameters: {
                voucherCode: $F("purse-habblet-redeemcode-string"),
                _token: $F('_token')
            },
            onComplete: function(c) {
                var b = $("voucher-form");
                b.innerHTML = c.responseText;
                b.select(".rounded").each(function(d) {
                    Rounder.addCorners(d, 8, 8)
                });
                if ($("purse-redeemcode-button")) {
                    Event.observe("purse-redeemcode-button", "click", this._redeemVoucher.bind(this))
                }
                this.busy = !1
            }.bind(this)
        })
    }
});
var HabboIdForm = Class.create({
    form: null,
    busy: !1,
    initialize: function(a) {
        this.form = $(a);
        if (!!this.form) {
            this.form.observe("submit", this._getId.bind(this));
            this.form.observe("click", this._clicked.bind(this))
        }
    },
    _clicked: function(b) {
        if (this.busy) {
            return
        }
        var a = b.findElement(".habboid-submit");
        if (!!a) {
            this._getId(b)
        }
    },
    _getId: function(a) {
        if (this.busy) {
            return
        }
        a.stop();
        this.busy = !0;
        new Ajax.Request(habboReqPath + "/habblet/ajax/new_habboid", {
            method: "post",
            parameters: {
                habboIdName: this.form.down("input[type=text]").value
            },
            onComplete: function(c) {
                var b = c.getHeader("X-Reply-Status");
                if (b == "success") {
                    this.form.up(".habboid-container").innerHTML = c.responseText
                } else {
                    this.form.innerHTML = c.responseText
                }
                this.form.select(".rounded").each(function(d) {
                    Rounder.addCorners(d, 8, 8)
                });
                this.busy = !1
            }.bind(this)
        })
    }
});
var ActiveHabbosHabblet = Class.create();
ActiveHabbosHabblet.prototype = {
    numberOfRows: 3,
    numberOfColumns: 6,
    horizontalSpace: 62,
    verticalSpace: 45,
    numberOfImages: 18,
    initialize: function() {
        this._positionPlaceHolderImages()
    },
    generateRandomImages: function() {
        var c = $("homes-habblet-list-container").select(".active-habbo-image");
        var e = [];
        var a = 0;
        while (e.length < c.length) {
            var b = Math.floor(Math.random() * c.length);
            var d = c[b];
            var f = $("active-habbo-image-placeholder-" + a);
            if (e.indexOf(b) == -1) {
                $("imagemap-area-" + a).href = $("active-habbo-url-" + b).value;
                this._addToolTip(a, $("active-habbo-data-" + b));
                this._placeImage(f, d);
                e.push(b);
                a++
            }
            if (a == this.numberOfImages) {
                break
            }
        }
    },
    _placeImage: function(b, a) {
        window.setTimeout(function() {
            b.style.backgroundImage = "url(" + a.value + ")"
        }, Math.floor(Math.random() * 700))
    },
    _addToolTip: function(a, b) {
        new Tip("imagemap-area-" + a, b.innerHTML, {
            className: "bubbletip",
            title: " ",
            target: $("active-habbo-image-placeholder-" + a),
            hook: {
                target: "topRight",
                tip: "bottomRight"
            },
            offset: {
                x: 85,
                y: 40
            }
        })
    },
    _positionPlaceHolderImages: function() {
        var c = $("homes-habblet-list-container").select(".active-habbo-image-placeholder");
        var e = 10;
        var d = 50;
        var b = 0;
        for (var g = 0; g < this.numberOfRows; g++) {
            for (var a = 0; a < this.numberOfColumns; a++) {
                var f = c[b];
                if (f) {
                    f.style.left = d + "px";
                    f.style.top = e + "px";
                    d = d + this.horizontalSpace;
                    b = b + 1
                }
            }
            if (g % 2 < 1) {
                d = 20
            } else {
                d = 50
            }
            e = e + this.verticalSpace
        }
        c.each(function(h) {
            h.style.display = "block"
        })
    }
};
var RoomSelectionHabblet = {
    initClosableHabblet: function() {
        $("habblet-close-roomselection").observe("click", function(a) {
            RoomSelectionHabblet.showConfirmation()
        })
    },
    hideHabblet: function() {
        new Ajax.Request(habboReqPath + "/habblet/ajax/roomselectionHide");
        Effect.Fade("roomselection", {
            afterFinish: function() {
                $("roomselection").remove()
            }
        })
    },
    showConfirmation: function() {
        Overlay.show();
        var a = Dialog.createDialog("roomselection-dialog", L10N.get("roomselection.hide.title"), !1, !1, !1, RoomSelectionHabblet.hideConfirmation);
        Dialog.setAsWaitDialog(a);
        Dialog.makeDialogDraggable(a);
        Dialog.moveDialogToCenter(a);
        new Ajax.Request(habboReqPath + "/habblet/ajax/roomselectionConfirm", {
            onComplete: function(b) {
                $("roomselection-dialog-body").update(b.responseText);
                $("roomselection-cancel").observe("click", function(c) {
                    Event.stop(c);
                    RoomSelectionHabblet.hideConfirmation()
                });
                if (!!$("roomselection-hide")) {
                    $("roomselection-hide").observe("click", function(c) {
                        Event.stop(c);
                        RoomSelectionHabblet.hideConfirmation();
                        RoomSelectionHabblet.hideHabblet()
                    })
                }
            }
        })
    },
    hideConfirmation: function() {
        $("roomselection-dialog").remove();
        Overlay.hide()
    },
    create: function(b, d) {
        var a = !1;
        try {
            a = window.habboClient
        } catch (c) {}
        if (a) {
            window.location.href = b;
            return !1
        }
        if (document.habboLoggedIn) {
            new Ajax.Request(habboReqPath + "/habblet/ajax/roomselectionCreate", {
                parameters: {
                    roomType: d
                }
            })
        }
        HabboClient.openOrFocus(b);
        window.location.replace("/me");
        if ($("roomselection-plp-intro")) {
            $("roomselection-plp", "habblet-close-roomselection").invoke("hide");
            $("roomselection-plp-intro").update(L10N.get("roomselection.old_user.done"))
        }
        return !1
    }
};
var GiftQueueHabblet = {
    init: function(a) {
        GiftQueueHabblet.container = $("gift-countdown");
        if (!!GiftQueueHabblet.container) {
            new PrettyTimer(a, function(b) {
                GiftQueueHabblet.container.update(b)
            }, {
                showDays: !1,
                showMeaningfulOnly: !1,
                localizations: {
                    hours: L10N.get("time.hours") + " ",
                    minutes: L10N.get("time.minutes") + " ",
                    seconds: L10N.get("time.seconds")
                },
                endCallback: function() {
                    GiftQueueHabblet.reload()
                }
            })
        }
    },
    initClosableHabblet: function() {
        $("habblet-close-giftqueue").setStyle({
            display: "inline"
        });
        $("habblet-close-giftqueue").observe("click", function(a) {
            GiftQueueHabblet.hide()
        })
    },
    reload: function() {
        new Ajax.Request(habboReqPath + "/habblet/ajax/nextgift", {
            onComplete: function(b, a) {
                $("gift-container").update(b.responseText);
                GiftQueueHabblet.init(parseInt(a))
            }
        })
    },
    hide: function() {
        new Ajax.Request(habboReqPath + "/habblet/ajax/giftqueueHide");
        Effect.Fade("giftqueue", {
            afterFinish: function() {
                $("giftqueue").remove()
            }
        })
    }
};
var CurrentRoomEvents = {
    init: function() {
        $("event-category").observe("change", function(a) {
            Element.wait($("event-list"));
            new Ajax.Updater("event-list", "/habblet/ajax/load_events", {
                parameters: {
                    _token: $F('_token'),
                    eventTypeId: $F("event-category")
                },
                onComplete: function() {
                    CurrentRoomEvents.initListItems()
                }
            })
        });
        CurrentRoomEvents.initListItems()
    },
    initListItems: function() {
        $$("#current-events ul.habblet-list").each(function(a) {
            Event.observe(a, "click", function(c) {
                var d = Event.element(c);
                if (d.tagName.toUpperCase() == "A") {
                    return
                }
                Event.stop(c);
                if (!$(d).match("li")) {
                    d = $(d).up("li")
                }
                var b = $(d).readAttribute("roomid");
                if (b) {
                    HabboClient.roomForward(habboDefaultClientPopupUrl + "?forwardId=2&roomId=" + b, b, "private")
                }
            })
        })
    }
};
var HabbletTabber = function() {
    var a = function(c, d, b) {
        if (c.indexOf("?") == -1) {
            c += "?"
        } else {
            c += "&"
        }
        c += "first=true";
        Element.wait(d, b);
        new Ajax.Updater(d, c, {
            method: "post",
            parameters: { _token: $F('_token')},
            evalScripts: !0
        })
    };
    return {
        init: function() {
            ($("content") || document.body).select(".box-tabs-container .box-tabs").each(function(b) {
                Event.observe(b, "click", HabbletTabber.onclickHandler);
                b.select(".selected").each(function(c) {
                    if (!!$(c.id + "-content")) {
                        $(c.id + "-content").select(".tab-ajax").each(function(d) {
                            a(d.href, d.parentNode)
                        })
                    }
                })
            })
        },
        onclickHandler: function(f) {
            var d = Event.findElement(f, "li");
            if (d && d.id && (!d.className || !Element.hasClassName(d, "selected"))) {
                var b = 0;
                d.parentNode.select(".selected").each(function(e) {
                    e.className = "";
                    b = $(e.id + "-content").getHeight();
                    Element.hide(e.id + "-content")
                });
                Element.addClassName(d, "selected");
                $(d.id + "-content").select(".tab-ajax").each(function(e) {
                    a(e.href, e.parentNode, b)
                });
                Element.show(d.id + "-content");
                Event.stop(f)
            } else {
                var c = Event.element(f).href;
                if (!!c && c.substring(c.length - 1) == "#") {
                    Event.stop(f)
                }
            }
        }
    }
}();
HabboView.add(HabbletTabber.init);
var TagHelper = Class.create();
TagHelper.initialized = !1;
TagHelper.init = function(a) {
    if (TagHelper.initialized) {
        return
    }
    TagHelper.initialized = !0;
    TagHelper.loggedInAccountId = a;
    TagHelper.bindEventsToTagLists()
};
TagHelper.addFormTagToMe = function() {
    var a = $("add-tag-input");
    TagHelper.addThisTagToMe($F(a), !0);
    Form.Element.clear(a)
};
TagHelper.bindEventsToTagLists = function() {
    var a = function(b) {
        TagHelper.tagListClicked(b, TagHelper.loggedInAccountId)
    };
    $$(".tag-list.make-clickable").each(function(b) {
        Event.observe(b, "click", a);
        Element.removeClassName(b, "make-clickable")
    })
};
TagHelper.setTexts = function(a) {
    TagHelper.options = a
};
TagHelper.tagListClicked = function(g) {
    var d = Event.element(g);
    var b = Element.hasClassName(d, "tag-add-link");
    var a = Element.hasClassName(d, "tag-remove-link");
    if (b || a) {
        var h = Element.up(d, ".tag-list li");
        if (!h) {
            return
        }
        var c = TagHelper.findTagNameForContainer(h);
        var f = TagHelper.findTagIdForContainer(h);
        Event.stop(g);
        if (b) {
            TagHelper.addThisTagToMe(c, !0)
        } else {
            TagHelper.removeThisTagFromMe(c, f)
        }
    }
};
TagHelper.findTagNameForContainer = function(a) {
    var b = Element.down(a, ".tag");
    if (!b) {
        return null
    }
    return b.innerHTML.strip()
};
TagHelper.findTagIdForContainer = function(a) {
    var b = Element.down(a, ".tag-id");
    if (!b) {
        return null
    }
    return b.innerHTML.strip()
};
TagHelper.addThisTagToMe = function(b, c, a) {
    if (typeof(a) == "undefined") {
        a = {}
    }
    new Ajax.Request("/myhabbo/tag/add", {
        parameters: "accountId=" + encodeURIComponent(TagHelper.loggedInAccountId) + "&tagName=" + encodeURIComponent(b),
        onSuccess: function(e) {
            var d = e.responseText;
            if (d == "valid" && c) {
                $$(".tag-list li").each(function(f) {
                    if (TagHelper.findTagNameForContainer(f) == b) {
                        var h = Element.down(f, ".tag-add-link");
                        var g = $$(".tag-remove-link").first();
                        h.title = g ? g.title : "";
                        h.removeClassName("tag-add-link").addClassName("tag-remove-link")
                    }
                })
            } else {
                if (d == "taglimit") {
                    Dialog.showInfoDialog("tag-error-dialog", TagHelper.options.tagLimitText, TagHelper.options.buttonText, null)
                } else {
                    if (d == "invalidtag") {
                        Dialog.showInfoDialog("tag-error-dialog", TagHelper.options.invalidTagText, TagHelper.options.buttonText, null)
                    } else {
                        if (d == "exists") {}
                    }
                }
            }
            if (d == "valid" || d == "") {
                if (c) {
                    TagHelper.reloadMyTagsList()
                } else {
                    TagHelper.reloadSearchBox(b, 1)
                }
                if (typeof(a.onSuccess) == "function") {
                    a.onSuccess()
                }
            }
        }
    })
};
TagHelper.reloadSearchBox = function(a, b) {
    if ($("tag-search-habblet-container")) {
        new Ajax.Updater($("tag-search-habblet-container"), "/habblet/ajax/tagsearch", {
            method: "post",
            parameters: "tag=" + a + "&pageNumber=" + b,
            evalScripts: !0
        })
    }
};
TagHelper.removeThisTagFromMe = function(a, b) {
    new Ajax.Request("/myhabbo/tag/remove", {
        parameters: "accountId=" + encodeURIComponent(TagHelper.loggedInAccountId) + "&tagId=" + encodeURIComponent(b),
        onSuccess: function(d) {
            var c = function(e) {
                $$(".tag-list li").each(function(f) {
                    if (TagHelper.findTagNameForContainer(f) == a) {
                        var h = Element.down(f, ".tag-remove-link");
                        var g = $$(".tag-add-link").first();
                        if (g) {
                            h.title = g.title || "";
                            h.removeClassName("tag-remove-link").addClassName("tag-add-link")
                        }
                    }
                })
            };
            TagHelper.reloadMyTagsList({
                onSuccess: c
            })
        }
    })
};
TagHelper.reloadMyTagsList = function(b) {
    var a = {
        evalScripts: !0
    };
    Object.extend(a, b);
    new Ajax.Updater($("my-tags-list"), "/habblet/mytagslist", a)
};
TagHelper.matchFriend = function() {
    var a = $F("tag-match-friend");
    if (a) {
        new Ajax.Updater($("tag-match-result"), habboReqPath + "/habblet/ajax/tagmatch", {
            parameters: {
                friendName: a
            },
            onComplete: function(d) {
                var c = $("tag-match-value");
                if (c) {
                    var b = parseInt(c.innerHTML, 10);
                    if (typeof TagHelper.CountEffect == "undefined") {
                        $("tag-match-value-display").innerHTML = b + " %";
                        Element.show("tag-match-slogan")
                    } else {
                        var e;
                        if (b > 0) {
                            e = 1.5
                        } else {
                            e = 0.1
                        }
                        new TagHelper.CountEffect("tag-match-value-display", {
                            duration: e,
                            transition: Effect.Transitions.sinoidal,
                            from: 0,
                            to: b,
                            afterFinish: function() {
                                Effect.Appear("tag-match-slogan", {
                                    duration: 1
                                })
                            }
                        })
                    }
                }
            }
        })
    }
};
var TagFight = Class.create();
TagFight.init = function() {
    if ($F("tag1") && $F("tag2")) {
        TagFight.start()
    } else {
        return !1
    }
};
TagFight.start = function() {
    $("fightForm").style.display = "none";
    $("tag-fight-button").style.display = "none";
    $("fightanimation").src = habboStaticFilePath + "/images/tagfight/tagfight_loop.gif";
    $("fight-process").style.display = "block";
    setTimeout("TagFight.run()", 3000)
};
TagFight.run = function() {
    new Ajax.Updater("fightResults", "/habblet/ajax/tagfight", {
        method: "post",
        parameters: "tag1=" + $F("tag1") + "&tag2=" + $F("tag2"),
        onComplete: function() {
            $("fight-process").style.display = "none";
            $("fightForm").style.display = "none";
            $("tag-fight-button-new").style.display = "block"
        }
    })
};
TagFight.newFight = function() {
    $("fight-process").style.display = "none";
    $("fightForm").style.display = "block";
    $("fightResultCount").style.display = "none";
    $("tag-fight-button").style.display = "block";
    $("tag-fight-button-new").style.display = "none";
    $("fightanimation").src = habboStaticFilePath + "/images/tagfight/tagfight_start.gif";
    $("tag1").value = "";
    $("tag2").value = ""
};
QuickMenu = Class.create();
QuickMenu.prototype = {
    initialize: function() {},
    add: function(a, b) {
        new QuickMenuItem(this, a, b)
    },
    activate: function(a) {
        var b = a.element;
        if (this.active) {
            Element.removeClassName(this.active, "selected")
        }
        if (this.active === b) {
            this.closeContainer()
        } else {
            Element.addClassName(b, "selected");
            if (this.openContainer(b)) {
                if (a.clickHandler) {
                    a.clickHandler.apply(null, [this.qtabContainer])
                }
            }
        }
    },
    openContainer: function(b) {
        var c = $("the-qtab-" + b.id);
        var d = (c == null);
        if (d) {
            c = $(Builder.node("div", {
                "class": "the-qtab",
                id: "the-qtab-" + b.id
            }));
            $("header").appendChild(c);
            var a = '<div style="margin-left: 1px; width: ' + (b.getWidth() - 2) + 'px; height: 1px; background-color: #fff"></div>';
            c.update('<div class="qtab-container-top">' + a + '</div><div class="qtab-container-bottom"><div id="qtab-container-' + b.id + '" class="qtab-container"></div></div>');
            this.qtabContainer = $("qtab-container-" + b.id);
            c.clonePosition(b, {
                setWidth: !1,
                setHeight: !1,
                offsetTop: 25
            })
        }
        $("header").select(".the-qtab").each(Element.hide);
        c.show();
        this.active = b;
        return d
    },
    closeContainer: function() {
        $("header").select(".the-qtab").each(Element.hide);
        if (this.active) {
            var a = $("the-qtab-" + this.active.id);
            Element.removeClassName(this.active, "selected")
        }
        this.active = null
    }
};
QuickMenuItem = Class.create();
QuickMenuItem.prototype = {
    initialize: function(a, c, d) {
        this.quickMenu = a;
        this.element = $(c);
        var b = this.click.bind(this);
        c.down("a").observe("click", b);
        if (d) {
            this.clickHandler = d
        }
    },
    click: function(a) {
        Event.stop(a);
        this.quickMenu.activate(this)
    }
};
HabboView.add(function() {
    if (document.habboLoggedIn && $("subnavi-user")) {
        var b = new QuickMenu();
        var a = $A([
            ["myfriends", "/quickmenu/friends_all"],
            ["mygroups", "/quickmenu/groups"],
            ["myrooms", "/quickmenu/rooms"]
        ]);
        a.each(function(c) {
            b.add($(c[0]), function(d) {
                var e = c[1];
                Element.wait(d);
                new Ajax.Updater(d, e, {
                    onComplete: function() {
                        new QuickMenuListPaging(c[0], e)
                    }
                })
            })
        });
        Event.observe(document.body, "click", function(c) {
            b.closeContainer()
        })
    }
});
var Accordion = Class.create();
Accordion.prototype = {
    initialize: function(f, e, a, c, d, b) {
        this.animating = !1;
        this.openedItem = null;
        this.accordionContainer = f;
        this.summaryContainerPrefix = e;
        this.toggleDetailsClassName = a;
        this.detailsContainerPrefix = c;
        this.openDetailsL10NKey = d;
        this.closeDetailsL10NKey = b;
        this.accordionContainer.select("." + this.toggleDetailsClassName).each(function(h) {
            var g = this.parseItem(h);
            if (g.el.visible()) {
                this.openedItem = g;
                throw $break
            }
        }.bind(this));
        Event.observe(this.accordionContainer, "click", function(i) {
            var h = Event.element(i);
            if (h && h.id && h.hasClassName(this.toggleDetailsClassName)) {
                Event.stop(i);
                var g = this.parseItem(h);
                if (g.el) {
                    this.toggleItems(g.link, g.el, g.id)
                }
            }
        }.bind(this))
    },
    parseItem: function(b) {
        var c = b.id.split("-").last();
        var a = $(this.detailsContainerPrefix + c);
        return {
            link: b,
            el: a,
            id: c
        }
    },
    toggleItems: function(d, b, e) {
        if (this.animating) {
            return !1
        }
        var a = this.openedItem;
        var c = [];
        if (!a || (a && a.id != e)) {
            $(this.summaryContainerPrefix + e).addClassName("selected");
            if (this.closeDetailsL10NKey) {
                d.innerHTML = L10N.get(this.closeDetailsL10NKey)
            }
            c.push(new Effect.BlindDown(b));
            this.openedItem = {
                link: d,
                el: b,
                id: e
            }
        }
        if (a && a.id == e) {
            this.openedItem = null
        }
        if (a) {
            $(this.summaryContainerPrefix + a.id).removeClassName("selected");
            if (this.openDetailsL10NKey) {
                a.link.innerHTML = L10N.get(this.openDetailsL10NKey)
            }
            c.push(new Effect.BlindUp(a.el))
        }
        new Effect.Parallel(c, {
            queue: {
                position: "end",
                scope: "accordionAnimation"
            },
            beforeStart: function(f) {
                this.animating = !0
            }.bind(this),
            afterFinish: function(f) {
                this.animating = !1
            }.bind(this)
        })
    }
};
var RememberMeUI = {};
RememberMeUI.init = function(e) {
    e = e || "left";
    var b = $("login-remember-me");
    if (b) {
        var d = b.positionedOffset();
        var c = {
            top: (d[1] + 20) + "px"
        };
        if (e == "right") {
            c.right = (d[0] - 190) + "px"
        } else {
            if (e == "newfrontpage") {
                var f = 15,
                    a = -14;
                if (Prototype.Browser.IE) {
                    f = 20;
                    a = -10
                }
                c.top = (d[1] + f) + "px";
                c.left = (d[0] + a) + "px"
            } else {
                c.left = (d[0] - 10) + "px"
            }
        }
        $("remember-me-notification").setStyle(c);
        Event.observe(b, "click", function(g) {
            $("remember-me-notification").setStyle({
                display: b.checked ? "block" : "none"
            })
        })
    }
};
var SearchBoxHelper = Class.create();
SearchBoxHelper.initialized = !1;
SearchBoxHelper.originalValues = [];
SearchBoxHelper.init = function() {
    if (SearchBoxHelper.initialized) {
        return
    }
    SearchBoxHelper.initialized = !0;
    SearchBoxHelper.bindEventListeners()
};
SearchBoxHelper.bindEventListeners = function() {
    var b = function(c) {
        SearchBoxHelper.onBoxFocus(c)
    };
    var a = function(c) {
        SearchBoxHelper.onBoxBlur(c)
    };
    $$(".search-box-onfocus").each(function(c) {
        Event.observe(c, "focus", b);
        Event.observe(c, "blur", a);
        SearchBoxHelper.originalValues[c] = c.value;
        Element.removeClassName(c, "search-box-onfocus")
    })
};
SearchBoxHelper.onBoxFocus = function(b) {
    var a = Event.element(b);
    if (a.value == SearchBoxHelper.originalValues[a]) {
        a.value = "";
        a.style.color = "#333333"
    } else {
        a.select()
    }
};
SearchBoxHelper.onBoxBlur = function(b) {
    var a = Event.element(b);
    if (a.value == "") {
        a.value = SearchBoxHelper.originalValues[a];
        a.style.color = "#777777"
    }
};
var NewsPromo = function() {
    var b = [];
    var c = 0;
    var e = !1;
    var a = !1;
    var d = function(f) {
        if (!e && !a) {
            a = !0;
            Effect.Fade(b[c], {
                duration: 0.8,
                from: 1,
                to: 0
            });
            c = c + f;
            if (c == b.length) {
                c = 0
            }
            if (c == -1) {
                c = b.length - 1
            }
            Effect.Appear(b[c], {
                duration: 0.8,
                from: 0,
                to: 1,
                afterFinish: function() {
                    a = !1
                }
            });
            if ($("topstories-nav")) {
                $("topstories-nav").down("span").update(c + 1)
            }
        }
    };
    return {
        init: function() {
            b = $$("#topstories .topstory");
            if (b.length < 2) {
                return
            }
            Event.observe("topstories", "mouseover", function(g) {
                e = !0;
                $$("#topstories-nav").each(Element.show)
            });
            Event.observe("topstories", "mouseout", function(g) {
                e = !1;
                $$("#topstories-nav").each(Element.hide)
            });
            if ($("topstories-nav")) {
                Event.observe($("topstories-nav").down("a.next"), "click", function(g) {
                    Event.stop(g);
                    e = !1;
                    d(1);
                    e = !0
                });
                Event.observe($("topstories-nav").down("a.prev"), "click", function(g) {
                    Event.stop(g);
                    e = !1;
                    d(-1);
                    e = !0
                })
            }
            var f = 10000;
            setInterval(function() {
                d(1)
            }, f)
        }
    }
}();
__newspromo__defined__ = !0;
var LoginFormUI = {
    init: function() {
        if ($("login-submit-button")) {
            $("login-submit-button").setStyle({
                marginLeft: "-10000px"
            });
            $("login-submit-new-button").show();
            $("login-submit-new-button").observe("click", function(a) {
                Event.stop(a);
                $("login-submit-new-button").up("form").submit()
            });
            if (!!$("subnavi-login")) {
                $$("input.login-field").invoke("observe", "focus", function() {
                    $("subnavi-login").addClassName("focused")
                });
                $$("input.login-field").invoke("observe", "blur", function() {
                    $("subnavi-login").removeClassName("focused")
                })
            }
        }
    }
};
PersonalInfo = {};
PersonalInfo.init = function(F) {
    var L = $("motto-container");
    var A = L.down("strong").getWidth();
    var I = 329;
    L.down("div").setStyle({
        width: I - A - 12 + "px"
    });
    var E = L.down("input");
    E.setStyle({
        width: I - A - 15 + "px"
    });
    var D = L.down("span");
    var B = L.down("p");
    var J = $("motto-links");
    var G = function() {
        D.hide();
        B.show();
        E.value = F;
        E.focus();
        E.select();
        J.show()
    };
    var K = function() {
        B.hide();
        D.show();
        J.hide()
    };
    var C = function() {
        K();
        if (F == E.value) {
            return
        }
        var M = D.innerHTML;
        D.update('<img src="' + habboStaticFilePath + '/images/progress_habbos.gif" width="102" height="67" alt="" class="progress"/>');
        new Ajax.Request("habblet/ajax/updatemotto", {
            parameters: {
                motto: E.value,
                _token: $F('_token')
            },
            onSuccess: function(O, N) {
                if (N && N.spamming === !0) {
                    alert(L10N.get("personal_info.motto_editor.spamming"));
                    E.value = F;
                    D.update(M);
                    return
                }
                if (N) {
                    F = N.motto
                }
                D.update(O.responseText);
                if (N && N.specialAvatar) {
                    document.location.replace(document.location.href)
                }
            }
        })
    };
    Event.observe(D, "click", G);
    Event.observe(E, "keypress", function(M) {
        if (M.keyCode == Event.KEY_RETURN) {
            C()
        } else {
            if (M.keyCode == Event.KEY_ESC) {
                K()
            }
        }
    });
    Event.observe($("motto-cancel"), "click", function(M) {
        Event.stop(M);
        K()
    });
    if ($("show-all-friends")) {
        Event.observe("show-all-friends", "click", function(M) {
            Event.stop(M);
            el = Event.element(M);
            el.replace('<img src="' + habboStaticFilePath + '/images/progress_habbos.gif" width="102" height="67" alt=""/>');
            new Ajax.Request("/habblet/ajax/allfriends", {
                onSuccess: function(N) {
                    $("feed-friends").down("span").update(N.responseText)
                }
            })
        })
    }
    Event.observe("feed-items", "click", Event.delegate({
        "li.contributed .remove-feed-item": function(O) {
            Event.stop(O);
            var M = this.up();
            var N = M.up().select("li.contributed").indexOf(M);
            M.remove();
            new Ajax.Request("habblet/ajax_removeFeedItem.php", {
                parameters: {
                    feedItemIndex: N
                }
            })
        }
    }));
    if (!!$("feed-item-hc-reminder")) {
        var H = function() {
            var M = $("feed-item-hc-reminder");
            M.remove();
            new Ajax.Request("habblet/ajax_habboclub_reminder_remove.php")
        };
        habboclub._updateMembershipCallback = H;
        $("remove-hc-reminder").observe("click", function(M) {
            Event.stop(M);
            H()
        });
        $$("#hc-reminder-buttons a.new-button").invoke("observe", "click", function(N) {
            Event.stop(N);
            var M = Event.findElement(N, "a");
            if (M && M.id) {
                habboclub.buttonClick(M.id.split("-").last(), L10N.get("subscription.title"))
            }
        })
    }
};
var GroupUtils = {
    validateGroupElements: function(c, a, e) {
        var d = $(c);
        if (d.value.length >= a) {
            d.value = d.value.substring(0, a);
            $(c + "_message_error").innerHTML = e;
            $(c + "_message_error").style.display = "block"
        } else {
            $(c + "_message_error").innerHTML = "";
            $(c + "_message_error").style.display = "none"
        }
        if ($(c + "-counter")) {
            var b = a - d.value.length;
            $(c + "-counter").value = b
        }
    }
};
var GroupPurchase = function() {
    var a = null;
    var c = null;
    var b = function(d) {
        Dialog.setAsWaitDialog(a);
        new Ajax.Request(habboReqPath + "/grouppurchase/" + d, {
            parameters: c,
            onComplete: function(f, e) {
                Dialog.setDialogBody(a, f.responseText)
            }
        })
    };
    return {
        open: function() {
            a = Dialog.createDialog("group_purchase_form", L10N.get("purchase.group.title"), 9001, 0, -1000, GroupPurchase.close);
            Dialog.setAsWaitDialog(a);
            Dialog.moveDialogToCenter(a);
            Dialog.makeDialogDraggable(a);
            Overlay.show();
            new Ajax.Request(habboReqPath + "/grouppurchase/group_create_form", {
				parameters: {
					_token: $F('_token')
				},
                onComplete: function(e, d) {
                    Dialog.setDialogBody(a, e.responseText)
                }
            })
        },
        close: function(d) {
            if (!!d) {
                Event.stop(d)
            }
            $("group_purchase_form").remove();
            Overlay.hide();
            a = null;
            c = null
        },
        confirm: function() {
            c = {
                name: $F("group_name"),
                description: $F("group_description")
            };
            b("purchase_confirmation")
        },
        purchase: function() {
            b("purchase_ajax");
            if ($("the-qtab-mygroups")) {
                setTimeout(function() {
                    $("the-qtab-mygroups").remove()
                }, 300)
            }
        }
    }
}();
var LinkTool = Class.create();
LinkTool.prototype = {
    initialize: function(a, b) {
        this.elements = Object.extend({
            button: $("linktool-find"),
            input: $("linktool-query"),
            results: $("linktool-results"),
            scopeButtons: $$(".linktool-scope")
        }, b || {});
        this.textarea = a;
        this.elements.results.hide();
        Event.observe(this.elements.button, "click", this.search.bind(this));
        Event.observe(this.elements.input, Prototype.Browser.IE ? "keydown" : "keypress", function(c) {
            if (c.keyCode == Event.KEY_RETURN) {
                this.search(c)
            }
        }.bind(this));
        Event.observe(this.elements.results, "click", function(d) {
            var c = d.findElement("a");
            if (c && c.hasClassName("linktool-result")) {
                d.stop();
                this.addLink(c.readAttribute("type"), c.readAttribute("value"), c.readAttribute("title"))
            }
        }.bind(this));
        this.elements.scopeButtons.invoke("observe", "click", function(c) {
            if (!!$F(this.elements.input) && this.elements.results.visible()) {
                this.search()
            }
        }.bind(this))
    },
    addLink: function(a, b, c) {
        if (!this.textarea.getSelection() || this.textarea.getSelection() == "") {
            this.textarea.replaceSelection("[" + a + "=" + b + "]" + c + "[/" + a + "]")
        } else {
            this.textarea.wrapSelection("[" + a + "=" + b + "]", "[/" + a + "]")
        }
        this.elements.results.hide()
    },
    search: function(c) {
        if (!!c) {
            Event.stop(c)
        }
        this.elements.results.setStyle({
            display: "block"
        });
        var b = $F(this.elements.input);
        if (!!b) {
            this.elements.input.removeClassName("error");
            this.elements.results.wait();
            var a = 1;
            this.elements.scopeButtons.each(function(d) {
                if (d.checked) {
                    a = d.value
                }
            });
            new Ajax.Updater(this.elements.results, habboReqPath + "/myhabbo/linktool/search", {
                method: "get",
                parameters: {
                    query: b,
                    scope: a
                }
            })
        } else {
            this.elements.input.addClassName("error")
        }
    }
}