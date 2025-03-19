<div class="avatar-widget-list-container">
    <ul id="avatar-list-list" class="avatar-widget-list">
        @forelse($pageFriends as $friend)
            @php($friend = \App\User::find($friend->user_two_id))
            <li id="avatar-list-{{ $widgetId }}-{{ $friend->id }}" title="{{ $friend->username }}">
                <div class="avatar-list-open">
                    <a href="#" id="avatar-list-open-link-{{ $widgetId }}-{{ $friend->id }}" class="avatar-list-open-link"></a>
                </div>
                <div class="avatar-list-avatar">
                    <img src="https://www.habbo.com/habbo-imaging/avatarimage?hb=image&figure={{ $friend->look }}&headonly=0&direction=4&head_direction=4&action=&gesture=sml&size=s" alt="">
                </div>
                <h4><a href="{{ url('/') }}/home/{{ $friend->username }}">{{ $friend->username }}</a></h4>
                <p class="avatar-list-birthday">
                    {{ \Carbon\Carbon::createFromTimeStamp($friend->account_created)->format('M d, Y') }}
                </p>
                <p>

                </p>
            </li>
        @empty
            No friends.
        @endforelse
    </ul>

    <div id="avatar-list-info" class="avatar-list-info">
        <div class="avatar-list-info-close-container"><a href="#" class="avatar-list-info-close"></a></div>
        <div class="avatar-list-info-container"></div>
    </div>

</div>

<div id="avatar-list-paging">
    {{ $friends->count() > 0 ? '1' : '0' }} - {{ $friends->count() >= 20 ? '20' : $friends->count() }} / {{ $friends->count() }}
    <br>


    @if($friends->count() > 20)
    @if($page != 1)
        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-first">First</a> |
        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-previous">&lt;&lt;</a> |
    @else
        First | &lt;&lt; |
    @endif
    @if($page != $totalPages)
        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-next">&gt;&gt;</a> |
        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-last">Last</a>
    @else
        &gt;&gt; | Last
    @endif
    @endif


    <input type="hidden" id="pageNumber" value="{{ $page }}">
    <input type="hidden" id="totalPages" value="{{ $totalPages }}">
</div>
