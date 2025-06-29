<div class="movable widget FriendsWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    @php($friends = $user->getFriends()->take(1))
    <div class="w_skin_{{ $item->skin }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3><span class="header-left">&nbsp;</span><span class="header-middle">My Friends (<span
                            id="avatar-list-size">{{ $user->getFriends()->count() }}</span>)</span><span class="header-right">&nbsp;@include('home.edit_button', ['type' => 'widget'])</span></h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">

                <div id="avatar-list-search">
                    <input type="text" style="float:left;" id="avatarlist-search-string">
                    <a class="colorlink orange last" style="float:left;" id="avatarlist-search-button"><span>Search</span></a>
                </div>
                <br clear="all">

                <div id="avatarlist-content">

                    <div class="avatar-widget-list-container">
                        <ul id="avatar-list-list" class="avatar-widget-list">
                            @forelse($friends->take(20)->get() as $friend)
                            @php($friend = \App\Models\User::find($friend->user_two_id))
                            <li id="avatar-list-{{ $item->id }}-{{ $friend->id }}" title="{{ $friend->username }}">
                                <div class="avatar-list-open">
                                    <a href="#" id="avatar-list-open-link-{{ $item->id }}-{{ $friend->id }}"
                                        class="avatar-list-open-link"></a>
                                </div>
                                <div class="avatar-list-avatar">
                                    <img src="{{ cms_config('site.avatarimage.url') }}?hb=image&figure={{ $friend->look }}&headonly=0&direction=4&head_direction=4&action=&gesture=sml&size=n"
                                        alt="">
                                </div>
                                <h4><a href="{{ url('/') }}/home/{{ $friend->username }}">{{ $friend->username }}</a>
                                </h4>
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
                            <div class="avatar-list-info-close-container"><a href="#"
                                    class="avatar-list-info-close"></a></div>
                            <div class="avatar-list-info-container"></div>
                        </div>

                    </div>

                    <div id="avatar-list-paging">
                        {{ $friends->count() > 0 ? '1' : '0' }} -
                        {{ $user->getFriends()->count() >= 20 ? '20' : $user->getFriends()->count() }} /
                        {{ $user->getFriends()->count() }}
                        <br>
                        @if($user->count() > 20)
                        First |
                        &lt;&lt; |
                        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-next">&gt;&gt;</a> |
                        <a href="#" class="avatar-list-paging-link" id="avatarlist-search-last">Last</a>
                        @endif
                        <input type="hidden" id="pageNumber" value="1">
                        <input type="hidden" id="totalPages" value="{{ ceil($user->getFriends()->count()/20) }}">

                    </div>

                    <script type="text/javascript">

                        Event.onDOMReady(function() {
                            new FriendsWidget('{{ $user->id }}', '{{ $item->id }}');
                        });
                    </script>

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
