<div id="top-3rd-level"></div>
<div id="content-3rd-level">
    <ul id="third-level-navi">
        @if($page == 'index')
            <li class="active">
                SnowStorm
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/snowstorm">SnowStorm</a>
            </li>
        @endif

        @if($page == 'rules')
            <li class="active">
                Game Instructions
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/snowstorm/rules">Game Instructions</a>
            </li>
        @endif

        @if($page == 'high_scores')
            <li class="active">
                High Scores
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/snowstorm/high_scores">High Scores</a>
            </li>
        @endif
    </ul>
    <div class="clear"></div>
</div>
<div id="bottom-3rd-level"></div>
