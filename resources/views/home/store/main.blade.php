<div id="webstore-categories">
    <ul class="purchase-subcategory-list">
        @foreach ($categories as $category)
            <li id="category-{{ $category->id }}-stickers">
                <div>{{ $category->caption }}</div>
            </li>
        @endforeach
    </ul>
</div>
<div id="webstore-content-container">
    <div id="webstore-items-container">
        <div id="webstore-items">
            <ul id="webstore-item-list">
                @foreach ($items as $item)
                    <li id="webstore-item-{{ $item->id }}" title="{{ $item->caption }}">
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
    <div id="webstore-preview-container">
        <div id="webstore-preview-default"></div>
        <div id="webstore-preview">
            @isset($items)
                @php($firstItem = $items->first())
                <div id="webstore-preview-box"></div>
                <div style="width: 110px; float: right;">
                    @isset($firstItem)
                        <h4 title="">{{ $firstItem->caption }}</h4>

                        <div id="webstore-preview-price">

                            Price:<br><b>
                                {{ $firstItem->price }} credit
                            </b>
                        </div>

                        <div id="webstore-preview-purse">
                            You have:<br><b>{{ user()->credits }} credits</b><br>
                            <a href="{{ url('/') }}/credits" target="_blank">Get Credits</a>
                        </div>

                        <div id="webstore-preview-purchase">
                            <a href="#" class="colorlink orange last" id="webstore-purchase"><span>Purchase</span></a>
                        </div>

                        <span id="webstore-preview-bg-text" style="display: none">Preview</span>
                    @endisset
                </div>
            @endisset
        </div>
    </div>
</div>
<div class="clear"></div>
<div>
    <a href="#" id="webstore-close" class="toolbutton"><span>Close</span></a>
    <a href="#" id="load-inventory" class="colorlink" style="margin: 0; margin-top: 4px"><span>Open Inventory <span id="webstore-inventory-new"></span></span></a>
</div>
<div id="inventory-content"></div>

