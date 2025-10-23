var Discussions = Class.create();
Discussions.prototype = {

    initialize: function () {
        if ($("group-postlist-list")) {
            Event.observe($('group-postlist-list'), 'click', this.handleActions.bindAsEventListener(this));
        }
        if ($("group-topiclist-list")) {
            Event.observe($('group-topiclist-list'), 'click', this.handleActions.bindAsEventListener(this));
        }

        if ($('create-post-message-lower-button'))
            Event.observe($('create-post-message-lower-button'), 'click', createNewPost);
        if ($('create-post-message-button'))
            Event.observe($('create-post-message-button'), 'click', createNewPost);
    },

    handleActions: function (e) {
        var clickedEl = Event.element(e);

        if (clickedEl.className == 'delete-post') {
            Event.stop(e);
            var entryId = clickedEl.id.substring('delete-post-'.length);
            this.removeEntry(entryId);
        }
        if (clickedEl.className == 'report-post') {
            Event.stop(e);
            var entryId = clickedEl.id.substring('report-post-'.length);
            DialogManager.show("discussionpost", entryId, clickedEl, { setWidth: false, setHeight: false, offsetTop: 0, offsetLeft: -120 });
        }
        if (clickedEl.className.search('verify-email') > -1) {
            Event.stop(e);
            var elementId = clickedEl.id;
            var isEmailVerified = $("email-verfication-ok").value;
            var target = $("postentry-verifyemail-dialog");

            var verifyEmailExit = function (e) {
                Event.stopObserving($("postentry-verifyemail-dialog-exit"), "click", verifyEmailExit);
                Element.hide("postentry-verifyemail-dialog");
                hideOverlay();
            };

            if (isEmailVerified == 0) {
                showOverlay();
                moveDialogToCenter($("postentry-verifyemail-dialog"));
                Element.show("postentry-verifyemail-dialog");
                Event.observe($("postentry-verifyemail-dialog-exit"), "click", verifyEmailExit);
                Event.observe($("postentry-verifyemail-ok"), "click", verifyEmailExit);

            } else {
                if (clickedEl.id.search('quote-post') > -1) {
                    var postId = clickedEl.id.substring('quote-post-'.length, clickedEl.id.length);
                    quote_function(postId);
                } else if (clickedEl.id.search('edit-post') > -1) {
                    var postId = clickedEl.id.substring('edit-post-'.length, clickedEl.id.length);
                    edit_function(postId);
                } else if (clickedEl.id.search('create-post') > -1) {
                    createNewPost();
                } else if (clickedEl.id == 'newtopic-upper' || clickedEl.id == 'newtopic-lower') {
                    newtopic_function();
                }
            }
        }
    },

    removeEntry: function (id) {
        offsets = Position.cumulativeOffset($("delete-post-" + id));
        var target = $("postentry-delete-dialog");
        Position.absolutize(target);
        var containerScrollTop = $('group-postlist-list').scrollTop;
        target.style.top = (offsets[1] - containerScrollTop) + 'px';
        target.style.left = (offsets[0] - 250) + 'px';
        var postentryDeleteCancel = function (e) {
            Event.stop(e);
            Event.stopObserving($("postentry-delete-cancel"), "click", postentryDeleteCancel);
            Element.hide("postentry-delete-dialog");
        };
        Event.observe($("postentry-delete-cancel"), "click", postentryDeleteCancel);
        var postentryDeleteExit = function (e) {
            Event.stop(e);
            Event.stopObserving($("postentry-delete-dialog-exit"), "click", postentryDeleteExit);
            Element.hide("postentry-delete-dialog");
        };
        Event.observe($("postentry-delete-dialog-exit"), "click", postentryDeleteExit);
        var postentryDelete = function (e) {
            Event.stop(e);
            Event.stopObserving($("postentry-delete"), "click", postentryDelete);
            delete_function(id);
            Element.hide("postentry-delete-dialog");
        };
        Event.observe($("postentry-delete"), "click", postentryDelete);
        Element.show("postentry-delete-dialog");
    }
};

var edit_function = function (postId) {
    Element.show("new-post-entry-message");
    Element.show("new-post-entry-label");
    var editText = document.getElementById(postId + '-message');
    var messageText = document.getElementById('post-message');
    document.getElementById('edit-type').value = "update";
    document.getElementById('post-id').value = postId;
    messageText.value = editText.value;
    $("post-message").focus();
    Element.scrollTo('post-message');

}

