<div id="collectables_confirm_box">
    @php($cata = $collectable->getCatalogueItem())
    <img src="{{ cms_config('furni.large.url') }}/{{ $cata->getNormalizedName() }}.png" alt="" align="left" style="margin:10px;">
    <p><b>Confirmation</b></p>
    <p>
        Are you sure you want to purchase <b>{{ $cata->name }}</b>?
        It will cost <b>{{ $collectable->getPrice() }}</b> credits.
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
