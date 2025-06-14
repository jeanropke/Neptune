var WebStore = {

    created: false,
    dialog: null,
    itemsDiv: null,
    tabList: null,
    selectedItem: null,
    selectedCategory: null,
    selectedCategoryId: null,
    selectedTab: null,
    loadingCategory: false,
    previewItemPointer: 0,
    previewItems: null,
    originalBg: null,
    storeOpened: false,
    backgroundPreviewWarning: false,
    localization: null,
    selectedType: null,

    open: function (type) {
        if (!WebStore.created) {
            WebStore._create();
        }

        if (WebStore.selectedType != type) {
            WebStore.Inventory.inventoryOpened = false;
            WebStore.storeOpened = false;
        }

        WebStore._loadMainContent(type);

        WebStore.originalBg = $("mypage-bg").className;
        WebStore.dialog.show();
        showOverlay();
        moveDialogToCenter(WebStore.dialog);
    },

    close: function () {
        WebStore.dialog.style.left = "-1500px";
        WebStore.dialog.hide();
        hideOverlay();

        WebStore.Inventory.newItems = [];
        WebStore.Inventory.updateNewItemCount(0);

        $("mypage-bg").className = WebStore.originalBg;

        WebStore.loadingCategory = false;
        WebStore.Inventory.loadingCategory = false;
    },

    openCategory: function (categoryId, force, productId) {
        if ((!WebStore.loadingCategory && categoryId != WebStore.selectedCategoryId) || force) {
            WebStore.loadingCategory = true;
            WebStore._resetState();
            $("webstore-items").innerHTML = getProgressNode();
            WebStore._loadCategory(categoryId, productId);
        }
    },

    closeConfirmation: function (e) {
        if (e) {
            Event.stop(e);
        }
        if ($("webstore-confirm")) {
            Element.remove($("webstore-confirm"));
            moveOverlay("9000");
        }
    },
    _create: function () {
        this.dialog = createDialog("purchase-main-dialog", false, false, -1500, 0, function (e) {
            if (e) { Event.stop(e); }
            WebStore.close();
        });
        makeDialogDraggable(this.dialog)
    },

    _loadMainContent: function (type, tab = 'inventory') {
        WebStore.selectedType = type;
        if (tab == 'inventory') {
            if (WebStore.Inventory.inventoryOpened) {
                if ($("inventory-content")) {
                    $("inventory-content").style.display = "block";
                }
                if ($("webstore-content")) {
                    $("webstore-content").style.display = "none";
                }
                WebStore.Inventory.reloadIfNeeded();
                WebStore.Inventory.newItems = [];
                WebStore.Inventory.updateNewItemCount();

            } else {
                WebStore.Inventory.load(type);
            }
        } else {
            if (WebStore.storeOpened) {
                if ($("inventory-content")) {
                    $("inventory-content").style.display = "none";
                }
                if ($("webstore-content")) {
                    $("webstore-content").style.display = "block";
                }
                WebStore.Inventory.reloadIfNeeded();

            } else {
                new Ajax.Request(
                    habboReqPath + "/myhabbo/store/main", {
                    method: "post",
                    parameters: { type: type },
                    onComplete: function (req, json) {
                        if (WebStore._checkResponse(req.responseText)) {
                            //setDialogBody(WebStore.dialog, req.responseText);
                            $("webstore-content").innerHTML = req.responseText;
                            WebStore.created = true;
                            WebStore.storeOpened = true;

                            if (json[0]) {
                                WebStore.previewItems = json;
                                WebStore._showPreview();

                                var el = $A($("webstore-item-list").getElementsByTagName("li")).first();
                                if (el) { WebStore._selectItem(el); }
                            }

                            $("inventory-content").style.display = "none";
                            $("webstore-content").style.display = "block";

                            var firstEl = $A($("webstore-categories").getElementsByTagName("li")).first();
                            WebStore.selectedCategory = firstEl;
                            WebStore.selectedCategoryId = firstEl.id.split('-')[1];
                            WebStore.selectedCategory.className = "subcategory-selected";
                            WebStore._setEventHandlers();
                        }

                    }
                }
                );
            }
        }
    },

    _setEventHandlers: function () {
        if ($("webstore-items")) {
            $("webstore-items").onclick = WebStore._handleItemClick.bindAsEventListener(this);
        }

        if ($("webstore-preview")) {
            $("webstore-preview").onclick = WebStore._handlePreviewClick.bindAsEventListener(this);
        }

        if ($("webstore-close")) {
            $("webstore-close").onclick = function (e) { Event.stop(e); WebStore.close(); }.bindAsEventListener(this);
        }

        if ($("webstore-categories")) {
            $("webstore-categories").onclick = WebStore._handleCategoryClick.bindAsEventListener(this);
        }

        WebStore.Inventory._setEventHandlers();
    },

    _handleItemClick: function (e) {
        var el = Event.findElement(e, "li");
        if (el && el.id && el != WebStore.selectedItem) {
            WebStore._selectItem(el);
            WebStore._loadPreview(el.id.substring(el.id.lastIndexOf("-") + 1));
        }
        Event.stop(e);
    },

    _selectItem: function (el) {
        try {
            if (!Element.hasClassName(el, "selected")) {
                Element.removeClassName(WebStore.selectedItem, "selected");
                Element.addClassName(el, "selected");
                WebStore.selectedItem = el;
            }
        } catch (ex) { }
    },

    _handlePreviewClick: function (e) {
        var el = Event.findElement(e, "a");
        if (el && el.id) {
            try {
                if (el.id == "webstore-purchase-disabled") {
                    Event.stop(e);
                } else if (el.id == "webstore-purchase") {
                    Event.stop(e);
                    WebStore._purchaseConfirm(WebStore.selectedItem.id.split("-").last());
                } else if (el.id == "webstore-add") {
                    Event.stop(e);
                } else if (el.id == "webstore-preview-bg") {
                    Event.stop(e);

                    if (!WebStore.backgroundPreviewWarning) {
                        var warning = createDialog("webstore-warning", "", 9003);
                        setAsWaitDialog(warning);
                        moveOverlay(9002);
                        moveDialogToCenter(warning);
                        makeDialogDraggable(warning);
                        new Ajax.Request(habboReqPath + "/myhabbo/store/background_warning", {
                            method: "post",
                            onComplete: function (req) {
                                if (WebStore._checkResponse(req.responseText)) {
                                    setDialogBody(warning, req.responseText);
                                    WebStore.backgroundPreviewWarning = true;

                                    Event.observe($("webstore-warning-ok"), "click", function (e) {
                                        Event.stop(e);
                                        Element.remove(warning);
                                        moveOverlay(9000);
                                        WebStore._previewBg();
                                    });
                                }
                            }
                        }
                        );
                    } else {
                        WebStore._previewBg();
                    }
                }
            } catch (ex) { }
        }
    },

    _previewBg: function () {
        var overlay = $("overlay");
        overlay.style.backgroundColor = "transparent";
        $("mypage-bg").className = WebStore.previewItems[WebStore.previewItemPointer].bgCssClass;
        window.setTimeout(function () {
            if (WebStore.dialog.style.left != "-1500px") {
                overlay.style.backgroundColor = "black";
            }
        }, 2500);
    },

    _handleCategoryClick: function (e) {
        Event.stop(e);
        if (!WebStore.loadingCategory) {
            var el = Event.findElement(e, "li");
            if (el && el.id) {
                if (el.id.indexOf("category-") == 0) {
                    var temp = el.id.split("-");
                    WebStore.changeCategory(temp[1], el);
                    WebStore._setContentClassName(temp[2]);
                }
            }
        }
    },
    changeCategory: function (categoryId, categoryEl) {
        WebStore._unselectSelectedCategory();
        WebStore.selectedCategory = categoryEl;
        categoryEl.className = "subcategory-selected";
        WebStore.openCategory(categoryId);
    },

    _loadCategory: function (categoryId, productId) {
        var query = { categoryId: categoryId };
        WebStore.selectedCategoryId = categoryId;
        new Ajax.Request(
            habboReqPath + "/myhabbo/store/items", {
            method: "post", parameters: query,
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    $("webstore-content-container").innerHTML = req.responseText;
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
                    WebStore._setEventHandlers();

                    // make sure inventory is hidden
                    WebStore.Inventory.hideInventoryDivs();
                }
            }
        }
        );
    },

    _resetState: function () {
        WebStore.selectedItem = null;
        WebStore._showDefaultPreview();

    },

    _loadPreview: function (productId) {
        WebStore._clearPreview();
        $("webstore-preview").innerHTML = getProgressNode();
        WebStore._showPreview();
        new Ajax.Request(
            habboReqPath + "/myhabbo/store/preview", {
            method: "post", parameters: { "productId": productId, "categoryId": WebStore.selectedCategory },
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    WebStore.previewItems = json;
                    WebStore._showPreview(req.responseText);

                    // make sure inventory is hidden
                    WebStore.Inventory.hideInventoryDivs();
                }
            }
        }
        );
    },

    _showPreview: function (previewHtml) {
        var previewDiv = $("webstore-preview");
        if (previewHtml) { previewDiv.innerHTML = previewHtml };

        if (WebStore.previewItems) {
            var preview = $("webstore-preview-box").appendChild(Builder.node("div", { id: "webstore-preview-pre" }));

            if (WebStore.previewItems.length == 1 && WebStore.previewItems[0].itemCount > 1) {
                preview.appendChild(Builder.node("div", { id: "webstore-preview-count", className: "webstore-item-count" }));
            } else if (WebStore.previewItems.length > 1) {
                preview.appendChild(Builder.node("div", { id: "webstore-preview-count", className: "webstore-item-count" }));
                preview.appendChild(Builder.node("div", { id: "webstore-preview-page" }));
                Event.observe(preview.appendChild(Builder.node("div", { id: "webstore-preview-next" })), "click", function (e) { WebStore._nextPreviewItem(); });
                Event.observe(preview.appendChild(Builder.node("div", { id: "webstore-preview-prev" })), "click", function (e) { WebStore._previousPreviewItem(); });
            }

            WebStore._setPreviewItem();
        }

        previewDiv.show();
    },

    _showDefaultPreview: function () {
        WebStore._clearPreview();
        var previewDiv = $("webstore-preview");
        previewDiv.hide();
        $("webstore-preview-default").show();
        previewDiv.innerHTML = "";
    },

    _setContentClassName: function (className) {
        $("webstore-content-container").className = className;
    },

    _nextPreviewItem: function () {
        WebStore.previewItemPointer++;
        if (WebStore.previewItemPointer >= WebStore.previewItems.length) {
            WebStore.previewItemPointer = 0;
        }
        WebStore._setPreviewItem();
    },

    _previousPreviewItem: function () {
        WebStore.previewItemPointer--;
        if (WebStore.previewItemPointer < 0) {
            WebStore.previewItemPointer = WebStore.previewItems.length - 1;
        }
        WebStore._setPreviewItem();
    },

    _setPreviewItem: function () {
        var currItem = WebStore.previewItems[WebStore.previewItemPointer];
        var pre = $("webstore-preview-pre");
        pre.className = currItem.previewCssClass;
        pre.title = currItem.titleKey;
        if ($("webstore-preview-count")) {
            $("webstore-preview-count").innerHTML = "<div>x" + currItem.itemCount + "</div>";
        }
        if ($("webstore-preview-page")) {
            $("webstore-preview-page").innerHTML = (WebStore.previewItemPointer + 1) + "/" + WebStore.previewItems.length;
        }

        if (currItem.imageUrl && currItem.imageUrl != "") {
            pre.appendChild(Builder.node("div", { "class": "preview-image", "style": "background-image: url(" + habboImagerUrl + currItem.imageUrl + ")" }));
        }
        if (currItem.bgCssClass && currItem.bgCssClass != "") {
            if (!$("webstore-preview-bgpreview")) {
                pre.appendChild(Builder.node("div", { id: "webstore-preview-bgpreview" }, [
                    Builder.node("a", { href: "#", className: "toolbutton", id: "webstore-preview-bg" }, [
                        Builder.node("span", { id: "webstore-preview-bg-" + currItem.bgCssClass }, $("webstore-preview-bg-text").innerHTML)
                    ])
                ]));
            }
        } else if ($("webstore-preview-bgpreview")) {
            Element.remove($("webstore-preview-bgpreview"));
        }
    },

    _clearPreview: function () {
        WebStore.previewItems = null;
        WebStore.previewItemPointer = 0;
        var previewBox = $("webstore-preview-box");
        if (previewBox) {
            previewBox.innerHTML = "";
        }
    },

    _purchaseConfirm: function (productId) {
        moveOverlay("9002");
        var dialog = createDialog("webstore-confirm", "", "9003", -1500, 0, WebStore.closeConfirmation);
        makeDialogDraggable(dialog);
        setAsWaitDialog(dialog);
        moveDialogToCenter(dialog);

        new Ajax.Request(habboReqPath + "/myhabbo/store/purchase_confirm", {
            method: "post", parameters: { "productId": productId, "categoryId": WebStore.selectedCategory },
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    setDialogBody(dialog, req.responseText);
                    if ($("webstore-confirm-submit")) {
                        Event.observe($("webstore-confirm-submit"), "click", function (e) {
                            Event.stop(e);
                            WebStore._purchase(WebStore.selectedItem.id.split("-").last(), dialog);
                        });
                    }
                    Event.observe($("webstore-confirm-cancel"), "click", WebStore.closeConfirmation);
                }
            }
        });
    },

    _purchase: function (productId, dialog) {
        setAsWaitDialog(dialog);
        var type = WebStore.selectedType;
        new Ajax.Request(habboReqPath + "/myhabbo/store/purchase_" + type, {
            method: "post", parameters: { task: "purchase", selectedId: productId }, onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    if (req.responseText.strip() != "OK") {
                        setDialogBody(dialog, req.responseText);
                        Event.observe($("webstore-confirm-cancel"), "click", WebStore.closeConfirmation);
                    } else {
                        WebStore.Inventory.newItems.push(json);
                        WebStore.Inventory.updateNewItemCount();
                        moveOverlay("9000");
                        Element.remove(dialog);

                        // refresh both webstore and inventory (if needed)
                        WebStore.openCategory(WebStore.selectedCategoryId, true, productId);
                        if (WebStore.Inventory.inventoryOpened) {
                            WebStore.Inventory.selectCategory(WebStore.selectedType);
                            WebStore.Inventory._clearPreview();
                            WebStore.Inventory.waitingForReload = true;
                            WebStore.Inventory.lastId = json;
                        }
                    }
                }
            }
        });
    },

    _getCategoryOpener: function (mainCategoryType) {
        if (mainCategoryType == "avatar") {
            return function (subcategoryId, mainCategoryId, subcategoryEl) {
                if (!WebStore.loadingCategory) {
                    WebStore.loadingCategory = true;
                    WebStore._resetState();
                    $("webstore-items").innerHTML = getProgressNode();
                    WebStore.StickerEditor.open();
                }
            };
        } else {
            return function (subcategoryId, mainCategoryId, subcategoryEl) {
                if (!WebStore.loadingCategory) {
                    $("webstore-items").innerHTML = getProgressNode();
                    WebStore._resetState();
                    WebStore.MenuBar.changeSubcategory(subcategoryId, mainCategoryId, subcategoryEl);
                    WebStore.loadingCategory = true;
                }
            };
        }
    },

    _setDialogSize: function (mainCategoryType, afterFinishCallback) {
        if (mainCategoryType == "avatar") {
            new Effect.Transform([
                { "#purchase-main-dialog-body": "height: 399px" },
                { "#webstore-items": "height: 381px" },
                { "#webstore-categories": "height: 381px" }
            ], { afterFinish: afterFinishCallback || Prototype.emptyFunction }).play();
            $("webstore-close-container").style.display = "none";
        } else {
            new Effect.Transform([
                { "#purchase-main-dialog-body": "height: 324px" },
                { "#webstore-items": "height: 306px" },
                { "#webstore-categories": "height: 306px" }
            ], { afterFinish: afterFinishCallback || Prototype.emptyFunction }).play();
            $("webstore-close-container").style.display = "block";
        }
    },


    _unselectSelectedCategory: function () {
        if (WebStore.selectedCategory) {
            WebStore.selectedCategory.className = "";
        }
    },

    _checkResponse: function (responseText) {
        if (responseText.strip() == "REFRESH") {
            WebStore.NoteEditor.close();
            WebStore.close();
            Overlay.show();
            window.location.replace(window.location.href);
            return false;
        }
        return true;
    }

};

