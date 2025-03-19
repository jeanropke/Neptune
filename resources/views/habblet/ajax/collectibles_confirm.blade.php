<div id="collectables_confirm_box">
    @php($cata = $item->getCatalogueItem())
    @php($furni = $cata->getItemBase())
    <img src="{{ cms_config('url.furni.large') }}/{{ $furni->getNormalizedName() }}.png" alt="" align="left" style="margin:10px;">
    <p><b>Confirmation</b></p>
    <p>
        Are you sure you want to purchase {{ $furni->public_name }}?
        It will cost {{ $cata->cost_credits }} credits.
        {{ format_prices($cata->cost_credits, $cata->cost_points, $cata->points_type) }}
    </p>
    <p>
    </p><table align="right">
        <tbody>
            <tr>
                <td><a href="#" class="colorlink noarrow" style="margin-left: 5px;" id="collectibles-close"><span><b>Cancel</b></span><i></i></a></td>
                <td> <a href="#" class="colorlink" id="collectibles-purchase"><span><b>Purchase</b></span><i></i></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="clear"></div>
</div>
