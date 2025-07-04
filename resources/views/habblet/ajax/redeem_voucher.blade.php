<div id="redeem_voucher">
    <img src="{{ cms_config('site.web.url') }}/images/common/habbo_purse_big_64.gif" alt="" align="left" style="margin:10px;">
    <p><b>{{ $status }}</b></p>
    <p>
        {{ $message }}
    </p>
    @if(isset($history))
        @if($history->credits_redeemed > 0)
        <p>You will receive <b>{{ $history->credits_redeemed }}</b> credits</p>
        @endif
        @if($history->items_redeemed)
            @php($items = explode('|', $history->items_redeemed))
            @foreach ($items as $entry)
                @php($item = explode(',', $entry))
                <p>{{ $item[0] }}x {{ get_cata_item($item[1]) }}</p>
            @endforeach
        @endif
    @endif
    <p>
    </p>
    <table align="right">
        <tbody>
            <tr>
                <td></td>
                <td><a href="#" class="colorlink" id="voucher-dialog-ok"  style="margin-left: 5px;"><span><b>Ok</b></span><i></i></a></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="clear"></div>
</div>
