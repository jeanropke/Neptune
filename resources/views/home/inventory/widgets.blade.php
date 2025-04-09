<div id="inventory-items-container">
    <div id="inventory-items">
        <ul id="inventory-item-list">
            @foreach ($widgets as $widget)
                <li id="inventory-item-p-{{ $widget->id }}" title="{{ $widget->caption }}" class="webstore-widget-item {{ $widget->home_id ? 'webstore-widget-disabled' : '' }}">
                    <div class="webstore-item-preview w_{{ $widget->getStoreItem()->class }}_pre">
                        <div class="webstore-item-mask">
                        </div>
                    </div>
                    <div class="webstore-widget-description">
                        <h3>{{ $widget->caption }}</h3>
                        <p>{{ $widget->description }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div id="inventory-preview-container" style="display: block;">
    <div id="inventory-preview-default"></div>
    <div id="inventory-preview">

        <div id="inventory-preview-box">
            <div id="inventory-preview-pre" class="" title=""></div>
        </div>

        <div id="inventory-preview-place" class="clearfix">
            <a href="#" class="toolbutton" id="inventory-place"><span>Place</span></a>
        </div>

    </div>
    <div class="clear"></div>
</div>
<div>
    <a href="#" id="inventory-close" class="toolbutton"><span>Close</span></a>
</div>
<div class="clear"></div>
