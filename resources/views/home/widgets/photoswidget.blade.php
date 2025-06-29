<div class="movable widget PhotosWidget" id="widget-{{ $item->id }}" style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Photos</span>
                    <span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="photolist-content">
                    @include('home.widgets.ajax.photoswidget', ['photos' => $owner->getPhotos(), 'page' => 1, 'totalPages' => $owner->getPhotos()->count()])
                    <script type="text/javascript">
                        Event.onDOMReady(function() {
                            window.photoWidget16 = new PhotosWidget('{{ $owner->id }}', '{{ $item->id }}');
                        });
                    </script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
