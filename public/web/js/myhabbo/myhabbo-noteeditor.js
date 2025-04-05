var NoteEditor = {
    initialise: function () {
        Event.observe('notes-button', 'click', this.open, false);
    },
    close: function (e) {
        Event.stop(e);
        Element.remove("note_editor_dialog");
        hideOverlay();
    },
    open: function (e) {
        Event.stop(e);
        showOverlay();
        NoteEditor._createEditorDialog();
        NoteEditor._loadEditor();
    },
    _createEditorDialog: function () {
        NoteEditor.dialog = createDialog("note_editor_dialog", "", "9003", -1500, 0, NoteEditor.close);
        makeDialogDraggable(NoteEditor.dialog);
        setAsWaitDialog(NoteEditor.dialog);
        moveDialogToCenter(NoteEditor.dialog);
    },
    _loadEditor: function (noteParams, backFromPreview) {
        NoteEditor.noteParams = noteParams || "";
        console.log(noteParams);

        new Ajax.Request(habboReqPath + "/myhabbo/noteeditor/editor", {
            method: "post", parameters: NoteEditor.noteParams, onComplete: function (req, json) {
                if (NoteEditor._checkResponse(req.responseText)) {
                    setDialogBody(NoteEditor.dialog, req.responseText);
                    req.responseText.evalScripts();

                    console.log('a');
                    var limitCallback = function (limitReached) {
                        try {
                            var currentLength = $F("webstore-notes-text").length;
                            $("webstore-notes-counter").innerHTML = maxLength - currentLength;
                            if (currentLength > 0) { NoteEditor._enableContinue(); }
                            else { NoteEditor._disableContinue(); }
                        } catch (e) { }
                    };
                    console.log('b');

                    if (backFromPreview || NoteEditor.id) {
                        window.setTimeout(function () {
                            $("webstore-notes-text").focus();
                            limitCallback();
                        }, 100);
                    }
                    console.log('c');

                    var maxLength = $F("webstore-notes-maxlength");
                    limitTextarea($("webstore-notes-text"), maxLength, limitCallback);
                    if (maxLength < 0) {
                        NoteEditor._enableContinue();
                    }

                    if ($("note-editor-cancel")) { Event.observe($("note-editor-cancel"), "click", NoteEditor.close); }
                    if ($("note-editor-preview")) {
                        Event.observe($("note-editor-preview"), "click", function (e) {
                            Event.stop(e);
                            var el = Event.findElement(e, "a");

                            if (!el.className || !Element.hasClassName(el, "disabled-button")) {
                                NoteEditor.noteParams = Form.serialize($("webstore-notes-form"));
                                setAsWaitDialog(NoteEditor.dialog);
                                new Ajax.Request(habboReqPath + "/myhabbo/noteeditor/preview", {
                                    method: "post", parameters: NoteEditor.noteParams, onComplete: function (req, json) {
                                        if (NoteEditor._checkResponse(req.responseText)) {
                                            if (req.responseText.strip() == "BACK") {
                                                NoteEditor._loadEditor(NoteEditor.noteParams, true);
                                            } else {
                                                setDialogBody(NoteEditor.dialog, req.responseText);

                                                if ($("note-editor-cancel")) { Event.observe($("note-editor-cancel"), "click", NoteEditor.close); }
                                                if ($("note-editor-add")) {
                                                    Event.observe($("note-editor-add"), "click", function (e) {
                                                        var isEditing = !!NoteEditor.id;
                                                        //NoteEditor.close(e);
                                                        if (isEditing) {
                                                            NoteEditor._saveChanges();
                                                        } else {
                                                            NoteEditor._place(e);
                                                        }
                                                    });
                                                }
                                                if ($("note-editor-edit")) {
                                                    Event.observe($("note-editor-edit"), "click", function (e) {
                                                        Event.stop(e);
                                                        NoteEditor._loadEditor(NoteEditor.noteParams, true);
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
    _place: function(e) {
      if (NoteEditor.noteParams) {
        new Ajax.Request(habboReqPath + "/myhabbo/noteeditor/place", {
          method: "post", parameters: NoteEditor.noteParams, onComplete: function(req, json) {
            if (NoteEditor._checkResponse(req.responseText)) {
              if (req.responseText.strip() == "BACK") {
                NoteEditor._loadEditor(NoteEditor.noteParams, true);
              } else if (req.responseText.strip() != "") {
                $("playground").insert(req.responseText);
                var note = $("stickie-" + json);
                Element.hide(note);
                note.style.top = "10px";
                note.style.left = "10px";
                Effect.BlindDown(note, {scaleX:true, scaleY:true});
                initMovableItems();
                NoteEditor.close(e);
              }
            }
          }
        });
      }
    },
    _checkResponse: function (responseText) {
        if (responseText.strip() == "REFRESH") {
            NoteEditor.close();
            showOverlay();
            window.location.replace(window.location.href);
            return false;
        }
        return true;
    }

}
