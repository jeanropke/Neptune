var element_data = [];
var currentElement = false;

function bringElementOnTop(element) {
    var oldZ = element.style.zIndex;
    var newZ = 0;

    document.getElementsByClassName("movable", "playground").each(function(element) {
        var tempZ = parseInt(element.style.zIndex);
        if (tempZ > oldZ) {element.style.zIndex = tempZ - 1;}
        if (tempZ >= newZ) {
			newZ = tempZ;
        }
	});

	element.style.zIndex = newZ + 1;
}

function getNextZIndex() {
    var nextZ = 0;
    document.getElementsByClassName("movable", "playground").each(function(element) {
        var tempZ = parseInt(element.style.zIndex);
        if (tempZ >= nextZ) { nextZ = tempZ; }
	});

    return nextZ + 1;
}

function getElementCount() {
	return document.getElementsByClassName("movable", "playground").length;
}

var ZetaWatcher = Class.create();
ZetaWatcher.prototype = {

	initialize: function(element) {
		this.element = element;
		this.element.onclick = this.updatePositions.bindAsEventListener(this);
	},

	updatePositions: function(evt) {
        if(!isNotWithinPlayground(this.element)) {
        	bringElementOnTop(this.element);
            savePosition(this.element);
        }
	}
};

var EditButtonObserver = Class.create();
EditButtonObserver.prototype = {
	initialize: function() {},
	onStart: function() { document.body.className = "dragging"; },
	onEnd: function() { document.body.className = ""; }
};

function editBg(e) {
	var pointer = [Event.pointerX(e), Event.pointerY(e)];
	var pgPos = Position.cumulativeOffset($("playground"));
	var editor = $("dialog-background-inventory");
	var pg = $("playground");

    var size = Element.getDimensions(editor);
	editor.style.left = (pointer[0] - pgPos[0] - size.width) + "px";
	editor.style.top = (pointer[1] - pgPos[1]) + "px";

    editor.style.visibility = "visible";
    initBackgrounds();
}

function savePosition(element)
{
    if (element.id)
    {
        var i = element.id; var l = element.style.left; var t = element.style.top;
        var value = i.substring(i.indexOf("-")+1) + ":" + l.substring(0,l.length-2) + "," + t.substring(0,t.length-2) + "," + element.style.zIndex +  "/";
        element_data[element.id] = value;
    }
}

function attachStickerObserver(id) {
    Event.observe("sticker-" + id + "-edit", "click", function(e) {
        Event.stop(e);
        var stickerToRemove = $("remove_sticker_id");

        stickerToRemove.value = "sticker-" + id;
        var editStickerDialog = $("dialog-edit-sticker");
        var stickerElement = $("sticker-" + id);
        editStickerDialog.style.top = stickerElement.style.top;
        editStickerDialog.style.left = stickerElement.style.left;
        bringElementOnTop(editStickerDialog);
        editStickerDialog.show();
    }, false);
}

function clearDraggables() {
    Draggables.drags.each(function(element) {
        element.destroy();

    });
}

function isEditModeDisabled(req) {
	return req.responseText == "EDIT_MODE_DISABLED";
}

var cancelObserver = function(e) {
	Event.stop(e);

	Effect.SlideUp($("top-toolbar"), { duration: 1 });

	cancelEditing();
}

var saveStart = 0;
var saveObserver = function(e) {
	Event.stop(e);
	if (showSaveOverlay()) {
		saveStart = new Date().getTime();
		new Ajax.Updater('edit-save', habboReqPath  + getSaveEditingActionName(), { method:'post', evalScripts:true, postBody:generatePostBody() });
	}
}

function waitAndGo(url) {
	var saveEnd = new Date().getTime();
	var delay = saveEnd - saveStart;
	if (delay < 1000) delay = 1000;
	window.setTimeout(function() { location.href = url; }, delay);
}

function generatePostBody() {
    var stickie_values = "";
    var sticker_values = "";
    var widget_values = "";
    var background_value = element_data['background'];

    document.getElementsByClassName("movable", "playground").each(function(element) {
        if (Element.hasClassName(element, "stickie")) {
			value = element_data[element.id];
            if (value) {
                stickie_values += value;
            }
        } else if (Element.hasClassName(element, "sticker")) {
			value = element_data[element.id];
            if (value) {
                sticker_values += value;
            }
        } else if (Element.hasClassName(element, "widget")) {
			value = element_data[element.id];
            if (value) {
                widget_values += value;
            }
        }
    });

    var postBody = "";
    if (sticker_values.length > 0) {
		postBody='stickers='+sticker_values;
	}
	if (stickie_values.length > 0) {
		if(postBody.length > 0) {
			postBody+='&';
		}
		postBody+='stickienotes='+stickie_values;
	}

    if (widget_values.length > 0) {
		if(postBody.length > 0) {
			postBody+='&';
		}
		postBody+='widgets='+widget_values;
	}

	if (background_value != null) {
		if(postBody.length > 0) {
			postBody+='&';
		}
		postBody+='background='+background_value;
	}

    return postBody;

}

