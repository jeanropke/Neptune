var FriendsWidget = {
    init: function (pages, theRange, accountIdentity) {
        var currentIndex = 1;
        this.slider = new Control.Slider('slider-handle', 'slider-bar', {
            range: $R(1, pages), axis: 'horizontal', alignX: -10,
            values: theRange
        });
        this.slider.options.onChange = function (value) {
            if(currentIndex == value) return;
            currentIndex = value;

            $("number").innerHTML = value + "/" + pages;
            Element.wait($("friends"));

            new Ajax.Updater($("friends"), habboReqPath + "/myhabbo/friends_ajax", {
                method: "post",
                parameters: "name=" + encodeURIComponent(accountIdentity) + "&index=" + encodeURIComponent(value - 1),
                evalScripts: true
            });

        };
        this.timer = false;
    },

    showFriendData: function (ind, amount) {
        this.stopHideTimer();

        for (x = 0; x < amount; x++) {
            $('finf-' + x).style.display = 'none';
            $('f' + x).className = 'friend';
        }

        $('finf-' + ind).style.display = 'block';
        $('f' + ind).className = 'friend friend-selected';
    },

    hideFriendData: function (ind, delay) {
        this.timer = window.setTimeout(function () {
            $('finf-' + ind).style.display = 'none';
            $('f' + ind).className = 'friend';
        }, delay);
    },

    stopHideTimer: function () {
        if (this.timer) {
            window.clearTimeout(this.timer);
        }
    }
};

var MemberWidget = Class.extend(FriendsWidget, {
    options: { searchUrl: "/myhabbo/avatarlist/membersearchpaging", ownerParameter: "&_groupspage.requested.group=" },

    leaveFromGroup: function (e) {
        Event.stop(e);
        openGroupActionDialog("/groups/actions/confirm_leave", "/groups/actions/leave", this.showId, this.ownerId, this);
    },

    removeFromGroup: function (e) {
        Event.stop(e);
        openGroupActionDialog("/groups/actions/confirm_remove", "/groups/actions/remove", this.showId, this.ownerId, this);
    },

    giveRights: function (e) {
        Event.stop(e);
        openGroupActionDialog("/groups/actions/confirm_give_rights", "/groups/actions/give_rights", this.showId, this.ownerId, this);
    },

    revokeRights: function (e) {
        Event.stop(e);
        openGroupActionDialog("/groups/actions/confirm_revoke_rights", "/groups/actions/revoke_rights", this.showId, this.ownerId, this);
    },

    _getInfoParameters: function () {
        return "groupId=" + encodeURIComponent(this.ownerId) + "&anAccountId=" + encodeURIComponent(this.showId);
    },

    _addLinkObservers: function () {
        var self = this;
        document.getElementsByClassName("avatar-info-rights-leave", this.infoEl).each(function (el) {
            el.onclick = self.leaveFromGroup.bindAsEventListener(self);
        });
        document.getElementsByClassName("avatar-info-rights-remove", this.infoEl).each(function (el) {
            el.onclick = self.removeFromGroup.bindAsEventListener(self);
        });
        document.getElementsByClassName("avatar-info-rights-give", this.infoEl).each(function (el) {
            el.onclick = self.giveRights.bindAsEventListener(self);
        });
        document.getElementsByClassName("avatar-info-rights-revoke", this.infoEl).each(function (el) {
            el.onclick = self.revokeRights.bindAsEventListener(self);
        });
    }
});

