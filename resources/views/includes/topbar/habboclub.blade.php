@if (Auth::check())
    @if (!user()->getSubscription()->isExpired())
        <h3> You has {{ user()->getSubscription()->daysRemaining() }} HC days</h3>
    @else
        <h3> You are not a member of {{ cms_config('hotel.name.short') }} Club</h3>
    @endif
@else
    <h3>Please <a href="/login">sign in</a> to see your {{ cms_config('hotel.name.short') }} Club status</h3>
@endif
<div class="tabmenu-inner-content">
    <p>{{ cms_config('hotel.name.short') }} Club gives you access to the full benefits on {{ cms_config('hotel.name.full') }}.
    </p>
    <p> <a href="/club" class="arrow"><span>More about {{ cms_config('hotel.name.short') }} Club</span></a>
    </p>
</div>
<script>
    habboClubUpdated = false;
</script>