function initEditToolbar() {
	Event.observe($("save-button"), "click", saveObserver, false);
	Event.observe($("cancel-button"), "click", cancelObserver, false);
	Effect.SlideDown($("top-toolbar"), { duration: 1.5 });
}

function initMovableItems() {
	clearDraggables();

	document.getElementsByClassName("movable", "playground").each(function(element) {
		new Draggable(element, {
            handle:element.id+"-handle",
            revert:isNotWithinPlayground,
			starteffect:Prototype.emptyFunction,
            endeffect:function(element) {
			    if(!isNotWithinPlayground(element)) {
                    bringElementOnTop(element);
                    savePosition(element);
                }
		    }, zindex:9000
		});
		new ZetaWatcher(element);
	});
	Draggables.addObserver(new EditButtonObserver());
	initDraggableDialogs();
}

function placeWidget(id,privileged) {
	if (!isElementLimitReached()) {
		doPlaceWidget(id, privileged);
		closeWidgetInventory();
		hideOverlay();
	}
}

function doPlaceWidget(id, privileged) {
	if (!isElementLimitReached()) {
		new Ajax.Request(habboReqPath + "/myhabbo/widget/add", {
			parameters: "widgetId=" + encodeURIComponent(id) +"&privileged=" + privileged + "&zindex="+getNextZIndex(),
			onSuccess: function(req, jsonObj) {
				new Insertion.Bottom("playground", req.responseText);
	            initMovableItems();
				Element.hide($("widget-" + jsonObj.id));
				new Effect.Appear($("widget-" + jsonObj.id));

            },
			onFailure: function(req) {
				showEditErrorDialog();
			}
		});
	}
}

function changeBg(background, backgroundId) {
	closeBackgroundInventory();
	hideOverlay();

    var allElements = document.getElementsByClassName("movable", "playground");
    var iterations = allElements.length;

    if (iterations == 0) {
        doChangeBg(background, backgroundId);
    } else {
        allElements.each(function(element) {
		    window.setTimeout(function() {
			   new Effect.Fade(element, { duration: 0.5 });
			   iterations = iterations - 1;
			   if (iterations == 0) {
			       window.setTimeout(function() { doChangeBg(background, backgroundId); }, 800);
			   }
	        }, 300 + Math.floor(Math.random() * 500));
	    });
    }

}

function doChangeBg(background, backgroundId) {
	element_data['background'] = backgroundId + ":" + background;

    document.getElementsByClassName("movable", "playground").each(function(element) {
        element.hide();
		window.setTimeout(function() { new Effect.Appear(element, { duration: 0.8 }); }, 200 + Math.floor(Math.random() * 2500));
	});
	$("mypage-bg").className = background;
}

function placeImageOnPage(code) {
	if (!isElementLimitReached()) {
		doPlaceImageOnPage(code);
	    closeStickerInventory();
	    hideOverlay();
    }
}

function doPlaceImageOnPage(code, placeAll) {
	if (!isElementLimitReached()) {
		var qs = "selectedStickerId=" + encodeURIComponent(code) + "&zindex="+getNextZIndex();
		if (placeAll) {
			qs += "&placeAll=true&elementCount="+getElementCount();
		}
		new Ajax.Request(habboReqPath + "/myhabbo/sticker/place_sticker", {
			parameters: qs, evalScripts: true,
			onSuccess: function(req, json) {
				if (isEditModeDisabled(req)) {
					editModeDisabledDialog.show();
				} else {
					new Insertion.Bottom("playground", req.responseText);
					for (var i = 0; i < json.length; i++) {
						Element.hide($("sticker-"+json[i]));
						new Effect.Appear($("sticker-"+json[i]));
					}
		            initMovableItems();
		        }
			}
	    });
    }
}

function initComponentEditing() {
	document.getElementsByClassName("*button edit-stickie*").each(
		function(el) {
			var stickieId = el.id.substring("stickie-".length, el.id.length-"-edit".length);

			Event.observe(el, "click", function(e) {
				Event.stop(e);
				stickieEditDialog.setStickieId(stickieId);
				stickieEditDialog.show();
			}, false);
		}
	);
}

