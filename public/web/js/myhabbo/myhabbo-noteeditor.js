
function openNoteEditor(e)
{
    Event.stop(e);

    var dialog = createDialog("note_editor_dialog", "Note editor", 9001, 0, -1000, closeEditorDialog);
    setAsWaitDialog(dialog);
    moveDialogToCenter(dialog);
    showOverlay();
    makeDialogDraggable(dialog);
    new Ajax.Request(habboReqPath+ "/myhabbo/noteeditor/editor",{
        method: "post", onComplete: function(req, json) {
            setDialogBody(dialog, req.responseText);

            Event.observe($("note-editor-preview"), "click", previewNote);
            Event.observe($("note-editor-cancel"), "click", closeEditorDialog);
        },
        evalScripts : true
    });
}

function previewNote(e)
{
    Event.stop(e);
}

function closeEditorDialog(e)
{
    Event.stop(e);
    Element.remove("note_editor_dialog");
    hideOverlay();
}
