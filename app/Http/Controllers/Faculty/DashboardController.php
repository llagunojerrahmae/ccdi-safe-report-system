<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Bilangin MUNA ang bago, bago i-update ang last_seen
        $newCount = Report::when($user->faculty_last_seen_at, fn ($q) =>
            $q->where('created_at', '>', $user->faculty_last_seen_at)
        )->count();

        // Piniling columns lang. Sinadyang HINDI isama:
        // tracking_code, reporter_type, admin_notes, status, priority
        $reports = Report::select('id', 'incident_type', 'location', 'description', 'evidence_paths', 'created_at')
            ->latest()
            ->paginate(10);

        $user->update(['faculty_last_seen_at' => now()]);

        return view('faculty.dashboard', compact('reports', 'newCount'));
    }
}