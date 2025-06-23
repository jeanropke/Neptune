<div id="group-memberlist-members">

    <ul class="group-memberlist-list">
        @foreach ($members as $member)
            <li id="group-memberlist-{{ $member->user_id }}">
                <div class="group-memberlist-member">
                    <div class="group-memberlist-cb">
                        @if ($myself->member_rank <= $member->member_rank && $myself->member_rank >= 2)
                            <input type="checkbox" disabled="disabled" style="margin: 0; padding: 0; vertical-align: middle" />
                        @else
                            @if ($member->member_rank == 2)
                                <input type="checkbox" id="group-memberlist-a-{{ $member->user_id }}" style="margin: 0; padding: 0; vertical-align: middle" />
                            @elseif($member->member_rank == 1)
                                <input type="checkbox" id="group-memberlist-m-{{ $member->user_id }}" style="margin: 0; padding: 0; vertical-align: middle" />
                            @endif
                        @endif
                    </div>
                    <span>{{ $member->username }}</span>
                    <div class="group-memberlist-open"></div>
                    <div style="float: right; height: 16px; margin-top: 1px">
                        @if ($member->member_rank == 3)
                            <img src="{{ url('/') }}/web/images/groups/owner_icon.gif" width="15" height="15" alt="" title="" />
                        @endif
                        @if ($member->member_rank == 2)
                            <img src="{{ url('/') }}/web/images/groups/administrator_icon.gif" width="15" height="15" alt="Administrator" title="Administrator" />
                        @endif
                        @if (!isset($pending) && ($member->getUser()->getFavoriteGroup() && $member->getUser()->getFavoriteGroup()->id == $group->id))
                            <img src="{{ url('/') }}/web/images/groups/favourite_group_icon.gif" alt="">
                        @endif
                    </div>
                </div>
            </li>
            <div id="group-memberlist-avatarinfo-{{ $member->user_id }}" style="display: none" class="group-memberlist-avatarinfo"></div>
        @endforeach
    </ul>
    @if ($page)
        <div id="member-list-pagenumbers">
            {{ ($page - 1) * 16 + 1 }} - {{ ($page - 1) * 16 + 16 > $members->count() ? $members->count() : ($page - 1) * 16 + 16 }} / {{ $members->count() }}
        </div>
    @endif
    <div id="member-list-paging" style="margin-top:10px">
        @if ($totalPages > 1)
            @if ($page != 1)
                <a href="#" class="avatar-list-paging-link" id="memberlist-search-first">First</a> |
                <a href="#" class="avatar-list-paging-link" id="memberlist-search-previous">&lt;&lt;</a> |
            @else
                First | &lt;&lt; |
            @endif

            @if ($page != $totalPages)
                <a href="#" class="avatar-list-paging-link" id="memberlist-search-next">&gt;&gt;</a> |
                <a href="#" class="avatar-list-paging-link" id="memberlist-search-last">Last</a>
            @else
                &gt;&gt; | Last
            @endif
        @endif
        <input type="hidden" id="pageNumberMemberList" value="{{ $page }}" />
        <input type="hidden" id="totalPagesMemberList" value="{{ $totalPages }}" />
    </div>
</div>
