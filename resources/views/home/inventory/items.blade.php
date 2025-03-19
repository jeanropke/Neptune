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
        @for ($i = 0; $i < ($items->count() <= 20 ? 20 - $items->count() : 4 - ($items->count() % 4)); $i++)
            <li class="webstore-item-empty"></li>
        @endfor
</ul>