var ScrollWatcher = Class.create();
ScrollWatcher.prototype = {

    initialize: function (widgetId, className, callBack) {
        this.widgetId = widgetId;
        this.className = className;
        this.callBack = callBack;
        this.noticed = [];
        this.listItems();
        this.lastUpdate = 0;
        this.lastScrollTop = 0;

        var self = this;
        new PeriodicalExecuter(function () { self.update(self); }, .8);
    },

    update: function (e) {
        this.widgetEl = $("widget-" + this.widgetId);
        this.scrollDiv = document.getElementsByClassName("avatar-widget-list-container", this.widgetEl)[0];
        this.scrollDivHeight = Element.getHeight(this.scrollDiv);
        if (this.scrollDiv.scrollTop != this.lastScrollTop) {
            this.listItems();
            var self = this;
            this.items.each(function (el) {
                if (el.offsetTop + Element.getHeight(el) >= self.scrollDiv.scrollTop &&
                    el.offsetTop < self.scrollDiv.scrollTop + self.scrollDivHeight) {
                    if (self.callBack) {
                        self.callBack(el);
                    }
                    self.noticed.push(el);
                    el.className = "";
                }
            });
            this.listItems();
        }
        this.lastScrollTop = this.scrollDiv.scrollTop;
    },

    listItems: function () {
        this.items = document.getElementsByClassName(this.className, this.scrollDiv);
    }

};

var UpdateQueue = Class.create();
UpdateQueue.prototype = {

    initialize: function () {
        this.queue = [];
    },

    push: function (obj) {
        this.queue.push(obj);
    },

    flush: function () {
        var values = this.queue;
        this.queue = [];

        return values;

    }

};

