<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\FacultyAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultyManagementController;
use App\Http\Controllers\Faculty\DashboardController as FacultyDashboardController;
use App\Http\Middleware\EnsureRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (User Reporting & Tracking)
|--------------------------------------------------------------------------
*/

Route::view('/', 'report.home')->name('home');
Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
Route::get('/report', fn () => redirect()->route('report.create'));
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

Route::get('/report/success/{trackingCode}', [ReportController::class, 'success'])->name('report.success');

Route::get('/track', [ReportController::class, 'trackForm'])->name('report.track');
Route::post('/track', [ReportController::class, 'trackResult'])->name('report.track.result');

Route::view('/terms-and-conditions', 'report.terms')->name('terms');
Route::view('/about', 'report.about')->name('about');
Route::view('/contact', 'report.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('login');
Route::post('/admin/login', [AdminLoginController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('admin.login.store');

Route::post('/admin/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', EnsureRole::class . ':admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/reports/{report}', [DashboardController::class, 'show'])->name('admin.reports.show');
    Route::put('/reports/{report}', [DashboardController::class, 'update'])->name('admin.reports.update');
    Route::patch('/reports/{report}/priority', [DashboardController::class, 'updatePriority'])
        ->name('admin.reports.priority');
    Route::get('/archive', [DashboardController::class, 'archive'])->name('admin.archive');
    Route::patch('/archive/{id}/restore', [DashboardController::class, 'restore'])->name('admin.reports.restore');
    Route::delete('/reports/{report}', [DashboardController::class, 'destroy'])->name('admin.reports.destroy');
    Route::get('/faculty', [FacultyManagementController::class, 'index'])->name('admin.faculty');
    Route::patch('/faculty/{user}/approve', [FacultyManagementController::class, 'approve'])->name('admin.faculty.approve');
    Route::patch('/faculty/{user}/reject', [FacultyManagementController::class, 'reject'])->name('admin.faculty.reject');
});

/*
|--------------------------------------------------------------------------
| Faculty Routes
|--------------------------------------------------------------------------
*/

Route::get('/faculty/login', [FacultyAuthController::class, 'showLogin'])->name('faculty.login');
Route::post('/faculty/login', [FacultyAuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('faculty.login.store');

Route::get('/faculty/register', [FacultyAuthController::class, 'showRegister'])->name('faculty.register');
Route::post('/faculty/register', [FacultyAuthController::class, 'register'])
    ->middleware('throttle:5,1')
    ->name('faculty.register.store');

Route::post('/faculty/logout', [FacultyAuthController::class, 'logout'])->name('faculty.logout');

Route::get('/faculty/dashboard', [FacultyDashboardController::class, 'index'])
    ->middleware(EnsureRole::class . ':faculty')
    ->name('faculty.dashboard');