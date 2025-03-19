@extends('layouts.admin.master', ['menu' => 'dashboard', 'submenu' => 'dashboard'])

@section('title', 'Housekeeping')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/web/housekeeping/icons/dashboard.png" class="pticon">
        <span class="page_name_shadow">Dashboard</span>

        <span class="page_name">Dashboard</span>
    </div>
    <div class="page_main">

        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%" />
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                    <div class="hr"></div>
                    <div class="loginuser">Welcome, {{ user()->username }}</div>
                    <div class="hr"></div>
                    <div class="text">
                        <b>Statistics</b><br />

                        Users visits (30 days): {{ $visits_month }}<br />
                        Rooms: {{ $rooms_users }}<br />
                        Furnitures: {{ $furnis }}<br />
                        Banned users: {{ $bans }}<br />
                    </div>
                    <div class="hr"></div>
                    <div class="text">
                        <b>Current statistics</b><br />
                        Users visits (today): {{ $visits_today }}<br />
                        Users online: {{ emu_config('players.online') }}<br />
                        Rooms active: ?<br />
                    </div>
                </td>
                <td class="page_main_right">

                    <table>
                        <tr>
                            <div class="center">

                                @if (session()->has('message'))
                                    <div class="clean-ok">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if (user()->hasPermission('can_check_updates'))
                                    <div class="clean-yellow">Update Available: build <a href="{{ url('/') }}/housekeeping/updates">Details &raquo;</a></div>
                                @endif
                                {{-- <?php if($settings->checkCache() == true && $user->user("rank") > 6){ ?><div class="clean-yellow"><?php echo $lang->loc['cache.outdated']; ?> <a href="{{ url('/') }}/web/housekeeping/cache" /><?php echo $lang->loc['update.now']; ?> &raquo;</a></div><?php } ?> --}}
                                {{-- <?php
   $this['month'] = date('m');
   $this['year'] = date('Y');
   $this['time'] = mktime(0,0,0,$this['month'],1,$this['year']);
   $this['next_time'] = strtotime("+1 Month",$this['time']);
   if($this['next_time'] - 60*60*24*7 < time()){
       $sql = $db->query("SELECT COUNT(*) FROM ".PREFIX."collectables WHERE date > '".time()."' AND date <= '".$this['next_time']."' LIMIT 1");
       if($db->result($sql) == 0){
           echo '<div class="clean-gray">'.$lang->loc['collectable.outdated'].' <a href="'.PATH.'/collectables" />'.$lang->loc['go'].' &raquo;</a></div>';
       }
   }
   if($user->user("rank") == 7){
       $version = version();
       $update = @file_get_contents('http://www.phpretro.com/system/version_check.php?version='.$version['version'].".".$version['revision'].'&stable='.$version['stable']);
       $update = @unserialize($update);
       if(!empty($update)){
       echo '<div class="clean-yellow">'.$lang->loc['update.available'].': '.$update[0]['build'].' '.$update[0]['stable'].' <a href="'.PATH.'/housekeeping/updates" />'.$lang->loc['details'].' &raquo;</a></div>';
       }
   }
   $count = $db->result($db->query("SELECT COUNT(*) FROM ".PREFIX."help WHERE picked_up = '0' LIMIT 1"));
   if($count > 0){
   ?> --}}
                                <div class="clean-error">5 pending help requests <a href="{{ url('/') }}/web/housekeeping/help" />See them &raquo;</a></div>
                                {{-- <?php } ?> --}}
                            </div>
                            <td class="left" valign="top">
                                <form id="notes" action="{{ url('/') }}/housekeeping/dashboard" method="post">
                                    @csrf
                                    <div class="text">
                                        <h1>Welcome to {{ env('APP_NAME') }} Housekeeping!</h1>
                                        Here you are able to modify add CMS content, edit the hotel settings, and other things to keep managing a hotel (large or small) quick and
                                        easy.<br />
                                        &nbsp;<br />
                                        Below is the area where you can leave notes for other administrators and moderators.
                                        <div class="form_head">Notes</div>
                                        <textarea rows="8" name="admin_notes">{{ cms_config('site.admin.notes') }}</textarea>
                                        <div class="textlabel_cc">Clear or save the note. &nbsp;<button class="button_mini" onClick="this.form.admin_notes.value=''" /><img
                                                src="{{ url('/') }}/web/housekeeping/images/del.gif" /></button><button type="submit" class="button_mini" /><img
                                                src="{{ url('/') }}/web/housekeeping/images/check.gif" /></button></div>
                                </form>
    </div>
    </td>
    <td class="right" valign="top">
        <div class="text">
            Below is a list of all the administrators and moderators in the hotel, names in blue are ones who are online.

            <div class="form_head">Staff</div>
            <div class="listview_bg">
                <div id="listview">
                    <div class="Scroller-Container">
                        @foreach ($staffs as $staff)
                            {{ $staff->isOnline() }}
                        @endforeach
                        {{-- <?php $sql = $data->select3(5);
                        while ($row = $serverdb->fetch_row($sql)) {
                            $id = $input->HoloText($row[0]);
                            $name = $input->HoloText($row[1]);
                            $rank = $input->HoloText($row[2]);
                            if ($user->IsUserOnline($id)) {
                                echo "<a href=\"" . PATH . '/housekeeping/users?id=' . $id . "\"><span class=\"online\">" . $name . ' (' . $rank . ')</span></a><br />';
                            } else {
                                echo "<a href=\"" . PATH . '/housekeeping/users?id=' . $id . "\">" . $name . ' (' . $rank . ')</a><br />';
                            }
                        }
                        ?> --}}
                    </div>

                </div>

                <div id="Scrollbar-Container">
                    <img src="{{ url('/') }}/web/housekeeping/images/up_arrow.gif" class="Scrollbar-Up">
                    <div class="Scrollbar-Track">
                        <img src="{{ url('/') }}/web/housekeeping/images/scrollbar_handle.gif" class="Scrollbar-Handle">
                    </div>
                    <img src="{{ url('/') }}/web/housekeeping/images/down_arrow.gif" class="Scrollbar-Down">
                </div>

            </div>

            The twenty latest entries in the chatlog is displayed below, to see a more detailed view and more entries, visit the logs page.
            <div class="form_head"><a href="{{ url('/') }}/housekeeping/logs">Chat Log &raquo;</a></div>
            <div class="listview_bg">
                <div id="listview2">
                    <div class="Scroller2-Container">
                        {{-- <?php $sql = $data->select4(20, 0);
                        while ($row = $serverdb->fetch_row($sql)) {
                            echo '[' . $input->HoloText($row[2]) . '][' . $input->HoloText($row[1]) . "] <span class=\"highlight\">" . $input->HoloText($row[0]) . '</span>: ' . $input->HoloText($row[3]) . '<br />';
                        }
                        ?> --}}
                    </div>

                </div>

                <div id="Scrollbar2-Container">
                    <img src="{{ url('/') }}/web/housekeeping/images/up_arrow.gif" class="Scrollbar2-Up">
                    <div class="Scrollbar2-Track">
                        <img src="{{ url('/') }}/web/housekeeping/images/scrollbar_handle.gif" class="Scrollbar2-Handle">
                    </div>
                    <img src="{{ url('/') }}/web/housekeeping/images/down_arrow.gif" class="Scrollbar2-Down">
                </div>

            </div>


        </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>

    </div>
@stop
