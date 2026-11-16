<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Report;

class DashboardController extends Controller
{
   public function index()
{
    $user = auth()->user();

    $newCount = Report::when($user->faculty_last_seen_at, fn ($q) =>
        $q->where('created_at', '>', $user->faculty_last_seen_at)
    )->count();

    $reports = Report::select('id', 'incident_type', 'location', 'description', 'evidence_paths', 'created_at')
        ->with('notes.user')
        ->latest()
        ->paginate(10);

    if (! request()->boolean('poll')) {
        $user->update(['faculty_last_seen_at' => now()]);
    }

    return view('faculty.dashboard', compact('reports', 'newCount'));
}
}