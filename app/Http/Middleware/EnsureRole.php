<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route($role === 'faculty' ? 'faculty.login' : 'login');
        }

        if ($user->role !== $role) {
            abort(403, 'Unauthorized.');
        }

        if ($role === 'faculty' && $user->status !== 'approved') {
            abort(403, 'Your faculty account is not approved.');
        }

        return $next($request);
    }
}