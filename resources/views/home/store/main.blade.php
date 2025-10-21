<div id="webstore-categories">
    <ul class="purchase-subcategory-list">
        @foreach ($categories as $category)
            <li id="category-{{ $category->id }}-stickers">
                <div>{{ $category->name }}</div>
            </li>
        @endforeach
    </ul>
</div>
<div id="webstore-content-container">
    @include('home.store.items')
</div>
<div class="clear"></div>
<div>
    <a href="#" id="webstore-close" class="toolbutton"><span>Close</span></a>
    <a href="#" id="load-inventory" class="colorlink" style="margin: 0; margin-top: 4px"><span>Open Inventory <span id="webstore-inventory-new"></span></span></a>
</div>
<div id="inventory-content"></div>
