<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class FacultyReportNoteController extends Controller
{
    public function store(Request $request, Report $report)
    {
        $data = $request->validate([
            'status' => ['required', 'in:reviewing,handling,resolved'],
            'note'   => ['required', 'string', 'max:1000'],
        ]);

        $report->notes()->create([
            'user_id' => auth()->id(),
            'status'  => $data['status'],
            'note'    => $data['note'],
        ]);

        return redirect()
            ->route('faculty.dashboard')
            ->with('success', 'Naipadala na ang note sa admin.');
    }
}