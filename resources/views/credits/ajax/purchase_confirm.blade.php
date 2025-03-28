    <p>Are you sure you want to purchase <b>{{ $pack->name }}</b> for <b>{{ $pack->price }} Credits</b>?</p>
    <p>
        <table align="right">
            <tbody>
                <tr>
                    <td> <a href="#" class="colorlink" onclick="purchaseFurnitureResult('{{ $pack->salecode }}'); return false;"><span><b>Purchase</b></span><i></i></a>
                    </td>
                    <td><a href="#" class="colorlink noarrow" onclick="closePurchase(); return false;"
                            style="margin-left: 5px;"><span><b>Cancel</b></span><i></i></a></td>
                </tr>
            </tbody>
        </table>
    </p>
<div class="clear"></div>
