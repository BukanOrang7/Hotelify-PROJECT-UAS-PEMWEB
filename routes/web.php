<?php

use Illuminate\Support\Facades\Route;

// =======================
// PUBLIC CONTROLLERS
// =======================
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ProfileController;

// =======================
// ADMIN CONTROLLERS
// =======================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CancellationController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LogController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Landing
Route::get('/', fn () => view('welcome'))->name('home');

// Simple static legal pages (Privacy, Terms, Cancellation)
Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/cancellation', 'legal.cancellation')->name('cancellation');

// Serve hero background from private storage (falls back to Unsplash)
Route::get('/hero-bg', function() {
    $path = storage_path('app/private/hero-background.jpg');
    if (file_exists($path)) {
        $response = response()->file($path);
        // Avoid very long client caching in local/development so changes appear quickly
        if (app()->environment('production')) {
            $response->header('Cache-Control', 'public, max-age=31536000');
        }
        return $response;
    }
    // fallback to the external image if private file missing
    return redirect('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
})->name('hero.bg');

Route::get('/infografis', [\App\Http\Controllers\PageController::class, 'infografis'])->name('infografis');

// =======================
// BOOKINGS (public)
// =======================
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/check-price', [BookingController::class, 'checkPrice'])->name('booking.checkPrice');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/booking/bayar/{booking}', [\App\Http\Controllers\PaymentController::class, 'show'])->name('booking.payment')->middleware('auth');
Route::post('/booking/bayar/{booking}', [\App\Http\Controllers\PaymentController::class, 'pay'])->name('booking.payment.pay')->middleware('auth');
Route::get('/booking/{booking}/invoice', [\App\Http\Controllers\PaymentController::class, 'invoice'])->name('booking.invoice')->middleware('auth');
Route::get('/booking/{booking}/invoice/view', [\App\Http\Controllers\PaymentController::class, 'invoiceView'])->name('booking.invoice.view')->middleware('auth');

/*
| - Controller success($id) still works via route model binding
*/
Route::get('/booking/success/{booking}', [BookingController::class, 'success'])
    ->name('booking.success');

// Redirect old reservasi routes to new booking routes (backwards compat)
Route::redirect('/reservasi', '/booking');
Route::get('/reservasi/sukses/{booking}', function($booking){ return redirect()->route('booking.success', $booking); });
Route::post('/reservasi', function(){ return abort(410); });

// =======================
// BLOG (PUBLIC)
// =======================
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);

// =======================
// CHECK-IN
// =======================
Route::get('/checkin', [CheckinController::class, 'form']);
Route::post('/checkin', [CheckinController::class, 'process']);

// =======================
// USER (LOGIN REQUIRED)
// =======================
Route::middleware('auth')->group(function () {
    // Default dashboard route used by authentication flows (e.g., registration redirect)
    Route::get('/dashboard', function() {
        if (!auth()->check()) return redirect()->route('login');
        // Send admins to admin dashboard, regular users to profile page
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('profil');
    })->name('dashboard');

    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::get('/profil/bookings-data', [ProfileController::class, 'bookingsData'])->name('profil.bookingsData');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profil.update');
    Route::post('/profil/cancel', [ProfileController::class, 'requestCancellation'])->name('profil.requestCancellation');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
| - wajib login
| - wajib role admin
| - prefix: /admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/dashboard/data', [DashboardController::class, 'data'])
        ->name('admin.dashboard.data');
    Route::get('/dashboard/chart-data', [DashboardController::class, 'chartData'])
        ->name('admin.dashboard.chart-data');

    // =======================
    // SERVICES / KAMAR
    // =======================
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/data', [ServiceController::class, 'data'])->name('admin.services.data');
    Route::get('/services/{service}/bookings', [ServiceController::class, 'bookings'])->name('admin.services.bookings');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');

    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // =======================
    // BOOKINGS
    // =======================
    Route::get('/bookings', [AdminBookingController::class, 'index']);
    Route::get('/bookings/data', [AdminBookingController::class, 'data'])->name('admin.bookings.data');
    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
    Route::post('/bookings/{booking}/status', [AdminBookingController::class, 'changeStatus'])->name('admin.bookings.changeStatus');
    // Update booking (used by admin actions such as approve/reject cancellation)
    Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');

    // =======================
    // CANCELLATIONS
    // =======================
    // 1. Route untuk mengambil Data JSON (AJAX) - Diletakkan sebelum route {param}
    Route::get('/cancellations/data', [CancellationController::class, 'data'])
        ->name('admin.cancellations.data');

    // 2. Route Approve/Reject (Mengembalikan JSON)
    Route::post('/cancellations/{cancellation}/approve', [CancellationController::class, 'approve'])
        ->name('admin.cancellations.approve');
    Route::post('/cancellations/{cancellation}/reject', [CancellationController::class, 'reject'])
        ->name('admin.cancellations.reject');

    // 3. Route Halaman Index Utama
    Route::get('/cancellations', [CancellationController::class, 'index'])
        ->name('admin.cancellations.index');

    // =======================
    // BLOG (ADMIN)
    // =======================
    Route::get('/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('admin.blog.store');
    // Preview route for admin — opens the post inside admin area
    Route::get('/blog/{post}/preview', [AdminBlogController::class, 'preview'])->name('admin.blog.preview');
    Route::get('/blog/{post}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{post}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{post}', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');

    // =======================
    // USERS
    // =======================
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    // =======================
    // LOGS
    // =======================
    Route::get('/logs', [LogController::class, 'index']);
});

// AUTH ROUTES (BREEZE)
require __DIR__.'/auth.php';