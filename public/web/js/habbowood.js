function closeMovieDialog() {
    if ($("movie-dialog")) { Element.remove("movie-dialog"); }
}

function closePublishDialog(origin) {
    overlayActive = $('overlay').style.display;
    if ($("movie-publish-preview")) { Element.remove("movie-publish-preview"); }
    if (origin == "true" && overlayActive == "block") { hideOverlay(); }
}

function closeDeleteDialog() {
    if ($("movie-delete-confirm")) { Element.remove("movie-delete-confirm"); }
}

function closeAdministrationDialog() {
    if ($("habbomovie-administration")) { Element.remove("habbomovie-administration"); }
    toggleFlashIfMacFirefox('show', 'flashcontent');
    hideOverlay();
}

function confirmMovieDelete(title, movieId, movieName, cancelbtn, deletebtn, msg, deleterow, type) {
    var cancel_btn = "<a href=\"#\" class=\"colorlink noarrow dialogbutton\" onclick=\"closeDeleteDialog(); return false;\"><span>" + cancelbtn + "</span></a>";
    var delete_btn = "<a href=\"#\" class=\"colorlink noarrow dialogbutton\" onclick=\"deleteHabboMovie(" + movieId + ",'" + deleterow + "', '" + type + "'); return false;\"><span>" + deletebtn + "</span></a>";
    var theDiv = "<div class=\"clear\"></div>";
    var habbomovieDialog = createDialog("movie-delete-confirm", title, "10003", 0, -1000, closeDeleteDialog);
    appendDialogBody(habbomovieDialog, "<p>" + msg + "" + movieName + "</p>", true);
    appendDialogBody(habbomovieDialog, "<p>", true);
    appendDialogBody(habbomovieDialog, cancel_btn, true);
    appendDialogBody(habbomovieDialog, delete_btn, true);
    appendDialogBody(habbomovieDialog, "</p>", true);
    appendDialogBody(habbomovieDialog, theDiv, true);
    moveDialogToCenter(habbomovieDialog);
}

function deleteHabboMovie(movieId, deleteRow, type) {
    closeDeleteDialog();
    new Effect.Fade(deleteRow, { duration: 0.5 });

    if (type == "priv") {
        setTimeout("new Ajax.Updater('habbomovies-administration-unpublished'," + habboReqPath + "'/habbomovies/private/ajax/deletemovie',{method:'post',parameters:'movieId='+encodeURIComponent(" + movieId + ")});", 1000);
    }
    if (type == "publ") {
        setTimeout("new Ajax.Updater('habbomovies-administration-published'," + habboReqPath + "'/habbomovies/private/ajax/deletemovie',{method:'post',parameters:'movieId='+encodeURIComponent(" + movieId + ")});", 1000);
    }
}

function publishPreview(movieId, title, reload) {
    var habbomovieDialog = createDialog("movie-publish-preview", title, "10010", 0, -1000, closePublishDialog);
    if (reload == "true") {
        showOverlay();
    }
    new Ajax.Updater("movie-publish-preview-body",
        habboReqPath + "/habbomovies/private/ajax/publishpreview",
        {
            method: "post",
            evalScripts: true,
            parameters: "movieId=" + encodeURIComponent(movieId) + "&reload=" + encodeURIComponent(reload)
        });
    moveDialogToCenter(habbomovieDialog);
}

function executePublish(movieId, reload) {
    var genreId = $F('genre');
    closePublishDialog('false');
    new Ajax.Updater("habbomovies-administration-unpublished",
        habboReqPath + "/habbomovies/private/ajax/publishmovie",
        {
            method: "post",
            parameters: "genreId=" + encodeURIComponent(genreId) + "&movieId=" + encodeURIComponent(movieId) + "&reload=" + encodeURIComponent(reload),
            evalScripts: true
        });
}

