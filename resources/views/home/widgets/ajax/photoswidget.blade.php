<ul class="clearfix" style="padding: 0;">
    @forelse($photos->skip($page - 1)->take(1) as $photo)
    <div class="photo" style="background-image: url({{ url('/') }}/habbo-imaging/photo/{{ $photo->photo_id }})"></div>
        <i>{{ $photo->getData()->date }}</i>
        <div class="photo-text">{{ $photo->getData()->text }}</div>
    @empty
        No photos
    @endforelse
</ul>

<div id="photo-list-paging">
    {{ $page }} / {{ $totalPages }}
    <br>

    @if ($totalPages > 1)
        @if ($page != 1)
            <a href="#" id="photo-list-search-first">First</a> |
            <a href="#" id="photo-list-search-previous">&lt;&lt;</a> |
        @else
            First | &lt;&lt; |
        @endif
        @if ($page != $totalPages)
            <a href="#" id="photo-list-search-next">&gt;&gt;</a> |
            <a href="#" id="photo-list-search-last">Last</a>
        @else
            &gt;&gt; | Last
        @endif
    @endif

    <input type="hidden" id="photoListPageNumber" value="{{ $page }}">
    <input type="hidden" id="photoListTotalPages" value="{{ $totalPages }}">

</div>
