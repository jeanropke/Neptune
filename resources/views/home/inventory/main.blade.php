<div id="inventory-content">
    @isset($items)
        @include('home.inventory.items', ['items' => $items])
    @endisset
    @isset($widgets)
        @include('home.inventory.widgets', ['widgets' => $widgets])
    @endisset
    <div id="inventory-preview-container" style="display: none;">
        <div id="inventory-preview-default"></div>
        <div id="inventory-preview">
            <div id="inventory-preview-box">
            </div>
            <div id="inventory-preview-place" class="clearfix">
                <a href="#" class="toolbutton" id="inventory-place"><span>Place</span></a>
            </div>
        </div>
    </div>
    <div class="clear">
        <a href="#" id="inventory-close" class="toolbutton"><span>Close</span></a>
        @isset($items)
        <a href="#" id="purchase-stickers" class="colorlink" style="margin: 0; margin-top: 4px"><span>Purchase Stickers</span></a>
        @endisset
    </div>
    <div class="clear"></div>
</div>
<div id="webstore-content"></div>
