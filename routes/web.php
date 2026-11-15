<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Public Routes (User Reporting & Tracking)
|--------------------------------------------------------------------------
*/

// Home at Report Form Creation
Route::get('/', [ReportController::class, 'create'])->name('report.create');
Route::get('/report', [ReportController::class, 'create']);
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

// Success Page (Dito ipapakita ang Tracking Code)
Route::get('/report/success/{trackingCode}', [ReportController::class, 'success'])->name('report.success');

// Track Report Pages
Route::get('/track', [ReportController::class, 'trackForm'])->name('report.track');
Route::post('/track', [ReportController::class, 'trackResult'])->name('report.track.result');


/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('login');
Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login.store');

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes 
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/reports/{report}', [DashboardController::class, 'show'])->name('admin.reports.show');
    Route::put('/reports/{report}', [DashboardController::class, 'update'])->name('admin.reports.update');
    Route::patch('/reports/{report}/priority', [DashboardController::class, 'updatePriority'])
    ->name('admin.reports.priority');
    Route::get('/archive', [DashboardController::class, 'archive'])->name('admin.archive');
    Route::patch('/archive/{id}/restore', [DashboardController::class, 'restore'])->name('admin.reports.restore');
    Route::delete('/reports/{report}', [DashboardController::class, 'destroy'])->name('admin.reports.destroy');  
});
Route::view('/terms-and-conditions', 'report.terms')->name('terms');
Route::view('/about', 'report.about')->name('about');
Route::view('/contact', 'report.contact')->name('contact');