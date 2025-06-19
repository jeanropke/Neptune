@auth
    @if (!user()->getSubscription()->isExpired())
        <h3> {{ trans_choice('master.auth_hc_days', user()->getSubscription()->daysRemaining(), ['days' => user()->getSubscription()->daysRemaining(), 'short_club' => cms_config('club.name.short')]) }} </h3>
    @else
        <h3> {{ trans('master.auth_not_member', ['short_name' => cms_config('hotel.name.short')]) }} </h3>
    @endif
@endauth
@guest
    <h3>{!! trans('master.guest_hc_days', ['short' => cms_config('hotel.name.short'), 'url' => '/login']) !!}</h3>
@endguest
<div class="tabmenu-inner-content">
    <p>
        {{ trans('master.hc_days_benefits', ['short_name' => cms_config('hotel.name.short'), 'full_name' => cms_config('hotel.name.short')]) }}
    </p>
    <p>
        <a href="/club" class="arrow">
            <span>{{ trans('master.hc_days_about', ['short_name' => cms_config('hotel.name.short')]) }}</span>
        </a>
    </p>
</div>
<script>
    habboClubUpdated = false;
</script>
