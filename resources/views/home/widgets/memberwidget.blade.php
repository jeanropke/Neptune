<div class="movable widget MemberWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">Members of the group (<span
                            id="avatar-list-size">{{ $owner->members->count() }}</span>)</span><span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">

                <div id="avatar-list-search">
                    <input type="text" style="float:left;" id="avatarlist-search-string">
                    <a class="colorlink orange" style="float:left;" id="avatarlist-search-button"><span>Search</span></a>
                </div>
                <br clear="all">

                <div id="avatarlist-content">

                    @php($members = $owner->members()->take(20))
                    @include('home.widgets.ajax.memberwidget')

                    <script type="text/javascript">
                        Event.onDOMReady(function() {
                            window.widget{{ $item->id }} = new MemberWidget('{{ $owner->id }}', '{{ $item->id }}');
                        });
                    </script>

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
