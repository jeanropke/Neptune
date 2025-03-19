<li id="guestbook-entry-{{ $guestbook->id }}" class="guestbook-entry">
    <div class="guestbook-author">
        <img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}&direction=2&head_direction=2&gesture=sml&size=s" alt="{{ Auth::user()->username }}" title="{{ Auth::user()->username }}" />
    </div>
    <div class="guestbook-actions">
        <img src="{{ url('/') }}/web/images/myhabbo/buttons/delete_entry_button.gif" id="gbentry-delete-{{ $guestbook->id }}" class="gbentry-delete" style="cursor:pointer" alt="" />
        <br/>
    </div>
    <div class="guestbook-message">
        <div class="online">
            <a href="{{ url('/') }}/home/{{ Auth::user()->username }}">
                {{ Auth::user()->username }}
            </a>
        </div>
        <p>
            {!! $guestbook->message  !!}
        </p>
    </div>
    <div class="guestbook-cleaner">&nbsp;</div>
    <div class="guestbook-entry-footer metadata">
        {{ \Carbon\Carbon::createFromTimeStamp($guestbook->time)->format('M d, Y h:i:s') }}<
    </div>
</li>