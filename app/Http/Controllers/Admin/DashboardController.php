<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportNote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $reports = Report::withCount([
                'notes',
                'notes as new_notes_count' => fn ($q) => $q->whereNull('seen_by_admin_at'),
            ])
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $allReports = Report::all();

        $stats = [
            'total'     => $allReports->count(),
            'pending'   => $allReports->where('status', 'pending')->count(),
            'reviewing' => $allReports->where('status', 'reviewing')->count(),
            'resolved'  => $allReports->where('status', 'resolved')->count(),
            // Faculty notes the admin has not opened yet
            'new_notes' => ReportNote::whereNull('seen_by_admin_at')->count(),
        ];

        return view('admin.dashboard', compact('reports', 'stats'));
    }

    public function show(Report $report)
    {
        $report->load('notes.user');

        $report->notes()->whereNull('seen_by_admin_at')->update(['seen_by_admin_at' => now()]);

        return view('admin.reports.show', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewing,resolved,dismissed',
        ]);

        $report->update($validated);

        return redirect()->back()->with('success', 'Report status updated successfully!');
    }

    public function updatePriority(Request $request, Report $report)
    {
        $request->validate([
            'priority' => 'required|in:high,moderate,low',
        ]);

        $report->update(['priority' => $request->priority]);

        return back()->with('success', 'Priority updated.');
    }

    public function destroy(Report $report)
    {
        if (!in_array($report->status, ['resolved', 'dismissed'])) {
            return back()->withErrors(['delete' => 'Only resolved or dismissed reports can be archived.']);
        }

        $report->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Report moved to Archive.');
    }

    public function archive()
    {
        $reports = Report::onlyTrashed()
            ->latest('deleted_at')
            ->paginate(10);

        return view('admin.archive', compact('reports'));
    }

    public function restore($id)
    {
        Report::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.archive')
            ->with('success', 'Report restored.');
    }
}