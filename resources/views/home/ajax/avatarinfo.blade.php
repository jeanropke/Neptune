<div class="avatar-list-info-container">
    <div class="avatar-info-basic">
        <div class="avatar-list-info-close-container">
            <a href="#" class="avatar-list-info-close" id="avatar-list-info-close-{{ $friend->id }}"></a>
        </div>
        <div class="avatar-info-image">
            @if($badgeslot)
            <img src="{{ cms_config('site.badges.url') }}/{{ $badgeslot->badge_code }}.gif">
            @endif
            <img src="{{ cms_config('site.avatarimage.url') }}?figure={{ $friend->look }}&size=n&direction=4&head_direction=4"
                alt="{{ $friend->username }}" />
        </div>
        <h4><a href="{{ url('/') }}/home/{{ $friend->username }}">{{ $friend->username }}</a></h4>
        <p>
            <img
                src="{{ url('/') }}/web/images/myhabbo/profile/{{ $friend->isOnline() ? 'habbo_online_anim_big.gif' : 'habbo_offline_big.gif' }}" />
        </p>
        <p>
            {{ cms_config('hotel.name.short') }} created on:
            <b>{{ \Carbon\Carbon::createFromTimeStamp($friend->account_created)->format('M d, Y') }}</b>
        </p>
        <p>
            <a href="{{ url('/') }}/home/{{ $friend->username }}" class="arrow">View {{ cms_config('hotel.name.short') }}s page</a>
        </p>
        <p class="avatar-info-motto">
            {{ $friend->motto }}
        </p>
    </div>
</div>
