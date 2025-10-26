@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'User IP Lookup')

@section('content')
    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'users.listing'])
                </div>
            </td>
            <td width="78%" valign="top" id="rightblock">
                <div>
                    @if (session('message'))
                        <p><strong>{{ session('message') }}</strong></p>
                    @endif
                    @if ($errors->any())
                        <p><strong>{{ $errors->first() }}</strong></p>
                    @endif
                    <!-- RIGHT CONTENT BLOCK -->
                    <div class="tableborder">
                        <div class="tableheaderalt">
                            Listing IP address - {{ $user->username }}
                        </div>
                        <table cellpadding="4" cellspacing="0" width="100%">
                            <tr>
                                <td class="tablesubheader" width="30%" align="center">IP Address</td>
                                <td class="tablesubheader" width="15%" align="center">Created at</td>
                            </tr>
                            @foreach ($ips as $ip)
                                <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                    <td class="tablerow2"><strong>{{ $user->username }}</strong>
                                        <div class="desctext">
                                            {{ $ip->ip_address }} [<a href="http://who.is/whois-ip/ip-address/{{ $ip->ip_address }}/" target="_blank">WHOIS</a>]
                                            <a href="{{ route('housekeeping.users.listing') }}?value={{ $ip->ip_address }}&type=ip">Look up for this IP</a>
                                        </div>
                                    </td>
                                    <td class="tablerow2" align="center">
                                        {{ $ip->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="text-align: center; vertical-align: middle;">
                        {!! $ips->links('layouts.housekeeping.pagination') !!}
                    </div>
                </div>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>

@stop
