<div class="movable sticker s_{{ $class }}" style="left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }}" id="sticker-{{ $id }}">
    @if($isEdit)
    <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button" id="sticker-{{ $id }}-edit" />
    <script language="JavaScript" type="text/javascript">
        Event.observe('sticker-{{ $id }}-edit', 'click', function(e) { openEditMenu(e,  {{ $id }}, 'sticker', 'sticker-{{ $id }}-edit'); }, false);
    </script>
    @endif
</div>
