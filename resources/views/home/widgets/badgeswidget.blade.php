<div class="movable widget BadgesWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left"></span>
                    <span class="header-middle">&nbsp;Badges & Achievements&nbsp;</span>
                    <span class="header-right">@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="badgelist-content">
                    @php($allBadges = $owner->allBadges())
                    @include('home.widgets.ajax.badgewidget', ['badges' => $allBadges, 'page' => 1, 'totalPages' => ceil($allBadges->count() / 16)])
                    <script type="text/javascript">
                        Event.onDOMReady(function() {
                            window.badgesWidget{{ $item->id }} = new BadgesWidget('{{ $owner->id }}', '{{ $item->id }}');
                        });
                    </script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
