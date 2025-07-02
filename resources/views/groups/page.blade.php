@extends('layouts.master', ['body' => $editing ? 'editmode' : 'viewmode', 'menuId' => 'home_group', 'skipHeadline' => true])

@section('title', 'Group Home: ' . $owner->name)

@section('content')

    <script language="JavaScript" type="text/javascript">
        Event.onDOMReady(function() { initView({{ $owner->id }}); });
    </script>

    @if (user() && user()->id == $owner->owner_id)
        <script language="JavaScript" type="text/javascript">
            Event.onDOMReady(function() {
                attachGroupBadgeEditorButtonObserver({{ $owner->id }}, "group-tools-badge", "Badge Editor");
                attachGroupSettingsObserver({{ $owner->id }}, );
            });
        </script>
    @endif

    @if (!$editing)
    @else
        <script language="JavaScript" type="text/javascript">
            function isElementLimitReached() {
                if (getElementCount() >= 350) {
                    showHabboHomeMessageBox("Error", "You have already reached the maximum number of elements on the page. Remove a sticker, note or widget to be able to place this item.",
                        "Close");
                    return true;
                }
                return false;
            }

            function cancelEditing(expired) {
                location.replace("/groups/actions/cancelEditingSession" + (expired ? "?expired=true" : ""));
            }

            function getSaveEditingActionName() {
                return '/groups/actions/saveEditingSession';
            }

            function showEditErrorDialog() {
                var closeEditErrorDialog = function(e) {
                    if (e) {
                        Event.stop(e);
                    }
                    Element.remove($("myhabbo-error"));
                    hideOverlay();
                }
                var dialog = createDialog("myhabbo-error", "", false, false, false, closeEditErrorDialog);
                setDialogBody(dialog,
                    '<p>Error occurred! Please try again in couple of minutes.</p><p><a href="#" class="new-button" id="myhabbo-error-close"><b>Close</b><i></i></a></p><div class="clear"></div>'
                );
                Event.observe($("myhabbo-error-close"), "click", closeEditErrorDialog);
                moveDialogToCenter(dialog);
                makeDialogDraggable(dialog);
            }

            document.observe("dom:loaded", function() {
                showInfoDialog("session-start-info-dialog",
                    "Your editing session will time out in 30 minutes.",
                    "Ok",
                    function(e) {
                        Event.stop(e);
                        Element.hide($("session-start-info-dialog"));
                        hideOverlay();
                    });
                var timeToTwoMinuteWarning = 1676000;
                if (timeToTwoMinuteWarning > 0) {
                    setTimeout(function() {
                        showInfoDialog("session-ends-warning-dialog",
                            "Your editing session will time out in 2 minutes.",
                            "Ok",
                            function(e) {
                                Event.stop(e);
                                Element.hide($("session-ends-warning-dialog"));
                                hideOverlay();
                            });
                    }, timeToTwoMinuteWarning);
                }
            });

            function showSaveOverlay() {
                var invalidPos = getElementsInInvalidPositions();
                if (invalidPos.length > 0) {
                    $A(invalidPos).each(function(el) {
                        Element.scrollTo(el);
                        Effect.Pulsate(el);
                    });
                    showHabboHomeMessageBox("Whoops! You can\'t do that!",
                        "Sorry, but you can\'t place your stickers, notes or widgets here. Close the window to continue editing your page.", "Close");
                    return false;
                } else {
                    showOverlay(null, 'Saving');
                    return true;
                }
            }
        </script>
    @endif

    <div id="mypage-wrapper">
        <div id="mypage-left-panel">
            <div id="mypage-top-nav"></div>
            <div id="header-bar-outer">
                <div id="header-bar" class="box dark-blue">
                    <div class="box-header">
                        <div></div>
                    </div>
                    <div class="box-body">
                        <div class="box-content clearfix">
                            <span id="header-bar-text">
                                Group Home: {{ $owner->name }}
                            </span>
                            @auth
                                @if ($owner->getMember(user()->id) && !$editing)
                                    @if (user()->favourite_group == $owner->id)
                                        <a href="#" class="toolbutton deselect-favorite-group" id="deselect-favorite-button" style="float: right"><span>Remove favorite</span></a>
                                    @else
                                        <a href="#" class="toolbutton select-favorite-group" id="select-favorite-button" style="float: right"><span>Make favorite</span></a>
                                    @endif
                                @endif
                                @if ($owner->owner_id == user()->id && !$editing)
                                    <a href="{{ url('/') }}/groups/actions/startEditingSession/{{ $owner->id }}" class="toolbutton edit"><span>Edit</span></a>
                                    <div id="group-tools">
                                        <a href="#" class="toolbutton group-badge" id="group-tools-badge"><span>Badge</span></a>
                                        <a href="#" class="toolbutton group-settings" id="group-settings-button"><span>Settings</span></a>
                                        <a href="#" class="toolbutton memberlist" id="group-tools-members"><span>Members</span></a>
                                    </div>
                                @elseif(!$editing)
                                    @if ($owner->getMember(user()->id))
                                        <a href="#" class="toolbutton leave-group" id="leave-group-button" style="float: right">
                                            <span>Leave group</span>
                                        </a>
                                    @else
                                        <a href="#" class="toolbutton join-group" id="join-group-button" style="float: right">
                                            <span>Join group</span>
                                        </a>
                                    @endif
                                    <a href="{{ url('/') }}/hotel/groups" class="toolbutton" id="creategrp-button">
                                        <span>Create your own Group</span>
                                    </a>
                                    <a href="#" class="toolbutton reporting-start" id="reporting-button" style="float: right">
                                        <span>Report</span>
                                    </a>
                                    <a href="#" class="toolbutton reporting-stop" id="stop-reporting-button" style="float: right; display: none">
                                        <span>Stop reporting</span>
                                    </a>
                                @endif
                            @endauth
                            @guest
                                <a href="{{ url('/') }}/groups/actions/joinAfterLogin?groupId={{ $owner->id }}" class="toolbutton" id="join-button">
                                    <span>Log in to join this Group</span>
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            @if ($editing)
                <div id="top-toolbar">
                    <div>
                        <a href="#" id="notes-button" class="toolbutton notes"><span>Notes</span></a>
                        <a href="#" id="stickers-button" class="toolbutton stickers"><span>Stickers</span></a>
                        <a href="#" id="widgets-button" class="toolbutton widgets"><span>Widgets</span></a>
                        <a href="#" id="backgrounds-button" class="toolbutton backgrounds"><span>Backgrounds</span></a>
                        <a id="cancel-button" href="#" class="toolbutton cancel"><span>Cancel</span></a>
                        <a id="save-button" href="#" class="toolbutton save"><span>Save</span></a>
                    </div>
                </div>
            @endif

            <div id="grouptabs">
                <ul>
                    <li id="selected"><a href="{{ $owner->url }}">Front Page</a></li>
                    <li>
                        <a href="{{ $owner->url }}/discussions">Discussion Forum</a>
                    </li>
                </ul>
            </div>

            <br clear="all">

            <div id="mypage-top-spacer"></div>
            @php($items = $owner->items)
            <div id="mypage-bg" class="b_{{ $items->where('data', 'background')->first() ? $items->where('data', 'background')->first()->store->class : '' }}">
                <div id="playground">
                    @foreach ($items->whereNotNull(['x'], ['y'], ['z']) as $item)
                        @php($itemStore = $item->store)
                        @switch($itemStore->type)
                            @case('s')
                                {{-- sticker --}}
                                @include('home.sticker')
                            @break

                            @case('commodity')
                                {{-- stickie --}}
                                @include('home.stickie')
                            @break

                            @case('gw')
                                {{-- widget --}}
                                @include('home.widgets.' . strtolower($itemStore->class))
                            @break
                        @endswitch
                    @endforeach
                </div>
                <div id="mypage-ad">
                </div>
            </div>
        </div>
    </div>

    <div id="guestbook-delete-dialog" class="dialog-grey" style="display:none">
        <div class="dialog-grey-top dialog-grey-handle">
            <div>
                <h3><span>Delete message</span></h3>
            </div>
            <a href="#" class="dialog-grey-exit" id="guestbook-delete-dialog-exit">
                <img src="{{ cms_config('site.web.url') }}/images/dialogs/grey-exit.gif" width="12" height="12" alt="">
            </a>
        </div>
        <div class="dialog-grey-content">
            <div id="confirm-dialog-body" class="dialog-grey-body">
                <form method="post" id="guestbook-delete-form">
                    <input type="hidden" name="entryId" id="guestbook-delete-id" value="" />
                    <p>Tem certeza que quer apagar sua mensagem?</p>
                    <p>
                        <a href="#" id="guestbook-delete-cancel" class="toolbutton"><span><b>Cancel</b></span><i></i></a>
                        <a href="#" id="guestbook-delete" class="toolbutton cancel"><span><b>Delete</b></span><i></i></a>
                    </p>
                    <br style="clear: both">
                </form>
                <div class="clear"></div>
            </div>
        </div>
        <div class="dialog-grey-bottom">
            <div></div>
        </div>
    </div>

    <div id="guestbook-form-dialog" class="dialog-grey">
        <div class="dialog-grey-top dialog-grey-handle">
            <div>
                <h3><span>Create a message</span></h3>
            </div>
            <a href="#" class="dialog-grey-exit" id="guestbook-form-dialog-exit">
                <img src="{{ cms_config('site.web.url') }}/images/dialogs/grey-exit.gif" width="12" height="12" alt="">
            </a>
        </div>
        <div class="dialog-grey-content">
            <div id="confirm-dialog-body" class="dialog-grey-body">
                <div id="guestbook-form-tab" class="dialog-content">
                    <form method="post" id="guestbook-form">
                        <p>
                            Warning: max 200 characters
                            <input type="hidden" name="ownerId" value="441794" />
                        </p>
                        <div>
                            <textarea cols="15" rows="5" name="message" id="guestbook-message"></textarea>
                            <script type="text/javascript">
                                bbcodeToolbar = new Control.TextArea.ToolBar.BBCode("guestbook-message");
                                bbcodeToolbar.toolbar.toolbar.id = "bbcode_toolbar";
                                var colors = {
                                    "red": ["#d80000", "Red"],
                                    "orange": ["#fe6301", "Orange"],
                                    "yellow": ["#ffce00", "Yellow"],
                                    "green": ["#6cc800", "Green"],
                                    "cyan": ["#00c6c4", "Cyan"],
                                    "blue": ["#0070d7", "Blue"],
                                    "gray": ["#828282", "Gray"],
                                    "black": ["#000000", "Black"]
                                };
                                bbcodeToolbar.addColorSelect("Colours", colors, true);
                            </script>
                        </div>
                        <div class="guestbook-toolbar clearfix">
                            <a href="#" id="guestbook-form-cancel" class="toolbutton"><span><b>Cancel</b></span><i></i></a>
                            <a href="#" id="guestbook-form-preview" class="toolbutton notes" style="float: right"><span><b>Preview</b></span><i></i></a>
                        </div>
                    </form>
                </div>
                <div id="guestbook-preview-tab" class="dialog-content">&nbsp;</div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="dialog-grey-bottom">
            <div></div>
        </div>
    </div>

    <div id="group-memberlist" class="dialog-grey dialog-greytab">
        <div class="dialog-greytab-top dialog-grey-handle">
            <div>
                <h3><span>Members</span></h3>
            </div>
            <a href="#" class="dialog-grey-exit" id="group-memberlist-exit">
                <img src="/web//images/dialogs/grey-exit.gif" width="12" height="12" alt="">
            </a>
        </div>
        <div class="dialog-greytab-tabs">
            <div class="dialog-greytab-tabs-content">
                <ul>
                    <li class="selected" id="group-memberlist-link-members"><a href="#">Members</a></li>
                    <li id="group-memberlist-link-pending"><a href="#">Pending members</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="dialog-greytab-tabs-bottom">
            <div></div>
        </div>
        <div class="dialog-greytab-content">
            <div id="group-memberlist-body" class="dialog-greytab-body">
                <div id="group-memberlist-members-search" class="clearfix">
                    <input type="text" id="group-memberlist-members-search-string">
                    <a id="group-memberlist-members-search-button" href="#" class="colorlink orange last"><span>Search</span></a>
                </div>
                <div id="group-memberlist-members" style="clear: both; display: none;"></div>

                <div id="group-memberlist-members-buttons" class="clearfix" style="display: none;">
                    <a href="#" class="toolbutton group-memberlist-button-disabled" id="group-memberlist-button-give-rights"><span>Give rights</span></a>
                    <a href="#" class="toolbutton group-memberlist-button-disabled" id="group-memberlist-button-revoke-rights"><span>Revoke rights</span></a>
                    <a href="#" class="toolbutton group-memberlist-button-disabled" id="group-memberlist-button-remove"><span>Remove</span></a>

                    <a href="#" id="group-memberlist-button-close" class="toolbutton"><span>Close</span></a>
                </div>
                <div id="group-memberlist-pending" style="clear: both; display: none;"></div>
                <div id="group-memberlist-pending-buttons" class="clearfix" style="display: none;">
                    <a href="#" class="toolbutton group-memberlist-button-disabled" id="group-memberlist-button-accept"><span>Accept</span></a>
                    <a href="#" class="toolbutton group-memberlist-button-disabled" id="group-memberlist-button-decline"><span>Reject</span></a>

                    <a href="#" id="group-memberlist-button-close2" class="toolbutton"><span>Close</span></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="dialog-greytab-bottom">
            <div></div>
        </div>
    </div>

    <div id="dialog-group-settings" class="dialog-grey">
        <div class="dialog-grey-top dialog-grey-handle">
            <div>
                <h3><span>Group settings</span></h3>
            </div>
            <a href="#" class="dialog-grey-exit" id="dialog-group-settings-exit">
                <img src="{{ cms_config('site.web.url') }}/images/dialogs/grey-exit.gif" width="12" height="12" alt="">
            </a>
        </div>
        <div class="dialog-grey-content">
            <div id="dialog-group-settings-body" class="dialog-grey-body">
            </div>
        </div>
        <div class="dialog-grey-bottom">
            <div></div>
        </div>
    </div>

    <div id="join-group-dialog" class="dialog-grey"></div>

    @if ($editing)
        <div id="edit-menu" class="menu" style="left: -1500px; top: 264px;">
            <div class="menu-header">
                <div class="menu-exit" id="edit-menu-exit"><img src="https://casper.fun/web-gallery/images/dialogs/menu-exit.gif" alt="" width="11" height="11">
                </div>
                <h3>Edit</h3>
            </div>
            <div class="menu-body">
                <div class="menu-content">
                    <form action="#" onsubmit="return false;">
                        <div id="edit-menu-skins" style="display: none;">
                            <select id="edit-menu-skins-select">
                                <option value="1" id="edit-menu-skins-select-defaultskin">Default</option>
                                <option value="6" id="edit-menu-skins-select-goldenskin">Golden</option>

                                <option value="3" id="edit-menu-skins-select-metalskin">Metal</option>
                                <option value="5" id="edit-menu-skins-select-notepadskin">Notepad</option>
                                <option value="2" id="edit-menu-skins-select-speechbubbleskin">Speech Bubble</option>
                                <option value="4" id="edit-menu-skins-select-noteitskin">Stickie Note</option>
                                @if (!user()->subscription->isExpired())
                                    <option value="8" id="edit-menu-skins-select-hc_pillowskin">HC Bling</option>
                                    <option value="7" id="edit-menu-skins-select-hc_machineskin">HC Scifi</option>
                                @endif
                                @if (user()->rank > 5)
                                    <option value="9" id="edit-menu-skins-select-nakedskin">Staff - Naked Skin</option>
                                @endif
                            </select>
                        </div>
                        <div id="edit-menu-stickie" style="display: none;">

                            <p>Warning! If you click 'Remove', the note will be permanently deleted.</p>
                        </div>
                        <div id="rating-edit-menu" style="display: none;">
                            <input type="button" id="ratings-reset-link" value="Reset rating">
                        </div>
                        <div id="highscorelist-edit-menu" style="display:none">
                            <select id="highscorelist-game">
                                <option value="">Select game</option>
                                <option value="1">Battle Ball: Rebound!</option>
                                <option value="2">SnowStorm</option>
                                <option value="0">Wobble Squabble</option>
                            </select>
                        </div>
                        <div id="edit-menu-remove-group-warning" style="display: none;">
                            <p>This item belongs to another user. If you remove it, it will return to their inventory.</p>

                        </div>
                        <div id="edit-menu-gb-availability" style="display: none;">
                            <select id="guestbook-privacy-options">
                                <option value="private">Members only</option>
                                <option value="public" selected="">Public</option>
                            </select>
                        </div>
                        <div id="edit-menu-trax-select" style="display: none;">

                            <select id="trax-select-options"></select>
                        </div>
                        <div id="edit-menu-remove" style="display: block;">
                            <input type="button" id="edit-menu-remove-button" value="Remove">
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="menu-bottom"></div>
        </div>
        <script language="JavaScript" type="text/javascript">
            Event.observe(window, "resize", function() {
                if (editMenuOpen) closeEditMenu();
            }, false);
            Event.observe(document, "click", function() {
                if (editMenuOpen) closeEditMenu();
            }, false);
            Event.observe("edit-menu", "click", Event.stop, false);
            Event.observe("edit-menu-exit", "click", function() {
                closeEditMenu();
            }, false);
            Event.observe("edit-menu-remove-button", "click", handleEditRemove, false);
            Event.observe("edit-menu-skins-select", "click", Event.stop, false);
            Event.observe("edit-menu-skins-select", "change", handleEditSkinChange, false);
            Event.observe("guestbook-privacy-options", "click", Event.stop, false);
            Event.observe("guestbook-privacy-options", "change", handleGuestbookPrivacySettings, false);
            Event.observe("trax-select-options", "click", Event.stop, false);
            Event.observe("trax-select-options", "change", handleTraxplayerTrackChange, false);
        </script>

        <script>
            NoteEditor.initialise();
        </script>
        <style>
            #note_editor_dialog {
                width: 345px;
            }

            #note-editor-container {
                position: relative;
                margin: 0 0 1em 25px;
            }

            #note-editor-container div.stickie {
                position: relative;
                cursor: default;
            }

            #note-editor-container div.stickie h3 img {
                display: none;
            }
        </style>
        <script>
            Event.observe('stickers-button', 'click', function(e) {
                Event.stop(e);
                WebStore.open('stickers');
            }, false);
            Event.observe('widgets-button', 'click', function(e) {
                Event.stop(e);
                WebStore.open('widgets');
            }, false);
            Event.observe('backgrounds-button', 'click', function(e) {
                Event.stop(e);
                WebStore.open('backgrounds');
            }, false);
        </script>
    @endif

    <script language="JavaScript" type="text/javascript">
        Event.observe(window, "load", observeAnim);
        @if ($editing)
            initEditToolbar();
            initMovableItems();
        @endif
        Event.onDOMReady(initDraggableDialogs);
    </script>

    @auth
        @if (request()->join && !$owner->getMember(user()->id))
            <script language="JavaScript" type="text/javascript">
                showGeneralAjaxDialog("join-group-dialog", "/groups/actions/join", "groupId=" + encodeURIComponent({{ $owner->id }}));
            </script>
        @endif
    @endauth
@endsection
