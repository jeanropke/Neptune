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
                    @if($user->battleball_points > 0)
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
                    @endif
                </table>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
