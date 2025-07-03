<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Neptune\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function website(Request $request)
    {
        abort_unless_permission('can_view_reports');

        $query = Report::query()->with(['reporter', 'author', 'picker']);

        if ($request->filled('status') && $request->status > -1) {
            $query->where('closed', $request->status);
        }

        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        $reports = $query->orderByDesc('created_at')->paginate(25);

        return view('housekeeping.moderation.reports.website.listing', [
            'reports' => $reports
        ]);
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
