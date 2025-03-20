@php($guestbook = \App\Models\Home\Guestbook::where([['widget_id', '=', $item->id], ['is_deleted', '=', '0']])->orderBy('created_at', 'desc')->get())
<div class="movable widget GuestbookWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>

                    <span class="header-left">&nbsp;</span><span class="header-middle">Guestbook(<span
                            id="guestbook-size">{{ $guestbook->count() }}</span>)
                        <span id="guestbook-type" class="{{ $item->data }}">
                            <img src="{{ url('/') }}/web/images/groups/status_exclusive.gif" title="Apenas Amigos"
                                alt="Apenas Amigos" />

                        </span></span><span class="header-right">&nbsp;@if($isEdit)<img
                            src="{{ url('/') }}/web/images/myhabbo/icon_edit.gif" width="19" height="18"
                            class="edit-button" id="widget-{{ $item->id }}-edit" />
                        <script language="JavaScript" type="text/javascript">
                            Event.observe('widget-{{ $item->id }}-edit', 'click', function(e) { openEditMenu(e, {{ $item->id }}, 'widget', 'widget-{{ $item->id }}-edit'); }, false);
                        </script>@endif
                    </span></h3>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-content">
                <div id="guestbook-wrapper" class="gb-public">
                    <ul class="guestbook-entries" id="guestbook-entry-container">
                        @php($messages = $guestbook->take(20))
                        @include('home.ajax.guestbook.list', ['messages' => $messages, 'ownerId' => $user->id])
                    </ul>
                </div>

                @if(!$isEdit && Auth::check())
                <div class="guestbook-toolbar clearfix">
                    <a href="#" class="colorlink orange" id="guestbook-open-dialog">
                        <span><img
                                src="{{ url('/') }}/web/images/myhabbo/buttons/icon_envelope.gif" />Post
                            new message</span>
                    </a>

                </div>
                @endif
                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        var gb{{ $item->id }} = new GuestbookWidget('{{ $user->id }}', '{{ $item->id }}', 500);
                        gb{{ $item->id }}.monitorScrollPosition();
                        var editMenuSection = $('guestbook-privacy-options');
                        if (editMenuSection) {
                            gb{{ $item->id }}.updateOptionsList('{{ $item->data }}');
                        }
                    });
                </script>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
