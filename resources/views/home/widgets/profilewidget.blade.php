<div class="movable widget ProfileWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Profile</span><span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span>
                    </span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div class="profile-info">
                    <div class="name" style="float: left">
                        <span class="name-text">{{ $owner->username }}</span>
                        <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-n"
                            id="name-{{ $owner->id }}-report" style="display: none;margin-top: -1px;">
                    </div>
                    <br class="clear">
                    @if ($owner->isOnline())
                        <img alt="online" src="{{ cms_config('site.web.url') }}/images/myhabbo/profile/habbo_online_anim_big.gif">
                    @else
                        <img alt="offline" src="{{ cms_config('site.web.url') }}/images/myhabbo/profile/habbo_offline.gif">
                    @endif
                    <div class="birthday text">
                        Habbo Created On:
                    </div>
                    <div class="birthday date">
                        {{ $owner->created_at->format('d-M-Y') }}
                    </div>
                    <div>
                        @if ($owner->getFavoriteGroup())
                            <a href="{{ url('/') }}/groups/{{ $owner->getFavoriteGroup()->id }}/id" title="{{ $owner->getFavoriteGroup()->name }}">
                                <img src="{{ cms_config('site.groupbadge.url') }}{{ $owner->getFavoriteGroup()->badge }}.png">
                            </a>
                        @endif
                        @if ($owner->badge)
                            <img src="{{ cms_config('site.badges.url') }}/{{ $owner->badge }}.gif">
                        @endif
                    </div>
                </div>
                <div class="profile-figure">
                    <img alt="{{ $owner->username }}"
                        src="{{ cms_config('site.avatarimage.url') }}?hb=image&figure={{ $owner->figure }}&headonly=0&direction=4&head_direction=4&action=&gesture=sml&size=m">
                </div>
                <div class="profile-motto">
                    {{ $owner->motto }}
                    <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-m"
                        id="motto-{{ $owner->id }}-report" style="display: none;margin-top: -1px;">
                    <div class="clear"></div>
                </div>
                <div class="profile-friend-request">
                    <a href="#" class="toolbutton" id="add-friend"><span>Add as friend</span></a>
                </div>
                <br clear="all" style="display: block; height: 1px">
                <div id="profile-tags-panel">
                    <div id="profile-tag-list">
                        @include('home.widgets.ajax.profiletags')
                    </div>
                    <div id="profile-tags-status-field" style="display: none">
                        <div style="display: block;">
                            <div class="content-red">
                                <div class="content-red-body">
                                    <span id="tag-limit-message" style="display: none;">
                                        <img src="{{ cms_config('site.web.url') }}/images/register/icon_error.gif"> The limit is 8 tags!
                                    </span>
                                    <span id="tag-invalid-message" style="display: none;">
                                        <img src="{{ cms_config('site.web.url') }}/images/register/icon_error.gif"> Invalid tag.
                                    </span>
                                </div>
                            </div>
                            <div class="content-red-bottom">
                                <div class="content-red-bottom-body"></div>
                            </div>
                        </div>
                    </div>
                    @if (user() && user()->id == $owner->id)
                        <div class="profile-add-tag">
                            <input type="text" id="profile-add-tag-input" maxlength="30"><br clear="all">
                            <a href="#" class="toolbutton" style="float:left;margin:5px 0 0 0;" id="profile-add-tag"><span>Add tag</span></a>
                        </div>
                    @endif
                </div>
                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        new ProfileWidget({{ $owner->id }}, {{ user()->id ?? -1 }}, {
                            headerText: "Are you sure?",
                            messageText: "Are you sure you want to ask <strong\>{{ $owner->username }}</strong\> to be your friend? Think twice before you hit OK!",
                            loginText: "You must sign in before sending a friend request.",
                            buttonText: "Ok",
                            cancelButtonText: "Cancel"
                        });
                    });
                </script>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
