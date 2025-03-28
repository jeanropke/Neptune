<div id="top-3rd-level"></div>
<div id="content-3rd-level">
    <ul id="third-level-navi">
        @if($page == 'index')
            <li class="active">
                Wobble Squabble
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/wobblesquabble">Wobble Squabble</a>
            </li>
        @endif

        @if($page == 'high_scores')
            <li class="active">
                High Scores
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/wobblesquabble/high_scores">High Scores</a>
            </li>
        @endif
    </ul>
    <div class="clear"></div>
</div>
<div id="bottom-3rd-level"></div>
