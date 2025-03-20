<ul class="clearfix" style="padding: 0; min-height: 182px; height: 180px;">
    @forelse($badges->skip(($page - 1) * 16)->take(16) as $badge)
    <li style="background-image: url({{ url('/') }}/c_images/Badges/{{ $badge->badge }}.gif)"></li>
    @empty
    No badges
    @endforelse
</ul>

<div id="badge-list-paging">

    {{ (($page - 1) * 16 + 1) }} - {{ (((($page - 1) * 16) + 16) > $badges->count() ? $badges->count() : (($page - 1) * 16) + 16) }} / {{ $badges->count() }}
    <br>
    @if($totalPages > 1)
        @if($page != 1)
        <a href="#" id="badge-list-search-first">First</a> |
        <a href="#" id="badge-list-search-previous">&lt;&lt;</a> |
        @else
        First | &lt;&lt; |
        @endif
        @if($page != $totalPages)
        <a href="#" id="badge-list-search-next">&gt;&gt;</a> |
        <a href="#" id="badge-list-search-last">Last</a>
        @else
        &gt;&gt; | Last
        @endif
    @endif
    <input type="hidden" id="badgeListPageNumber" value="{{ $page }}">
    <input type="hidden" id="badgeListTotalPages" value="{{ $totalPages }}">

</div>
