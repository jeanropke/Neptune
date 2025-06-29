<ul class="groups-list">
    @forelse($owner->groups()->with('group')->get() as $group)
        <li title="{{ $group->group->name }}" id="groups-list-1-{{ $group->group->id }}">
            <div class="groups-list-icon">
                <a href="{{ url('/') }}/groups/{{ $group->group->id }}/id">
                    <img src="{{ cms_config('site.groupbadge.url') }}{{ $group->group->badge }}.gif">
                </a>
            </div>
            <div class="groups-list-open"></div>
            <h4>
                <a href="{{ url('/') }}/groups/{{ $group->group->id }}/id">{{ $group->group->name }}</a>
            </h4>
            <p>
                Group created: <br>
                @if ($owner->favourite_group == $group->group->id)
                    <img src="{{ url('/') }}/web/images/groups/favourite_group_icon.gif" width="15" height="15" class="groups-list-icon" alt="Favorite" title="Favorite">
                @endif
                @if ($owner->id == $group->group->owner_id)
                    <img src="{{ url('/') }}/web/images/groups/owner_icon.gif" width="15" height="15" class="groups-list-icon" alt="Owner" title="Owner">
                @endif
                <b>{{ $group->group->created_at->format('M d, Y') }}</b>
            </p>
            <div class="clear"></div>
        </li>
    @empty
        No groups
    @endforelse
</ul>
