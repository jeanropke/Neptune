@extends('layouts.admin.master', ['menu' => 'dashboard', 'submenu' => 'logs'])

@section('title', 'Logs')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/housekeeping/icons/?php echo $icon; ?>" class="pticon">
        <span class="page_name_shadow">Logs</span>

        <span class="page_name">Logs</span>
    </div>
    <div class="page_main">

        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%" />
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                    <div class="hr"></div>
                    <div class="text">
                        <p>Currently, you can only view the chatlog, but if any future hotel emulators have support for other logs, you'll find them here. To save processing power,
                            only the top 1000 entries are shown.</p>
                    </div>
                    <form name="users_search" action="{{ url('/') }}/housekeeping/logs" method="POST">
                        <div class="text">
                            <div class="user_listview_bg">
                                <div id="listview">
                                    <div class="Scroller-Container">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            @if (isset($result))
                                                @foreach ($result as $entry)
                                                    <tr id="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                                        <td><a href="{{ url('/') }}/housekeeping/logs?roomid={{ $entry->id }}">{{ $entry->name }}</a></td>
                                                        <td class="selectid">{{ $entry->id }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <div id="Scrollbar-Container">
                                    <img src="{{ url('/') }}/web/housekeeping/images/up_arrow.gif" class="Scrollbar-Up" />
                                    <div class="Scrollbar-Track">
                                        <img src="{{ url('/') }}/web/housekeeping/images/scrollbar_handle.gif" class="Scrollbar-Handle" />
                                    </div>
                                    <img src="{{ url('/') }}/web/housekeeping/images/down_arrow.gif" class="Scrollbar-Down" />
                                </div>
                            </div>
                            <div class="searcuser">
                                <input type="text" name="query" id="searchname" value="">
                                <button type="submit" name="search" id="button_search">Search</button>
                            </div>
                        </div>
                    </form>
                </td>
                <td class="page_main_right">
                    <div class="center">

                        <div class="contentdisplay">
                            <table height="100%">
                                <tbody>
                                    <tr class="header">
                                        <th width="50">'.$lang->loc['user'].'</th>
                                        <th width="350">'.$lang->loc['message'].'</th>
                                        <th width="50">'.$lang->loc['room'].'</th>
                                        <th width="50">'.$lang->loc['time'].'</th>
                                    </tr>

                                    <tr'.$even.'>
                                        <td>'.$input->HoloText($row[0]).'</td>
                                        <td>'.$input->HoloText($row[3]).'</td>
                                        <td>'.$input->HoloText($row[1]).'</td>
                                        <td>'.$input->HoloText($row[2]).'</td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </td>
                </tr>
            </tbody>
        </table>

    </div>
@stop
