<div class="movable widget RoomsWidget" id="widget-{{ $item->id }}"
    style=" left: {{ $item->x }}px; top: {{ $item->y }}px; z-index: {{ $item->z }};">
    <div class="w_skin_{{ $item->skinName }}">
        <div class="widget-corner" id="widget-{{ $item->id }}-handle">
            <div class="widget-headline">
                <h3>
                    <span class="header-left"></span>
                    <span class="header-middle">&nbsp;MY ROOMS&nbsp;</span>
                    <span class="header-right">@include('home.edit_button', ['type' => 'widget'])</span>
                </h3>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-content">
                <div id="room_wrapper">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            @forelse($owner->rooms as $room)
                            <tr>
                                <td valign="top" class="dotted-line">
                                    <div class="room_image">
                                        <img src="{{ cms_config('site.web.url') }}/images/myhabbo/rooms/room_icon_{{ $room->getState() }}.gif"
                                            alt="" align="middle">
                                    </div>
                                </td>
                                <td class="dotted-line" style="width: 100%;">
                                    <div class="room_info">
                                        <div class="room_name">
                                            {{ $room->name }}
                                        </div>
                                        <div class="clear"></div>
                                        <div>{{ $room->description }}
                                        </div>
                                        @if($room->getState() != 'locked')
                                        <a href="{{ url('/') }}/client?forwardId=2&amp;roomId={{ $room->id }}"
                                            target="client" id="room-navigation-link_11"
                                            onclick="roomForward(this, '11', 'private', false); return false;">
                                            Enter
                                        </a>
                                        @endif
                                    </div>
                                    <img src="{{ cms_config('site.web.url') }}/images/myhabbo/buttons/report_button.gif" width="19" height="18" class="report-button report-r" id="name-{{ $room->id }}-report" style="display: none;margin-top: -1px;">
                                    <br class="clear">
                                </td>
                            </tr>
                            @empty
                            No room
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