var GuestbookWidget = Class.create();
GuestbookWidget.prototype = {

    initialize: function (accountId, widgetId, maxMessageLength) {
        this.accountId = accountId;
        this.widgetId = widgetId;
        this.maxMessageLength = maxMessageLength;

        var self = this;

        if ($('guestbook-open-dialog')) {
            Event.observe('guestbook-open-dialog', "click", function (e) {
                Event.stop(e);
                offsets = Position.cumulativeOffset($('guestbook-open-dialog'));
                var target = $('guestbook-form-dialog');
                Position.absolutize(target);
                target.style.top = offsets[1] + 'px';
                target.style.left = (offsets[0] - 80) + 'px';
                Element.hide($('guestbook-preview-tab'));
                Element.show($('guestbook-form-tab'));
                Element.show('guestbook-form-dialog');
                $('guestbook-message').value = '';
                $('guestbook-form-preview').disabled = 'true';
                Element.addClassName($('guestbook-form-preview'), "disabled");
                Field.activate($('guestbook-message'));
            });

            var formCancelHandler = function (e) {
                Event.stop(e);
                Element.hide($('guestbook-form-dialog'));
            };

            Event.observe('guestbook-form-dialog-exit', 'click', formCancelHandler);
            Event.observe('guestbook-form-cancel', 'click', formCancelHandler);

            Event.observe('guestbook-form-preview', 'click', function (e) {
                Event.stop(e);
                if ('true' == $('guestbook-form-preview').disabled) {
                    return;
                }
                if ($F('guestbook-message').length > 0) {
                    Element.hide($('guestbook-form-tab'));
                    $('guestbook-preview-tab').innerHTML = getProgressNode();
                    Element.show($('guestbook-preview-tab'));
                    new Ajax.Updater($("guestbook-preview-tab"), habboReqPath + "/myhabbo/guestbook/preview", {
                        method: "post",
                        parameters: Form.serialize($('guestbook-form')) + "&widgetId=" + encodeURIComponent(self.widgetId),
                        evalScripts: true,
                        onComplete: function () {
                            Event.observe('guestbook-form-post', 'click', function (e) {
                                Event.stop(e);
                                new Ajax.Updater($("guestbook-entry-container"), habboReqPath + "/myhabbo/guestbook/add", {
                                    method: "post",
                                    parameters: Form.serialize($('guestbook-form')) + "&widgetId=" + encodeURIComponent(self.widgetId),
                                    evalScripts: true,
                                    insertion: Insertion.Top,
                                    onComplete: function (response, status) {
                                        if (status && status.spam == "true") {
                                            return;
                                        }
                                        if ($('guestbook-empty-notes')) {
                                            Element.hide('guestbook-empty-notes');
                                        }
                                        Element.hide('guestbook-form-dialog');
                                        $("guestbook-entry-container").scrollTop = 0;
                                        var firstEntry = $$('#guestbook-entry-container .guestbook-entry').first();
                                        new Effect.Pulsate(firstEntry,
                                            { afterFinish: function () { Element.setOpacity(firstEntry, 1); } }
                                        );
                                        self.incrementSize();
                                    }
                                });
                            });

                            Event.observe('guestbook-form-continue', 'click', function (e) {
                                Event.stop(e);
                                Element.hide($('guestbook-preview-tab'));
                                Element.show($('guestbook-form-tab'));
                                Field.focus($('guestbook-message'));
                            });

                        }
                    });
                }
            });

            new Form.Element.Observer($('guestbook-message'), .5, (function (e) {
                var currMessageLength = $F('guestbook-message').length;
                if (currMessageLength > 0 && currMessageLength <= this.maxMessageLength) {
                    $('guestbook-form-preview').disabled = '';
                    Element.removeClassName($('guestbook-form-preview'), "disabled");
                } else {
                    $('guestbook-form-preview').disabled = 'true';
                    Element.addClassName($('guestbook-form-preview'), "disabled");
                }
            }).bind(this));
        }
        if ($("guestbook-delete-dialog")) {
            var self = this;
            Event.observe($("guestbook-delete"), "click", function (e) { Event.stop(e); self.doRemoveEntry($('guestbook-delete-id').value); self.hideRemoveConfirmation(); });
            var cancelDelete = function (e) { Event.stop(e); self.hideRemoveConfirmation(); };
            Event.observe($("guestbook-delete-dialog-exit"), "click", cancelDelete);
            Event.observe($("guestbook-delete-cancel"), "click", cancelDelete);
        }

        Event.observe($('guestbook-entry-container'), 'click', this.handleActions.bindAsEventListener(this));
        this.monitorEventListener = this.monitorScrollPosition.bind(this);
    },

    handleActions: function (e) {
        var clickedEl = Event.element(e);
        if (clickedEl.className == 'gbentry-delete') {
            Event.stop(e);
            var entryId = clickedEl.id.substring('gbentry-delete-'.length);
            this.removeEntry(entryId);
        }
        if (clickedEl.className == 'gbentry-report') {
            Event.stop(e);
            var entryId = clickedEl.id.substring('gbentry-report-'.length);

            DialogManager.show("guestbook", entryId, clickedEl, { setWidth: false, setHeight: false, offsetTop: 0, offsetLeft: -120 });
        }
    },

    monitorScrollPosition: function () {
        var element = $('guestbook-entry-container');
        if (!$('gb-progress')) {
            var progressHtml = getProgressNode();
            new Insertion.Bottom('guestbook-entry-container', '<div id="gb-progress" style="margin: 20px 0 60px 0; visibility: hidden">' + progressHtml + '</div>');
        }
        if (element.scrollTop > 0 && (element.scrollTop + element.clientHeight == element.scrollHeight)) {
            element.scrollTop = element.scrollHeight - element.clientHeight;
            var last_entry_id = $$('#guestbook-entry-container .guestbook-entry').last().id.substring('guestbook-entry-'.length);
            $('gb-progress').style.visibility = "";
            var self = this;
            new Ajax.Updater($("guestbook-entry-container"), habboReqPath + "/myhabbo/guestbook/list", {
                method: "post",
                parameters: "ownerId=" + self.accountId + "&lastEntryId=" + last_entry_id + "&widgetId=" + encodeURIComponent(self.widgetId),
                evalScripts: true,
                insertion: Insertion.Bottom,
                onComplete: (function (response, status) {
                    $('gb-progress').remove();
                    if (status.lastPage == 'false') {
                        setTimeout(this.monitorEventListener, 300);
                    }
                }).bind(this)
            });
        } else {
            setTimeout(this.monitorEventListener, 300);
        }
    },

    removeEntry: function (id) {
        offsets = Position.cumulativeOffset($("gbentry-delete-" + id));
        var target = $("guestbook-delete-dialog");
        Position.absolutize(target);
        var containerScrollTop = $('guestbook-entry-container').scrollTop;
        target.style.top = (offsets[1] - containerScrollTop) + 'px';
        target.style.left = (offsets[0] - 250) + 'px';
        Element.show(target);
        $('guestbook-delete-id').value = id;
    },

    hideRemoveConfirmation: function () {
        $('guestbook-delete-id').value = "";
        Element.hide($("guestbook-delete-dialog"));
    },

    doRemoveEntry: function (id) {
        new Ajax.Request(habboReqPath + "/myhabbo/guestbook/remove", {
            parameters: "entryId=" + encodeURIComponent(id) + "&widgetId=" + encodeURIComponent(this.widgetId),
            onSuccess: function (req) {
                new Effect.Fade($('guestbook-entry-' + id),
                    { afterFinish: function () { $('guestbook-entry-' + id).remove(); } }
                );
                self.decrementSize();
            }
        });
    },

    incrementSize: function () {
        var target = $('guestbook-size');
        if (target) {
            var newValue = parseInt(target.innerHTML) + 1;
            target.innerHTML = newValue;
        }
    },

    decrementSize: function () {
        var target = $('guestbook-size');
        if (target) {
            var newValue = parseInt(target.innerHTML) - 1;
            target.innerHTML = newValue;
        }
    },

    updateOptionsList: function (optionValue) {
        var select = $('guestbook-privacy-options');
        $A(select.options).each(function (option) {
            if (option.value == optionValue) { select.selectedIndex = option.index; }
        });
    }


};

