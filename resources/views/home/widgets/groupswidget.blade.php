<div class="movable widget GroupsWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Groups (<span id="groups-list-size">{{ $owner->groups()->count() }}</span>)</span><span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div class="groups-list-container">
                    @include('home.widgets.ajax.grouplist')
                </div>

                <div class="groups-list-loading">
                    <div><a href="#" class="groups-loading-close"></a></div>
                    <div class="clear"></div>
                    <p style="text-align:center"><img src="{{ cms_config('site.web.url') }}/images/progress_habbos.gif" alt=""></p>
                </div>
                <div class="groups-list-info"></div>

                <script type="text/javascript">
                    Event.onDOMReady(function() {
                        new GroupsWidget('{{ $owner->id }}', '{{ $item->id }}');
                    });
                </script>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
