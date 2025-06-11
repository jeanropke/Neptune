var WebInventory = {
    selectedItem: null,
    previewItem: null,
    selectedCategory: null,
    loaded: false,
    initialise: function () {
        Event.observe('stickers-button', 'click', function (e) { WebInventory.open(e, 'stickers') }, false);
        Event.observe('widgets-button', 'click', function (e) { WebInventory.open(e, 'widgets') }, false);
        Event.observe('backgrounds-button', 'click', function (e) { WebInventory.open(e, 'backgrounds') }, false);
    },
    close: function (e) {
        if (e) {
            Event.stop(e);
        }
        Element.remove("stickers_dialog");
        hideOverlay();
    },
    open: function (e, type) {
        Event.stop(e);
        showOverlay();
        WebInventory.selectedCategory = type;
        WebInventory._createInventoryDialog("dialog.title." + WebInventory.selectedCategory);
        WebInventory._loadInventory();
    },
    _createInventoryDialog: function (title) {
        WebInventory.dialog = createDialog("stickers_dialog", title, "9003", -1500, 0, WebInventory.close);
        makeDialogDraggable(WebInventory.dialog);
        setAsWaitDialog(WebInventory.dialog);
        moveDialogToCenter(WebInventory.dialog);
    },
    _loadInventory: function () {
        new Ajax.Request(habboReqPath + "/myhabbo/inventory/" + WebInventory.selectedCategory, {
            method: "post", onComplete: function (req, json) {
                setDialogBody(WebInventory.dialog, req.responseText);
                req.responseText.evalScripts();

                if ($("inventory-close")) { Event.observe($("inventory-close"), "click", WebInventory.close); }
                if ($("purchase-stickers")) { Event.observe($("purchase-stickers"), "click", WebStore.open) }

                var el = $A($("inventory-item-list").getElementsByTagName("li")).first();
                if (el) {
                    WebInventory._selectItem(el);
                    var temp = el.id.split("-");
                    WebInventory._loadPreview(temp.last(), WebInventory.selectedCategory, temp[2] == "p");
                }

                WebInventory._setEventHandlers();
                WebInventory.loaded = true;
            }
        });
    },
    _selectItem: function (el) {
        try {
            if (!Element.hasClassName(el, "selected")) {
                Element.removeClassName(WebInventory.selectedItem, "selected");
                Element.addClassName(el, "selected");
                WebInventory.selectedItem = el;
            }
        } catch (ex) { }
    },
    _setEventHandlers: function () {
        if ($("inventory-items")) {
            $("inventory-items").onclick = WebInventory._handleItemClick.bindAsEventListener(this);
        }

        if ($("inventory-preview")) {
            $("inventory-preview").onclick = WebInventory._handlePreviewClick.bindAsEventListener(this);
        }
    },
    _handleItemClick: function (e) {
        Event.stop(e);
        var el = Event.findElement(e, "li");
        if (el && el.id && el != WebInventory.selectedItem && (!el.className || !Element.hasClassName(el, "webstore-widget-disabled"))) {
            WebInventory._selectItem(el);
            var temp = el.id.split("-");
            WebInventory._loadPreview(temp.last(), WebInventory.selectedCategory, temp[2] == "p");
        }
    },
    _loadPreview: function (itemId, type, privileged) {
        WebInventory._clearPreview();
        $("inventory-preview").innerHTML = getProgressNode();
        var qs = { itemId: itemId, type: type };
        if (type == "widgets") {
            qs.privileged = privileged;
        }
        new Ajax.Request(
            habboReqPath + "/myhabbo/inventory/preview", {
            method: "post", parameters: qs,
            onComplete: function (req, json) {
                if (WebInventory._checkResponse(req.responseText)) {
                    WebInventory.previewItem = json;
                    WebInventory._showPreview(req.responseText);
                }

                // make sure webstore is hidden
                WebInventory.hideWebStoreDivs();
            }
        }
        );
    },
    _showPreview: function (previewHtml) {
        var previewDiv = $("inventory-preview");
        if (previewHtml) { previewDiv.innerHTML = previewHtml };

        if (WebInventory.previewItem && WebInventory.previewItem.length > 0) {
            var preview = $("inventory-preview-box").appendChild(Builder.node("div", { id: "inventory-preview-pre" }));
            if (WebInventory.previewItem[5] && WebInventory.previewItem[5] > 1) {
                preview.appendChild(Builder.node("div", { id: "inventory-preview-count", className: "webstore-item-count" }));
            }

            WebInventory._setPreviewItem();
        }

        previewDiv.show();
    },

    _clearPreview: function () {
        WebInventory.previewItem = null;
        var previewBox = $("inventory-preview");
        if (previewBox) {
            previewBox.innerHTML = "";
        }
    },

    _setPreviewItem: function () {
        var pre = $("inventory-preview-pre");
        pre.className = WebInventory.previewItem[0];
        pre.title = WebInventory.previewItem[2];
        if (WebInventory.previewItem[3] == "DynamicSticker") {
            pre.style.backgroundImage = "url(" + habboImagerUrl + WebInventory.previewItem[4] + ")";
        }
        if ($("inventory-preview-count")) {
            $("inventory-preview-count").innerHTML = "<div>x" + WebInventory.previewItem[5] + "</div>";
        }
    },

    _handlePreviewClick: function (e) {
        Event.stop(e);
        var el = Event.findElement(e, "a");
        if (el && el.id) {
            if (el.id == "inventory-place") {
                WebInventory._place();
            } else if (el.id == "inventory-place-all") {
                WebInventory._placeAll();
            }
        }
    },
    _place: function () {
        if (WebInventory.selectedCategory == "stickers") {
            doPlaceImageOnPage(WebInventory.selectedItem.id.split("-").last());
            WebInventory._closeAfterPlace();
        } else if (WebInventory.selectedCategory == "backgrounds") {
            WeboriginalBg = WebInventory.previewItem[1];
            doChangeBg(WebInventory.previewItem[1], WebInventory.selectedItem.id.split("-").last());
            WebInventory._closeAfterPlace();
        } else if (WebInventory.selectedCategory == "widgets") {
            var temp = WebInventory.selectedItem.id.split("-");
            doPlaceWidget(temp[3], temp[2] == "p");
            WebInventory._closeAfterPlace();
        }
    },
    _closeAfterPlace: function () {
        WebInventory.close();
        WebInventory._clearPreview();
    },
    _checkResponse: function (responseText) {
        if (responseText.strip() == "REFRESH") {
            window.location.replace(window.location.href);
            return false;
        }
        return true;
    }
}

