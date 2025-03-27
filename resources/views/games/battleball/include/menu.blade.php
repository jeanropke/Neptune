<div id="top-3rd-level"></div>
<div id="content-3rd-level">
    <ul id="third-level-navi">
        @if($page == 'index')
            <li class="active">
                Battle Ball
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/battleball">Battle Ball</a>
            </li>
        @endif

        @if($page == 'how_to_play')
            <li class="active">
                How To Play
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/battleball/how_to_play">How To Play</a>
            </li>
        @endif

        @if($page == 'high_scores')
            <li class="active">
                High Scores
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/battleball/high_scores">High Scores</a>
            </li>
        @endif

        @if($page == 'challenge')
            <li class="active">
                The Challenge
            </li>
        @else
            <li class="inactive">
                <a href="{{ url('/') }}/games/battleball/challenge">The Challenge</a>
            </li>
        @endif
    </ul>
    <div class="clear"></div>
</div>
<div id="bottom-3rd-level"></div>
