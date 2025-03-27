<tr class="post-list-index-even" id="new-topic-preview">
    <input type="hidden" id="spam-message" value="Spam detected!">
    <td class="post-list-row-container">
        <table border="0" cellpadding="4" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td colspan="2" class="online">
                        <a href="{{ url('/') }}/home/{{ user()->username }}">{{ user()->username }}</a>
                        <img alt="online" src="{{ url('/') }}/web/images/myhabbo/habbo_online_anim.gif">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="post-list-posts">Posts: {{ user()->getCmsSettings()->discussions_posts + 1 }}</td>
                </tr>
                <tr>
                    <td class="post-list-creator-avatar"><img src="{{ cms_config('site.avatarimage.url') }}{{ user()->figure }}&direction=2&head_direction=2" alt=""
                            class="tabmenu-image myimage" id="myimage"></td>
                    <td class="post-list-creator-badge">
                        <div class="group-badges-container">
                            <img src="{{ cms_config('site.groupbadge.url') }}{{ user()->getFavoriteGroup()->badge }}.gif"><br>
                            <img src="{{ cms_config('site.badges.url') }}/{{ user()->badge }}.gif">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="post-list-motto" colspan="2">
                        <div class="post-list-divider"></div>
                        {{ user()->motto }}
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
                        <div class="topiclist-row-content"> {{ $topic->subject }}<br><span class="topiclist-lastpost-time">{{ $topic->created_at->format('j.n.Y H:i:s') }}</span>
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
                        </div>
                        <div class="post-list-content-element">
                            {!! bb_format($topic->message) !!}
                            <input type="hidden" id="post-message-hidden" value="{{ $topic->message }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="button-area">
                                <a href="#" class="colorlink dialogbutton" id="save-post-message"><span>Save</span></a>
                                <a href="#" class="colorlink noarrow dialogbutton" id="edit-post-message"><span>Edit</span></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