function publishMovie(fadeRow, movieId, reload) {
    if (reload == "false") {
        new Effect.Fade(fadeRow, { duration: 0.5 });
        setTimeout("executePublish(" + movieId + "," + reload + ")", 1000);
    } else {
        var genreId = $F('genre');
        closePublishDialog('true');
        new Ajax.Request(habboReqPath + "/habbomovies/private/ajax/publishmovie",
            {
                method: "post",
                parameters: "genreId=" + encodeURIComponent(genreId) + "&movieId=" + encodeURIComponent(movieId) + "&reload=" + encodeURIComponent(reload),
                onComplete: function (t) { document.location.reload() }
            });
    }
}

function executeUnPublish(movieId) {
    new Ajax.Updater("habbomovies-administration-published",
        habboReqPath + "/habbomovies/private/ajax/unpublishmovie",
        {
            method: "post",
            parameters: "movieId=" + encodeURIComponent(movieId),
            evalScripts: true
        });
}

function unPublish(fadeRow, movieId) {
    new Effect.Fade(fadeRow, { duration: 0.5 });
    setTimeout("executeUnPublish(" + movieId + ")", 1000);
}

function createAdmBox(admBoxId, admBoxZIndex) {
    var overlay = $("overlay");
    var admBox = overlay.parentNode.insertBefore(Builder.node("div", { id: admBoxId }), overlay.nextSibling);
    admBox.style.zIndex = (admBoxZIndex || 9001);
    return admBox;
}

function toggleFlashIfMacFirefox(state, divName) {
    var c_os = navigator.platform;
    var c_ua = navigator.appName;
    if ((c_os == "Mac" || c_os == "MacIntel" || c_os == "MacPPC") && (c_ua == "Netscape" || c_ua == "Mozilla" || c_ua == "Firefox")) {
        if ($(divName)) {
            if (state == "hide") {
                $(divName).style.display = "none";
            }
            if (state == "show") {
                $(divName).style.display = "block";
            }
        }
    }
}

function openMovieAdministration() {
    toggleFlashIfMacFirefox('hide', 'flashcontent');
    habbomovieDialog = createAdmBox("habbomovie-administration", "10002");
    Element.hide("habbomovie-administration");
    moveDialogToCenter(habbomovieDialog);

    new Ajax.Updater("habbomovie-administration",
        habboReqPath + "/habbomovies/private/ajax/showmovieadmin",
        {
            evalScripts: true,
            onComplete: function () {
                showOverlay();
                new Ajax.Updater("habbomovies-administration-unpublished",
                    habboReqPath + "/habbomovies/private/ajax/showunpublished",
                    { evalScripts: true });
                Element.hide("habbomovies-administration-published");
            }
        });
    setTimeout("Element.show('habbomovie-administration')", 500);
}

function switchToPublished() {
    Element.hide("habbomovies-administration-unpublished");
    Element.removeClassName("habbomovies-administration-link-unpublished", "selected");
    Element.show("habbomovies-administration-published");
    $("habbomovies-administration-published").innerHTML = getProgressNode();
    Element.addClassName("habbomovies-administration-link-published", "selected");
    new Ajax.Updater("habbomovies-administration-published",
        habboReqPath + "/habbomovies/private/ajax/showpublished");
}

function switchToUnpublished() {
    Element.hide("habbomovies-administration-published");
    Element.removeClassName("habbomovies-administration-link-published", "selected");
    Element.show("habbomovies-administration-unpublished");
    $("habbomovies-administration-unpublished").innerHTML = getProgressNode();
    Element.addClassName("habbomovies-administration-link-unpublished", "selected");
    new Ajax.Updater("habbomovies-administration-unpublished",
        habboReqPath + "/habbomovies/private/ajax/showunpublished",
        { evalScripts: true });
}

function setxmov(movieId) {
    xmov = movieId;
}

function rateMovie(movieId, rating) {
    new Ajax.Updater("hwood-rating-stars-" + movieId, habboReqPath + "/habbomovies/ajax/ratemovie",
        {
            method: "post",
            parameters: "movieId=" + encodeURIComponent(movieId) + "&newRating=" + encodeURIComponent(rating),
            evalScripts: true
        }
    );
}