var quote_function = function (postId) {
    console.log(postId);
    Element.show("new-post-entry-message");
    Element.show("new-post-entry-label");
    var quoteText = document.getElementById(postId + '-message');
    var messageText = document.getElementById('post-message');
    messageText.value = '[quote]' + quoteText.value + '[/quote]';
    document.getElementById('edit-type').value = "new";
    $("post-message").focus();
    Element.scrollTo('post-message');

}

var cancel_edit_function = function (e) {
    Element.hide("new-post-entry-label");
    Element.hide("new-post-entry-message");
    if ($("new-topic-entry-label")) {
        Element.hide("new-topic-entry-label");
    }
    if ($("new-topic-name")) {
        Element.hide("new-topic-name");
    }
}
var cancel_newtopic_function = function (e) {
    Event.stop(e);

    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');
    var redirectLocation;

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + groupIdHidden.value;
        redirectLocation = habboReqPath + "/groups/" + groupIdHidden.value + "/id/discussions";
    } else {
        groupParam = "groupUrl=" + groupUrlHidden.value;
        redirectLocation = habboReqPath + "/groups/" + groupUrlHidden.value + "/discussions";
    }

    document.location = redirectLocation;
}

var newtopic_function = function (e) {
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
    } else {
        groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
    }

    var params = groupParam;

    new Ajax.Updater('group-topiclist-container', '/discussions/actions/newtopic', {
        method: "post", evalScripts: true, parameters: params,
        onComplete: function (req, json) {
            Event.observe("post-form-preview", "click", previewtopic_function, false);
            Event.observe("post-form-cancel", "click", cancel_newtopic_function, false);
            $("new-topic-name").focus();
            Element.scrollTo('post-message');
        }
    });
}

var preview_function = function (e) {
    Event.stop(e);

    var messageText = encodeURIComponent(document.getElementById('post-message').value);
    var topicIdHidden = encodeURIComponent(document.getElementById('topic-id').value);
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
    } else {
        groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
    }

    var params = groupParam + "&topicId=" + topicIdHidden + "&message=" + messageText;

    new Ajax.Updater('new-post-preview-container', habboReqPath + '/discussions/actions/previewpost', {
        method: "post", parameters: params,
        onComplete: function (req, json) {

            Element.hide("new-post-entry-message");
            Element.hide("new-post-entry-label");
            Element.show("new-post-preview");
            Element.hide("create-post-message-button");
            Element.hide("create-post-message-lower-button");
            Event.observe("edit-post-message", "click", function (e) {
                Event.stop(e);
                var messageText = document.getElementById('post-message-hidden');
                var topicIdHidden = document.getElementById('topic-id');
                var params = "topicId=" + topicIdHidden.value + "&message=" + messageText.value;
                Element.hide("new-post-preview");
                Element.show("new-post-entry-label");
                Element.show("new-post-entry-message");
                Element.show("create-post-message-button");
                Element.show("create-post-message-lower-button");
                $("post-message").focus();
                Element.scrollTo('post-message');

            }, false);


            Event.observe("save-post-message", "click", function (e) {
                Event.stop(e);
                var messageText = encodeURIComponent(document.getElementById('post-message').value);
                var messageTextEdit = document.getElementById('post-message').value;
                var topicIdHidden = encodeURIComponent(document.getElementById('topic-id').value);
                var groupIdHidden = document.getElementById('group-id');
                var groupUrlHidden = document.getElementById('group-url');

                var groupParam;
                if (groupIdHidden != null) {
                    groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
                } else {
                    groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
                }

                var params = groupParam + "&topicId=" + topicIdHidden + "&message=" + messageText;
                var editType = document.getElementById('edit-type').value;
                var currentPage = document.getElementById('current-page').value;
                var reqPath;
                if (editType == "update") {
                    reqPath = habboReqPath + '/discussions/actions/updatepost';
                    params = params + "&postId=" + document.getElementById('post-id').value + "&page=" + currentPage;
                } else {
                    reqPath = habboReqPath + '/discussions/actions/savepost';
                    params = params + "&page=" + currentPage
                }

                new Ajax.Request(reqPath, {
                    method: "post", parameters: params,
                    onComplete: function (req, json) {
                        var spamMessage = document.getElementById('spam-message').value;
                        if (json && json.spam == "true") {
                            document.getElementById('post-message').value = messageTextEdit;
                            req.responseText.evalScripts();
                            Element.show("new-post-preview");
                            Element.show("new-post-entry-label");
                            Element.show("new-post-entry-message");
                        } else {
                            $('group-postlist-container').innerHTML = req.responseText;
                            $('group-postlist-container').innerHTML.evalScripts();
                            Element.hide("new-post-preview");
                            Element.hide("new-post-entry-label");
                            Element.hide("new-post-entry-message");
                        }
                        Element.show("create-post-message-button");
                        Element.show("create-post-message-lower-button");
                    }
                });
            }, true);
        }
    });
}

