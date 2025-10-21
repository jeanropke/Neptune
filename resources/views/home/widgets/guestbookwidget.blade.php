
@php(
    $guestbook = \App\Models\Home\Guestbook::where([['group_id', '=', $item->group_id]])->orWhere([['home_id', '=', $item->home_id]])->orderBy('created_at', 'desc')->get()
)
<div class="movable widget GuestbookWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left">&nbsp;</span><span class="header-middle">Guestbook(<span id="guestbook-size">{{ $guestbook->count() }}</span>)
                        <span id="guestbook-type" class="{{ $item->data }}">
                            <img src="{{ cms_config('site.web.url') }}/images/groups/status_exclusive.gif" title="Apenas Amigos" alt="Apenas Amigos" />

                        </span></span>
                    <span class="header-right">&nbsp;
                        @include('home.edit_button', ['type' => 'widget'])
                    </span>
                </h3>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-content">
                <div id="guestbook-wrapper" class="gb-public">
                    <ul class="guestbook-entries" id="guestbook-entry-container">
                        @php($messages = $guestbook->take(20))
                        @include('home.widgets.ajax.guestbook.list', ['messages' => $messages, 'ownerId' => $owner->id])
                    </ul>
                </div>

                @if (!$editing && Auth::check())
                    <div class="guestbook-toolbar clearfix">
                        <a href="#" class="colorlink orange" id="guestbook-open-dialog">
                            <span><img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/icon_envelope.gif" />Post
                                new message</span>
                        </a>

                    </div>
                @endif
                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        var gb{{ $item->id }} = new GuestbookWidget('{{ $owner->id }}', '{{ $item->id }}', 500);
                        @if ($guestbook->count() > 20)
                            gb{{ $item->id }}.monitorScrollPosition();
                        @endif
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
