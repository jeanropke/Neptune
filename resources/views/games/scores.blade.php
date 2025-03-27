{{--
    gameIds:
        1 - battle ball
        2 - snowstorm
        3 - ?
        4 - ?
--}}
<ul class="scores-navi">
    <li><span><a href="?scores_1_limit=20&amp;scores_1_start=&amp;scores_1_periodType=week&amp;scores_1_gameId={{ $gameId }}&amp;scores_1_tournamentId=&amp;scores_1_period="
                name="?period=&amp;limit=20&amp;start=&amp;periodType=week&amp;componentId=scores_1&amp;gameId={{ $gameId }}&amp;tournamentId=" id="scores_week"
                class="hijaxTarget selected">Weekly scores</a></span></li>
    <li><span><a href="?scores_1_limit=20&amp;scores_1_start=&amp;scores_1_periodType=month&amp;scores_1_gameId={{ $gameId }}&amp;scores_1_tournamentId=&amp;scores_1_period="
                name="?period=&amp;limit=20&amp;start=&amp;periodType=month&amp;componentId=scores_1&amp;gameId={{ $gameId }}&amp;tournamentId=" id="scores_month"
                class="hijaxTarget">Monthly
                scores</a></span></li>
    <li><span><a href="?scores_1_limit=20&amp;scores_1_start=&amp;scores_1_periodType=all&amp;scores_1_gameId={{ $gameId }}&amp;scores_1_tournamentId=&amp;scores_1_period="
                name="?period=&amp;limit=20&amp;start=&amp;periodType=all&amp;componentId=scores_1&amp;gameId={{ $gameId }}&amp;tournamentId=" id="scores_all"
                class="hijaxTarget">All-time</a></span></li>
</ul>

<div class="clear"></div>

<ul class="scores-subnavi">
    <li class="next">&nbsp;</li>
    <li class="now">3/12/07 - 3/18/07</li>
    <li class="prev"><a
            href="?scores_1_limit=20&amp;scores_1_start=0&amp;scores_1_periodType=week&amp;scores_1_gameId={{ $gameId }}&amp;scores_1_tournamentId=&amp;scores_1_period=2007-03-05"
            name="?period=2007-03-05&amp;limit=20&amp;start=0&amp;periodType=week&amp;componentId=scores_1&amp;gameId={{ $gameId }}&amp;tournamentId="
            id="scores_previousperiod" class="hijaxTarget">3/5/07 - 3/11/07 &gt;</a></li>
</ul>

@if ($scores->count() > 0)
    <table class="scores">
        <thead>
            <tr class="scores-header">
                <th class="scores-position"></th>
                <th class="scores-name">Habbo name</th>
                <th class="scores-games">Games played</th>
                <th class="scores-best">Best score</th>
                <th class="scores-total">Score</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($scores as $score)
            <tr class="{{ $loop->index % 2 == 0 ? 'odd' : 'even' }}">
                <td class="scores-position">{{ $loop->index + 1 }}.</td>
                <td class="scores-name"><a href="{{ url('/') }}/home/{{ $score['name'] }}">{{ $score['name'] }}</a></td>
                <td class="scores-games">{{ $score['games'] }}</td>
                <td class="scores-best">{{ $score['best'] }}</td>
                <td class="scores-total">{{ $score['total'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <ul class="scores-subsubnavi">
        <li class="next">
            <a href="?scores_1_limit=20&amp;scores_1_start=20&amp;scores_1_periodType=week&amp;scores_1_gameId={{ $gameId }}&amp;scores_1_tournamentId=&amp;scores_1_period=2007-03-12"
                name="?period=2007-03-12&amp;limit=20&amp;start=20&amp;periodType=week&amp;componentId=scores_1&amp;gameId={{ $gameId }}&amp;tournamentId=" id="scores_next"
                class="hijaxTarget">Next 20 &gt;</a>
        </li>
        <li style="display: none">&nbsp;</li>
    </ul>
@else
    <p>
        No scores for the selected period.
    </p>
    <li style="display: none">&nbsp;</li>
@endif
