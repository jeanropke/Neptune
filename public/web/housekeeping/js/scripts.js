
var BadgesManager = {
    initialise: function (url) {
        $('.slot').click((e) => {
            e.preventDefault();
            $this = $(e.target).closest('.slot');
            var code = $this.data('code');
            var userId = $this.data('user-id');
            var el = $('<div>', { style: "display: flex; margin: 5px" }).append($('<img>', { src: url + code + '.gif' })).append($('<p>', { text: 'Are you sure you want to remove this badge?' }));
            Dialog.showConfirmDialog(el, () => { this.remove(userId, code) });
        });
    },
    remove: function (id, code) {
        Dialog.setAsWaitDialog($("#confirm-dialog"));
        $.ajax(habboReqPath + "users/badges/remove", {
            data: { id: id, code: code },
            method: "post"
        }).done((html, status) => {
            Dialog.setDialogBody($("#confirm-dialog"), html);
            $("#confirm-dialog-close").click(() => { Dialog.closeConfirmDialog(); });
        });
    }
}

var VoucherManager = {
    initialise: function (length) {
        $('#random-code').click((e) => {
            e.preventDefault();
            $('input[name=voucher]').val(this.generate(length));
        });
        $('input[name=voucher]').val(this.generate(length));
    },
    generate: function (length) {
        var chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        var code = '';
        for (let i = 0; i < length; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return code;
    }
}

var FurniPicker = {
    initialise: function () {
        this.picked = [];
        $('#furni-picker').click((e) => {
            e.preventDefault();
            if ($('#furni-picker-dialog').length > 0) return;
            this.dialog = Dialog.createDialog("furni-picker-dialog", "Furni Picker", 9001, null, null, this.closeDialog);
            Overlay.show();
            Dialog.makeDialogDraggable(this.dialog);
            Dialog.moveDialogToCenter(this.dialog);
            this.listing($(e.target).attr('href'));
        });

        $('#furni-picked .slot').each((i, e) => {
            $(e).click(this.removeFurni);
            this.picked.push($(e).data('item-id'));
        });
    },

    closeDialog: function (e) {
        e.preventDefault();
        $('#furni-picker-dialog').remove();
        Overlay.hide();
    },
    listing: function (url) {
        Dialog.setAsWaitDialog(this.dialog);
        $.ajax(url, { method: 'post' })
            .done((html, status) => {
                Dialog.setDialogBody(this.dialog, html);
                this.setupForm();
            });
    },
    setupForm: function () {
        var $el = $('#furni-picker-form');
        $el.find('input[type=submit]').click((e) => {
            e.preventDefault();
            var url = $el.attr('action');
            var furni = $el.find('input[name=furni-picker-input]').val();

            $.ajax(url, { method: 'post', data: { furni: furni } })
                .done((html, status) => {
                    $('#furni-picker-listing').html(html);

                    $('#furni-picker-listing .slot').hover((e) => {
                        var furni = $(e.target).closest('.slot').data('furni');
                        $('#furni-name').text(furni);
                    });

                    $('#furni-picker-listing .slot').click((e) => {
                        var slot = $(e.target).closest('.slot');
                        var furni = slot.data('item-id');
                        this.picked.push(furni);
                        var clone = slot.clone();
                        clone.click(this.removeFurni);
                        $('#furni-picked').append(clone);
                        $('input[name=item_ids]').val(FurniPicker.picked.join(';'));
                    });
                });
        });


    },
    removeFurni: function (e) {
        var $el = $(e.target).closest('.slot');
        var id = $el.data('item-id');
        FurniPicker.picked.splice(FurniPicker.picked.indexOf(id), 1);
        $el.remove();
        $('input[name=item_ids]').val(FurniPicker.picked.join(';'));
    }
}

var LogManager = {
    initialise: function () {
        this.picked = [];
        $('.message-details').click((e) => {
            e.preventDefault();
            if ($('#message-details-dialog').length > 0) return;
            this.dialog = Dialog.createDialog("message-details-dialog", "Message Details", 9001, null, null, this.closeDialog);
            this.dialog.css('width', '1000px');
            Overlay.show();
            Dialog.makeDialogDraggable(this.dialog);
            Dialog.moveDialogToCenter(this.dialog);
            Dialog.setAsWaitDialog(this.dialog);

            var id = $(e.target).closest('.message-details').data('id');

            $.ajax(habboReqPath + "logs/staff/details", {
                data: { id: id },
                method: "post"
            }).done((html, status) => {
                Dialog.setDialogBody(this.dialog, html);
                $("#confirm-dialog-close").click((e) => { this.closeDialog(e); });
            });
        });
    },

    closeDialog: function (e) {
        e.preventDefault();
        $('#message-details-dialog').remove();
        Overlay.hide();
    }
}

var GenericManager = {
    initialise: function (div, message, url) {
        $(div).click((e) => {
            e.preventDefault();
            $this = $(e.target).closest(div);
            Dialog.showConfirmDialog(message, () => { this.delete($this.data('id'), url) });
        });
    },
    delete: function (id, url) {
        Dialog.setAsWaitDialog($("#confirm-dialog"));
        $.ajax(url, {
            data: { id: id },
            method: "post"
        }).done((html, status) => {
            Dialog.setDialogBody($("#confirm-dialog"), html);
            $("#confirm-dialog-close").click(() => { Dialog.closeConfirmDialog(); });
        });
    }
}

var SelectorPreview = {
    initialise: function (selector, preview) {
        selector.change((e) => {
            preview.attr('src', preview.data('url').replace('%icon%', $(e.target).val()));
        });
    }
}

var VersionChecker = {
    initialise: function () {
        $('#version-checker').click((e) => {
            e.preventDefault();
            $('#version-checker').attr('disabled', 'disabled');
            $('#log').text('Checking... please wait...\n');
            $.ajax(habboReqPath + "help/version", {
                method: "post"
            }).done((json) => {
                if (json.error) {
                    $('#log').append(json.error);
                }
                else {
                    if (json.version > json.cms_version) {
                        $('#log').append(`A new version was found.\n`);
                        $('#log').append(`v${json.version} - Published at ${json.published_at}\n`);
                        $('#log').append('Please download it on https://github.com/jeanropke/Neptune/releases');
                    }
                    else {
                        $('#log').append(`You are using the latest release!`);
                    }
                }

            });
        });
    }
}

var Dialog = {
    createDialog: function (dialogId, header, dialogZIndex, dialogLeft, dialogTop, exitCallback, tabs) {
        if (!dialogId) return;
        var overlay = $("#overlay");
        var headerBar = [$("<h3>", { class: "tableheaderalt", text: header })];
        if (exitCallback) {
            var exitButton = $("<a>", { href: "#", class: "dialog-default-exit" }).append($("<img>", { src: habboStaticFilePath + "/images/dialogs/grey-exit.gif", width: 12, height: 12, alt: "" }));
            exitButton.on('click', exitCallback)
            headerBar.push(exitButton);
        }
        var childNodes = [];
        childNodes.push($("<div>").append(headerBar));

        childNodes.push($("<div>", { className: "dialog-content" }).append($("<div>", { id: dialogId + "-body", class: "dialog-default" + (tabs ? "tab" : "") + "-body" }).append($("<div>", { class: "clear" }))));
        var dialog = $("<div>", { id: dialogId, class: "dialog-default" + (tabs ? " dialog-defaulttab" : "") }).append(childNodes);
        dialog.css("z-index", (dialogZIndex || 9001));
        dialog.css("left", (dialogLeft || -1000) + "px");
        dialog.css("top", (dialogTop || 0) + "px");
        overlay.after(dialog, overlay.next());
        return dialog;
    },

    showInfoDialog: function (dialogId, message, buttonText, buttonOnClick) {
        showOverlay();
        var dialog = createDialog(dialogId, "", "9003");
        var link = Builder.node("a", { href: "#", className: "colorlink noarrow dialogbutton" }, [Builder.node("span", buttonText)]);
        appendDialogBody(dialog, Builder.node("p", { id: dialogId + "content" }));
        $(dialogId + "content").innerHTML = message;
        appendDialogBody(dialog, Builder.node("p", [link]));
        if (buttonOnClick == null) {
            Event.observe(link, "click", function (e) { Event.stop(e); Element.hide($(dialogId)); hideOverlay(); }, false);
        }
        else {
            Event.observe(link, "click", buttonOnClick, false);
        }

        moveOverlay("9002");
        moveDialogToCenter(dialog);
    },

    showConfirmDialog: function (message) {
        var options = {
            dialogId: "confirm-dialog",
            buttonText: "OK",
            cancelButtonText: "Cancel",
            headerText: "Are you sure?",
            okHandler: arguments[1],
            cancelHandler: arguments[2] || this.closeConfirmDialog
        };

        Overlay.show();
        var dialog = this.createDialog(options.dialogId, options.headerText, "9003");
        if (options.width) {
            dialog.style.width = options.width;
        }
        this.appendDialogBody(dialog, $("<div>", { id: options.dialogId + "content" }));
        $('#' + options.dialogId + "content").html(message);
        var link = $("<input>", { type: "submit", class: "realbutton", value: options.buttonText, style: "margin: 7px; float: right" });
        var cancelLink = $("<input>", { type: "submit", class: "realbutton", value: options.cancelButtonText, style: "margin: 7px;" });
        this.appendDialogBody(dialog, $("<div>").append(cancelLink).append(link), true);
        link.click(options.okHandler);
        cancelLink.click(options.cancelHandler);
        Overlay.move("9002");
        this.moveDialogToCenter(dialog);
        this.makeDialogDraggable(dialog);
        return dialog;
    },

    closeConfirmDialog: function () {
        var el = $("#confirm-dialog");
        if (!el) return;
        el.remove();
        Overlay.hide();
    },

    appendDialogBody: function (dialog, bodyEl, useInnerHTML) {
        var el = $(dialog);
        if (el) { var el2 = $("#" + el.prop('id') + "-body"); (useInnerHTML) ? el2.append(bodyEl) : el2.html(bodyEl); if (bodyEl.innerHTML) bodyEl.innerHTML.evalScripts(); }
    },

    setDialogBody: function (dialog, bodyEl) {
        var el = $(dialog);
        if (el) {
            var el2 = $("#" + el[0].id + "-body");
            el2.html(bodyEl);
        }
    },

    makeDialogDraggable: function (dialog) {
        dialog.draggable();
    },

    moveDialogToView: function (dialog, e, coordinates) {
        var dim = Element.getDimensions(dialog);
        var pageSize = getPageSize();
        var x = 0, y = 0;

        if (coordinates) {
            x = coordinates.x;
            y = coordinates.y;
        } else if (e) {
            x = Event.pointerX(e) - 35;
            y = Event.pointerY(e) - 15;
        }

        if (x + dim.width > pageSize[2]) { x = pageSize[2] - dim.width; }
        if (x < 0) { x = 0; }
        if (y + dim.height > pageSize[3]) { y = pageSize[3] - dim.height; }
        if (y < 0) { y = 0; }

        dialog.style.left = x + "px";
        dialog.style.top = y + "px";
    },

    moveDialogToCenter: function (dialog) {
        var dim = {
            width: $(dialog).outerWidth(),
            height: $(dialog).outerHeight()
        };

        var pageSize = [$(window).width(), $(window).height(), $(document).width(), $(document).height()];
        var x = 0, y = 0;

        x = Math.round(pageSize[2] / 2) - Math.round(dim.width / 2);

        if (x < 0) { x = 0; }

        y = $(window).scrollTop() + 200;

        if (y + dim.height > pageSize[1]) {
            y = pageSize[1] - dim.height;
        }

        $(dialog).css({ left: x + "px", top: y + "px" });
    },

    setAsWaitDialog: function (a) {
        var b = $(a);
        if (b) {
            var el = $("<center>").append($("<img>", { src: habboStaticFilePath + "housekeeping/images/loading_anim.gif" }));
            $("#" + b.prop('id') + "-body").html(el);
        }
    }
}


var Overlay = {
    show: function () {
        var pageSize = getPageSize();
        var overlay = $("#overlay");
        overlay.css("display", "block");
        overlay.css("height", pageSize[1] + "px");
        try {
            var topWidth = Element.getDimensions("top").width;
            if (topWidth > pageSize[2]) { overlay.style.minWidth = topWidth + "px"; }
        } catch (ex) { }
        overlay.css("z-index", "9000");
    },
    hide: function () {
        var overlay = $("#overlay");
        overlay.css("z-index", "9000");
        overlay.css("display", "none");
    },
    move: function (zIndex) {
        $("#overlay").css("z-index", zIndex);
    },
    hideIfMacFirefox: function () {
        /* detecting firefox on mac, hiding the overlay to tackle render bug */
        var c_os = navigator.platform;
        var c_ua = navigator.appName;
        if ((c_os == "Mac" || c_os == "MacIntel" || c_os == "MacPPC") && (c_ua == "Netscape" || c_ua == "Mozilla" || c_ua == "Firefox")) {
            hideOverlay();
        }
    }
}

// From Lightbox by Lokesh Dhakar - http://www.huddletogether.com
// Core code from - quirksmode.org
// Edit for Firefox by pHaez
function getPageSize() {

    var xScroll, yScroll;

    if (window.innerHeight && window.scrollMaxY) {
        xScroll = document.body.scrollWidth;
        yScroll = window.innerHeight + window.scrollMaxY;
    } else if (document.body.scrollHeight > document.body.offsetHeight) { // all but Explorer Mac
        xScroll = document.body.scrollWidth;
        yScroll = document.body.scrollHeight;
    } else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
        xScroll = document.body.offsetWidth;
        yScroll = document.body.offsetHeight;
    }

    var windowWidth, windowHeight;
    if (self.innerHeight) {	// all except Explorer
        windowWidth = self.innerWidth;
        windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
        windowWidth = document.documentElement.clientWidth;
        windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
        windowWidth = document.body.clientWidth;
        windowHeight = document.body.clientHeight;
    }

    // for small pages with total height less then height of the viewport
    if (yScroll < windowHeight) {
        pageHeight = windowHeight;
    } else {
        pageHeight = yScroll;
    }

    // for small pages with total width less then width of the viewport
    if (xScroll < windowWidth) {
        pageWidth = windowWidth;
    } else {
        pageWidth = xScroll;
    }

    arrayPageSize = new Array(pageWidth, pageHeight, windowWidth, windowHeight)
    return arrayPageSize;
}
