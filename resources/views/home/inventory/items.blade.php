<div id="inventory-items-container">
    <div id="inventory-items">
        <ul id="inventory-item-list">
            @foreach ($items as $item)
                <li id="inventory-item-{{ $item->id }}" title="{{ $item->caption }}">
                    <div class="webstore-item-preview {{ $item->getStoreItem()->type }}_{{ $item->getStoreItem()->class }}_pre">
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
            @php
                $count = $items->count();
                $fill = $count < 20 ? 20 - $count : (4 - ($count % 4)) % 4;
            @endphp
            @for ($i = 0; $i < $fill; $i++)
                <li class="webstore-item-empty"></li>
            @endfor
        </ul>
    </div>
</div>
