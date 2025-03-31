@foreach ($items as $item)
    <div class="slot" data-furni="{{ $item->sale_code }}">
        <div class="image" style="background-image: url({{ cms_config('furni.small.url') }}/{{ $item->getNormalizedName() }}_icon.png)"></div>
    </div>
@endforeach
<div class="clear"></div>
