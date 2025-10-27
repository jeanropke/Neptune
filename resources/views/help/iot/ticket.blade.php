@extends('layouts.iot')

@section('title', '')

@section('content')
    <form action="" method="post">
        @csrf
        <input name="id" value="{{ $ticket->id }}" hidden>
        <input name="token" value="{{ $ticket->token }}" hidden>
        <table border="0" cellspacing="0" cellpadding="0" class="ihead">
            <tr>
                <td class="icon">
                </td>

                <td class="text">
                    <h2>Reply to Ticket</h2>
                </td>
            </tr>
        </table>
        <br>
        <table border="0" cellspacing="0" cellpadding="0" class="content-table">
            <tr>
                <td>
                    <div class="iinfodiv">
                        <textarea name="message" class="imessageform"></textarea>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <div style="float:right;">
            <table height="21" border="0" cellpadding="0" cellspacing="0" class="button">
                <tr>
                    <td class="button-left-side"></td>
                    <td class="middle"><button type="submit" name="submit" class="proceedbutton">Send</button></td>
                    <td class="button-right-side-arrow"></td>
                </tr>
            </table>
        </div>

    </form>
@endsection
