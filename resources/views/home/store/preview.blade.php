<div id="webstore-preview-box"></div>
<div style="width: 110px; float: right;">
    <h4 title="">{{ $item->name }}</h4>
    <div id="webstore-preview-price">
        Price:<br><b>
            {{ $item->price }} credit
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
