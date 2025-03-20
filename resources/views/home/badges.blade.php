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
                    @include('home.ajax.badgewidget', ['badges' => $user->getBadges(), 'page' => 1, 'totalPages' => ceil($user->getBadges()->count() / 16)])
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