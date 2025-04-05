<div class="movable stickie" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};" id="stickie-{{ $item->id }}">
    <div class="n_skin_{{ $item->skin }}">
        <div class="stickie-header">
            <h3>
                @if (isset($isEdit) && $isEdit)
                    <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button"
                        id="stickie-{{ $item->id }}-edit" />
                    <script language="JavaScript" type="text/javascript">
                        Event.observe('stickie-{{ $item->id }}-edit', 'click', function(e) {
                            openEditMenu(e, {{ $item->id }}, 'stickie', 'stickie-{{ $item->id }}-edit');
                        }, false);
                    </script>
                @endif
            </h3>
            <div class="clear"></div>
        </div>
        <div class="stickie-body">
            <div class="stickie-content">
                <div class="stickie-markup">{!! bb_format($item->data) !!}</div>
                <div class="stickie-footer">
                </div>
            </div>
        </div>
    </div>
</div>
