<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FacultyRoster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacultyAuthController extends Controller
{
    /* ---------- LOGIN ---------- */

    public function showLogin()
    {
        return view('auth.faculty-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $email = strtolower(trim($credentials['email']));
        $user  = User::where('email', $email)->first();

        // Iisang mensahe para hindi malaman kung existing ang email o kung admin ito
        if (! $user || ! Hash::check($credentials['password'], $user->password) || $user->role !== 'faculty') {
            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        }

        if ($user->status === 'pending') {
            return back()->withErrors(['email' => 'Your account is still waiting for admin approval.'])->onlyInput('email');
        }

        if ($user->status !== 'approved') {
            return back()->withErrors(['email' => 'Your faculty registration was not approved. Please contact the administration.'])->onlyInput('email');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('faculty.dashboard');
    }

    /* ---------- REGISTER ---------- */

    public function showRegister()
    {
        return view('auth.faculty-register');
    }

    public function register(Request $request)
    {
        // I-lowercase muna ang email bago i-validate para iwas duplicate
        $request->merge(['email' => strtolower(trim((string) $request->input('email')))]);

        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => ['required', 'email', 'max:255', 'ends_with:@ccdi.edu.ph', 'unique:users,email'],
            'faculty_id' => 'required|string|max:50|unique:users,faculty_id',
            'department' => 'required|string|max:255',
            'password'   => 'required|string|min:8|confirmed',
        ], [
            'email.ends_with' => 'Please use your CCDI school email (example: name@ccdi.edu.ph).',
        ]);

        // Dapat nasa opisyal na listahan ng faculty ang ID at email
        $listed = FacultyRoster::where('faculty_id', $data['faculty_id'])
            ->where('email', $data['email'])
            ->exists();

        if (! $listed) {
            return back()
                ->withErrors(['faculty_id' => 'Your Faculty ID and school email were not found in the official faculty list. Please contact the administration.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'faculty_id' => $data['faculty_id'],
            'department' => $data['department'],
            'password'   => $data['password'], // na-hash na ng model
            'role'       => 'faculty',
            'status'     => 'pending',
        ]);

        return redirect()->route('faculty.login')
            ->with('success', 'Registration submitted! Please wait for the administration to verify and approve your account.');
    }

    /* ---------- LOGOUT ---------- */

    public function logout(Request $request)
    {
        $this->forceLogout($request);
        return redirect()->route('faculty.login');
    }

    private function forceLogout(Request $request): void
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}