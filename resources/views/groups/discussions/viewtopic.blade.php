@extends('layouts.master', ['body' => 'viewmode', 'menuId' => 'home_group', 'submenuId' => 'groups', 'headline' => false])

@section('title', "Group Discussions: {$group->name} ~ {$topic->subject}")

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
                            </span>

                            <a href="{{ url('/') }}/community/mgm_sendlink_invite.html?sendLink=/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id" id="tell-button"
                                class="toolbutton tell"><span>Tell a friend</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="grouptabs">
                <ul>
                    <li><a href="{{ url('/') }}/groups/{{ $group->id }}/id">Front Page</a></li>
                    <li id="selected">
                        <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions">Discussion Forum</a>
                    </li>
                </ul>
            </div>
            <br clear="all">
            <div id="mypage-top-spacer"></div>
            <link href="{{ url('/') }}/web/styles/discussions.css" type="text/css" rel="stylesheet">
            <link href="{{ url('/') }}/web/styles/myhabbo/control.textarea.css" type="text/css" rel="stylesheet" />
            <input type="hidden" id="email-verfication-ok" value="1"/>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
                <tbody>
                    <tr>
                        <td style="width: 8px;"></td>
                        <td valign="top" style="width: 741px;" class="habboPage-col rightmost">
                            <div class="v2box blue light" id="discussionbox">
                                <div class="headline">
                                    <h3>{{ $topic->subject }}</h3>
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
                    <a href="#" class="dialog-grey-exit" id="postentry-delete-dialog-exit"><img
                            src="https://web.archive.org/web/20071011205728im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/dialogs/grey-exit.gif" alt=""
                            height="12" width="12"></a>
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
                    <a href="#" class="dialog-grey-exit" id="postentry-verifyemail-dialog-exit"><img
                            src="https://web.archive.org/web/20071011205728im_/http://images.habbohotel.com/habboweb/16/11/web-gallery/images/dialogs/grey-exit.gif" alt=""
                            height="12" width="12"></a>
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
@stop
