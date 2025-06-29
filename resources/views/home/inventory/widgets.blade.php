<div id="inventory-items-container">
    <div id="inventory-items">
        <ul id="inventory-item-list">
            @foreach ($widgets as $widget)
                <li id="inventory-item-p-{{ $widget->id }}" title="{{ $widget->caption }}" class="webstore-widget-item {{ ($widget->home_id || $widget->x) ? 'webstore-widget-disabled' : '' }}">
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
