<div id="inventory-items-container">
    <div id="inventory-items">
        <ul id="inventory-item-list">
            @foreach ($items as $item)
                <li id="inventory-item-{{ $item->id }}" title="{{ $item->caption }}">
                    <div class="webstore-item-preview {{ $item->type }}_{{ $item->class }}_pre">
                        <div class="webstore-item-mask">
                            @if ($item->amount > 1)
                                <div class="webstore-item-count">
                                    <div>x{{ $item->amount }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
            @for ($i = 0; $i < ($items->count() <= 20 ? 20 - $items->count() : 4 - ($items->count() % 4)); $i++)
                <li class="webstore-item-empty"></li>
            @endfor
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
    <a href="#" id="purchase-stickers" class="colorlink" style="margin: 0; margin-top: 4px"><span>Purchase Stickers</span></a>
</div>
<div class="clear"></div>
