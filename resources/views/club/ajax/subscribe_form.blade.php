<div id="hc_confirm_box">
    <img src="{{ url('/') }}/web/images/club/piccolo_happy.gif" alt="" align="left" style="margin:10px;">
    <p><b>Confirmation</b></p>
    <p> {{ cms_config('hotel.name.short') }} Club {{ $month }} month ({{ $days }} days) costs {{ $price }} Credits. You currently have: {{ Auth::user()->credits }} Credits.</p>
    <p>
    <table align="right">
        <tbody>
        <tr>
            <td>	<a  href="#" class="colorlink" onclick="showSubscriptionResult('{{ $optionNumber }}','Subscription Status'); return false;"><span><b>Subscribe</b></span><i></i></a></td>
            <td><a href="#" class="colorlink noarrow" onclick="closeSubscription(); return false;" style="margin-left: 5px;"><span><b>Cancel</b></span><i></i></a></td>
        </tr>
        </tbody>
    </table>
    </p>
</div>
<div class="clear"></div>