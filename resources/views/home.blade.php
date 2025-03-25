@extends('layouts.master', ['body' => $isEdit ? 'editmode' : 'viewmode', 'menuId' => 'home_group', 'submenuId' => 'home', 'headline' => false])

@section('title', 'Habbo Home: ' . $user->username)

@section('content')
    <script language="JavaScript" type="text/javascript">
        Event.onDOMReady(function() {
            initView({{ $user->id }}, {{ $user->id }});
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
                    id: '{{ $user->id }}'
                },
                onSuccess: function(req) {
                    window.location.reload();
                }
            });
        }

        function getSaveEditingActionName() {
            return '/myhabbo/save/{{ $user->id }}';
        }

        function showEditErrorDialog() {
            var closeEditErrorDialog = function(e) {
                if (e) {
                    Event.stop(e);
                }
                Element.remove($("myhabbo-error"));
                Overlay.hide();
            };
            var dialog = Dialog.createDialog("myhabbo-error", "", false, false, false, closeEditErrorDialog);
            Dialog.setDialogBody(dialog,
                '<p>Erro. Tente novamente daqui a pouco.</p><p><a href="#" class="new-button" id="myhabbo-error-close"><b>Fechar</b><i></i></a></p><div class="clear"></div>'
            );
            Event.observe($("myhabbo-error-close"), "click", closeEditErrorDialog);
            Dialog.moveDialogToCenter(dialog);
            Dialog.makeDialogDraggable(dialog);
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
                Overlay.show(null, 'Salvando');
                return true;
            }
        }
    </script>
    <style type="text/css">
        #playground,
        #playground-outer {
            margin-left: -2px;
            /* width: {{ $user->getSubscription()->isExpired() == 0 ? '752' : '915' }}px;*/
            height: 1360px;
        }
    </style>
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
                                Habbo home: {{ $user->username }}
                            </span>
                            @if (Auth::check() && $user->id == user()->id && !$isEdit)
                                <a href="{{ url('/') }}/myhabbo/startSession/{{ $user->id }}" class="toolbutton edit"><span>Edit</span></a>
                            @endif
                            @if (!$isEdit)
                                <a href="{{ url('/') }}/community/mgm_sendlink_invite.html?sendLink=/home/{{ $user->username }}" id="tell-button"
                                    class="toolbutton tell"><span>Tell a friend</span></a>
                            @endif
                            @if (Auth::check() && $user->id != user()->id)
                                <a href="{{ url('/') }}/home" class="toolbutton" id="gethome-button" style="float: right"><span>Get your own
                                        Habbo Home</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if ($isEdit)
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


            <div id="mypage-bg" class="b_{{ $items->where('data', 'background')->first() ? $items->where('data', 'background')->first()->getStoreItem()->class : '' }}">
                <div id="playground">
                    <!--div class="movable widget HighScoresWidget" id="widget-1585958" style=" left: 58px; top: 1160px; z-index: 4;">
                                        <div class="w_skin_hc_machineskin">
                                            <div class="widget-corner" id="widget-1585958-handle">
                                                <div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">HIGH SCORES</span><span class="header-right">&nbsp;</span></h3>
                                                </div>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-content">
                                            <table>
                                                    <tbody><tr colspan="2">
                                                        <th><a href="https://web.archive.org/web/20071015094213/http://www.habbo.com/games/battleball/">Battle Ball</a></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Games played</td>
                                                        <td>79</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total score</td>
                                                        <td>402346</td>
                                                    </tr>
                                                    <tr colspan="2">
                                                        <th><a href="https://web.archive.org/web/20071015094213/http://www.habbo.com/games/wobblesquabble/">Wobble Squabble</a></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Games played</td>
                                                        <td>8</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total score</td>
                                                        <td>79</td>
                                                    </tr>
                                            </tbody></table>
                                                <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        </div-->
                    @foreach ($items as $item)
                        @php($itemStore = $item->getStoreItem())
                        @switch($itemStore->type)
                            @case('s')
                                {{-- sticker --}}
                                <div class="movable sticker s_{{ $itemStore->class }}" style="left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }}"
                                    id="sticker-{{ $item->id }}">
                                    @if ($isEdit)
                                        <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button"
                                            id="sticker-{{ $item->id }}-edit" />
                                        <script language="JavaScript" type="text/javascript">
                                            Event.observe('sticker-{{ $item->id }}-edit', 'click', function(e) {
                                                openEditMenu(e, {{ $item->id }}, 'sticker', 'sticker-{{ $item->id }}-edit');
                                            }, false);
                                        </script>
                                    @endif
                                </div>
                            @break

                            @case('commodity')
                                {{-- stickie --}}
                                <div class="movable stickie" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};"
                                    id="stickie-{{ $item->id }}">
                                    <div class="n_skin_{{ $item->skin }}">
                                        <div class="stickie-header">
                                            <h3>
                                                @if ($isEdit)
                                                    <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button"
                                                        id="stickie-{{ $item->id }}-edit" />
                                                    <script language="JavaScript" type="text/javascript">
                                                        Event.observe('stickie-{{ $item->id }}-edit', 'click', function(e) {
                                                            openEditMenu(e, {{ $item->id }}, 'stickie', 'stickie-{{ $item->id }}-edit');
                                                        }, false);
                                                    </script>
                                                @endif
                                            </h3>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="stickie-body">
                                            <div class="stickie-content">
                                                <div class="stickie-markup">
                                                    <p>{!! $item->data !!}</p>
                                                </div>
                                                <div class="stickie-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case('w')
                                {{-- widget --}}
                                @include('home.' . strtolower($itemStore->class))
                            @break
                        @endswitch
                    @endforeach

                    @if (Auth::check())
                        <div id="dialog-stickie-report" class="menu">
                            <div class="menu-header">

                                <h3>Reportar Colante.</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-stickie-report-content">
                                    <div>Dá para identificar quem é este Habbo e onde ele vive através desta Nota ou contém
                                        conteúdo golpista?</div>
                                    <div>
                                        <div id="stickie-report-cancel" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Cancelar</div>
                                            </div>
                                        </div>
                                        <div id="stickie-report-report" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Reportar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-name-report" class="menu">
                            <div class="menu-header">

                                <h3>Reportar Nome Habbo</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-name-report-content">
                                    <div>Este nome é ofensivo ou impróprio?</div>
                                    <div>
                                        <div id="name-report-cancel" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Cancelar</div>
                                            </div>
                                        </div>
                                        <div id="name-report-report" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Reportar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-motto-report" class="menu">
                            <div class="menu-header">

                                <h3>Reportar Missão de Habbo</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-motto-report-content">
                                    <div>Esta Missão é ofensiva ou imprópria?</div>
                                    <div>
                                        <div id="motto-report-cancel" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Cancelar</div>
                                            </div>
                                        </div>
                                        <div id="motto-report-report" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Reportar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-room-report" class="menu">
                            <div class="menu-header">

                                <h3>Reportar Quarto de Hóspede</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-room-report-content">
                                    <div>Este Quarto ou descrição é ofensivo ou impróprio?</div>
                                    <div>
                                        <div id="room-report-cancel" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Cancelar</div>
                                            </div>
                                        </div>
                                        <div id="room-report-report" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Reportar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-guestbook-report" class="menu">
                            <div class="menu-header">

                                <h3>Denunciar mensagem do livro de visitas</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-guestbook-report-content">
                                    <div>Essa mensagem é ofensiva?</div>
                                    <div>
                                        <div id="guestbook-report-cancel" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Cancelar</div>
                                            </div>
                                        </div>
                                        <div id="guestbook-report-report" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Denunciar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-report-success" class="menu">
                            <div class="menu-header">

                                <h3>Item</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-report-success-content">
                                    <div>Vamos avaliar seu relatório e agir se necessário. Agradecemos imensamente.</div>
                                    <div>
                                        <div id="report-success-close" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Fechar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-report-error" class="menu">
                            <div class="menu-header">

                                <h3>Ocorreu um erro!</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-report-error-content">
                                    <div>Ocorreu um erro ao enviar relatório. Tente de novo daqui a pouco. </div>
                                    <div>
                                        <div id="report-error-close" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Fechar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                        <div id="dialog-report-spam" class="menu">
                            <div class="menu-header">

                                <h3>Flood detectado!</h3>
                            </div>
                            <div class="menu-body">
                                <div class="menu-content" id="dialog-report-spam-content">
                                    <div>Você está fazendo muitos relatório ao mesmo tempo.</div>
                                    <div>
                                        <div id="report-spam-close" class="button grey">
                                            <div class="button-header">
                                                <div></div>
                                            </div>
                                            <div class="button-body">
                                                <div class="button-content">Fechar</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="menu-bottom"></div>
                        </div>
                    @endif
                </div>
                <div id="mypage-ad">
                    <div id="ad_sidebar">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="dialog">
        <div class="dialog-header">
            <h3>
                header
            </h3>
        </div>
        <div class="dialog-body">
            <div class="dialog-content">hehehe</div>
        </div>
    </div>
    --}}
    <div class="topdialog dialog" id="guestbook-delete-dialog">
        <div class="dialog-header dialog-handle">
            <h3>Delete message</h3>
        </div>
        <a class="topdialog-exit" href="#" id="guestbook-delete-dialog-exit"></a>
        <div class="dialog-body" id="guestbook-delete-dialog-body">
            <div class="dialog-content">
                <form method="post" id="guestbook-delete-form">
                    <input type="hidden" name="entryId" id="guestbook-delete-id" value="" />
                    <p>Tem certeza que quer apagar sua mensagem?</p>
                    <p>
                        <a href="#" id="guestbook-delete-cancel" class="toolbutton"><span><b>Cancel</b></span><i></i></a>
                        <a href="#" id="guestbook-delete" class="toolbutton cancel"><span><b>Delete</b></span><i></i></a>
                    </p>
                    <br style="clear: both">
                </form>
            </div>
        </div>
    </div>
    <div class="dialog topdialog" id="guestbook-form-dialog" style="width: auto">
        <div class="dialog-header dialog-handle">
            <h3>Create a message</h3>
        </div>
        <a class="topdialog-exit" href="#" id="guestbook-form-dialog-exit"></a>
        <div class="dialog-body" id="guestbook-form-dialog-body">
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
                                "red": ["#d80000", "Vermelho"],
                                "orange": ["#fe6301", "Laranja"],
                                "yellow": ["#ffce00", "Amarelo"],
                                "green": ["#6cc800", "Verde"],
                                "cyan": ["#00c6c4", "Azul-claro"],
                                "blue": ["#0070d7", "Azul-escuro"],
                                "gray": ["#828282", "Cinza"],
                                "black": ["#000000", "Preto"]
                            };
                            bbcodeToolbar.addColorSelect("Cores", colors, true);
                        </script>
                    </div>

                    <div class="guestbook-toolbar clearfix">
                        <a href="#" id="guestbook-form-cancel" class="toolbutton"><span><b>Cancel</b></span><i></i></a>
                        <a href="#" id="guestbook-form-preview" class="toolbutton notes" style="float: right"><span><b>Preview</b></span><i></i></a>
                    </div>

                </form>
            </div>
            <div id="guestbook-preview-tab" class="dialog-content">&nbsp;</div>
        </div>
    </div>



    <script language="JavaScript" type="text/javascript">
        Event.observe(window, "load", observeAnim);
        @if ($isEdit)
            initEditToolbar();
            initMovableItems();
        @endif
        Event.onDOMReady(initDraggableDialogs);
        //Utils.setAllEmbededObjectsVisibility('hidden');
        //Pinger.start();
    </script>
    @if ($isEdit)
        <div id="edit-save" style="display:none;"></div>



        <div id="edit-menu" class="menu">
            <div class="menu-header">
                <div class="menu-exit" id="edit-menu-exit"><img src="{{ url('/') }}/web/images/dialogs/menu-exit.gif" alt="" width="11" height="11" /></div>
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
                                @if (!user()->getSubscription()->isExpired())
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
    @if ($isEdit)
        <script>
            Event.observe('notes-button', 'click', openNoteEditor, false);
        </script>
        <style>
            #note_editor_dialog {
                width: 345px;
            }
        </style>
    @endif
@stop