WebStore.Inventory = {

    newItems: [],
    inventoryOpened: false,
    selectedItem: null,
    selectedCategory: null,
    loadingCategory: false,
    previewItem: null,
    waitingForReload: false,
    lastId: 0,

    updateNewItemCount: function () {
        var newDiv = $("webstore-inventory-new");
        if (newDiv) {
            var itemCount = WebStore.Inventory.newItems.length;
            if (itemCount > 0) {
                newDiv.innerHTML = " (" + itemCount + ")";
                newDiv.className = "new";
                newDiv.style.display = "block";
            } else {
                newDiv.innerHTML = "";
                newDiv.className = "";
                newDiv.style.display = "none";
            }
        }
    },

    load: function (type) {
        setDialogBody(WebStore.dialog, getProgressNode());
        new Ajax.Request(
            habboReqPath + "/myhabbo/inventory", {
            method: "post", parameters: { type: type },
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    setDialogBody(WebStore.dialog, req.responseText);
                    WebStore.created = true;
                    WebStore.Inventory.inventoryOpened = true;
                    WebStore.Inventory.previewItem = json;
                    WebStore.Inventory._showPreview();
                    var el = $A($("inventory-item-list").getElementsByTagName("li")).first();
                    if (el) { WebStore.Inventory._selectItem(el); }
                    WebStore._setEventHandlers();
                }
            }
        }
        );
    },

    loadCategory: function (type) {
        if (!WebStore.Inventory.loadingCategory) {
            $("inventory-items").innerHTML = getProgressNode();
            WebStore.Inventory._clearPreview();
            WebStore.Inventory.loadingCategory = true;
            new Ajax.Request(
                habboReqPath + "/myhabbo/inventory/items", {
                method: "post", parameters: { type: type },
                onComplete: function (req, json) {
                    if (WebStore._checkResponse(req.responseText)) {
                        $("inventory-items").innerHTML = req.responseText;
                        WebStore.Inventory.selectedCategory = type;
                        WebStore.Inventory.loadingCategory = false;

                        var items = $A($("inventory-item-list").getElementsByTagName("li"));
                        var done = false;

                        if (items && items.length > 0) {
                            // check if the last purchased item is found and select that
                            if (WebStore.Inventory.lastId != 0) {
                                items.each(function (el) {
                                    if (el && el.id && (!el.className || !Element.hasClassName(el, "webstore-widget-disabled"))) {
                                        var temp = el.id.split("-");
                                        if (temp.last() == WebStore.Inventory.lastId) {
                                            WebStore.Inventory._selectItem(el);
                                            WebStore.Inventory._loadPreview(temp.last(), type, temp[2] == "p");
                                            done = true;
                                            WebStore.Inventory.lastId = 0;
                                            throw $break;
                                        }
                                    }
                                });
                            }

                            // otherwise select the first available item
                            if (!done) {
                                items.each(function (el) {
                                    if (el && el.id && (!el.className || !Element.hasClassName(el, "webstore-widget-disabled"))) {
                                        WebStore.Inventory._selectItem(el);
                                        var temp = el.id.split("-");
                                        WebStore.Inventory._loadPreview(temp.last(), type, temp[2] == "p");
                                        done = true;
                                        throw $break;
                                    }
                                });
                            }
                        }

                        if (!done) {
                            WebStore.Inventory._showDefaultPreview();
                        }

                        // make sure webstore is hidden
                        WebStore.hideWebStoreDivs();
                    }
                }
            }
            );
        }
    },

    reloadIfNeeded: function () {
        if (WebStore.Inventory.waitingForReload && WebStore.selectedType) {
            WebStore.Inventory.loadCategory(WebStore.selectedType);
            WebStore.Inventory.waitingForReload = false;
        }
    },

    _setEventHandlers: function () {
        if ($("inventory-items")) {
            $("inventory-items").onclick = WebStore.Inventory._handleItemClick.bindAsEventListener(this);
        }

        if ($("inventory-preview")) {
            $("inventory-preview").onclick = WebStore.Inventory._handlePreviewClick.bindAsEventListener(this);
        }

        if ($("purchase-stickers")) {
            $("purchase-stickers").onclick = WebStore.Inventory._openStoreClick.bindAsEventListener(this);
        }

        if ($("inventory-close")) {
            $("inventory-close").onclick = WebStore.Inventory._closeInventoryClick.bindAsEventListener(this);
        }

        if ($("load-inventory")) {
            $("load-inventory").onclick = WebStore.Inventory._loadInventoryClick.bindAsEventListener(this);
        }
    },

    _handleItemClick: function (e) {
        Event.stop(e);
        var el = Event.findElement(e, "li");
        if (el && el.id && el != WebStore.Inventory.selectedItem && (!el.className || !Element.hasClassName(el, "webstore-widget-disabled"))) {
            WebStore.Inventory._selectItem(el);
            var temp = el.id.split("-");
            WebStore.Inventory._loadPreview(temp.last(), WebStore.Inventory.selectedCategory, temp[2] == "p");
        }
    },

    _handlePreviewClick: function (e) {
        Event.stop(e);
        var el = Event.findElement(e, "a");
        if (el && el.id) {
            if (el.id == "inventory-place") {
                WebStore.Inventory._place();
            } else if (el.id == "inventory-place-all") {
                WebStore.Inventory._placeAll();
            }
        }
    },
    _openStoreClick: function (e) {
        Event.stop(e);
        WebStore._loadMainContent(WebStore.selectedType, 'store');
    },
    _closeInventoryClick: function (e) {
        Event.stop(e);
        WebStore.close();
    },
    _loadInventoryClick: function (e) {
        Event.stop(e);
        WebStore._loadMainContent(WebStore.selectedType, 'inventory');
    },

    _setContentClassName: function (className) {
        $("inventory-content-container").className = className;
    },

    _selectItem: function (el) {
        try {
            if (!Element.hasClassName(el, "selected")) {
                Element.removeClassName(WebStore.Inventory.selectedItem, "selected");
                Element.addClassName(el, "selected");
                WebStore.Inventory.selectedItem = el;
            }
        } catch (ex) { }
    },

    _loadPreview: function (itemId, type, privileged) {
        WebStore.Inventory._clearPreview();
        $("inventory-preview").innerHTML = getProgressNode();
        WebStore.Inventory._showPreview();
        var qs = { itemId: itemId, type: type };
        if (type == "widgets") {
            qs.privileged = privileged;
        }
        new Ajax.Request(
            habboReqPath + "/myhabbo/inventory/preview", {
            method: "post", parameters: qs,
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    WebStore.Inventory.previewItem = json;
                    WebStore.Inventory._showPreview(req.responseText);
                }

                // make sure webstore is hidden
                WebStore.hideWebStoreDivs();
            }
        }
        );
    },

    _showPreview: function (previewHtml) {
        var previewDiv = $("inventory-preview");
        if (previewHtml) { previewDiv.innerHTML = previewHtml };

        if (WebStore.Inventory.previewItem && WebStore.Inventory.previewItem.length > 0) {
            var preview = $("inventory-preview-box").appendChild(Builder.node("div", { id: "inventory-preview-pre" }));
            if (WebStore.Inventory.previewItem[5] && WebStore.Inventory.previewItem[5] > 1) {
                preview.appendChild(Builder.node("div", { id: "inventory-preview-count", className: "webstore-item-count" }));
            }

            WebStore.Inventory._setPreviewItem();
        }

        previewDiv.show();
    },

    _clearPreview: function () {
        WebStore.Inventory.previewItem = null;
        var previewBox = $("inventory-preview");
        if (previewBox) {
            previewBox.innerHTML = "";
        }
    },

    _showDefaultPreview: function () {
        WebStore.Inventory._clearPreview();
        var previewDiv = $("inventory-preview");
        previewDiv.hide();
        $("inventory-preview-default").show();
        previewDiv.innerHTML = "";
    },

    _setPreviewItem: function () {
        var pre = $("inventory-preview-pre");
        pre.className = WebStore.Inventory.previewItem[0];
        pre.title = WebStore.Inventory.previewItem[2];
        if (WebStore.Inventory.previewItem[3] == "DynamicSticker") {
            pre.style.backgroundImage = "url(" + habboImagerUrl + WebStore.Inventory.previewItem[4] + ")";
        }
        if ($("inventory-preview-count")) {
            $("inventory-preview-count").innerHTML = "<div>x" + WebStore.Inventory.previewItem[5] + "</div>";
        }
    },

    _place: function () {
        if (WebStore.selectedType == "stickers") {
            doPlaceImageOnPage(WebStore.Inventory.selectedItem.id.split("-").last());
            WebStore.Inventory._closeAfterPlace();
        } else if (WebStore.selectedType == "backgrounds") {
            WebStore.originalBg = WebStore.Inventory.previewItem[1];
            doChangeBg(WebStore.Inventory.previewItem[1], WebStore.Inventory.selectedItem.id.split("-").last());
            WebStore.Inventory._closeAfterPlace();
        } else if (WebStore.selectedType == "widgets") {
            var temp = WebStore.Inventory.selectedItem.id.split("-");
            doPlaceWidget(temp[3], temp[2] == "p");
            WebStore.Inventory._closeAfterPlace();
        } else if (WebStore.selectedType == "notes") {
            WebStore.NoteEditor.open();
        }
    },

    _placeAll: function () {
        if (WebStore.selectedType == "stickers") {
            doPlaceImageOnPage(WebStore.Inventory.selectedItem.id.split("-").last(), true);
            WebStore.Inventory._closeAfterPlace();
        }
    },

    _closeAfterPlace: function () {
        WebStore.close();
        WebStore.Inventory._clearPreview();
        $("inventory-items").innerHTML = getProgressNode();
        WebStore.Inventory.waitingForReload = true;
    },
    selectCategory: function (type, categoryEl) {
        if (!categoryEl) {
            categoryEl = $("inv-cat-" + type);
        }
        if (WebStore.Inventory.selectedCategory != type && categoryEl) {
            categoryEl.className = "selected-main-category-no-subcategories";
            if (WebStore.Inventory.selectedCategory != null) {
                $("inv-cat-" + WebStore.Inventory.selectedCategory).className = "main-category-no-subcategories";
            }
            WebStore.Inventory.selectedCategory = type;
            WebStore.Inventory.loadCategory(type);
            WebStore.Inventory._setContentClassName(type);
        }
    },

}

