<div class="movable widget GroupsWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Groups (<span id="groups-list-size">{{ $owner->getGroups()->count() }}</span>)</span><span
                        class="header-right">
                        @if ($isEdit)
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
                <div class="groups-list-container">
                    <ul class="groups-list">
                        @forelse($owner->getGroups() as $group)
                            <li title="{{ $group->name }}" id="groups-list-1-{{ $group->id }}">
                                <div class="groups-list-icon">
                                    <a href="{{ url('/') }}/groups/{{ $group->id }}/id">
                                        <img src="{{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.png">
                                    </a>
                                </div>
                                <div class="groups-list-open"></div>
                                <h4>
                                    <a href="{{ url('/') }}/groups/{{ $group->id }}/id">{{ $group->name }}</a>
                                </h4>
                                <p>
                                    Group created: <br>
                                    @if ($owner->getFavoriteGroup() && $owner->getFavoriteGroup()->id == $group->id)
                                        <img src="{{ url('/') }}/web/images/groups/favourite_group_icon.gif" width="15" height="15" class="groups-list-icon"
                                            alt="Favorite" title="Favorite">
                                    @endif
                                    @if ($owner->id == $group->owner_id)
                                        <img src="{{ url('/') }}/web/images/groups/owner_icon.gif" width="15" height="15" class="groups-list-icon" alt="Owner"
                                            title="Owner">
                                    @endif
                                    <b>{{ \Carbon\Carbon::parse($group->created_at)->format('M d, Y') }}</b>
                                </p>
                                <div class="clear"></div>
                            </li>
                        @empty
                            No groups
                        @endforelse
                    </ul>
                </div>

                <div class="groups-list-loading">
                    <div><a href="#" class="groups-loading-close"></a></div>
                    <div class="clear"></div>
                    <p style="text-align:center"><img src="{{ url('/') }}/web/images/progress_habbos.gif" alt=""></p>
                </div>
                <div class="groups-list-info"></div>

                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        new GroupsWidget('{{ $owner->id }}', '{{ $item->id }}');
                    });
                </script>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
