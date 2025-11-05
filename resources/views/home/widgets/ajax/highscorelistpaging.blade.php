@php($usersPerPage = 10)
@if ($highscores->stats->count() > 0)
    <div id="highscorelist-page-{{ $item->id }}">
        <table class="highscorelist-scores">
            <thead>
                <tr class="scores-header">
                    <th class="scores-position"></th>
                    <th class="scores-name">Habbo name</th>
                    <th class="scores-games">Played</th>
                    <th class="scores-total">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($highscores->stats->skip($highscores->page * $usersPerPage)->take($usersPerPage) as $stat)
                    <tr class="{{ $loop->index % 2 == 0 ? 'odd' : 'even' }}" title="{{ $stat->username }}: Best score {{ $stat->best_score }}">
                        <td class="scores-position">{{ $highscores->page * $usersPerPage + $loop->index + 1 }}.</td>
                        <td class="scores-name"><a href="{{ url('/') }}/home/{{ $stat->username }}">{{ $stat->username }}</a></td>
                        <td class="scores-games">{{ $stat->games_played }}</td>
                        <td class="scores-total">{{ $stat->total_score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <ul class="highscorelist-pagination clearfix">
            @if ($highscores->stats->count() > $highscores->page * $usersPerPage + $usersPerPage)
                <li id="highscorelist-page-{{ $item->id }}-{{ $highscores->page + 1 ?? 1 }}" class="next">Next {{ $usersPerPage }} &gt;</li>
            @endif
            @if($highscores->page > 0)
            <li id="highscorelist-page-{{ $item->id }}-{{ $highscores->page - 1 ?? 1 }}" class="prev">&lt; Back {{ $usersPerPage }}</li>
            @endif
        </ul>
    </div>
@else
    <p>No scores for the selected period.</p>
@endif