WebStore.StickerEditor = {

    figureParams: null,

    open: function () {
        new Ajax.Request(
            habboReqPath + "/myhabbo/store/stickereditor_flash", {
            method: "post", parameters: WebStore.StickerEditor.figureParams || "",
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    Overlay.hideIfMacFirefox();

                    var itemsDiv = $("webstore-items");
                    itemsDiv.innerHTML = req.responseText;
                    req.responseText.evalScripts();

                    WebStore.loadingCategory = false;
                }
            }
        }
        );
    },

    preview: function (figureParams) {
        WebStore.StickerEditor.figureParams = figureParams;

        $("flashcontent").style.display = "none";
        $("flashalternate").style.display = "block";

        Overlay.show();
        moveOverlay("9002");
        var dialog = createDialog("webstore-confirm", "", "9003", -1500, 0, function (e) {
            WebStore.closeConfirmation(e);
            WebStore.StickerEditor.open();
        });
        makeDialogDraggable(dialog);
        setAsWaitDialog(dialog);
        moveDialogToCenter(dialog);

        new Ajax.Request(habboReqPath + "/myhabbo/store/preview", {
            method: "post", parameters: figureParams || "",
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    setDialogBody(dialog, req.responseText);
                    Event.observe($("avatarimage-preview-img"), "load", function (e) { Element.remove("avatarimage-progressbar"); });
                    Event.observe($("avatarimage-preview-purchase"), "click", function (e) {
                        Event.stop(e);
                        setAsWaitDialog(dialog);
                        WebStore.StickerEditor._purchase(json);
                    });
                    Event.observe($("avatarimage-preview-edit"), "click", function (e) {
                        Event.stop(e);
                        Element.remove($("webstore-confirm"));
                        moveOverlay("9000");
                        Overlay.hideIfMacFirefox();
                        //it($("flashcontent"));
                        $("flashalternate").style.display = "none";
                        $("flashcontent").style.display = "block";
                        WebStore.StickerEditor.open();
                    });
                }
            }
        });
    },

    _purchase: function (imageUrl) {
        new Ajax.Request(habboReqPath + "/myhabbo/store/purchase_avatarsticker", {
            method: "post", parameters: { stickerimage: imageUrl },
            onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    if (req.responseText.strip() != "OK") {
                        setDialogBody($("webstore-confirm"), req.responseText);
                        Event.observe($("webstore-confirm-cancel"), "click", WebStore.closeConfirmation);
                    } else {
                        WebStore.Inventory.newItems.push(json);
                        WebStore.Inventory.updateNewItemCount();
                        Element.remove($("webstore-confirm"));
                        WebStore.StickerEditor.open();
                        moveOverlay("9000");

                        // refresh inventory (if needed)
                        if (WebStore.Inventory.inventoryOpened) {
                            WebStore.Inventory.selectCategory(WebStore.MenuBar.selectedMainCategory.id.split("-").last());
                            WebStore.Inventory._clearPreview();
                            WebStore.Inventory.waitingForReload = true;
                            WebStore.Inventory.lastId = json;
                        }
                    }
                }
            }
        });
    }

}

