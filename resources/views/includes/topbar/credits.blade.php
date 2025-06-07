@auth
    <h3>{{ trans_choice('master.auth_credits', user()->credits, ['credits' => user()->credits]) }}</h3>
@endauth
@guest
    <h3>{!! trans('master.guest_credits', ['url' => '/login']) !!}</h3>
@endguest
<div class="tabmenu-inner-content">
    <p>
        <img src="/web/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins">
        <a href="/credits" class="arrow">
            <span>{{ trans('master.buy_more_credits') }}</span>
        </a>
    </p>
    <p>
        <a href="/credits/redeem" class="arrow">
            {{ trans('master.redeem_code') }}
        </a>
    </p>
</div>
<script>
    creditsUpdated = false;
</script>
