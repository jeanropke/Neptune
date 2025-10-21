<div class="movable widget HighscoreListWidget" id="widget-{{ $item->id }}" style="left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_noteitskin">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left">&nbsp;</span>
                    <span class="header-middle">HIGH SCORES</span>
                    <span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">

                <div id="highscorelist-scores-{{ $item->id }}">
                    @php($highscores = $item->loadScores())
                    @include('home.widgets.ajax.highscorelistwidget', ['type' => 'week', 'start' => $highscores->start, 'end' => $highscores->end])
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    Event.onDOMReady(function() {
        var hsl{{ $item->id }} = new HighscoreListWidget({{ $item->id }}, {{ $item->extra_data }}, "week");
        if ($("highscorelist-game")) {
            Event.observe($("highscorelist-game"), "change", HighscoreListWidget.handleEditMenu);
        }
        WidgetRegistry.add({{ $item->id }}, "HighscoreListWidget", hsl{{ $item->id }});
    });
</script>
