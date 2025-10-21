<div class="avatar-widget-list-container">
    <ul id="avatar-list-list" class="avatar-widget-list">
        @foreach ($members as $member)
            <li id="avatar-list-{{ $item->id }}-{{ $member->user->id }}" title="{{ $member->user->username }}">
                <div class="avatar-list-open">
                    <a href="#" id="avatar-list-open-link-{{ $item->id }}-{{ $member->user->id }}" class="avatar-list-open-link"></a>
                </div>
                <div class="avatar-list-avatar">
                    <img src="{{ cms_config('site.avatarimage.url') . $member->user->figure }}&headonly=0&direction=4&head_direction=4&action=&gesture=sml&size=s" alt="">
                </div>
                <h4><a href="{{ url('/') }}/home/{{ $member->user->username }}">{{ $member->user->username }}</a></h4>
                <p class="avatar-list-birthday">
                    {{ $member->user->created_at->format('M d, Y') }}
                </p>
                <p>
                    @if ($member->user->favourite_group == $owner->id)
                        <img src="{{ cms_config('site.web.url') }}/images/groups/favourite_group_icon.gif" width="15" height="15" class="groups-list-icon" alt="Favorite"
                            title="Favorite">
                    @endif
                    @if ($member->user->id == $owner->owner_id)
                        <img src="{{ cms_config('site.web.url') }}/images/groups/owner_icon.gif" width="15" height="15" class="groups-list-icon" alt="Owner" title="Owner">
                    @endif

                    @if ($member->member_rank == 2)
                        <img src="{{ cms_config('site.web.url') }}/images/groups/administrator_icon.gif" width="15" height="15" class="groups-list-icon" alt="Owner" title="Owner">
                    @endif
                </p>
            </li>
        @endforeach
    </ul>

    <div id="avatar-list-info" class="avatar-list-info">
        <div class="avatar-list-info-close-container"><a href="#" class="avatar-list-info-close"></a></div>
        <div class="avatar-list-info-container"></div>
    </div>

</div>

<div id="avatar-list-paging">
    {{ $members->count() > 0 ? '1' : '0' }} - {{ $members->count() >= 20 ? '20' : $members->count() }} /
    {{ $members->count() }}
    <br>


    @if ($members->count() > 20)
        @if (($page ?? 1) != 1)
            <a href="#" class="avatar-list-paging-link" id="avatarlist-search-first">First</a> |
            <a href="#" class="avatar-list-paging-link" id="avatarlist-search-previous">&lt;&lt;</a> |
        @else
            First | &lt;&lt; |
        @endif
        @if (($page ?? 1) != ceil($totalPages ?? 1 / 20))
            <a href="#" class="avatar-list-paging-link" id="avatarlist-search-next">&gt;&gt;</a> |
            <a href="#" class="avatar-list-paging-link" id="avatarlist-search-last">Last</a>
        @else
            &gt;&gt; | Last
        @endif
    @endif


    <input type="hidden" id="pageNumber" value="{{ $page ?? 1 }}">
    <input type="hidden" id="totalPages" value="{{ ceil($totalPages ?? 1 / 20) }}">
</div>
