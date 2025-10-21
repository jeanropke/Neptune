<div class="movable widget HighScoresWidget" id="widget-{{ $item->id }}"
    style="  left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">HIGH
                        SCORES userexpswidget</span><span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <table>
                    <tbody>
                        <tr colspan="2">
                            <th><a href="{{ url('/') }}/games/battleball/">Battle Ball</a></th>
                        </tr>
                        <tr>
                            <td>Games played</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>Total score</td>
                            <td>{{ $owner->battleball_points }}</td>
                        </tr>
                        <tr colspan="2">
                            <th><a href="{{ url('/') }}/games/snowstorm/">Snow Storm</a></th>
                        </tr>
                        <tr>
                            <td>Games played</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>Total score</td>
                            <td>{{ $owner->snowstorm_points }}</td>
                        </tr>

                        <tr colspan="2">
                            <th><a href="{{ url('/') }}/games/wobblesquabble/">Wobble Squabble</a></th>
                        </tr>
                        <tr>
                            <td>Games played</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>Total score</td>
                            <td>y</td>
                        </tr>
                </tbody>

                    {{--@if($owner->battleball_points > 0)
                    <tr colspan="2">
                        <th>Battleball points</th>
                    </tr>
                    <tr>
                        <td>Score</td>
                        <td>
                            {{ $owner->battleball_points }}
                        </td>
                    </tr>
                    @endif
                    @if($owner->snowstorm_points > 0)
                    <tr colspan="2">
                        <th>Snowstorm points</th>
                    </tr>
                    <tr>
                        <td>Score</td>
                        <td>
                            {{ $owner->snowstorm_points }}
                        </td>
                    </tr>
                    @endif

                    @if($owner->battleball_points == 0 && $owner->snowstorm_points == 0)
                    No games scores
                    @endif--}}
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
