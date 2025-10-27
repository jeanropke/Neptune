@extends('layouts.housekeeping', ['menu' => 'users'])

@section('title', 'Help Query')

@section('content')
    @include('includes.housekeeping.tinymce', ['selector' => '#response'])

    <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
        <tr>
            <td width="22%" valign="top" id="leftblock">
                <div>
                    @include('housekeeping.moderation.include.menu', ['submenu' => 'support.view'])
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

                    <form action="{{ route('housekeeping.moderation.support.close') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="tableborder">
                            <div class="tableheaderalt">Help Query #{{ $ticket->id }}</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <input type="number" value="{{ $ticket->id }}" name="id" hidden>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Username</b>
                                        <div class="graytext">The username who requested help, if applied.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        {!! $ticket->username ?? '<i>Do not apply</i>' !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Issue type</b>
                                        <div class="graytext">You can change it if is wrong.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <select name="topstory" id="ts_image" class="textinput" style="margin-top: 5px;" size="1">
                                            <option value="-">Invalid - Select a valid one</option>
                                            <option value="habbo_credits" {{ $ticket->issue == 'habbo_credits' ? 'selected' : '' }}>A problem with Habbo Credits purchase</option>
                                            <option value="password_issue" {{ $ticket->issue == 'password_issue' ? 'selected' : '' }}>My Habbo password/my child's Habbo password
                                            </option>
                                            <option value="ban_issue" {{ $ticket->issue == 'ban_issue' ? 'selected' : '' }}>My banned/my child's banned Habbo account</option>
                                            <option value="unauthorized_access" {{ $ticket->issue == 'unauthorized_access' ? 'selected' : '' }}>My account/ my child's account is
                                                compromised</option>
                                            <option value="bug_technical" {{ $ticket->issue == 'bug_technical' ? 'selected' : '' }}>A technical problem with Habbo</option>
                                            <option value="account_issue" {{ $ticket->issue == 'account_issue' ? 'selected' : '' }}>I have a log in/ account problem</option>
                                            <option value="idea_share" {{ $ticket->issue == 'idea_share' ? 'selected' : '' }}>How to share my good idea with Habbo</option>
                                            <option value="business_enquiry" {{ $ticket->issue == 'business_enquiry' ? 'selected' : '' }}>A business/advertising/marketing proposition
                                                or query</option>
                                            <option value="other_issue" {{ $ticket->issue == 'other_issue' ? 'selected' : '' }}>My question doesn't fit the other topics</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Message</b>
                                        <div class="graytext">The actual message.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        {{ $ticket->message }}
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Close Ticket" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </form>
                    <br />

                    @foreach ($ticket->responses as $response)
                        <div class="tableborder">
                            <div class="tableheaderalt">Reponse #{{ $response->id }}</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Username</b>
                                        <div class="graytext">The username who requested help, if applied.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        {!! $response->responder_name ?? '<i>Do not apply</i>' !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Message</b>
                                        <div class="graytext">The actual message.</div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        {!! $response->message !!}
                                    </td>
                                </tr>
                                @if (!$response->email_sent)
                                    <tr>
                                        <td class="tablerow1" width="40%" valign="middle"><b>Resend Message</b>
                                            <div class="graytext">You can send again if delivery failed.</div>
                                        </td>
                                        <td class="tablerow2" width="60%" valign="middle">
                                            {!! $response->responder_name ?? '<i>Do not apply</i>' !!}
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <br />
                    @endforeach

                    <form action="#" method="post" name="preview-message" id="preview-message" autocomplete="off">
                        <div class="tableborder">
                            <div class="tableheaderalt">Send New Response</div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td class="tablerow1" width="40%" valign="middle"><b>Message</b>
                                        <div class="graytext">The actual response message. <br />HTML is allowed here.
                                        </div>
                                    </td>
                                    <td class="tablerow2" width="60%" valign="middle">
                                        <textarea name="response" cols="100" rows="5" wrap="soft" id="response" class="multitext">
                                            <p></p>
                                            <p><a href="{{ url('/') }}/iot/ticket?id={{ $ticket->id }}&token={{ $ticket->token }}" target="_blank" class="process-button" id="accountlist-submit"><span> Reply this Ticket </span></a></p>
                                            <p><a href="{{ url('/') }}/iot/ticket?id={{ $ticket->id }}&token={{ $ticket->token }}" target="_blank">{{ url('/') }}/iot/ticket?id={{ $ticket->id }}&token={{ $ticket->token }}</a></p>
                                            <p><b>- Habbo Team</b></p>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Preview Response" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <br />
                    <form action="{{ route('housekeeping.moderation.support.send') }}" method="post" name="preview-message" id="preview-message" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="number" value="{{ $ticket->id }}" name="id" hidden>
                        <textarea name="message" id="message" hid-den></textarea>
                        <div class="tableborder" id="preview-response-table" style="display: none">
                            <div class="tableheaderalt">Preview Response</div>
                            <div id="preview-response">
                                <div id="preview-response-body"></div>
                            </div>
                            <table width="100%" cellspacing="0" cellpadding="5" align="center" border="0">
                                <tr>
                                    <td align="center" class="tablesubheader" colspan="2">
                                        <input type="submit" value="Send Response" class="realbutton" accesskey="s">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <script>
                    $(function() {
                        $('#preview-message').on('submit', (e) => {
                            e.preventDefault();

                            if (typeof tinymce !== 'undefined') {
                                tinymce.triggerSave();
                            }

                            $('#preview-response-table').show();
                            Dialog.setAsWaitDialog($("#preview-response"));

                            $.ajax('{{ route('housekeeping.moderation.support.preview') }}', {
                                data: {
                                    text: $('#response').val()
                                },
                                method: "post"
                            }).done((html, status) => {
                                Dialog.setDialogBody($("#preview-response"), html);
                                $('#message').val($('#response').val());
                            });
                        });
                    });
                </script>
                <!-- / RIGHT CONTENT BLOCK -->
            </td>
        </tr>
    </table>
@stop
