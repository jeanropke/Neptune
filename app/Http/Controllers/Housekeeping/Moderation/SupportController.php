<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Neptune\HelpTicket;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function listing(Request $request)
    {
        //abort_unless_permission('can_view_reports');

        $query = HelpTicket::query()->with('picker');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tickets = $query->orderByDesc('created_at')->paginate(25);

        return view('housekeeping.moderation.support.listing', compact('tickets'));
    }

    public function view(Request $request)
    {
        $ticket = HelpTicket::find($request->id);
        if (!$ticket)
            return redirect()->route('housekeeping.moderation.support.listing')->with('message',  'Ticket not found!');

        return view('housekeeping.moderation.support.view', compact('ticket'));
    }
}