WebStore.NoteEditor = {

    dialog: null,
    noteParams: null,
    id: null,

    open: function () {
        moveOverlay("9002");
        WebStore.NoteEditor._createEditorDialog();
        WebStore.NoteEditor._loadEditor();
    },

    close: function (e) {
        if (e) { Event.stop(e); }
        if ($("webstore-noteeditor")) {
            Element.remove($("webstore-noteeditor"));
            if (WebStore.NoteEditor.id) {
                Overlay.hide();
            } else {
                moveOverlay("9000");
            }
        }
        WebStore.NoteEditor.id = null;
    },

    edit: function (id) {
        WebStore.NoteEditor.id = id;
        Overlay.show();
        WebStore.NoteEditor._createEditorDialog();
        WebStore.NoteEditor._loadEditor({ id: id });
    },

    _createEditorDialog: function () {
        WebStore.NoteEditor.dialog = createDialog("webstore-noteeditor", "", "9003", -1500, 0, WebStore.NoteEditor.close);
        makeDialogDraggable(WebStore.NoteEditor.dialog);
        setAsWaitDialog(WebStore.NoteEditor.dialog);
        moveDialogToCenter(WebStore.NoteEditor.dialog);
    },

    _loadEditor: function (noteParams, backFromPreview) {
        WebStore.NoteEditor.noteParams = noteParams || "";

        new Ajax.Request(habboReqPath + "/myhabbo/store/noteeditor", {
            method: "post", parameters: WebStore.NoteEditor.noteParams, onComplete: function (req, json) {
                if (WebStore._checkResponse(req.responseText)) {
                    setDialogBody(WebStore.NoteEditor.dialog, req.responseText);
                    req.responseText.evalScripts();

                    var limitCallback = function (limitReached) {
                        try {
                            var currentLength = $F("webstore-notes-text").length;
                            $("webstore-notes-counter").innerHTML = maxLength - currentLength;
                            if (currentLength > 0) { WebStore.NoteEditor._enableContinue(); }
                            else { WebStore.NoteEditor._disableContinue(); }
                        } catch (e) { }
                    };

                    if (backFromPreview || WebStore.NoteEditor.id) {
                        window.setTimeout(function () {
                            $("webstore-notes-text").focus();
                            limitCallback();
                        }, 100);
                    }

                    var maxLength = $F("webstore-notes-maxlength");
                    Utils.limitTextarea($("webstore-notes-text"), maxLength, limitCallback);
                    if (maxLength < 0) {
                        WebStore.NoteEditor._enableContinue();
                    }

                    if ($("webstore-confirm-cancel")) { Event.observe($("webstore-confirm-cancel"), "click", WebStore.NoteEditor.close); }
                    if ($("webstore-notes-continue")) {
                        Event.observe($("webstore-notes-continue"), "click", function (e) {
                            Event.stop(e);
                            var el = Event.findElement(e, "a");

                            if (!el.className || !Element.hasClassName(el, "disabled-button")) {
                                WebStore.NoteEditor.noteParams = Form.serialize($("webstore-notes-form"));
                                setAsWaitDialog(WebStore.NoteEditor.dialog);
                                new Ajax.Request(habboReqPath + "/myhabbo/store/noteeditor-preview", {
                                    method: "post", parameters: WebStore.NoteEditor.noteParams, onComplete: function (req, json) {
                                        if (WebStore._checkResponse(req.responseText)) {
                                            if (req.responseText.strip() == "BACK") {
                                                WebStore.NoteEditor._loadEditor(WebStore.NoteEditor.noteParams, true);
                                            } else {
                                                setDialogBody(WebStore.NoteEditor.dialog, req.responseText);

                                                if ($("webstore-confirm-cancel")) { Event.observe($("webstore-confirm-cancel"), "click", WebStore.NoteEditor.close); }
                                                if ($("webstore-notes-add")) {
                                                    Event.observe($("webstore-notes-add"), "click", function (e) {
                                                        var isEditing = !!WebStore.NoteEditor.id;
                                                        WebStore.NoteEditor.close(e);
                                                        if (isEditing) {
                                                            WebStore.NoteEditor._saveChanges();
                                                        } else {
                                                            WebStore.NoteEditor._place();
                                                            WebStore.Inventory._closeAfterPlace();
                                                        }
                                                    });
                                                }
                                                if ($("webstore-notes-edit")) {
                                                    Event.observe($("webstore-notes-edit"), "click", function (e) {
                                                        Event.stop(e);
                                                        WebStore.NoteEditor._loadEditor(WebStore.NoteEditor.noteParams, true);
                                                    });
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            }
        });
    },

    _place: function () {
        if (WebStore.NoteEditor.noteParams) {
            new Ajax.Request(habboReqPath + "/myhabbo/store/noteeditor-place", {
                method: "post", parameters: WebStore.NoteEditor.noteParams, onComplete: function (req, json) {
                    if (WebStore._checkResponse(req.responseText)) {
                        if (req.responseText.strip() == "BACK") {
                            WebStore.NoteEditor._loadEditor(WebStore.NoteEditor.noteParams, true);
                        } else if (req.responseText.strip() != "") {
                            $("playground").insert(req.responseText);
                            var note = $("stickie-" + json);
                            Element.hide(note);
                            note.style.top = "10px";
                            note.style.left = "10px";
                            Effect.BlindDown(note, { scaleX: true, scaleY: true });
                            initMovableItems();
                        }
                    }
                }
            });
        }
    },

    _saveChanges: function () {
        if (WebStore.NoteEditor.noteParams) {
            new Ajax.Request(habboReqPath + "/myhabbo/store/noteeditor-save", {
                method: "post", parameters: WebStore.NoteEditor.noteParams, onComplete: function (req, json) {
                    if (WebStore._checkResponse(req.responseText)) {
                        if (req.responseText.strip() == "BACK") {
                            WebStore.NoteEditor._loadEditor(WebStore.NoteEditor.noteParams, true);
                        } else if (req.responseText.strip() != "") {
                            var oldNote = $("stickie-" + json);
                            var x = oldNote.offsetLeft;
                            var y = oldNote.offsetTop;
                            Element.remove(oldNote);
                            $("playground").insert(req.responseText);
                            var note = $("stickie-" + json);
                            Element.hide(note);
                            note.style.top = y + "px";
                            note.style.left = x + "px";
                            Effect.Appear(note);
                            initMovableItems();
                        }
                    }
                }
            });
        }
    },

    _enableContinue: function () {
        Element.removeClassName($("webstore-notes-continue"), "disabled-button");
    },

    _disableContinue: function () {
        Element.addClassName($("webstore-notes-continue"), "disabled-button");
    }

}

ScriptLoader.notify("myhabbo-store");
