<div id="collectables_confirm_box">
    @php($cata = $collectable->item)
    <img src="{{ cms_config('furni.large.url') }}/{{ $cata->getNormalizedName() }}.png" alt="" align="left" style="margin:10px;">
    <p><b>{{ isset($error) ? 'Error' : 'Success' }}</b></p>
    <p>
        {!! isset($error) ? $error : "You've succesfully bought a <b>{$cata->name}</b>!" !!}
    </p>
    <p>
    </p><table align="right">
        <tbody>
            <tr>
                <td></td>
                <td><a href="#" class="colorlink" id="collectibles-close" style="margin-left: 5px;"><span><b>Ok</b></span><i></i></a></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="clear"></div>
</div>
