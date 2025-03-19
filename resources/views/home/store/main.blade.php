<div style="position: relative;">
    <div id="webstore-categories-container">
        <h4>Categories:</h4>
        <div id="webstore-categories">
            <ul class="purchase-main-category">
                @foreach ($categories->where('parent_id', '-1') as $category)
                    @php($firstLoop = $loop->first)
                    <li id="maincategory-{{ $category->id }}-stickers"
                        class="@if ($firstLoop) {{ 'selected-main-category  webstore-selected-main' }}@elseif($category->id == 3){{ 'main-category-no-subcategories' }}@else{{ 'main-category' }} @endif">
                        <div>{{ $category->caption }}</div>
                        <ul class="purchase-subcategory-list" id="main-category-items-{{ $category->id }}">
                            @foreach ($category->getChildrens() as $child)
                                <li id="subcategory-{{ $category->id }}-{{ $child->id }}-stickers"
                                    class="subcategory{{ $loop->first && $firstLoop ? '-selected' : '' }}">
                                    <div>{{ $child->caption }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <div id="webstore-content-container">
        <div id="webstore-items-container">
            <h4>Select an item by clicking it</h4>
            <div id="webstore-items">
                <ul id="webstore-item-list">
                    @isset($items)
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
                    @endisset
                </ul>
            </div>
        </div>
        <div id="webstore-preview-container">
            <div id="webstore-preview-default"></div>


            <div id="webstore-preview">
                @isset($items)
                    @php($firstItem = $items->first())
                    <h4 title="">{{ $firstItem->caption }}</h4>

                    <div id="webstore-preview-box">
                    </div>
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
                        <br>
                        <a href="#" class="colorlink orange last" id="webstore-purchase"><span>Purchase</span></a>
                    </div>

                    <span id="webstore-preview-bg-text" style="display: none">Preview</span>
                @endisset
            </div>


        </div>
    </div>

    <div id="inventory-categories-container">
        <h4>Categories:</h4>
        <div id="inventory-categories">
            <ul class="purchase-main-category">
                <li id="inv-cat-stickers" class="selected-main-category-no-subcategories">
                    <div>Stickers</div>
                </li>
                <li id="inv-cat-backgrounds" class="main-category-no-subcategories">
                    <div>Backgrounds</div>
                </li>
                <li id="inv-cat-widgets" class="main-category-no-subcategories">
                    <div>Widgets</div>
                </li>
                <li id="inv-cat-notes" class="main-category-no-subcategories">
                    <div>Notes</div>
                </li>
            </ul>

        </div>
    </div>

    <div id="inventory-content-container">
        <div id="inventory-items-container">
            <h4>Select an item by clicking it</h4>
            <div id="inventory-items">
                <ul id="inventory-item-list">
                    @isset($inventory)
                        @foreach ($inventory as $item)
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
                        @for ($i = 0; $i < ($inventory->count() <= 20 ? 20 - $inventory->count() : 4 - ($inventory->count() % 4)); $i++)
                            <li class="webstore-item-empty"></li>
                        @endfor
                    @endisset

                </ul>
            </div>
        </div>
        <div id="inventory-preview-container">
            <div id="inventory-preview-default"></div>
            <div id="inventory-preview">
                <h4>&nbsp;</h4>

                <div id="inventory-preview-box"></div>

                <div id="inventory-preview-place" class="clearfix">
                    <div class="clearfix">
                        <a href="#" class="colorlink orange last" id="inventory-place"><span>Place</span></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="webstore-close-container">
        <div class="clearfix"><a href="#" id="webstore-close" class="new-button"><b></b><i></i></a></div>
    </div>
</div>
