<ul class="clearfix" style="padding: 0; min-height: 182px; height: 180px;">
    @forelse($pageBadge as $badge)
        <li style="background-image: url({{ url('/') }}/gordon/c_images/album1584/{{ $badge->badge_code }}.gif)"></li>
    @empty
        No badges
    @endforelse
</ul>

<div id="badge-list-paging">
    {{ $currentBadges }} - {{ ($toBadges > $badges->count() ? $badges->count() : $toBadges) }} / {{ $badges->count() }}
    <br>
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
    <input type="hidden" id="badgeListPageNumber" value="{{ $page }}">
    <input type="hidden" id="badgeListTotalPages" value="{{ $totalPages }}">

</div>