var WebStore = {
    loadingCategory: false,
    selectedSubcategory: null,
    selectedItem: null,
    previewItems: null,
    previewItemPointer: 0,
    loaded: false,
    open: function (e) {
        //$('stickers_dialog').style.width = '507px';
        e.preventDefault();
        WebStore._loadPage();
    },
    _loadPage: function () {
        new Ajax.Request(habboReqPath + "/myhabbo/store/main/" + WebInventory.selectedCategory, {
            method: "post", onComplete: function (req, json) {
                setDialogBody(WebInventory.dialog, req.responseText);
                req.responseText.evalScripts();

                if ($("inventory-close")) { Event.observe($("webstore-close"), "click", WebStore.close); }
                if ($("load-inventory")) { Event.observe($("load-inventory"), "click", WebInventory._loadInventory) }

                //var el = $A($("inventory-item-list").getElementsByTagName("li")).first();
                //if (el) {
                //    WebInventory._selectItem(el);
                //    var temp = el.id.split("-");
                //    WebInventory._loadPreview(temp.last(), WebInventory.selectedCategory, temp[2] == "p");
                //}

                WebStore._setEventHandler();
                WebStore.loaded = true;
            }
        });
    },
    close: function (e) {
        Event.stop(e);
        hideOverlay();
        Element.remove("stickers_dialog");
    },

    _setEventHandler: function () {
        $("webstore-categories").onclick = WebStore._handleCategoryClick.bindAsEventListener(this);
    },

    _handleCategoryClick: function (e) {
        Event.stop(e);
        console.log(e);
        if (!WebStore.loadingCategory) {
            var el = Event.findElement(e, "li");
            if (el && el.id) {
                if (el.id.indexOf("subcategory-") == 0) {
                    var temp = el.id.split("-");
                    WebStore.changeSubcategory(temp[1], el);
                    WebStore._setContentClassName(temp[2]);
                }
            }
        }
    },
    changeSubcategory: function (subcategoryId, subcategoryEl) {
        WebStore._unselectSelectedSubcategory();
        WebStore.selectedSubcategory = subcategoryEl;
        subcategoryEl.className = "subcategory-selected";

        WebStore.openSubCategory(subcategoryId);
    },
    _unselectSelectedSubcategory: function () {
        if (WebStore.selectedSubcategory) {
            WebStore.selectedSubcategory.className = "";
        }
    },
    openSubCategory: function (subCategoryId, force, productId) {
        if ((!WebStore.loadingCategory && subCategoryId != WebStore.selectedSubCategory) || force) {
            WebStore.loadingCategory = true;
            WebStore._resetState();
            $("webstore-items").innerHTML = getProgressNode();
            WebStore._loadSubCategory(subCategoryId, productId);
        }
    },
    _resetState: function () {
        WebStore.selectedItem = null;
        WebStore.selectedSubCategory = null;
        WebStore._showDefaultPreview();
    },
    _showDefaultPreview: function () {
        WebStore._clearPreview();
        var previewDiv = $("webstore-preview");
        previewDiv.hide();
        $("webstore-preview-default").show();
        previewDiv.innerHTML = "";
    },
    _clearPreview: function () {
        WebStore.previewItems = null;
        WebStore.previewItemPointer = 0;
        var previewBox = $("webstore-preview-box");
        if (previewBox) {
            previewBox.innerHTML = "";
        }
    },
    _loadSubCategory: function (subCategoryId, productId) {
        var query = {};
        if (!!subCategoryId) {
            query.subCategoryId = subCategoryId;
        }
        new Ajax.Request(
            habboReqPath + "/myhabbo/store/items", {
            method: "post", parameters: query,
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    $("webstore-content-container").innerHTML = req.responseText;
                    WebStore.selectedSubCategory = subCategoryId;
                    WebStore.loadingCategory = false;

                    var itemSelected = false;
                    var productEls = $A($("webstore-item-list").getElementsByTagName("li"));
                    if (productId) {
                        productEls.each(function (el) {
                            if (el.id) {
                                var id = el.id.substring(el.id.lastIndexOf("-") + 1);
                                if (id == productId) {
                                    WebStore._selectItem(el);
                                    WebStore._loadPreview(id);
                                    itemSelected = true;
                                    throw $break;
                                }
                            }
                        });
                    }

                    if (!itemSelected) {
                        var el = productEls.first();
                        if (el && el.id) {
                            WebStore._selectItem(el);
                            WebStore._loadPreview(el.id.substring(el.id.lastIndexOf("-") + 1));
                        }
                    }
                }
            }
        }
        );
    },
    _setContentClassName: function (className) {
        $("webstore-content-container").className = className;
    },
    _checkResponse: function (responseText) {
        if (responseText.strip() == "REFRESH") {
            window.location.replace(window.location.href);
            return false;
        }
        return true;
    }
}