var RatingObserver = Class.create();

RatingObserver.prototype = {
    initialize: function (commonAjaxParams, elementToObserve, urlToCall, innerHtmlParamName) {
        this.commonAjaxParams = commonAjaxParams;
        this.elementToObserve = elementToObserve;
        this.urlToCall = urlToCall;
        this.elementToObserve = elementToObserve;
        this.innerHtmlParamName = innerHtmlParamName;
        Event.observe(elementToObserve, "click", this.handleEvent.bindAsEventListener(this));
    },

    handleEvent: function (e) {
        var params;
        Event.stop(e);
        if (this.innerHtmlParamName != null) {
            params = this.commonAjaxParams.parameters + "&" + this.innerHtmlParamName + "=" + $(this.elementToObserve).innerHTML;
        }
        else {
            params = this.commonAjaxParams.parameters
        }

        $(this.commonAjaxParams.elementToUpdate).innerHTML = "";
        new Ajax.Updater(this.commonAjaxParams.elementToUpdate, habboReqPath + this.urlToCall, {
            method: "post",
            parameters: params,
            evalScripts: false,
            insertion: Insertion.Bottom,
            onComplete: this.commonAjaxParams.onCompleteFunction

        })
    }

};

var CommonRatingObserverParams = Class.create();

CommonRatingObserverParams.prototype = {
    initialize: function (elementToUpdate, parameters, onCompleteFunction) {
        this.elementToUpdate = elementToUpdate;
        this.parameters = parameters;
        this.onCompleteFunction = onCompleteFunction;
    }
};

var RatingWidget = Class.create();

