@extends('layouts.admin.master', ['menu' => 'accessdenied'])

@section('title', 'Access Denied')

@section('content')
    <div class="page_title">
        <img src="{{ url('/') }}/housekeeping/images/icons/alert.png" class="pticon">
        <span class="page_name_shadow">Access Denied</span>

        <span class="page_name">Access Denied</span>
    </div>
    <div class="page_main">
        <table border="0" cellpadding="0" cellspacing="0" height="100%">
            <tbody>
                <tr height="100%" />
                <td class="page_main_left">
                    <div class="left_date">{{ date('l F j, Y | g:iA') }}</div>
                </td>
                <td class="page_main_right">
                    <div class="center">
                        <div class="clean-error">You do not have premissions to access this page. If you believe this is a mistake, please contact the hotel administrator.</div>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
