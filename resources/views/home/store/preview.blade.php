<h4 title="">{{ $item->caption }}</h4>

<div id="webstore-preview-box">

</div>

<div id="webstore-preview-price">
    Price:<br><b>
        {{ $item->price }} credit
    </b>
</div>

<div id="webstore-preview-purse">
    You have:<br><b>{{ Auth::user()->credits }} credits</b><br>
    <a href="{{ url('/') }}/credits" target="_blank">Get Credits</a>
</div>

<div id="webstore-preview-purchase">
    <br>
    <a href="#" class="colorlink orange last" id="webstore-purchase"><span>Purchase</span></a>
</div>

<span id="webstore-preview-bg-text" style="display: none">Preview</span>
