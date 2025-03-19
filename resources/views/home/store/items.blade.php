<ul id="webstore-item-list">
    @foreach($items as $item)
    <li id="webstore-item-{{ $item->id }}" title="{{ $item->caption }}">
        <div class="webstore-item-preview {{ $item->type }}_{{ $item->class }}_pre">
            <div class="webstore-item-mask">
@if($item->amount > 1)
<div class="webstore-item-count"><div>x{{ $item->amount }}</div></div>
@endif
            </div>
        </div>
    </li>
    @endforeach
    @for($i = 0; $i < ($items->count() <= 20 ? 20 - $items->count() : 4 - ($items->count() % 4)); $i++)
    <li class="webstore-item-empty"></li>
    @endfor
</ul>
