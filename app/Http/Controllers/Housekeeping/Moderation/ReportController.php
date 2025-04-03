<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function website()
    {
        $reports = Report::paginate(25);
        return view('housekeeping.moderation.reports.website.listing')->with('reports', $reports);
    }

    public function websiteView(Request $request)
    {
        $report = Report::find($request->id);

        if (!$report)
            return redirect()->route('housekeeping.moderation.reports.website.listing')->with('message', 'Report not found!');

        return view('housekeeping.moderation.reports.website.view')->with('report', $report);
    }

    public function websiteHide(Request $request)
    {
        $report = Report::find($request->id);
        $report->hideObject();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Message hidden!']);
    }

    public function websiteViewSave(Request $request)
    {
        $report = Report::find($request->id);
        if (!$report)
            return redirect()->route('housekeeping.moderation.reports.website.listing')->with('message', 'Report not found!');
        $report->update([
            'picked_by' => user()->id,
            'closed'    => '1'
        ]);

        return redirect()->route('housekeeping.moderation.reports.website')->with('message', 'Report closed!');
    }
}
