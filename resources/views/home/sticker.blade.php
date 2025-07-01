<div class="movable sticker s_{{ $item->store->class }}" style="left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }}" id="sticker-{{ $item->id }}">
    @if ($editing)
        <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button" id="sticker-{{ $item->id }}-edit" />
        <script language="JavaScript" type="text/javascript">
            Event.observe('sticker-{{ $item->id }}-edit', 'click', function(e) {
                openEditMenu(e, {{ $item->id }}, 'sticker', 'sticker-{{ $item->id }}-edit');
            }, false);
        </script>
    @endif
</div>
