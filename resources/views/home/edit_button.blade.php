 @if ($editing)
     <img src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18" class="edit-button" id="{{ $type }}-{{ $item->id }}-edit" />
     <script language="JavaScript" type="text/javascript">
         Event.observe('{{ $type }}-{{ $item->id }}-edit', 'click', function(e) {
             openEditMenu(e, {{ $item->id }}, '{{ $type }}', '{{ $type }}-{{ $item->id }}-edit');
         }, false);
     </script>
 @endif
