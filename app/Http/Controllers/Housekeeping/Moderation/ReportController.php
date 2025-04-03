<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function website(Request $request)
    {
        if (!user()->hasPermission('can_view_reports'))
            return view('housekeeping.accessdenied');

        if(isset($request->status)) {
            $reports = Report::where('closed', $request->status)->paginate(25);
            return view('housekeeping.moderation.reports.website.listing')->with('reports', $reports);
        }

        $reports = Report::paginate(25);
        return view('housekeeping.moderation.reports.website.listing')->with('reports', $reports);
    }

    public function websiteView(Request $request)
    {
        if (!user()->hasPermission('can_view_reports'))
            return view('housekeeping.accessdenied');

        $report = Report::find($request->id);

        if (!$report)
            return redirect()->route('housekeeping.moderation.reports.website.listing')->with('message', 'Report not found!');

        return view('housekeeping.moderation.reports.website.view')->with('report', $report);
    }

    public function websiteHide(Request $request)
    {
        if (!user()->hasPermission('can_view_reports'))
            return view('housekeeping.accessdenied');

        $report = Report::find($request->id);
        $report->hideObject();

        create_staff_log('moderation.reports.website.hide', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Message hidden!']);
    }

    public function websiteViewSave(Request $request)
    {
        if (!user()->hasPermission('can_view_reports'))
            return view('housekeeping.accessdenied');

        $report = Report::find($request->id);
        if (!$report)
            return redirect()->route('housekeeping.moderation.reports.website.listing')->with('message', 'Report not found!');

        $report->update([
            'picked_by' => user()->id,
            'closed'    => '1'
        ]);

        create_staff_log('moderation.reports.website.save', $request);

        return redirect()->route('housekeeping.moderation.reports.website')->with('message', 'Report closed!');
    }
}
