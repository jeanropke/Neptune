@extends('layouts.master', ['menuId' => '26', 'submenuId' => '13', 'headline' => true])

@section('title', 'Groups')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody><tr>
            <td style="width: 8px;"></td>
            <td valign="top" style="width: 202px;" class="habboPage-col">
                @foreach(boxes('hotel.groups', 1) as $box)
                <div class="v3box {{ $box->color }}">
                    <div class="v3box-top">
                        <h3>{{ $box->title }}</h3>
                    </div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            {!! $box->content !!}
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom">
                        <div></div>
                    </div>
                </div>
                @endforeach
            </td>
            <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                <div class="v3box blue">
                    <div class="v3box-top"><h3>{{ cms_config('hotel.name.short') }} Groups - it's what you make it!</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">
                            <p align="center"><img src="{{ url('/') }}/c_images/album2276/groups_header_image.gif" alt=""></p><p>Join a collective, form a gang, create a fan club, make new friends or just hang out with your old mates - {{ cms_config('hotel.name.short') }} Groups is what you make it! Joining a group is free and it's only 10 {{ cms_config('hotel.name.short') }} Credits to start your own.<br></p><p>
                            </p>
                            <div id="group_purchase_2">
                                <span id="group_purchase_2_group_purchase">
                                </span>
                                <script type="text/javascript">

                                    var groupPurchaseButton = Builder.node("a", {href:"#", className:"colorlink orange"}, [ Builder.node("span", "Create a Group") ]);
                                    $("group_purchase_2_group_purchase").appendChild(groupPurchaseButton);
                                    var dialog;
                                    Event.observe(groupPurchaseButton, "click", function(e) {
                                        Event.stop(e);
                                        dialog = Dialog.createDialog("group_purchase_form", "Create a Group", 9001, 0, -1000, cancelGroupPurchase);
                                        Dialog.appendDialogBody(dialog, "<p style=\"text-align:center\"><img src=\"{{ url('/') }}/web/images/progress_bubbles.gif\" alt=\"\" width=\"29\" height=\"6\" /></p><div style=\"clear\"></div>", true);
                                        Dialog.moveDialogToCenter(dialog);
                                        Dialog.makeDialogDraggable(dialog);
                                        Overlay.show();
                                        new Ajax.Request(
                                                habboReqPath + "/grouppurchase/group_create_form",
                                                { method: "post", parameters: "product="+encodeURIComponent("g0 group_product"), onComplete: function(req, json) {
                                                    Dialog.setDialogBody(dialog, req.responseText);
                                                } }
                                        );
                                    }, false);

                                </script>
                            </div>

                            <p></p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>Most Active Groups</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <ul class="groups-toplist toplist">
                                @foreach($guilds as $key => $group)
                                    <li class="{!! round(($key+1)/2) % 2 ? 'even' : 'odd' !!}" style="background-image: url({{ url('/') }}/c_images/Badgeparts/generated/{{ $group->badge }}.png)">
                                        <div class="toplist-item">
                                            <div class="group-index">{{ $key+1 }}.</div>
                                            <div class="group-link">
                                                <a href="{{ url('/') }}/groups/{{ $group->id }}/id" class="@if($group->state == 1) exclusive @elseif($group->state == 2) closed @endif" title="@if($group->state == 1) Exclusive @elseif($group->state == 2) Closed @endif">
                                                    {{ $group->name }}
                                                </a>
                                            </div>
                                            <p>Group created: <strong>{{ \Carbon\Carbon::createFromTimeStamp($group->date_created)->format('M d, Y') }}</strong></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
                <div class="v3box orange">
                    <div class="v3box-top"><h3>Most Recent Groups</h3></div>
                    <div class="v3box-content">
                        <div class="v3box-body">

                            <ul class="groups-toplist recentlist">
                                @foreach($latest as $key => $group)
                                    <li class="{!! round(($key+1)/2) % 2 ? 'even' : 'odd' !!}" style="background-image: url({{ url('/') }}/c_images/Badgeparts/generated/{{ $group->badge }}.png)">
                                        <div class="toplist-item">
                                            <div class="group-index">{{ $key+1 }}.</div>
                                            <div class="group-link">
                                                <a href="{{ url('/') }}/groups/{{ $group->id }}/id" class="@if($group->state == 1) exclusive @elseif($group->state == 2) closed @endif" title="@if($group->state == 1) Exclusive @elseif($group->state == 2) Closed @endif">
                                                    {{ $group->name }}
                                                </a>
                                            </div>
                                            <p>Group created: <strong>{{ \Carbon\Carbon::createFromTimeStamp($group->date_created)->format('M d, Y') }}</strong></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="v3box-bottom"><div></div></div>
                </div>
            </td>
            <td style="width: 4px;"></td>
            <td valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@stop
