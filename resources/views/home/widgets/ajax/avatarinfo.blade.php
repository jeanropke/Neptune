<div class="avatar-list-info-container">
    <div class="avatar-info-basic">
        <div class="avatar-list-info-close-container">
            <a href="#" class="avatar-list-info-close" id="avatar-list-info-close-{{ $user->id }}"></a>
        </div>
        <div class="avatar-info-image">
            <img src="{{ cms_config('site.avatarimage.url') }}{{ $user->figure }}&size=n&direction=4&head_direction=4" alt="{{ $user->username }}" />
        </div>
        <h4><a href="{{ url('/') }}/home/{{ $user->username }}">{{ $user->username }}</a></h4>
        <p>
            <img src="{{ cms_config('site.web.url') }}/images/myhabbo/profile/{{ $user->isOnline() ? 'habbo_online_anim_big.gif' : 'habbo_offline_big.gif' }}" />
        </p>
        <p>
            {{ cms_config('hotel.name.short') }} created on:
            <b>{{ $user->created_at->format('M d, Y') }}</b>
        </p>
        <p>
            <a href="{{ url('/') }}/home/{{ $user->username }}" class="arrow">View {{ cms_config('hotel.name.short') }}s page</a>
        </p>
        <p class="avatar-info-motto">
            {{ $user->motto }}
        </p>
    </div>
    <div class="avatar-info-rights">
        <div>
            <p>
                Privilege: <b>
                    {{ trans('myhabbo.group.rank_' . $group->getMember($user->id)->member_rank) }}
                </b>
            </p>
        </div>
        <div>
            @if (user() && $group->owner_id == user()->id)
                @if ($group->owner_id != $user->id)
                    @if ($group->getMember($user->id)->member_rank == 2)
                        <a href="#" class="avatar-info-rights-revoke toolbutton"><span>Revoke rights</span></a>
                    @else
                        <a href="#" class="avatar-info-rights-give toolbutton"><span>Give rights</span></a>
                    @endif

                    @if ($user->id == user()->id)
                        <a href="#" class="avatar-info-rights-leave toolbutton"><span>Leave group</span></a>
                    @else
                        <a href="#" class="avatar-info-rights-remove toolbutton"><span>Remove</span></a>
                    @endif
                @endif
            @endif
        </div>
        <div class="clear"></div>
    </div>
</div>
