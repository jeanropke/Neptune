
@forelse($messages as $message)
@php($gbUser = \App\Models\User::find($message->user_id))
<li id="guestbook-entry-{{ $message->id }}" class="guestbook-entry">
    <div class="guestbook-author">
        <img src="{{ cms_config('site.avatarimage.url') }}?figure={{ $gbUser->look }}&size=s&direction=2&head_direction=2&gesture=sml"
            alt="{{ $gbUser->username }}" title="{{ $gbUser->username }}" />
    </div>
    <div class="guestbook-actions">
        @if(Auth::check())
        @if(user()->id == $message->user_id || user()->id == $ownerId || user()->hasPermission('cms_home_can_delete_message'))
        <img src="{{ url('/') }}/web/images/myhabbo/buttons/delete_entry_button.gif"
            id="gbentry-delete-{{ $message->id }}" class="gbentry-delete" style="cursor:pointer"
            alt="" /><br />
        @endif
        @endif
    </div>

    <div class="guestbook-message">
        <div class="{{ $gbUser->isOnline() ? 'online' : 'offline' }}">
            <a href="{{ url('/') }}/home/{{ $gbUser->username }}">{{ $gbUser->username }}</a>
        </div>
        <p>{!! $message->message !!}</p>
    </div>


    <div class="guestbook-cleaner">&nbsp;</div>
    <div class="guestbook-entry-footer metadata">
        {{ \Carbon\Carbon::createFromTimeStamp($message->time)->format('M d, Y h:i:s') }}</div>
</li>
@empty
<div id="guestbook-empty-notes">Sem mensagens</div>
@endforelse