var previewtopic_function = function () {
    var messageText = encodeURIComponent(document.getElementById('post-message').value);
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');
    var topicName = encodeURIComponent(document.getElementById('new-topic-name').value);

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
    } else {
        groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
    }

    var params = groupParam + "&topicName=" + topicName + "&message=" + messageText;

    new Ajax.Updater('new-topic-preview-container', habboReqPath + '/discussions/actions/previewtopic', {
        method: "post", parameters: params,
        onComplete: function (req, json) {

            Element.hide("new-topic-entry-label");
            Element.hide("new-topic-name");
            Element.hide("new-post-entry-label");
            Element.hide("new-post-entry-message");

            Element.show("new-topic-preview");


            Event.observe("edit-post-message", "click", function (e) {
                Event.stop(e);
                var messageText = document.getElementById('post-message-hidden').value;
                var topicName = document.getElementById('new-topic-name').value;
                var params = "topicName=" + topicName + "&message=" + messageText;
                Element.hide("new-topic-preview");
                Element.show("new-topic-entry-label");
                Element.show("new-topic-name");
                Element.show("new-post-entry-label");
                Element.show("new-post-entry-message");
                $("post-message").focus();
                Element.scrollTo('post-message');
            }, false);

            Event.observe("save-post-message", "click", function (e) {
                Event.stop(e);
                var messageText = document.getElementById('post-message-hidden');
                var topicIdHidden = document.getElementById('topic-id');

                new Ajax.Request(habboReqPath + '/discussions/actions/savetopic', {
                    method: "post", parameters: params,
                    onComplete: function (req, json) {
                        var spamMessage = document.getElementById('spam-message').value;
                        if (json && json.spam == "true") {
                            document.getElementById('post-message').value = messageText.value;
                            req.responseText.evalScripts();
                        } else {
                            var redirectLocation = req.responseText;
                            if (redirectLocation != null) {
                                document.location = redirectLocation;
                            }
                        }
                    }
                });
            }, true);
        }
    });
}


var delete_function = function (postId) {
    var topicIdHidden = document.getElementById('topic-id');
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
    } else {
        groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
    }
    var params = groupParam + "&topicId=" + topicIdHidden.value + "&postId=" + postId;
    new Ajax.Updater('group-postlist-container', habboReqPath + '/discussions/actions/deletepost', {
        method: "post", parameters: params,
        onComplete: function (req, json) {
            req.responseText.evalScripts();

            Element.hide("new-post-preview");
            Element.hide("new-post-entry-label");
            Element.hide("new-post-entry-message");
        }
    });
}

var createNewPost = function (e) {
    console.log('createNewPost');
    Event.stop(e);
    document.getElementById('post-message').value = "";
    document.getElementById('post-id').value = null;
    Element.show("new-post-entry-message");
    Element.show("new-post-entry-label");
    $("post-message").focus();
    Element.scrollTo('post-message');
    Element.hide("create-post-message-button");
    Element.hide("create-post-message-lower-button");
    Event.observe("post-form-cancel", "click", cancel_new_post, false);
    console.log('createNewPost');
}

var cancel_new_post = function (e) {
    Event.stop(e);
    Element.show("create-post-message-button");
    Element.show("create-post-message-lower-button");
}

var closeTopicSettings = function (e) {

    if (e) Event.stop(e);
    Element.remove("topic_settings_dialog");
    hideOverlay();
}

var topic_settings_function = function (e) {
    Event.stop(e);
    var topicIdHidden = document.getElementById('topic-id');
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');
    var dialogTitle = document.getElementById('settings_dialog_header').value;
    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
    } else {
        groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
    }
    var params = groupParam + "&topicId=" + topicIdHidden.value;

    var dialog = createDialog("topic_settings_dialog", dialogTitle, 9001, 0, -1000, closeTopicSettings);
    appendDialogBody(dialog, "<p style=\"text-align:center\"><img src=\"${staticFilePath}/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>", true);
    moveDialogToCenter(dialog);
    showOverlay();
    new Ajax.Request(
        habboReqPath + "/discussions/actions/opentopicsettings",
        {
            method: "post", parameters: params, onComplete: function (req, json) {
                setDialogBody(dialog, req.responseText);
                $("topic_settings_dialog").style.width = "305px";
                Event.observe("save-topic-settings", "click", save_topic_settings_function, false);
                Event.observe("delete-topic", "click", delete_topic_confirmation_function, false);
                document.getElementsByClassName("colorlink noarrow dialogbutton delete-post").each(delete_function);
                document.getElementsByClassName("colorlink noarrow dialogbutton quote-post").each(quote_function);
                document.getElementsByClassName("colorlink noarrow dialogbutton edit-post").each(edit_function);
                Event.observe("cancel-topic-settings", "click", closeTopicSettings);
            }
        }
    );
}

