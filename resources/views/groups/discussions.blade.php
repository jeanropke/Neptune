@extends('layouts.master', ['body' => 'viewmode', 'menuId' => 'home_group', 'submenuId' => 'groups', 'headline' => false])

@section('title', 'Group Discussions: ' . $group->name)

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
                                <img src="{{ url('/') }}/web/images/groups/status_exclusive_big.gif" width="18" height="16" alt="Exclusive group" title="Exclusive group"
                                    class="header-bar-group-status">
                            </span>

                            <a href="{{ url('/') }}/community/mgm_sendlink_invite.html?sendLink=/groups/{{ $group->id }}/id/discussions" id="tell-button"
                                class="toolbutton tell"><span>Tell a friend</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="grouptabs">
                <ul>
                    <li><a href="{{ url('/') }}/groups/{{ $group->getUrl() }}">Front Page</a></li>
                    <li id="selected">
                        <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions">Discussion Forum</a>
                    </li>
                </ul>
            </div>
            <br clear="all">
            <div id="mypage-top-spacer"></div>
            <link href="{{ url('/') }}/web/styles/discussions.css" type="text/css" rel="stylesheet" />
            <link href="{{ url('/') }}/web/styles/myhabbo/control.textarea.css" type="text/css" rel="stylesheet" />
            <input type="hidden" id="group-id" value="{{ $group->id }}">
            <input type="hidden" id="group-url" value="{{ $group->url }}">
            @php($topics = $group->getTopics())
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-1col">
                <tbody>
                    <tr>
                        <td style="width: 8px;"></td>
                        <td valign="top" style="width: 741px;" class="habboPage-col rightmost">
                            <div class="v2box blue light" id="discussionbox">
                                <div class="headline">
                                    <h3>Group {{ $group->name }} discussions page 1 of 1</h3>
                                </div>
                                <div class="border">
                                    <div></div>
                                </div>
                                <div class="body">
                                    <div id="group-topiclist-container">
                                        <table class="group-topiclist" border="0" cellpadding="0" cellspacing="0" id="group-topiclist-list">
                                            <tbody>
                                                <tr class="topiclist-index">
                                                    <td class="topiclist-newtopic">
                                                        @auth
                                                        <input type="hidden" id="email-verfication-ok" value="1"/>
                                                        <a href="#" id="newtopic-upper" class="new-button verify-email newtopic-icon" style="float:left">New Thread</a>
                                                        @endauth
                                                        @guest()
                                                        Please sign in to post new threads
                                                        @endguest
                                                    </td>

                                                    <td class="topiclist-viewpage" colspan="3" align="right">View page:
                                                        @for ($i = 1; $i <= $topics->lastPage(); $i++)
                                                            @if ($i == $topics->currentPage())
                                                            <span style="font-weight: bold">{{ $i }}</span>
                                                            @else
                                                            <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions?page={{ $i }}">{{ $i }}</a>
                                                            @endif
                                                        @endfor
                                                    </td>
                                                </tr>

                                                <tr class="topiclist-columncaption">
                                                    <td class="topiclist-columncaption-topic">Thread/Thread Starter</td>
                                                    <td class="topiclist-columncaption-lastpost">Last Post</td>
                                                    <td class="topiclist-columncaption-replies">Replies</td>
                                                    <td class="topiclist-columncaption-views">Views</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4">
                                                        <div class="topiclist-divider"></div>
                                                    </td>
                                                </tr>

                                                @forelse ($topics as $topic)
                                                <tr class="topiclist-row-{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                                    <td class="topiclist-rowtopic" valign="top">
                                                        <div class="topiclist-row-content">
                                                            <a class="topic-list-link" href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id">{{ $topic->subject }}</a>
                                                            (page
                                                            @php($replies = $topic->getReplies())
                                                            @for ($i = 1; $i <= $replies->lastPage(); $i++)
                                                                <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id?page={{ $i }}">{{ $i }}</a>
                                                            @endfor
                                                            )
                                                            <br>
                                                            <span><a class="topiclist-row-openername"
                                                                    href="{{ url('/') }}/home/{{ $topic->getAuthor()->username }}">{{ $topic->getAuthor()->username }}</a></span>

                                                            <span class="topiclist-row-latestpost-date">{{ $topic->created_at->format('d/m/y') }}</span>
                                                            <span class="topiclist-row-latestpost-date">({{ $topic->created_at->format('h:i A') }})</span>
                                                        </div>
                                                    </td>
                                                    <td class="topiclist-lastpost" valign="top">
                                                        @php($latest = $topic->getLatestPost())
                                                        {{ $latest->created_at->format('d/m/y') }} <span class="topiclist-lastpost-time">{{ $latest->created_at->format('h:i A') }}</span><br>
                                                        <span class="topiclist-row-writtenby">by:</span> <a class="topiclist-row-openername"
                                                            href="{{ url('/') }}/home/{{ $latest->getAuthor()->username }}">{{ $latest->getAuthor()->username }}</a>
                                                    </td>
                                                    <td class="topiclist-replies" valign="top">{{ $topic->replies }}</td>
                                                    <td class="topiclist-views" valign="top">{{ $topic->views }}</td>
                                                </tr>
                                                @empty

                                                @endforelse

                                                <tr>
                                                    <td colspan="4">
                                                        <div class="topiclist-divider"></div>
                                                    </td>
                                                </tr>

                                                <tr class="topiclist-index">
                                                    <td class="topiclist-newtopic">
                                                        @auth
                                                        <input type="hidden" id="email-verfication-ok" value="1"/>
                                                        <a href="#" id="newtopic-upper" class="new-button verify-email newtopic-icon" style="float:left">New Thread</a>
                                                        @endauth
                                                        @guest()
                                                        Please sign in to post new threads
                                                        @endguest
                                                    </td>

                                                    <td class="topiclist-viewpage" colspan="3" align="right">View page:
                                                        @for ($i = 1; $i <= $topics->lastPage(); $i++)
                                                            @if ($i == $topics->currentPage())
                                                            <span style="font-weight: bold">{{ $i }}</span>
                                                            @else
                                                            <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions?page={{ $i }}">{{ $i }}</a>
                                                            @endif
                                                        @endfor
                                                    </td>
                                                </tr>

                                                <tr class="topiclist-columncaption">
                                                    <td class="topiclist-columncaption-topic">Thread/Thread Starter</td>
                                                    <td class="topiclist-columncaption-lastpost">Last Post</td>
                                                    <td class="topiclist-columncaption-replies">Replies</td>
                                                    <td class="topiclist-columncaption-views">Views</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="dialog-grey" id="postentry-verifyemail-dialog">
                <div class="dialog-grey-top dialog-grey-handle">
                    <div>
                        <h3><span>Please activate your email address</span></h3>
                    </div>
                    <a href="#" class="dialog-grey-exit" id="postentry-verifyemail-dialog-exit"><img
                            src="https://web.archive.org/web/20071023051219im_/http://images.habbohotel.com/habboweb/17/13d/web-gallery/images/dialogs/grey-exit.gif" alt=""
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
            <script type="text/javascript" language="JavaScript">
                var discussions = new Discussions();
            </script>
        </div>
    </div>
@endsection
