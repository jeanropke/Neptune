@if($item)
<div class="webstore-item-preview {{ $item->type }}_{{ $item->class }}_pre">
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
<p>Não pode comprar este item!</p>

<p class="new-buttons">
    <a href="#" class="new-button" id="webstore-confirm-cancel"><b>Ok</b><i></i></a>
</p>
@endif
<div class="clear"></div>
