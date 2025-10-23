<table border="0" cellpadding="0" cellspacing="0" width="100%" class="group-postlist-list" id="group-postlist-list">
    <tbody>
        <tr>
            <td class="post-header-link" valign="top" style="width: 148px;">Writer: <a
                    href="{{ url('/') }}/home/{{ $topic->author->username }}">{{ $topic->author->username }}</a></td>
            <td class="post-header-name" valign="top">Subject: <span class="topic-name">{{ $topic->topic_title }} (Started:
                    {{ $topic->created_at->format('j.n.Y') }}) </span></td>
            <td align="right">
                <a href="{{ url('/') }}/{{ $group->url }}/discussions" class="colorlink noarrow">
                    <span class="to-topics">To Threads</span>
                </a>
                @auth
                    @if ($group->canReplyForum())
                        @if ($topic->is_open)
                            <a href="#" class="colorlink dialogbutton verify-email" id="create-post-message-button">
                                <span>Post Reply</span>
                            </a>
                        @endif
                    @endif

                    @if($group->isAdmin() || user()->hasPermission('can_manage_forums'))
                        <a href="#" class="colorlink noarrow" id="topic-settings">
                            <span>Settings</span>
                        </a>
                    @endif
                @endauth
                @if (!$topic->is_open)
                    <span class="topic-closed">
                        <img src="{{ url('/') }}/web/images/groups/status_closed.gif" title="Closed Thread">
                        Closed Thread
                    </span>
                @endif

                <br clear="all">
                <input type="hidden" id="spam-message" value="Spam detected!">
                <input type="hidden" id="settings_dialog_header" value="Topic settings">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="topiclist-divider"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            </td>
            <td align="right">
                <input type="hidden" id="current-page" value="{{ $replies->currentPage() }}">
                View page:
                @for ($i = 1; $i <= $replies->lastPage(); $i++)
                    @if ($i == $replies->currentPage())
                        <span style="font-weight: bold"> {{ $i }}</span>
                    @else
                        <a href="{{ url('/') }}/{{ $group->url }}/discussions/{{ $topic->id }}/id?page={{ $i }}">{{ $i }}</a>
                    @endif
                @endfor
            </td>
        </tr>
        @foreach ($replies as $reply)
            <tr class="post-list-index-{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                <td class="post-list-row-container">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        @php($author = $reply->author)
                        <tbody>
                            <tr>
                                <td colspan="2" class="online">
                                    <a href="{{ url('/') }}/home/{{ $author->username }}">{{ $author->username }}</a>
                                    @if ($author->isOnline())
                                        <img alt="online" src="{{ cms_config('site.web.url') }}/images/myhabbo/habbo_online_anim.gif">
                                    @else
                                        <img alt="offline" src="{{ cms_config('site.web.url') }}/images/myhabbo/habbo_offline.gif">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="post-list-posts">Messages: {{ $author->replies()->count() }}</td>
                            </tr>
                            <tr>
                                <td class="post-list-creator-avatar"><img src="{{ cms_config('site.avatarimage.url') }}{{ $author->figure }}&direction=2&head_direction=2"
                                        alt="" class="tabmenu-image myimage" id="myimage"></td>
                                <td class="post-list-creator-badge">
                                    <div class="group-badges-container">
                                        @if ($author->getFavoriteGroup())
                                            <img src="{{ cms_config('site.groupbadge.url') }}{{ $author->getFavoriteGroup()->badge }}.gif"><br>
                                        @endif
                                        @if ($author->badge)
                                            <img src="{{ cms_config('site.badges.url') }}/{{ $author->badge }}.gif">
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="post-list-motto" colspan="2">
                                    <div class="post-list-divider"></div>
                                    {{ $author->motto }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="post-list-message" valign="top" colspan="2">
                    <table border="0" cellpadding="0" cellspacing="0" style="margin: 5px; width: 98%;">
                        <tbody>
                            <tr>
                                <td class="post-header-link">
                                    <div class="topiclist-row-content">
                                        {{ $loop->first ? '' : 'RE:' }}
                                        {{ $topic->topic_title }}<br>
                                        <span class="topiclist-lastpost-time">{{ $reply->created_at->format('j.n.Y H:i:s') }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <div class="post-list-content-divider"></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <div class="post-list-report-element">
                                        @auth
                                            @if (!$topic->is_opened)
                                                <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/quote_button.gif" width="19" height="18"
                                                    class="quote-post verify-email" id="quote-post-{{ $reply->id }}" />
                                            @endif
                                            <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/delete_entry_button.gif" width="19" height="18"
                                                class="delete-post" id="delete-post-{{ $reply->id }}" />
                                            @if (!$topic->is_opened)
                                                @if ($author->id != user()->id)
                                                    <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/report_button.gif" width="19" height="18"
                                                        class="report-post" id="report-post-{{ $reply->id }}" />
                                                @else
                                                    <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/icon_edit.gif" width="19" height="18"
                                                        class="edit-post verify-email" id="edit-post-{{ $reply->id }}" />
                                                @endif
                                            @endif
                                        @endauth
                                    </div>
                                    <div class="post-list-content-element">
                                        @if ($reply->is_edited)
                                            <span class="topiclist-row-content">Edited ({{ $reply->modified_at->format('j.n.Y H:i:s') }}): </span>
                                            <br>
                                        @endif
                                        {!! bb_format($reply->message) !!}
                                        <input type="hidden" id="{{ $reply->id }}-message" value="{{ $reply->message }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach

        <tr class="new-post-preview" id="new-post-preview">
            <td colspan="3">
                <div id="new-post-preview-container"></div>
            </td>
        </tr>
        @auth
            <tr id="new-post-entry-message" style="background-color:#E5E5E5;">
                <td class="new-post-entry-label">
                    <div class="new-post-entry-label" id="new-post-entry-label">Post: </div>
                </td>
                <td colspan="2">
                    <table border="0" cellpadding="0" cellspacing="0" style="margin: 5px; width: 98%;">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" id="edit-type">
                                    <input type="hidden" id="post-id">
                                    <input type="hidden" id="topic-id" value="{{ $topic->id }}">
                                    <input type="hidden" id="group-id" value="{{ $group->id }}">
                                    <textarea cols="66" rows="5" name="message" id="post-message"></textarea>
                                    <script type="text/javascript">
                                        bbcodeToolbar = new Control.TextArea.ToolBar.BBCode("post-message");
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
                                        bbcodeToolbar.addColorSelect("Colour", colors, false);
                                    </script>
                                    <div id="linktool-inline">
                                        <div id="linktool-scope">
                                            <label for="linktool-query-input">Create link:</label>
                                            <input type="radio" name="scope" class="linktool-scope" value="1" checked="checked">Habbos
                                            <input type="radio" name="scope" class="linktool-scope" value="2">Rooms
                                            <input type="radio" name="scope" class="linktool-scope" value="3">Groups&nbsp;
                                            <input id="linktool-query" type="text" size="25" name="query" value="">
                                        </div>
                                        <a href="#" class="colorlink orange" id="linktool-find"><span>Find</span></a>
                                        <div class="clear" style="height: 0;"><!-- --></div>
                                        <div id="linktool-results">
                                        </div>
                                        <script type="text/javascript">
                                            linkTool = new LinkTool(bbcodeToolbar.textarea);
                                        </script>
                                    </div>
                                    <br><br>
                                    <a href="#" class="colorlink noarrow dialogbutton" id="post-form-cancel"><span>Cancel</span></a>
                                    <a href="#" class="colorlink dialogbutton" id="post-form-preview"><span>Preview</span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        @endauth
        <tr>
            <td>
                @auth
                    @if ($group->canReplyForum())
                        @if ($topic->is_open)
                            <a href="#" class="colorlink dialogbutton verify-email" id="create-post-message-lower-button">
                                <span>Post Reply</span>
                            </a>
                        @endif
                    @endif
                @endauth
                @if (!$topic->is_open)
                    <span class="topic-closed">
                        <img src="{{ url('/') }}/web/images/groups/status_closed.gif" title="Closed Thread">
                        Closed Thread
                    </span>
                @endif
            </td>
            <td align="right" colspan="2">
                View page:
                @for ($i = 1; $i <= $replies->lastPage(); $i++)
                    @if ($i == $replies->currentPage())
                        <span style="font-weight: bold"> {{ $i }}</span>
                    @else
                        <a href="{{ url('/') }}/{{ $group->url }}/discussions/{{ $topic->id }}/id?page={{ $i }}">{{ $i }}</a>
                    @endif
                @endfor
            </td>
        </tr>
    </tbody>
</table>
<script type="text/javascript" language="JavaScript">
    var discussions = new Discussions();
    if ($("new-post-entry-message")) {
        Element.hide("new-post-entry-message");
    }
    if ($("new-post-entry-label")) {
        Element.hide("new-post-entry-label");
    }
    if ($("post-form-preview")) {
        Event.observe("post-form-preview", "click", preview_function, false);
    }
    if ($("post-form-cancel")) {
        Event.observe("post-form-cancel", "click", cancel_edit_function, false);
    }
    if ($("topic-settings")) {
        Event.observe("topic-settings", "click", topic_settings_function);
    }
    //document.getElementsByClassName("quote-post").each(quote_function);
    //document.getElementsByClassName("edit-post").each(edit_function);
</script>