var editMenuOpen = false;
var chosenElement = null;
function openEditMenu(e, id, type, elementId, ownerId) {
	Event.stop(e);
	closeEditMenu();
	var pos = Position.cumulativeOffset($(elementId));
	var menu = $("edit-menu");
	menu.style.top = (pos[1] - 5) + "px";
	menu.style.left = (pos[0] - 5) + "px";
	editMenuOpen = true;
	chosenElement = { id:id, type:type, elementId:elementId};

	if (type == "widget" || type == "stickie") {
		var element = $(type + "-" + id);
		updateSkinMenu(findFirstDivChild(element));

		if (Element.hasClassName(element, "ProfileWidget") || Element.hasClassName(element, "GroupInfoWidget")) {
			$("edit-menu-remove").style.display = "none";
		}

		if (Element.hasClassName(element, "RatingWidget")) {
			$("rating-edit-menu").style.display = "block";
		}

		if (Element.hasClassName(element, "GuestbookWidget")) {
			$("edit-menu-gb-availability").style.display = "block";
		}

		if (Element.hasClassName(element, "HighScoresWidget")) {
			$("highscorelist-edit-menu").style.display = "block";
		}

		if (Element.hasClassName(element, "TraxPlayerWidget")) {
			$("edit-menu-trax-select").style.display = "block";
			populateTraxSelect();
		}

		if (type == "stickie") {
			$("edit-menu-stickie").style.display = "block";
		}
	}

	if (ownerId) {
		$("edit-menu-remove-group-warning").style.display = "block";
	}
}

function closeEditMenu() {
	var menu = $("edit-menu");
	menu.style.left = "-1500px";
	editMenuOpen = false;
	chosenElement = null;
	$("edit-menu-remove").style.display = "block";
	$("edit-menu-skins").style.display = "none";
	$("edit-menu-stickie").style.display = "none";
	$("rating-edit-menu").style.display = "none";
	$("highscorelist-edit-menu").style.display = "none";
	$("edit-menu-remove-group-warning").style.display = "none";
	$("edit-menu-gb-availability").style.display = "none";
	$("edit-menu-trax-select").style.display = "none";
}

function updateSkinMenu(element) {
	$A($("edit-menu-skins-select").options).each(function(option) {
		if (element.className.substring(7) == (option.id.substring(23))) { $("edit-menu-skins-select").selectedIndex = option.index; }
	});
	$("edit-menu-skins").style.display = "block";
}

function handleGuestbookPrivacySettings(e) {
	Event.stop(e);
	if (chosenElement) {
		new Ajax.Request(habboReqPath + "/myhabbo/guestbook/configure", {
				parameters: "widgetId=" + encodeURIComponent(chosenElement.id)
			});
		closeEditMenu();
	}
}

function handleTraxplayerTrackChange(e) {
	var traxplayerOption = $F('trax-select-options');
	Event.stop(e);
	if (chosenElement && traxplayerOption) {
		new Ajax.Updater('traxplayer-content', habboReqPath + "/myhabbo/traxplayer/select_song", {
				parameters: "songId=" + encodeURIComponent(traxplayerOption) + "&widgetId=" + encodeURIComponent(chosenElement.id),
				evalScripts: true
			});
		closeEditMenu();
	} else {
		void(0);
	}
}

function populateTraxSelect() {
	var targetSelect = $('trax-select-options');
	var sourceSelectTemp = $('trax-select-options-temp');
  	if(targetSelect.options.length==0 && sourceSelectTemp) {
	      var sourceSelect = sourceSelectTemp.cloneNode(true);
          var aLength = sourceSelect.options.length;
          for (var i = 0; i < aLength; i++) {
              var sourceOption = sourceSelect.options[i].cloneNode(true);
              targetSelect.appendChild(sourceOption);
          }
    }
    if(!sourceSelectTemp) {
    	targetSelect.hide();
    }
}

