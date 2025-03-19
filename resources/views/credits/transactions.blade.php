@extends('layouts.master', ['menuId' => '4', 'submenuId' => 'transactions', 'headline' => true])

@section('title', 'My Transactions')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">

        <tbody>
        <tr>
            <td colspan="5" style="height: 4px;"></td>
        </tr>

        <tr>

            <td rowspan="2" style="width: 8px;"></td>

            <td valign="top" style="width: 740px;">

                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <td colspan="2" style="padding-bottom: 3px;"></td>
                    </tr>
                    <tr>

                        <td align="left" valign="top" style="width: 539px; height: 400px;" class="habboPage-col">

                            <div class="nobox">
                                <div class="nobox-content">
                                    <div class="v2box brown darkest">
                                        <div class="headline"><h3>My Transactions</h3></div>
                                        <div class="border">
                                            <div></div>
                                        </div>
                                        <div class="body">
                                            <table class="tx-history">
                                                <thead>
                                                <tr>
                                                    <th class="tx-date" width="10%">Date</th>
                                                    <th class="tx-amount" width="30%">Activity</th>
                                                    <th class="tx-description" width="30%">Description</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($transactions as $transaction)
                                                <tr class="?php echo $even; ?>">
                                                    <td class="tx-date">{{ \Carbon\Carbon::createFromTimeStamp($transaction->timestamp)->format('d/M/Y h:i') }}</td>
                                                    <td class="tx-amount {{ $transaction->action }}">
                                                        @if($transaction->credits > 0 &&  $transaction->points > 0)
                                                            <b>{{ $transaction->credits }}</b> credits & <b>{{ $transaction->points }}</b> {{ $transaction->points_type }}

                                                        @else
                                                        {!! $transaction->credits ? '<b>' . $transaction->credits . '</b> credits' : '<b>' . $transaction->points . '</b> ' . $transaction->points_type !!}
                                                        @endif

                                                    </td>
                                                    <td class="tx-description">Action: <b>{{ $transaction->action }}</b> {!!  $transaction->amount > 0 ? ' / Item: <b>'. $transaction->catalog_name .'</b> / Amount: ' . $transaction->amount : '' !!}</td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="bottom">
                                            <div></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </td>

            <td rowspan="2" style="width: 4px;"></td>

            <td rowspan="2" valign="top" style="width: 176px;">
                <div id="ad_sidebar">
                    @include('includes.ad160')
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@stop
