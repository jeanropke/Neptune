<div class="movable widget HighScoresWidget" id="widget-{{ $item->id }}" style="  left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left"></span>
                    <span class="header-middle">&nbsp;HIGH SCORES&nbsp;</span>
                    <span class="header-right">@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <table>
                    <tbody>
                        @if ($owner->statistics)
                            <tr colspan="2">
                                <th><a href="{{ url('/') }}/games/battleball/">Battle Ball</a></th>
                            </tr>
                            <tr>
                                <td>Games won</td>
                                <td>{{ $owner->statistics->battleball_games_won }}</td>
                            </tr>
                            <tr>
                                <td>Total score</td>
                                <td>{{ $owner->statistics->battleball_score_all_time }}</td>
                            </tr>
                            <tr colspan="2">
                                <th><a href="{{ url('/') }}/games/snowstorm/">Snow Storm</a></th>
                            </tr>
                            <tr>
                                <td>Games won</td>
                                <td>{{ $owner->statistics->snowstorm_games_won }}</td>
                            </tr>
                            <tr>
                                <td>Total score</td>
                                <td>{{ $owner->statistics->snowstorm_score_all_time }}</td>
                            </tr>

                            <tr colspan="2">
                                <th><a href="{{ url('/') }}/games/wobblesquabble/">Wobble Squabble</a></th>
                            </tr>
                            <tr>
                                <td>Games won</td>
                                <td>{{ $owner->statistics->wobble_squabble_games_won }}</td>
                            </tr>
                            <tr>
                                <td>Total score</td>
                                <td>{{ $owner->statistics->wobble_squabble_score_all_time }}</td>
                            </tr>
                        @else
                            No games scores
                        @endif
                    </tbody>
                </table>

                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        new HighscoreListWidget({{ $item->id }}, 1, 1);
                    });
                </script>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
