@if(Auth::check())
<h3>{{ __('You has :credits Credits', ['credits' => user()->credits]) }}</h3>
@else
<h3>{!! __('Please <a href="/login">sign in</a> to see your balance') !!}</h3>
@endif
<div class="tabmenu-inner-content">
    <p> <img src="/web/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21"
    class="tabmenu-image coins"> <a href="/credits" class="arrow"><span>{{ __('Buy More Coins') }}</span></a> </p>
    <p> <a href="/credits/redeem" class="arrow">{{ __('Redeem a Coin or Furni Code') }}</a> </p>
</div>
<script>creditsUpdated = false;</script>
