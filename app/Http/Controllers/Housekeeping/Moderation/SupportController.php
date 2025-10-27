<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Mail\TicketMail;
use App\Models\Neptune\HelpTicket;
use App\Models\Neptune\HelpTicketResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function listing(Request $request)
    {
        abort_unless_permission('can_view_reports');

        $query = HelpTicket::query()->with('picker');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tickets = $query->orderByDesc('created_at')->paginate(25);

        return view('housekeeping.moderation.support.listing', compact('tickets'));
    }

    public function view(Request $request)
    {
        abort_unless_permission('can_view_reports');

        $ticket = HelpTicket::find($request->id);
        if (!$ticket)
            return redirect()->route('housekeeping.moderation.support.listing')->with('message',  'Ticket not found!');

        return view('housekeeping.moderation.support.view', compact('ticket'));
    }

    public function preview(Request $request)
    {
        abort_unless_permission('can_view_reports');

        return view('email.email_response', ['content' => $request->text]);
    }

    public function send(Request $request)
    {
        abort_unless_permission('can_view_reports');

        $ticket = HelpTicket::find($request->id);
        if (!$ticket)
            return redirect()->route('housekeeping.moderation.support.listing')->with('message',  'Ticket not found!');

        $result = $this->sendEmail($ticket->email, $request->message);

        HelpTicketResponse::create([
            'ticket_id'     => $ticket->id,
            'message'       => $request->message,
            'response_by'   => user()->id,
            'email_sent'    => $result
        ]);

        $ticket->update(['status' => 1]);

        return redirect()->back()->with('message', 'Ticket message sent/saved');
    }

    private function sendEmail($email, $message)
    {
        try {
            Mail::to($email)->send(new TicketMail([
                'subject'   => 'Subject...?',
                'message'   => $message
            ]));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function close(Request $request)
    {
        abort_unless_permission('can_view_reports');

        $ticket = HelpTicket::find($request->id);
        if (!$ticket)
            return redirect()->route('housekeeping.moderation.support.listing')->with('message',  'Ticket not found!');

        $ticket->update(['status' => 3, 'picked_by' => user()->id]);

        return redirect()->route('housekeeping.moderation.support.listing');
    }
}