RatingWidget.prototype = {
    initialize: function (ownerId, ratingId) {

        this.idParams = "ownerId=" + ownerId + "&ratingId=" + ratingId + "&_mypage.requested.account=" + ownerId;

        //html-elements
        this.mainDiv = "rating-main";
        this.givenRate = "rating-rate";
        this.resetLink = "ratings-reset-link";
        this.ratingStarClassName = "rater";

        this.commonObserverParams = new CommonRatingObserverParams(this.mainDiv, this.idParams, this.refreshObservers.bind(this));

        this.refreshObservers();
    },

    refreshObservers: function () {
        if ($(this.resetLink) && this.resetLinkObserver == null) {
            this.resetLinkObserver = new RatingObserver(this.commonObserverParams, this.resetLink, "/myhabbo/rating/reset_ratings", null);
        }
        //rating star listeners
        var ratingStars = document.getElementsByClassName(this.ratingStarClassName);
        for (var i = 0; i < ratingStars.length; ++i) {
            new RatingObserver(this.commonObserverParams, ratingStars[i], "/myhabbo/rating/rate", "givenRate");
        }
    }


};


var GroupsWidget = Class.create();
GroupsWidget.prototype = {

    initialize: function (ownerId, widgetId) {
        this.ownerId = ownerId;
        this.widgetId = widgetId;
        this.widgetEl = $("widget-" + widgetId);
        this.containerEl = document.getElementsByClassName("groups-list-container", this.widgetEl)[0];
        this.listEl = document.getElementsByClassName("groups-list", this.containerEl)[0];
        this.loadingEl = document.getElementsByClassName("groups-list-loading", this.widgetEl)[0];
        this.infoEl = document.getElementsByClassName("groups-list-info", this.widgetEl)[0];

        this.closeLink = document.getElementsByClassName("groups-loading-close", this.loadingEl)[0];
        this.closeLink.onclick = this.hideGroupDetails.bindAsEventListener(this);

        this._addOpenEventHandlers();
    },

    showGroupDetails: function (e) {
        if (Event.element(e).nodeName.toLowerCase() == "a") {
            return;
        }

        Event.stop(e);
        var target = Event.findElement(e, "li");
        this.groupId = this._parseGroupIdFromElementId(target.id);
        Element.hide(this.containerEl);
        this.loadingEl.style.display = "block";

        var self = this;
        new Ajax.Request(habboReqPath + "/myhabbo/groups/groupinfo", {
            method: "post", parameters: "ownerId=" + encodeURIComponent(this.ownerId) + "&groupId=" + encodeURIComponent(this.groupId), onComplete: function (req, json) {
                self.infoEl.innerHTML = req.responseText;

                Element.hide(self.loadingEl);
                self.infoEl.style.display = "block";

                self.closeLink = document.getElementsByClassName("groups-info-close", self.infoEl)[0];
                self.closeLink.onclick = self.hideGroupDetails.bindAsEventListener(self);

                document.getElementsByClassName("groups-info-select-favorite", self.infoEl).each(function (el) {
                    el.onclick = self.selectFavorite.bindAsEventListener(self);
                });

                document.getElementsByClassName("groups-info-deselect-favorite", self.infoEl).each(function (el) {
                    el.onclick = self.deselectFavorite.bindAsEventListener(self);
                });
            }
        });
    },

    hideGroupDetails: function (e) {
        if (e) { Event.stop(e); }
        Element.hide(this.loadingEl);
        Element.hide(this.infoEl);
        this.infoEl.innerHTML = "";
        Element.show(this.containerEl);
    },

    selectFavorite: function (e) {
        Event.stop(e);
        var self = this;
        openGroupActionDialog("/groups/actions/confirm_select_favorite", "/groups/actions/select_favorite", this.ownerId, this.groupId, this, function (req, json) {
            self.onCompleteCallback(req, json);
        });
    },

    deselectFavorite: function (e) {
        Event.stop(e);
        var self = this;
        openGroupActionDialog("/groups/actions/confirm_deselect_favorite", "/groups/actions/deselect_favorite", this.ownerId, this.groupId, this, function (req, json) {
            self.onCompleteCallback(req, json);
        });
    },

    refreshGroupList: function () {
        this.containerEl.innerHTML = getProgressNode();
        var self = this;
        new Ajax.Updater(this.containerEl, habboReqPath + "/myhabbo/groups/grouplist", {
            method: "post",
            parameters: "id=" + encodeURIComponent(this.ownerId) + "&widgetId=" + encodeURIComponent(this.widgetId), onComplete: function (req, json) {
                self.listEl = document.getElementsByClassName("groups-list", self.containerEl)[0];
                self._addOpenEventHandlers();
            }
        });
    },

    onCompleteCallback: function (req, json) {
        if (req.responseText == "OK") {
            hideGroupActionDialog(this);
            this.hideGroupDetails();
            this.refreshGroupList();
            return false;
        }
        return true;
    },

    _addOpenEventHandlers: function () {
        if (this.listEl) {
            this.listEl.onclick = this.showGroupDetails.bindAsEventListener(this);
        }
    },

    _parseGroupIdFromElementId: function (elementId) {
        return elementId.substring(elementId.lastIndexOf("-") + 1);
    }

}

