@extends('layouts.master', ['body' => $isEdit ? 'editmode' : 'viewmode', 'menuId' => 'home_group', 'skipHeadline' => true])

@section('title', 'Group Home: ' . $owner->name)

@section('content')
    <script language="JavaScript" type="text/javascript">
        Event.onDOMReady(function() {
            initView({{ $owner->id }});
            attachGroupBadgeEditorButtonObserver({{ $owner->id }}, "group-tools-badge", "Badge Editor");
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
                            @auth
                                @if ($owner->owner_id == user()->id && !$isEdit)
                                    <div id="group-tools">
                                        <a href="{{ url('/') }}/groups/actions/startEditingSession/{{ $owner->id }}" class="toolbutton edit"><span>Edit</span></a>
                                        <a href="#" class="toolbutton group-badge" id="group-tools-badge"><span>Badge</span></a>
                                        <a href="#" class="toolbutton group-settings"><span>Settings</span></a>
                                        <a href="#" class="toolbutton memberlist" id="group-tools-members"><span>Members</span></a>
                                    </div>
                                @else
                                    @if (!$owner->getMember(user()->id))
                                        <a href="#" class="toolbutton join-group" id="join-group-button" style="float: right">
                                            <span>Join group</span>
                                        </a>
                                    @else
                                        <a href="#" class="toolbutton leave-group" id="leave-group-button" style="float: right">
                                            <span>Leave group</span>
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
                <img src="{{ url('/') }}/web/images/dialogs/grey-exit.gif" width="12" height="12" alt="">
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
                <img src="{{ url('/') }}/web/images/dialogs/grey-exit.gif" width="12" height="12" alt="">
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

    <div id="join-group-dialog" class="dialog-grey"></div>

    @if (request()->join && !$owner->getMember(user()->id))
        <script language="JavaScript" type="text/javascript">
            showGeneralAjaxDialog("join-group-dialog", "/groups/actions/join", "groupId=" + encodeURIComponent({{ $owner->id }}));
        </script>
    @endif
@endsection
