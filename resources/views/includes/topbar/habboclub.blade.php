@if (Auth::check())
    @if (user()->getSubscription()->isExpired())
        <h3> {{ __('You has :days HC days', ['days' => user()->getSubscription()->daysRemaining()]) }}</h3>
    @else
        <h3> {{ __('You are not a member of :hotel Club', ['hotel' => cms_config('hotel.name.short')]) }}</h3>
    @endif
@else
    <h3>{!! __('Please <a href="/login">sign in</a> to see your Club status', [
        'hotel' => cms_config('hotel.name.short'),
    ]) !!}</h3>
@endif
<div class="tabmenu-inner-content">
    <p>{{ __(':hotel Club gives you access to the full benefits on :fullhotel.', ['hotel' => cms_config('hotel.name.short'), 'fullhotel' => cms_config('hotel.name.full')]) }}
    </p>
    <p> <a href="/club"
            class="arrow"><span>{{ __('More about :hotel Club', ['hotel' => cms_config('hotel.name.short')]) }}</span></a>
    </p>
</div>
<script>
    habboClubUpdated = false;
</script>
