<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class FacultyManagementController extends Controller
{
    public function index()
    {
        $pending = User::where('role', 'faculty')
            ->where('status', 'pending')
            ->latest()
            ->get();

        $others = User::where('role', 'faculty')
            ->whereIn('status', ['approved', 'rejected'])
            ->latest()
            ->get();

        return view('admin.faculty', compact('pending', 'others'));
    }

    public function approve(User $user)
    {
        $this->ensureFaculty($user);
        $user->update(['status' => 'approved']);

        return back()->with('success', $user->name . ' has been approved.');
    }

    public function reject(User $user)
    {
        $this->ensureFaculty($user);
        $user->update(['status' => 'rejected']);

        return back()->with('success', $user->name . ' has been rejected.');
    }

    private function ensureFaculty(User $user): void
    {
        abort_unless($user->role === 'faculty', 404);
    }
}