var ProfileWidget = Class.create();
ProfileWidget.prototype = {
    initialize: function (accountId, loggedInAccountId) {
        this.options = Object.extend({
            messageText: "Add as friend?",
            headerText: "Are you sure?"
        }, arguments[2] || {});

        this.accountId = accountId;
        if (loggedInAccountId) {
            this.loggedInAccountId = loggedInAccountId;
        }
        this.btnAddFriend = $('add-friend');
        if (this.btnAddFriend) {
            this.eventAddFriend = this.handleAddFriend.bindAsEventListener(this);
            Event.observe(this.btnAddFriend, "click", this.eventAddFriend);
        }
        this.btnAddTag = $('profile-add-tag');
        if (this.btnAddTag) {
            this.eventAddTag = this.handleAddTag.bindAsEventListener(this);
            Event.observe(this.btnAddTag, "click", this.eventAddTag);
        }
        var self = this;
        Event.observe("profile-tag-list", "click", function (e) { self.handleClickTag(e); });

        if ($('profile-add-tag-input')) {
            Event.observe($('profile-add-tag-input'), "keypress", function (e) {
                if (e.keyCode == Event.KEY_RETURN) {
                    self.handleAddTag(e);
                }
            });
        }
    },

    handleAddTag: function (e) {
        Event.stop(e);
        var tagName = $F('profile-add-tag-input');
        var tagField = $('profile-add-tag-input');
        TagHelper.addAvatarTag(tagName, this.accountId);
        tagField.value = "";
    },

    handleClickTag: function (e) {
        // Event.stop(e);
        var element = Event.element(e);
        var tagName = element.className.substring(element.className.lastIndexOf("-") + 1);
        if (element.className.indexOf('tag-delete-link') >= 0) {
            Event.stop(e);
            TagHelper.errorMessage("valid"); // Clear the error box.
            new Ajax.Updater("profile-tag-list", "/myhabbo/tag/remove", {
                parameters: "accountId=" + encodeURIComponent(this.accountId) + "&tagName=" + encodeURIComponent(tagName),
                evalScripts: true
            });
        }
        else if (element.className.indexOf('tag-add-link') >= 0) {
            Event.stop(e);
            // The 'add this tag to my collection' icon was clicked.
            TagHelper.addThisTagToMe(tagName, this.loggedInAccountId);
        }
    },

    handleAddFriend: function (e) {
        if (Element.hasClassName(this.btnAddFriend, "disabled")) {
            Event.stop(e);
            return;
        }
        if (this.loggedInAccountId) {
            Event.stop(e);
            this.dialog = showConfirmDialog(this.options.messageText, {
                okHandler: this.doSendFriendRequest.bind(this),
                headerText: this.options.headerText, buttonText: this.options.buttonText, cancelButtonText: this.options.cancelButtonText
            });
        }
    },

    doSendFriendRequest: function () {
        setDialogBody(this.dialog, getProgressNode());
        var self = this;
        new Ajax.Request("/myhabbo/friends/add", {
            parameters: "accountId=" + encodeURIComponent(this.accountId),
            onSuccess: function () {
                Element.addClassName(self.btnAddFriend, "disabled");
                Element.remove(self.dialog);
                hideOverlay();
            }
        });
    }

}


