<p>
    Are you sure you want to purchase this group?
</p>

<table align="right" id="group-confirmation-button-area">
    <tbody>
        <tr>
            <td><a href="#" class="colorlink noarrow" style="margin-left: 5px;" onclick='cancelGroupPurchase(); return false;'><span><b>Cancel</b></span><i></i></a></td>
            <td> <a href="#" class="colorlink" onclick='showGroupPurchaseResult("{{ $product->sale_code }}", "{{ $name }}", "{{ $description }}", "Create a group"); return false;'><span><b>Purchase</b></span><i></i></a>
            </td>
        </tr>
    </tbody>
</table>
<div class="clear"></div>
