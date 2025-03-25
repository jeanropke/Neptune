<div class="movable widget HighScoresWidget" id="widget-{{ $item->id }}"
    style="  left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>@if($isEdit)<img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18"
                        class="edit-button" id="widget-{{ $item->id }}-edit" />
                    <script language="JavaScript" type="text/javascript">
                        Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) { openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit'); }, false);
                    </script>@endif<span class="header-left">&nbsp;</span><span class="header-middle">HIGH
                        SCORES</span><span class="header-right">&nbsp;</span>
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
                            <td>{{ $user->battleball_points }}</td>
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
                            <td>{{ $user->snowstorm_points }}</td>
                        </tr>

                        <tr colspan="2">
                            <th><a href="{{ url('/') }}/games/wobblesquabble/">Wobble Squabble</a></th>
                        </tr>
                        <tr>
                            <td>Games played</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>Total score</td>
                            <td>79</td>
                        </tr>
                </tbody>

                    {{--@if($user->battleball_points > 0)
                    <tr colspan="2">
                        <th>Battleball points</th>
                    </tr>
                    <tr>
                        <td>Score</td>
                        <td>
                            {{ $user->battleball_points }}
                        </td>
                    </tr>
                    @endif
                    @if($user->snowstorm_points > 0)
                    <tr colspan="2">
                        <th>Snowstorm points</th>
                    </tr>
                    <tr>
                        <td>Score</td>
                        <td>
                            {{ $user->snowstorm_points }}
                        </td>
                    </tr>
                    @endif

                    @if($user->battleball_points == 0 && $user->snowstorm_points == 0)
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
