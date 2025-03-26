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
                                                        <input name="email-verfication-ok" id="email-verfication-ok" value="1" hidden>
                                                        <a href="#" id="newtopic-upper" class="new-button verify-email newtopic-icon" style="float:left"><b><span></span>New Thread</b><i></i></a>
                                                        @endauth
                                                        @guest()
                                                        Please sign in to post new threads
                                                        @endguest
                                                    </td>
                                                    <td class="topiclist-viewpage" colspan="3" style="text-align: right">View page:
                                                        <span style="font-weight: bold">1</span>
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

                                                @forelse ($group->getTopics() as $topic)
                                                <tr class="topiclist-row-even">
                                                    <td class="topiclist-rowtopic" valign="top">
                                                        <div class="topiclist-row-content">
                                                            <a class="topic-list-link" href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id">War on Iraq
                                                                [Debate]</a>
                                                            (page
                                                            <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id?page=1">1</a>
                                                            )
                                                            <br>
                                                            <span><a class="topiclist-row-openername"
                                                                    href="{{ url('/') }}/home/{{ $topic->getAuthor()->username }}">{{ $topic->getAuthor()->username }}</a></span>

                                                            <span class="topiclist-row-latestpost-date">10/13/07</span>
                                                            <span class="topiclist-row-latestpost-date">(3:31 PM)</span>
                                                        </div>
                                                    </td>
                                                    <td class="topiclist-lastpost" valign="top">
                                                        10/13/07 <span class="topiclist-lastpost-time">3:31 PM</span><br>
                                                        <span class="topiclist-row-writtenby">by:</span> <a class="topiclist-row-openername"
                                                            href="{{ url('/') }}/home/{{ $topic->getAuthor()->username }}">{{ $topic->getAuthor()->username }}</a>
                                                    </td>
                                                    <td class="topiclist-replies" valign="top">{{ $topic->replies }}</td>
                                                    <td class="topiclist-views" valign="top">{{ $topic->views }}</td>
                                                </tr>
                                                @empty

                                                @endforelse

{{--
                                                <tr class="topiclist-row-even">
                                                    <td class="topiclist-rowtopic" valign="top">
                                                        <div class="topiclist-row-content">
                                                            <a class="topic-list-link" href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/1889/id">War on Iraq
                                                                [Debate]</a>
                                                            (page
                                                            <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/1889/id?page=1">1</a>
                                                            )
                                                            <br>
                                                            <span><a class="topiclist-row-openername"
                                                                    href="{{ url('/') }}/home/TechJunkie">TechJunkie</a></span>

                                                            <span class="topiclist-row-latestpost-date">10/13/07</span>
                                                            <span class="topiclist-row-latestpost-date">(3:31 PM)</span>
                                                        </div>
                                                    </td>
                                                    <td class="topiclist-lastpost" valign="top">
                                                        10/13/07 <span class="topiclist-lastpost-time">3:31 PM</span><br>
                                                        <span class="topiclist-row-writtenby">by:</span> <a class="topiclist-row-openername"
                                                            href="{{ url('/') }}/home/TechJunkie">TechJunkie</a>
                                                    </td>
                                                    <td class="topiclist-replies" valign="top">0</td>
                                                    <td class="topiclist-views" valign="top">5</td>
                                                </tr>
                                                <tr class="topiclist-row-odd">
                                                    <td class="topiclist-rowtopic" valign="top">
                                                        <div class="topiclist-row-content">
                                                            <a class="topic-list-link" href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/298/id">Habbo Update
                                                                Opinons!</a>
                                                            (page
                                                            <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/298/id?page=1">1</a>

                                                            <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/298/id?page=2">2</a>
                                                            )
                                                            <br>
                                                            <span><a class="topiclist-row-openername" href="{{ url('/') }}/home/Frafty">Frafty</a></span>

                                                            <span class="topiclist-row-latestpost-date">10/2/07</span>
                                                            <span class="topiclist-row-latestpost-date">(12:07 AM)</span>
                                                        </div>
                                                    </td>
                                                    <td class="topiclist-lastpost" valign="top">
                                                        10/4/07 <span class="topiclist-lastpost-time">1:31 AM</span><br>
                                                        <span class="topiclist-row-writtenby">by:</span> <a class="topiclist-row-openername"
                                                            href="{{ url('/') }}/home/Frafty">Frafty</a>
                                                    </td>
                                                    <td class="topiclist-replies" valign="top">15</td>
                                                    <td class="topiclist-views" valign="top">156</td>
                                                </tr>
                                                <tr class="topiclist-index">
                                                    <td></td>
                                                    <td class="topiclist-viewpage" colspan="3" align="right">View page:
                                                        <span style="font-weight: bold">1</span>
                                                    </td>
                                                </tr>
                                                --}}
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
