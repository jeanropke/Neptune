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
            @php
                $count = $items->count();
                $fill = $count < 12 ? 12 - $count : (4 - ($count % 4)) % 4;
            @endphp
            @for ($i = 0; $i < $fill; $i++)
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
            @isset($firstItem)
                <div id="webstore-preview-box">
                </div>
                <div style="width: 110px; float: right;">
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
                </div>
            @endisset
        @endisset
    </div>
</div>
