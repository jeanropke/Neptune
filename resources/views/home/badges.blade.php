<div class="movable widget BadgesWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">Badges & Achievements</span><span
                        class="header-right">@if($isEdit)<img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif"
                            width="19" height="18" class="edit-button" id="widget-{{ $item->id }}-edit" />
                        <script language="JavaScript" type="text/javascript">
                            Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) { openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit'); }, false);
                        </script>@endif
                    </span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="badgelist-content">
                    <ul class="clearfix" style="padding: 0; ">
                        @forelse($user->getBadges()->take(16) as $badge)
                        <li
                            style="background-image: url({{ url('/') }}/gordon/c_images/album1584/{{ $badge->badge_code }}.png)">
                        </li>
                        @empty
                        No badges
                        @endforelse
                    </ul>

                    <div id="badge-list-paging">
                        1 - {{ $user->getBadges()->count() >= 16 ? '16' : $user->getBadges()->count() }} /
                        {{ $user->getBadges()->count() }}
                        <br>
                        @if($user->getBadges()->count() > 16)
                        First |
                        &lt;&lt; |
                        <a href="#" id="badge-list-search-next">&gt;&gt;</a> |
                        <a href="#" id="badge-list-search-last">Last</a>
                        <input type="hidden" id="badgeListPageNumber" value="1">
                        <input type="hidden" id="badgeListTotalPages"
                            value="{{ ceil($user->getBadges()->count()/16) }}">
                        @endif
                    </div>

                    <script type="text/javascript">
                        Event.onDOMReady(function() {
                            window.badgesWidget{{ $item->id }}= new BadgesWidget('{{ $user->id }}', '{{ $item->id }}');
                        });
                    </script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
