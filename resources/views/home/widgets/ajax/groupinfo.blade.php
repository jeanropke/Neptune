@if ($group)
    <div class="groups-info-basic">
        <div class="groups-info-close-container">
            <a href="#" class="groups-info-close"></a>
        </div>
        <div class="groups-info-icon"><a href="{{ url('/') }}/groups/{{ $group->id }}/id"><img src="{{ cms_config('site.groupbadge.url') }}{{ $group->badge }}.png"></a></div>
        <h4><a href="{{ url('/') }}/groups/{{ $group->id }}/id">{{ $group->name }}</a></h4>
        <p>
            Group created:<br />
            <b>{{ $group->created_at->format('M d, Y') }}</b>
        </p>
        <div class="groups-info-description">
            {{ $group->description }}
        </div>
    </div>

    <div class="groups-info-actions">
        <p>
            Privilege: <b>
                {{ trans('myhabbo.group.rank_' . $group->getMember(request()->ownerId)->member_rank) }}
            </b>
        </p>
        @if (user() && request()->ownerId == user()->id)
            <p>
                @if (user()->getFavoriteGroup() && user()->getFavoriteGroup()->id == $group->id)
                    <a href="#" class="groups-info-deselect-favorite toolbutton"><span>Remove favorite</span></a>
                @else
                    <a href="#" class="groups-info-select-favorite toolbutton"><span>Make favorite</span></a>
                @endif
            </p>
        @endif
        <div class="clear"></div>
    </div>
@else
    <div class="groups-info-basic">
        <div class="groups-info-close-container">
            <a href="#" class="groups-info-close"></a>
        </div>
        Invalid group or no group supplied.
    </div>
@endif
