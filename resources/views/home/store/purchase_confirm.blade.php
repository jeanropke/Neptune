@if ($item)
    <div class="webstore-item-preview {{ $item->short_type }}_{{ $item->data }}_pre">
        <div class="webstore-item-mask">
        </div>
    </div>
    <p>Are you sure you want to purchase this product?</p>
    <p>Price is <b>{{ $item->price }}</b> Coins!</p>

    <p class="new-buttons">
        <a href="#" class="colorlink noarrow" id="webstore-confirm-cancel"><span>Cancel</span></a>
        <a href="#" class="colorlink orange last" id="webstore-confirm-submit"><span>Purchase</span></a>
    </p>
@else
    <p>You cannot purchase this item!</p>

    <p class="new-buttons">
        <a href="#" class="colorlink noarrow" id="webstore-confirm-cancel"><span>Ok</span></a>
    </p>
@endif
<div class="clear"></div>
