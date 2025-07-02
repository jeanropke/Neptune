
@php($gbUser = \App\Models\User::find($message->user_id))
<li id="guestbook-entry-{{ $message->id }}" class="guestbook-entry">
    <div class="guestbook-author">
        <img src="{{ cms_config('site.avatarimage.url') }}{{ $gbUser->figure }}&size=s&direction=2&head_direction=2" alt="{{ $gbUser->username }}"
            title="{{ $gbUser->username }}" />
    </div>
    <div class="guestbook-actions">
        @if (Auth::check())
            @if ((user()->id == $message->user_id || user()->id == $ownerId) && (isset($isEdit) && $isEdit) || user()->hasPermission('cms_home_can_delete_message'))
                <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/delete_entry_button.gif" id="gbentry-delete-{{ $message->id }}" class="gbentry-delete" style="cursor:pointer; float: right" alt="" /><br />
            @endif
            <div class="report-button" style="display: none">
                <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="gbentry-report" id="gbentry-report-{{ $message->id }}" />
            </div>
        @endif
    </div>
    <div class="guestbook-message">
        <div class="{{ $gbUser->isOnline() ? 'online' : 'offline' }}">
            <a href="{{ url('/') }}/home/{{ $gbUser->username }}">{{ $gbUser->username }}</a>
        </div>
        <p>{!! bb_format($message->message) !!}</p>
    </div>
    <div class="guestbook-cleaner">&nbsp;</div>
    <div class="guestbook-entry-footer metadata">
        {{ $message->created_at->format('M d, Y H:i:s') }}
    </div>
</li>
