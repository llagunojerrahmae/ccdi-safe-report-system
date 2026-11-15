<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        // 1. Loose validation 
        $validated = $request->validate([
            'incident_type' => 'required',
            'location'      => 'required|string',
            'description'   => 'required|string',
            'evidence'      => 'nullable|array',
            'evidence.*'    => 'nullable|file|max:20480',
            'agree_terms'   => 'accepted',
        ]);

        // 2. File Uploading
        $paths = [];
        if ($request->hasFile('evidence')) {
            foreach ($request->file('evidence') as $file) {
                $paths[] = $file->store('evidence', 'public');
            }
        }

        // 3. Generate Tracking Code
        $trackingCode = Report::generateTrackingCode();

        // 4. Save Record
        $report = Report::create([
            'tracking_code'  => $trackingCode,
            'incident_type'  => $validated['incident_type'],
            'location'       => $validated['location'],
            'description'    => $validated['description'],
            'evidence_paths' => $paths,
            'status'         => 'pending',
        ]);

        // 5. Direct redirect in success route
        return redirect()->route('report.success', ['trackingCode' => $report->tracking_code]);
    }

    public function success(string $trackingCode)
    {
        $report = Report::where('tracking_code', $trackingCode)->firstOrFail();
        return view('report.success', compact('report'));
    }

    public function trackForm()
    {
        return view('report.track');
    }

    public function trackResult(Request $request)
    {
        $request->validate(['tracking_code' => 'required|string']);

        $code = trim($request->tracking_code);
        $report = Report::where('tracking_code', $code)->first();

        return view('report.track', ['report' => $report, 'searched' => true]);
    }
    
    public function updatePriority(Request $request, Report $report)
{
    $request->validate([
        'priority' => 'nullable|in:High Risk,Moderate Risk,Low Risk',
    ]);

    $report->update(['priority' => $request->priority]);

    return back()->with('success', 'Priority updated.');
}

}
