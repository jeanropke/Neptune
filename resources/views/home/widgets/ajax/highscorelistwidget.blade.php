<ul id="highscorelist-selector-{{ $item->id }}" class="highscorelist-selector">
    <li id="highscorelist-type-{{ $item->id }}-week" {{ $type == 'week' ? 'class=selected' : '' }}>Weekly</li>
    <li id="highscorelist-type-{{ $item->id }}-month" {{ $type == 'month' ? 'class=selected' : '' }}>Monthly</li>
    <li id="highscorelist-type-{{ $item->id }}-all" {{ $type == 'all' ? 'class=selected' : '' }}>All-time</li>
</ul>

<ul id="highscorelist-periods-{{ $item->id }}" class="highscorelist-periods">
    @if ($type == 'week')
        <li class="prev" id="highscorelist-period-{{ $item->id }}-{{ $start->copy()->subDays(7)->format('Y-m-d') }}" title="{{ $start->copy()->subDays(7)->format('d/m/y') }} - {{ $end->copy()->subDays(7)->format('d/m/y') }}">&gt;&gt;</li>
    @elseif($type == 'month')
        <li class="prev" id="highscorelist-period-{{ $item->id }}-{{ $start->copy()->subMonth()->format('Y-m-d') }}" title="{{ $start->copy()->subMonth()->format('d/m/y') }} - {{ $end->copy()->subMonth()->endOfMonth()->format('d/m/y') }}">&gt;&gt;</li>
    @endif

    @if ($type == 'week' && now() > $start->copy()->addDays(7))
        <li class="next" id="highscorelist-period-{{ $item->id }}-{{ $start->copy()->addDays(7)->format('Y-m-d') }}" title="{{ $start->copy()->addDays(7)->format('d/m/y') }} - {{ $end->copy()->addDays(7)->format('d/m/y') }}">&lt;&lt;</li>
    @elseif ($type == 'month' && now() > $start->copy()->addMonth())
        <li class="next" id="highscorelist-period-{{ $item->id }}-{{ $start->copy()->addMonth()->format('Y-m-d') }}" title="{{ $start->copy()->addMonth()->format('d/m/y') }} - {{ $end->copy()->addMonth()->endOfMonth()->format('d/m/y') }}">&lt;&lt;</li>
    @endif
    <li class="now">{{ $start->format('d/m/y') }} - {{ $end->format('d/m/y') }}</li>
</ul>

@include('home.widgets.ajax.highscorelistpaging')

