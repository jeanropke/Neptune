<div class="movable widget ProfileWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Profile</span><span class="header-right">&nbsp;@if ($isEdit)
                            <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button"
                                id="widget-{{ $item->id }}-edit" />
                            <script language="JavaScript" type="text/javascript">
                                Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) {
                                    openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit');
                                }, false);
                            </script>
                        @endif
                    </span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div class="profile-info">
                    <div class="name" style="float: left">
                        <span class="name-text">{{ $owner->username }}</span>
                        <img src="{{ url('/') }}/web/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-n" id="name-{{ $owner->id }}-report" style="display: none;margin-top: -1px;">
                    </div>
                    <br class="clear">

                    <img alt="offline" src="{{ url('/') }}/web/images/myhabbo/profile/habbo_offline.gif">
                    <div class="birthday text">
                        Habbo Created On:
                    </div>
                    <div class="birthday date">
                        {{ $owner->created_at->format('d-M-Y') }}
                    </div>
                    <div>
                        @if ($owner->getFavoriteGroup())
                            <a href="{{ url('/') }}/groups/{{ $owner->getFavoriteGroup()->id }}/id" title="{{ $owner->getFavoriteGroup()->name }}"><img
                                    src="{{ cms_config('site.groupbadge.url') }}{{ $owner->getFavoriteGroup()->badge }}.png"></a>
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
                    <img src="{{ url('/') }}/web/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-m" id="motto-{{ $owner->id }}-report" style="display: none;margin-top: -1px;">
                    <div class="clear"></div>
                </div>
                <div class="profile-friend-request">
                    <a href="#" class="toolbutton" id="add-friend"><span>Add as friend</span></a>
                </div>
                <br clear="all" style="display: block; height: 1px">
                <div id="profile-tags-panel">
                    <div id="profile-tag-list">
                        {{-- <div id="profile-tags-container">
                            <span class="tag-search-rowholder">
                                <a href="https://web.archive.org/web/20110919070326/http://www.habbo.com/tag/randomness"
                                    class="tag">randomness</a>
                                <div class="tag-id" style="display:none">62</div><img border="0" class="tag-none-link"
                                    src="https://web.archive.org/web/20110919070326im_/http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/536/web-gallery/images/buttons/tags/tag_button_dim.gif">
                            </span>
                        </div> --}}

                    </div>
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
