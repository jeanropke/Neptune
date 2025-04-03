<table border="0" cellpadding="0" cellspacing="0" width="100%" class="group-postlist-list" id="group-postlist-list">
    <tbody>
        <tr>
            <td class="post-header-link" valign="top" style="width: 148px;">Writer: <a
                    href="{{ url('/') }}/home/{{ $topic->getAuthor()->username }}">{{ $topic->getAuthor()->username }}</a></td>
            <td class="post-header-name" valign="top">Subject: <span class="topic-name">{{ $topic->subject }} (Started:
                    {{ $topic->created_at->format('j.n.Y') }}) </span></td>
            <td align="right">
                <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions" class="colorlink noarrow">
                    <span class="to-topics">To Threads</span>
                </a>
                <a href="#" class="colorlink dialogbutton" id="create-post-message-button">
                    <span>create-post-message-button</span>
                </a>
                <br clear="all">
                <input type="hidden" id="spam-message" value="Spam detected!">
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
                    @if($i == $replies->currentPage())
                    <span style="font-weight: bold"> {{ $i }}</span>
                    @else
                    <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id?page={{ $i }}">{{ $i }}</a>
                    @endif
                @endfor
            </td>
        </tr>
        @foreach ($replies as $reply)
            <tr class="post-list-index-{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                <td class="post-list-row-container">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        @php($author = $reply->getAuthor())
                        <tbody>
                            <tr>
                                <td colspan="2" class="online">
                                    <a href="{{ url('/') }}/home/{{ $author->username }}">{{ $author->username }}</a>
                                    <img alt="online" src="{{ url('/') }}/web/images/myhabbo/habbo_online_anim.gif">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="post-list-posts">Messages: {{ $author->getCmsSettings()->discussions_posts }}</td>
                            </tr>
                            <tr>
                                <td class="post-list-creator-avatar"><img
                                        src="{{ cms_config('site.avatarimage.url') }}{{ $author->figure }}&direction=2&head_direction=2"
                                        alt="" class="tabmenu-image myimage" id="myimage"></td>
                                <td class="post-list-creator-badge">
                                    <div class="group-badges-container">
                                        @if($author->getFavoriteGroup())
                                        <img src="{{ cms_config('site.groupbadge.url') }}{{ $author->getFavoriteGroup()->badge }}.gif"><br>
                                        @endif
                                        <img src="{{ cms_config('site.badges.url') }}/{{ $author->badge }}.gif">
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
                                    <div class="topiclist-row-content">{{ $loop->first ? '' : 'RE:' }} {{ $topic->subject }}<br><span
                                            class="topiclist-lastpost-time">{{ $reply->created_at->format('j.n.Y H:i:s') }}</span></div>
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
                                        @if(!$reply->hidden_by_staff)
                                            @if ($author->id == user()->id)
                                            <img src="{{ url('/') }}/web/images/myhabbo/buttons/delete_entry_button.gif" width="19" height="18" class="delete-post" id="delete-post-{{ $reply->id }}" />
                                            @else
                                            <img src="{{ url('/') }}/web/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-post" id="report-post-{{ $reply->id }}" />
                                            @endif
                                        @endif
                                    </div>
                                    @if($reply->hidden_by_staff)
                                    <i>Message removed by Hotel Staff</i>
                                    @else
                                    <div class="post-list-content-element">
                                        {!! bb_format($reply->message) !!}
                                        <input type="hidden" id="{{ $reply->id }}-message" value="{{ $reply->message }}">
                                    </div>
                                    @endif
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
        <tr>
            <td>
                @auth
                <a href="#" class="verify-email create-post-link" id="create-post">Post Reply</a>
                @endauth
            </td>
        </tr>
        <tr class="new-post-preview" id="new-post-preview">
            <td colspan="3">
                <div id="new-post-preview-container"></div>
            </td>
        </tr>
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
        <tr>
            <td colspan="2">
                <a href="#" class="colorlink dialogbutton" id="create-post-message-lower-button"><span>create-post-message-lower-button</span></a>
            </td>
            <td align="right">
                View page:
                @for ($i = 1; $i <= $replies->lastPage(); $i++)
                    @if($i == $replies->currentPage())
                    <span style="font-weight: bold"> {{ $i }}</span>
                    @else
                    <a href="{{ url('/') }}/groups/{{ $group->id }}/id/discussions/{{ $topic->id }}/id?page={{ $i }}">{{ $i }}</a>
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
    // document.getElementsByClassName("quote-post").each(quote_function);
    // document.getElementsByClassName("edit-post").each(edit_function);
</script>
