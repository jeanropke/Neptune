@extends('layouts.master', ['body' => $isEdit ? 'editmode' : 'viewmode', 'menuId' => 'home_group', 'submenuId' => 'groups', 'headline' => false])

@section('title', 'Group Home: ' . $owner->name)

@section('content')
    <script language="JavaScript" type="text/javascript">
        Event.onDOMReady(function() {
            initView({{ $owner->id }});
        });
    </script>
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

                            <a href="{{ url('/') }}/community/mgm_sendlink_invite.html?sendLink=/groups/{{ $owner->getUrl() }}" id="tell-button" class="toolbutton tell"><span>Tell
                                    a friend</span></a>

                            @auth
                                <a href="{{ url('/') }}/hotel/groups" class="toolbutton" id="creategrp-button"><span>Create your own Group</span></a>

                                <a href="#" class="toolbutton" id="reporting-button" style="float: right">
                                    <span>Report</span>
                                </a>
                                <a href="#" class="toolbutton" id="stop-reporting-button" style="float: right; display: none">
                                    <span>Stop reporting</span>
                                </a>
                            @endauth
                            @guest
                                <a href="{{ url('/') }}/groups/actions/joinAfterLogin?groupId={{ $owner->id }}" class="toolbutton" id="join-button"><span>Log in to join this
                                        Group</span></a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <div id="grouptabs">
                <ul>
                    <li id="selected"><a href="{{ url('/') }}/groups/{{ $owner->id }}/id">Front Page</a></li>
                    <li>
                        <a href="{{ url('/') }}/groups/{{ $owner->id }}/id/discussions">Discussion Forum</a>
                    </li>
                </ul>
            </div>

            <br clear="all">

            <div id="mypage-top-spacer"></div>
            @php($items = $owner->getItems())
            <div id="mypage-bg" class="b_{{ $items->where('data', 'background')->first() ? $items->where('data', 'background')->first()->getStoreItem()->class : '' }}">
                <div id="playground">
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
@endsection
