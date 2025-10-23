@extends('layouts.master', ['body' => 'viewmode', 'menuId' => 'home_group', 'skipHeadline' => true])

@section('title', "Group Discussions: {$group->name} ~ {$topic->topic_title}")

@section('content')
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
                                Group Home: {{ $group->name }}
                                @if ($group->group_type == 1)
                                    <img src="{{ cms_config('site.web.url') }}/images/groups/status_exclusive_big.gif" width="18" height="16" alt="Exclusive group"
                                        title="Exclusive group" class="header-bar-group-status">
                                @elseif($group->group_type == 2)
                                    <img src="{{ cms_config('site.web.url') }}/images/groups/status_closed_big.gif" width="18" height="16" alt="Private group"
                                        title="Private group" class="header-bar-group-status">
                                @endif
                            </span>
                            <a href="{{ url('/') }}/community/mgm_sendlink_invite.html?sendLink={{ $group->url }}/discussions" id="tell-button"
                                class="toolbutton tell"><span>Tell a friend</span></a>
                            @auth
                                @if ($group->getMember(user()->id))
                                    <a href="#" class="toolbutton leave-group" id="leave-group-button" style="float: right">
                                        <span>Leave group</span>
                                    </a>
                                @elseif($group->group_type == 1)
                                    @if ($group->pendingMembers()->where('user_id', user()->id)->first())
                                        <a href="#" class="toolbutton join-group" id="join-group-button" style="float: right">
                                            <span>Pending request</span>
                                        </a>
                                    @else
                                        <a href="#" class="toolbutton join-group" id="join-group-button" style="float: right">
                                            <span>Ask to join group</span>
                                        </a>
                                    @endif
                                @else
                                    <a href="#" class="toolbutton join-group" id="join-group-button" style="float: right">
                                        <span>Join group</span>
                                    </a>
                                @endif
                                <a href="{{ url('/') }}/hotel/groups" class="toolbutton" id="creategrp-button">
                                    <span>Create your own Group</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div id="grouptabs">
                @include('groups.tabs', ['selected' => 'forum'])
            </div>
            <br clear="all">
            <div id="mypage-top-spacer"></div>
            <link href="{{ cms_config('site.web.url') }}/styles/discussions.css" type="text/css" rel="stylesheet">
            <link href="{{ cms_config('site.web.url') }}/styles/myhabbo/control.textarea.css" type="text/css" rel="stylesheet" />
            <input type="hidden" id="email-verfication-ok" value="1" />
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
                <tbody>
                    <tr>
                        <td style="width: 8px;"></td>
                        <td valign="top" style="width: 741px;" class="habboPage-col rightmost">
                            <div class="v2box blue light" id="discussionbox">
                                @if (!$group->canViewForum())
                                    @include('groups.discussions.includes.nopermission')
                                @else
                                    <div class="headline">
                                        <h3>Group {{ $group->name }}</h3>
                                    </div>
                                    <div class="border">
                                        <div></div>
                                    </div>
                                    <div class="body">
                                        <div id="group-postlist-container">
                                            @include('groups.discussions.includes.viewtopic')
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="bottom">
                                        <div></div>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td style="width: 4px;"></td>
                        <td valign="top" style="width: 176px;">
                            <div id="ad_sidebar">

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="dialog-grey" id="postentry-delete-dialog">
                <div class="dialog-grey-top dialog-grey-handle">
                    <div>
                        <h3><span>myhabbo.discussion.delete.title</span></h3>
                    </div>
                    <a href="#" class="dialog-grey-exit" id="postentry-delete-dialog-exit">
                        <img src="{{ cms_config('site.web.url') }}/images/dialogs/grey-exit.gif" alt="" height="12" width="12">
                    </a>
                </div>
                <div class="dialog-grey-content clearfix">
                    <div id="postentry-delete-dialog-body" class="dialog-grey-body">
                        <form method="post" id="postentry-delete-form">
                            <input type="hidden" name="entryId" id="postentry-delete-id" value="">
                            <p>Are you sure you want to delete this post?</p>
                            <p class="clearfix">
                                <a href="#" id="postentry-delete-cancel" class="colorlink noarrow dialogbutton"><span>Cancel</span></a>
                                <a href="#" id="postentry-delete" class="colorlink orange dialogbutton"><span>Delete</span></a>
                            </p>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="dialog-grey-bottom">
                    <div></div>
                </div>
            </div>
            <div class="dialog-grey" id="postentry-verifyemail-dialog">
                <div class="dialog-grey-top dialog-grey-handle">
                    <div>
                        <h3><span>Please activate your email address</span></h3>
                    </div>
                    <a href="#" class="dialog-grey-exit" id="postentry-verifyemail-dialog-exit">
                        <img src="{{ cms_config('site.web.url') }}/images/dialogs/grey-exit.gif" alt="" height="12" width="12">
                    </a>
                </div>
                <div class="dialog-grey-content clearfix">
                    <div id="postentry-verifyemail-dialog-body" class="dialog-grey-body">
                        <form method="post" id="verifyemail-dialog-form">
                            <p>You need to activate your email before you can post new messages.</p>
                            <p>You can activate your email <a href="{{ url('/') }}/profile/profile?tab=3">here</a>.</p>
                            <p class="clearfix">
                                <a href="#" id="postentry-verifyemail-ok" class="colorlink noarrow dialogbutton"><span>Ok</span></a>
                            </p>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="dialog-grey-bottom">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <script language="JavaScript" type="text/javascript">
        Event.onDOMReady(function() {
            initView({{ $group->id }});
        });
    </script>
@stop