function handleEditRemove(e) {
	Event.stop(e);
	if (chosenElement) {
		var url, params;
		if (chosenElement.type == "sticker") {
			url = "/myhabbo/sticker/remove_sticker";
			params = "stickerId=" + encodeURIComponent(chosenElement.id);
		} else if (chosenElement.type == "widget") {
			url = "/myhabbo/widget/delete";
			params = "widgetId=" + encodeURIComponent(chosenElement.id);
		} else if (chosenElement.type == "stickie") {
			url = "/myhabbo/stickie/delete";
			params = "stickieId=" + encodeURIComponent(chosenElement.id);
		}
		if (url) {
			new Ajax.Request(habboReqPath + url, {
				parameters: params,
				onComplete: function(req) {
					setTimeout(function() {req.responseText.evalScripts()}, 10);
					if (isEditModeDisabled(req)) {
						editModeDisabledDialog.show();
					} else {
						new Effect.Fade(chosenElement.type + "-" + chosenElement.id, {
							afterFinish : function(effect) {
		                    	Element.remove(effect.element);
                            }
						});
						loadWebStore(function() {
							if (window.WebStore && WebStore.Inventory.inventoryOpened) {
								WebStore.Inventory.waitingForReload = true;
							}
						});
                    }
                    closeEditMenu();
				}
			});
		}
	}
}

function findFirstDivChild(element) {
	var skinElement = element.firstChild;
	while (skinElement.nodeName != "DIV") {  // skip any #text nodes
		skinElement = skinElement.nextSibling;
	}
	return skinElement;
}

function handleEditSkinChange(e) {
	Event.stop(e);
	if (chosenElement) {
		var url, params,skinheader;
		if (chosenElement.type == "widget") {
			url = habboReqPath + "/myhabbo/widget/edit";
			params = "widgetId=" + encodeURIComponent(chosenElement.id) + "&skinId=" + encodeURIComponent($F('edit-menu-skins-select'));
		} else if (chosenElement.type == "stickie") {
			url = habboReqPath + "/myhabbo/stickie/edit";
			params = "stickieId=" + encodeURIComponent(chosenElement.id) + "&skinId=" + encodeURIComponent($F('edit-menu-skins-select'));
		}
		if (url) {
			new Ajax.Request(url, {
				parameters: params,
				onComplete: function(req, jsonObj) {
					setTimeout(function() {req.responseText.evalScripts()}, 10);
					if (isEditModeDisabled(req)) {
						editModeDisabledDialog.show();
					} else {
						var element = $(jsonObj.type + "-" + jsonObj.id);
					    window.setTimeout(function() {
						   new Effect.Fade(element, { duration: 0.3 });
						   window.setTimeout(function() {
								element.hide();
								window.setTimeout(function() { new Effect.Appear(element, { duration: 0.5, afterFinish: function() {
									if (isNotWithinPlayground(element)) {
										var pg = $("playground");
										var pgWidthHeight = Element.getDimensions(pg);
										var elWidthHeight = Element.getDimensions(element);

										if (element.offsetTop + elWidthHeight.height > pgWidthHeight.height) {
											element.style.top = (pgWidthHeight.height - elWidthHeight.height - 2) + "px";
										}
										if (element.offsetLeft + elWidthHeight.width > pgWidthHeight.width) {
											element.style.left = (pgWidthHeight.width - elWidthHeight.width - 2) + "px";
										}
										if (element.offsetTop < 0) { element.style.top = 0; }
										if (element.offsetLeft < 0) { element.style.left = 0; }

										savePosition(element);
									}
								} }); }, 200);
							   	findFirstDivChild(element).className = jsonObj.cssClass;
						    }, 400);
				        }, 100);


					}
				}
			});
		}
	}
	closeEditMenu();
}

function getElementsInInvalidPositions() {
    var invalidPositions = [];
    document.getElementsByClassName("movable", "playground").each(function(element) {
        if (isNotWithinPlayground(element)) { invalidPositions.push(element); };
    });
    return invalidPositions;
}

function showHabboHomeMessageBox(title, message, buttonText) {
    showOverlay();
    var dialog = createDialog("myhabbo-message", title, "9003");
    var link = Builder.node("a", { href:"#", className:"colorlink noarrow dialogbutton" }, [ Builder.node("span", buttonText) ]);
    appendDialogBody(dialog, Builder.node("p", message));
    appendDialogBody(dialog, Builder.node("p", [ link ]));
    Event.observe(link, "click", function(e) { Event.stop(e); closeHabboHomeMessageBox() }, false);
    moveOverlay("9002");
    makeDialogDraggable(dialog);
	moveDialogToCenter(dialog);
}

function closeHabboHomeMessageBox() {
	Element.remove("myhabbo-message");
    hideOverlay();
}

/*
/* eSticker editor
*/

function previewEsticker(gender,figure,pose,gesture,bdirection) {
	if (window.WebStore) {
		WebStore.StickerEditor.preview({
			"gender":     gender,
			"figure":     figure,
			"pose":       pose,
			"gesture":    gesture,
			"bdirection": bdirection
		});
	}
}

function closeEditor() {
	if (window.WebStore) { WebStore.close(); }
}

/* \eSticker editor */
