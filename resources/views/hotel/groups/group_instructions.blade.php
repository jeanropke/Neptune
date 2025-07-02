@extends('layouts.master', ['menuId' => '26'])

@section('title', 'Group Instructions')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-2col">
        <tbody>
            <tr>
                <td style="width: 8px;"></td>
                <td valign="top" style="width: 202px;" class="habboPage-col">
                    @foreach (boxes('hotel.groups.group_instructions', 1) as $box)
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

                    <div class="v3box blue">
                        <div class="v3box-top">
                            <h3>Recently Created Groups</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">
                                <div class="groups-toplist-sidebar">
                                    @foreach ($latest as $group)
                                        <div class="group-link"><a href="{{ url($group->url) }}">{{ $group->name }}</a></div>
                                    @endforeach
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                    <div class="v3box orange">
                        <div class="v3box-top">
                            <h3>Habbo Groups: The Guide</h3>
                        </div>
                        <div class="v3box-content">
                            <div class="v3box-body">

                                <p><br>
                                    <b><img vspace="5" hspace="5" border="0" align="right"
                                            src="{{ cms_config('site.c_images.url') }}/album2028/Habbo_groups_editorial_5.gif" alt="">What are

                                        Groups?</b><br>
                                    A group is a shared Habbo Home which you can share with your friends to talk
                                    about whatever you desire, or don't desire. You can make your own group or join
                                    your friends.<br>
                                    <br>
                                    <br>
                                    <b>How do I make my own group?<br>
                                    </b>You can make your own group by clicking the Make A Group button on this
                                    page. Any Habbo can start a group. When you
                                    make a group you become the Group owner. You can make
                                    your group open or exclusive. An open group will let anyone become a member,
                                    while in exclusive Groups users have to request to join your group- and
                                    you can totally deny them. If your group is closed then no one can join.<br>
                                </p>
                                <p><br>
                                    <b>How do I join a group?<br>
                                    </b>To join a group just go to a Habbo Group page and click 'join'. If the group
                                    is open to all you will join the group automatically. If the group is exclusive
                                    then the owner will consider your membership request before allowing you to join
                                    a group. <br><br>If you are not sure what or where the Habbo Group page is, go to your friends' Habbo Home, or

                                    the Group Owner's Habbo Home Page and use their "My Group" badge link to find the Group Page. Then

                                    join!<br>
                                </p>
                                <p><br>
                                    <b>How do I find MY group?<br></b>
                                    You can find your group by going to your Habbo Home page and finding your group in your <b>My Group</b>

                                    Widget. By clicking on the badge, it will link you to the Group Home Page.<br>
                                    <br>
                                    <b>How do I leave a Group?<br>
                                    </b>To leave a group you just have to go to the Groups page and click 'Leave
                                    group' button.<br>
                                </p>
                                <p><br><b>
                                        <img vspace="5" hspace="5" border="0" align="right"
                                            src="{{ cms_config('site.c_images.url') }}/album1731/habbos_signing_guestbook.gif" alt="">
                                    </b>
                                    <b>How do I make a Group my favourite?<br>
                                    </b>Go to your Habbo Home and open your Groups Widget; scroll down to the Group you want to make your

                                    favorite and click the green cross to open it up. The click the 'make favourite' button.<br>
                                    <br>
                                    <b>Who's who in my group?<br>
                                    </b>Your group has three levels of membership: Owner (all powerful and can
                                    remove anyone from your group, and make trusted Habbos admins), Admin (can edit page, edit badge, make

                                    other users Admins), Member (cannot make other people admins or remove
                                    anyone, decorate the page or edit the badge).<br>
                                    <br><img vspace="5" hspace="5" border="0" align="right" src="{{ cms_config('site.c_images.url') }}/album2028/purple_flame.gif"
                                        alt="">
                                    To see who is in your group click on the 'Member list' button.<br>
                                    <br>
                                    <b>What are "Group Types"?</b><br>
                                    <i>Regular:</i> A Regular Group is one where everyone is invited and anyone can join. All groups start out as Regular Groups.<br>
                                    <i>Private:</i> A Private Groups is private. It means that in order to become a member, you have to request membership and only members with rights
                                    can approve new members.<br>
                                    <i>Exclusive:</i> An Exclusive Group is a completely closed group. There is no way to join an Exclusive Group. The best way to join an Exclusive
                                    group is to make friends with the owner and ask them to make the group Private and then ask to join. Or you can make your own group! :) <br>

                                    <br>
                                    <b>What's in my Group?</b><br>
                                    Your Group page works much like a Habbo Home. Members can add stickie notes
                                    to your page, and only they can remove them- so there is no worry of another
                                    member or admin stealing your items.
                                </p>
                                <p><span style="font-weight: bold;">What's on my Group

                                        page?</span><br>Exclusive to your Group page is a Widget that shows all the members in your
                                    group and their ranking within your group, and a group Guestbook which can be turned to Members Only-

                                    only members can post, or Public where anyone can post.<br>


                                </p>
                                <p><b><img vspace="10" hspace="10" border="0" align="right"
                                            src="{{ cms_config('site.c_images.url') }}/album2028/Habbo_groups_editorial_4_001.gif" alt="">How do I make

                                        a badge?</b><br>
                                    To make a badge just click the 'Group Badge' button. The group badge will appear
                                    beside your Habbo in the Hotel.<br>
                                    <br>
                                    <span style="font-weight: bold;">What's the Group Widget all about?</span><b>&nbsp;</b><br>
                                    For your Habbo Home is a Groups Widget that shows what groups you are a member
                                    of. Using this widget you can decide what group is your favourite.<br>
                                </p>
                                <p><span style="font-weight: bold;">Did you know that tusks are actually congealed hair?</span><br>No, I did not know that.</p>
                                <p>
                                    <br><span style="font-weight: bold;">
                                        <br>

                                    </span>
                                </p>

                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td style="width: 4px;"></td>
                <td valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
