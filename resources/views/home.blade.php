@extends('layouts.master', ['body' => $editing ? 'editmode' : 'viewmode', 'menuId' => 'home_group', 'skipHeadline' => true])

@section('title', 'Habbo Home: ' . $owner->username)

@section('content')
    <script language="JavaScript" type="text/javascript">
        Event.onDOMReady(function() {
            initView({{ $owner->id }});
        });

        function isElementLimitReached() {
            if (getElementCount() >= 200) {
                showHabboHomeMessageBox("Erro",
                    "Você atingiu o limite máximo de elementos na página. Remova um Colante, Nota ou Coisa para poder colocar este item.",
                    "Fechar");
                return true;
            }
            return false;
        }

        function cancelEditing(expired) {
            new Ajax.Request(habboReqPath + "/myhabbo/cancel", {
                parameters: {
                    id: '{{ $owner->id }}'
                },
                onSuccess: function(req) {
                    window.location.reload();
                }
            });
        }

        function getSaveEditingActionName() {
            return '/myhabbo/save/{{ $owner->id }}';
        }

        function showEditErrorDialog() {
            var closeEditErrorDialog = function(e) {
                if (e) {
                    Event.stop(e);
                }
                Element.remove($("myhabbo-error"));
                hideOverlay();
            };
            var dialog = createDialog("myhabbo-error", "", false, false, false, closeEditErrorDialog);
            setDialogBody(dialog,
                '<p>Erro. Tente novamente daqui a pouco.</p><p><a href="#" class="new-button" id="myhabbo-error-close"><b>Fechar</b><i></i></a></p><div class="clear"></div>'
            );
            Event.observe($("myhabbo-error-close"), "click", closeEditErrorDialog);
            moveDialogToCenter(dialog);
            makeDialogDraggable(dialog);
        }


        function showSaveOverlay() {
            var invalidPos = getElementsInInvalidPositions();
            if (invalidPos.length > 0) {
                $A(invalidPos).each(function(el) {
                    Element.scrollTo(el);
                    Effect.Pulsate(el);
                });
                showHabboHomeMessageBox("Uepa! Não dá pra fazer isso.",
                    "Foi mal, mas você não conseguirá colocar aqui seus Colantes, Notas e Coisas. Feche esta janela para continuar editando tua página.",
                    "Fechar");
                return false;
            } else {
                showOverlay(null, 'Salvando');
                return true;
            }
        }
    </script>
    <style type="text/css">
        #playground,
        #playground-outer {
            margin-left: -2px;
            height: 1360px;
        }
    </style>
    {{-- I dont like this, but otherwise will broke visual studio code colors --}}
    @if ($owner->subscription->isExpired())
        <style type="text/css">
            #playground,
            #playground-outer {
                width: 752px
            }
        </style>
    @else
        <style type="text/css">
            #playground,
            #playground-outer {
                width: 915px
            }
        </style>
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
                                Habbo home: {{ $owner->username }}
                            </span>
                            @auth
                                @if ($owner->id != user()->id)
                                    <a href="{{ url('/') }}/home" class="toolbutton" id="gethome-button" style="float: right">
                                        <span>Get your own Habbo Home</span>
                                    </a>
                                @endif
                                @if ($owner->id == user()->id && !$editing)
                                    <a href="{{ url('/') }}/myhabbo/startSession/{{ $owner->id }}" class="toolbutton edit"><span>Edit</span></a>
                                @endif
                                <a href="#" class="toolbutton reporting-start" id="reporting-button" style="float: right">
                                    <span>Report</span>
                                </a>
                                <a href="#" class="toolbutton reporting-stop" id="stop-reporting-button" style="float: right; display: none">
                                    <span>Stop reporting</span>
                                </a>
                            @endauth
                            @if (!$editing)
                                <a href="{{ url('/') }}/community/mgm_sendlink_invite?sendLink=/home/{{ $owner->username }}" id="tell-button"
                                    class="toolbutton tell"><span>Tell a friend</span></a>
                            @endif
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
            <div id="mypage-top-spacer"></div>

            @php($items = $owner->homeItems)
            <div id="mypage-bg" class="b_{{ $owner->homeBackground() }}">
                <div id="playground">
                    @foreach ($items as $item)
                        @switch($item->store->type)
                            {{-- sticker --}}
                            @case('1')
                                @include('home.sticker')
                            @break

                            {{-- widget --}}
                            @case('2')
                                @include('home.widgets.' . strtolower($item->store->data))
                            @break

                            {{-- stickie --}}
                            @case('3')
                                @include('home.stickie')
                            @break
                        @endswitch
                    @endforeach
                </div>

                <div id="mypage-ad">
                    <div id="ad_sidebar">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="guestbook-delete-dialog" class="dialog-grey" style="display:none">
        <div class="dialog-grey-top dialog-grey-handle">
            <div>
                <h3><span>Are you sure?</span></h3>
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
                            <input type="hidden" name="ownerId" value="{{ $owner->id }}" />
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

    <script language="JavaScript" type="text/javascript">
        Event.observe(window, "load", observeAnim);
        @if ($editing)
            initEditToolbar();
            initMovableItems();
        @endif
        Event.onDOMReady(initDraggableDialogs);
        //Utils.setAllEmbededObjectsVisibility('hidden');
        //Pinger.start();
    </script>
    @if ($editing)
        <div id="edit-save" style="display:none;"></div>
        <div id="edit-menu" class="menu">
            <div class="menu-header">
                <div class="menu-exit" id="edit-menu-exit"><img src="{{ cms_config('site.web.url') }}/images/dialogs/menu-exit.gif" alt="" width="11"
                        height="11" /></div>
                <h3>Edit</h3>
            </div>
            <div class="menu-body">
                <div class="menu-content">
                    <form action="#" onsubmit="return false;">
                        <div id="edit-menu-skins">
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
                        <div id="edit-menu-stickie">
                            <p>Warning! If you click 'Remove', the note will be permanently deleted.</p>
                        </div>
                        <div id="rating-edit-menu">
                            <input type="button" id="ratings-reset-link" value="Reset rating" />
                        </div>
                        <div id="highscorelist-edit-menu" style="display:none">
                            <select id="highscorelist-game">
                                <option value="">Select game</option>
                                <option value="1">Battle Ball: Rebound!</option>
                                <option value="2">SnowStorm</option>
                                <option value="0">Wobble Squabble</option>
                            </select>
                        </div>
                        <div id="edit-menu-remove-group-warning">
                            <p>This item belongs to another user. If you remove it, it will return to their inventory.</p>
                        </div>

                        <div id="edit-menu-gb-availability">
                            <select id="guestbook-privacy-options">
                                <option value="private">Private</option>
                                <option value="public">Public</option>
                            </select>
                        </div>

                        <div id="edit-menu-trax-select">
                            <select id="trax-select-options"></select>
                        </div>

                        <div id="edit-menu-remove">
                            <input type="button" id="edit-menu-remove-button" value="Remove" />
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="menu-bottom"></div>
        </div>
        <script language="JavaScript" type="text/javascript">
            Event.observe(window, 'resize', function() {
                if (editMenuOpen) {
                    closeEditMenu();
                }
            }, false);
            Event.observe(document, 'click', function() {
                if (editMenuOpen) {
                    closeEditMenu();
                }
            }, false);
            Event.observe('edit-menu', 'click', Event.stop, false);
            Event.observe('edit-menu-exit', 'click', function() {
                closeEditMenu();
            }, false);
            Event.observe('edit-menu-remove-button', 'click', handleEditRemove, false);
            Event.observe('edit-menu-skins-select', 'click', Event.stop, false);
            Event.observe('edit-menu-skins-select', 'change', handleEditSkinChange, false);
            Event.observe('guestbook-privacy-options', 'click', Event.stop, false);
            Event.observe('guestbook-privacy-options', 'change', handleGuestbookPrivacySettings, false);
            Event.observe('trax-select-options', 'click', Event.stop, false);
            Event.observe('trax-select-options', 'change', handleTraxplayerTrackChange, false);
        </script>
    @endif


    {{--
    There is no script in waybackmachine to handle home inventory and webstore :(
    --}}
    @if ($editing)
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
@stop
