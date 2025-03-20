@forelse ($friends as $friend)
    <div class="friend" id="f{{ $loop->index }}">
        <a href="{{ url('/') }}/home/{{ $friend->username }}"><img
                src="{{ cms_config('site.avatarimage.url') }}{{ $friend->figure }}&amp;size=s&amp;direction=2&amp;head_direction=2&amp;gesture=sml"
                alt="{{ $friend->username }}"{{-- width="30" height="56" --}}></a>
    </div>
@empty
    Sem amigos
@endforelse
<div class="clear"></div>

@foreach ($friends as $friend)
    <div id="finf-{{ $loop->index }}" class="friend_info">
        Name: <a href="{{ url('/') }}/home/{{ $friend->username }}">{{ $friend->username }}</a><br>
        Habbo Birthday: {{ \Carbon\Carbon::parse($friend->created_at)->format('M d, Y') }} <br>
        Motto: {{ $friend->motto }}<br>
    </div>
@endforeach

<script language="JavaScript" type="text/javascript">
    @foreach ($friends as $friend)
        Event.observe('f{{ $loop->index }}', "mouseover", function(e) {
            FriendsWidget.showFriendData('{{ $loop->index }}', {{ $friends->count() }});
        });
        Event.observe('f{{ $loop->index }}', "mouseout", function(e) {
            FriendsWidget.hideFriendData('{{ $loop->index }}', 1000);
        });
        Event.observe('finf-{{ $loop->index }}', "mouseover", function(e) {
            FriendsWidget.stopHideTimer();
        });
        Event.observe('finf-{{ $loop->index }}', "mouseout", function(e) {
            FriendsWidget.hideFriendData('{{ $loop->index }}', 1000);
        });
    @endforeach
</script>
