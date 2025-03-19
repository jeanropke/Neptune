@if($group)
    <div class="groups-info-basic">
        <div class="groups-info-close-container">
            <a href="#" class="groups-info-close"></a>
        </div>
        <div class="groups-info-icon"><a href="{{ url('/') }}/groups/{{ $group->id }}/id"><img src="{{ url('/') }}/gordon/c_images/Badgeparts/generated/{{ $group->badge }}.png"></a></div>
        <h4><a href="{{ url('/') }}/groups/{{ $group->id }}/id">{{ $group->name }}</a></h4>
        <p>
            Group created:<br />
            <b>{{ \Carbon\Carbon::createFromTimeStamp($group->date_created)->format('M d, Y') }}</b>
        </p>
        <div class="groups-info-description">
            {{ $group->description }}
        </div>
    </div>
@else
    <div class="groups-info-basic">
        <div class="groups-info-close-container">
            <a href="#" class="groups-info-close"></a>
        </div>
        Invalid group or no group supplied.
    </div>
@endif
