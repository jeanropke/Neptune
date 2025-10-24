@extends('layouts.master', ['menuId' => '4'])

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
                                                <div class="headline">
                                                    <h3>My Transactions</h3>
                                                </div>
                                                <div class="border">
                                                    <div></div>
                                                </div>
                                                <div class="body">
                                                    <div id="tx-log">
                                                        <div class="purse-tx">
                                                            <table class="tx-history">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="tx-date">Date</th>
                                                                        <th class="tx-description">Description</th>
                                                                        <th class="tx-amount">Cost</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($transactions as $transaction)
                                                                        <tr class="{{ $loop->index % 2 == 0 ? 'odd' : 'even' }}">
                                                                            <td class="tx-date">{{ $transaction->created_at->format('d/M/Y h:i') }}</td>
                                                                            <td class="tx-description">{{ $transaction->description }}</td>
                                                                            <td class="tx-amount catalog">{{ $transaction->credit_cost }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>

                                                            <ul class="tx-navi">
                                                                @if (!$transactions->onFirstPage())
                                                                    <li class="prev"><a href="{{ $transactions->previousPageUrl() }}">&laquo; Previous</a></li>
                                                                @endif
                                                                @if (!$transactions->onLastPage())
                                                                    <li class="next"><a href="{{ $transactions->nextPageUrl() }}">Next &raquo;</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
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