var GroupInfoWidget = Class.create();
GroupInfoWidget.prototype = {
    initialize: function (groupId, loggedInAccountId) {

        this.groupId = groupId;
        if (loggedInAccountId) {
            this.loggedInAccountId = loggedInAccountId;
        }

        this.btnAddTag = $('profile-add-tag');
        if (this.btnAddTag) {
            this.eventAddTag = this.handleAddTag.bindAsEventListener(this);
            Event.observe(this.btnAddTag, "click", this.eventAddTag);
        }
        var self = this;
        Event.observe("profile-tag-list", "click", function (e) { self.handleClickTag(e); });

        if ($('profile-add-tag-input')) {
            Event.observe($('profile-add-tag-input'), "keypress", function (e) {
                if (e.keyCode == Event.KEY_RETURN) {
                    self.handleAddTag(e);
                }
            });
        }
    },

    handleAddTag: function (e) {
        Event.stop(e);
        var tagName = $F('profile-add-tag-input');
        var tagField = $('profile-add-tag-input');
        TagHelper.addGroupTag(tagName, this.groupId);
        tagField.value = "";
    },

    handleClickTag: function (e) {
        // Event.stop(e);
        var element = Event.element(e);
        var tagName = element.className.substring(element.className.lastIndexOf("-") + 1);
        if (element.className.indexOf('tag-delete-link') >= 0) {
            Event.stop(e);
            TagHelper.errorMessage("valid"); // Clear the error box.
            new Ajax.Updater("profile-tag-list", "/myhabbo/tag/removegrouptag", {
                parameters: "groupId=" + encodeURIComponent(this.groupId) + "&tagName=" + encodeURIComponent(tagName),
                evalScripts: true
            });
        }
        else if (element.className.indexOf('tag-add-link') >= 0) {
            Event.stop(e);
            // The 'add this tag to my collection' icon was clicked.
            TagHelper.addThisTagToMe(tagName, this.loggedInAccountId);
        }
    }
}

var BadgesWidget = Class.create();
BadgesWidget.prototype = {
    initialize: function (a, b) {
        this.options = Object.extend({
            searchUrl: "/myhabbo/badgelist/badgepaging",
            ownerParameter: "&_mypage_requested_account="
        });
        this.ownerId = a;
        this.widgetId = b;
        this.containerElement = $("badgelist-content");
        this.listHeight = null;
        if (this.containerElement) {
            this.listHeight = $(this.containerElement).down("ul").getHeight();
            Event.observe(this.containerElement, "click", function (c) {
                Event.stop(c);
                this._processSearch(c)
            }.bind(this))
        }
    },
    _processSearch: function (f) {
        var b = Event.element(f);
        var a = parseInt($F("badgeListPageNumber"));
        var d = parseInt($F("badgeListTotalPages"));
        var c = null;
        if (b.id == "badge-list-search-first") {
            c = 1
        } else {
            if (b.id == "badge-list-search-previous") {
                c = a - 1
            } else {
                if (b.id == "badge-list-search-next") {
                    c = a + 1
                } else {
                    if (b.id == "badge-list-search-last") {
                        c = d
                    }
                }
            }

        }
        if (null == c) {
            return
        }

        new Ajax.Updater(this.containerElement, habboReqPath + this.options.searchUrl, {
            method: "post",
            parameters: "pageNumber=" + encodeURIComponent(c) + "&widgetId=" + this.widgetId + this.options.ownerParameter + this.ownerId,
            onComplete: function (g) {
                if (this.listHeight) {
                    var e = $(this.containerElement).down("ul");
                    $(e).setStyle({
                        height: this.listHeight + "px"
                    })
                }
            }.bind(this)
        })
    }
}