var delete_topic_confirmation_function = function (e) {
    closeTopicSettings();
    var dialogTitle = document.getElementById('settings_dialog_header').value;
    var dialog = createDialog("delete-topic-confirmation", dialogTitle, 9001, 0, -1000);
    moveDialogToCenter(dialog);
    showOverlay();
    setDialogBody(dialog, getProgressNode());

    new Ajax.Request(habboReqPath + "/discussions/actions/confirm_delete_topic", {
        method: "post",
        onComplete: function (req, json) {
            setDialogBody(dialog, req.responseText);
            Event.observe($("discussion-action-cancel"), "click", function (e) { Event.stop(e); Element.remove("delete-topic-confirmation"); hideOverlay(); });
            Event.observe($("discussion-action-ok"), "click", delete_topic_function);
        }
    });
}

var save_topic_settings_function = function (e) {
    Event.stop(e);
    var topicName = document.getElementById('topic_name').value;
    var topicIdHidden = document.getElementById('topic-id');
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');
    var topicClosed = 0;
    var topicSticky = 0;

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + encodeURIComponent(groupIdHidden.value);
    } else {
        groupParam = "groupUrl=" + encodeURIComponent(groupUrlHidden.value);
    }

    if (topicName.length == 0) {
        $("topic-name-error").innerHTML = "myhabbo.discussion.error.topic_name_empty";
        $("topic-name-error").style.display = "block";
        return;
    } else {
        $("topic-name-error").innerHTML = "";
        $("topic-name-error").style.display = "none";
    }


    var form = document.getElementById('topic-settings-form');
    var type_group = form.topic_type;
    for (var i = 0; i < type_group.length; i++) {
        if (type_group[i].checked) {
            topicClosed = type_group[i].value;
        }
    }

    var sticky_group = form.topic_sticky;
    for (var i = 0; i < sticky_group.length; i++) {
        if (sticky_group[i].checked) {
            topicSticky = sticky_group[i].value;
        }
    }

    var params = groupParam + "&topicId=" + topicIdHidden.value + "&topicName=" + topicName + "&topicClosed=" + topicClosed + "&topicSticky=" + topicSticky;

    new Ajax.Updater('group-postlist-container', habboReqPath + '/discussions/actions/savetopicsettings', {
        method: "post", parameters: params,
        onComplete: function (req, json) {
            closeTopicSettings();
            req.responseText.evalScripts();
            Element.hide("new-post-entry-label");
            Element.hide("new-post-entry-message");

            Event.observe("post-form-preview", "click", preview_function, false);
            Event.observe("create-post-message", "click", create_function, false);
            document.getElementsByClassName("colorlink noarrow dialogbutton quote-post").each(quote_function);
            document.getElementsByClassName("colorlink noarrow dialogbutton edit-post").each(edit_function);
            document.getElementsByClassName("colorlink noarrow dialogbutton delete-post").each(delete_function);
            Event.observe("topic-settings", "click", topic_settings_function, false);
        }
    });
}

var delete_topic_function = function (e) {
    Event.stop(e);

    var topicIdHidden = document.getElementById('topic-id');
    var groupIdHidden = document.getElementById('group-id');
    var groupUrlHidden = document.getElementById('group-url');
    var redirectLocation;

    var groupParam;
    if (groupIdHidden != null) {
        groupParam = "groupId=" + groupIdHidden.value;
        redirectLocation = habboReqPath + "/groups/" + encodeURIComponent(groupIdHidden.value) + "/id/discussions";
    } else {
        groupParam = "groupUrl=" + groupUrlHidden.value;
        redirectLocation = habboReqPath + "/groups/" + encodeURIComponent(groupUrlHidden.value) + "/discussions";
    }

    var params = groupParam + "&topicId=" + topicIdHidden.value;
    new Ajax.Request(habboReqPath + '/discussions/actions/deletetopic', {
        method: "post", parameters: params,
        onComplete: function (req, json) {
            if (req.responseText == 'SUCCESS') {
                document.location = redirectLocation;
            }
        }
    });
}
