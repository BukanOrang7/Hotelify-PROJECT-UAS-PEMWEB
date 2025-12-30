<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate user
        $request->authenticate();

        // Regenerate session untuk security
        $request->session()->regenerate();

        // Set session data
        $user = Auth::user();
        $request->session()->put([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'login_time' => now()
        ]);

        // Set cookie untuk remember user
        cookie()->queue('user_name', $user->name, 60 * 24 * 365); // 1 tahun
        cookie()->queue('user_email', $user->email, 60 * 24 * 365); // 1 tahun

        // If we saved a booking intent, restore it now and redirect user back to booking page
        if ($request->session()->has('booking_intent')) {
            $intent = $request->session()->get('booking_intent');
            $request->session()->forget('booking_intent');
            // set success flash so user knows data was restored
            $request->session()->flash('success', 'Data booking Anda telah dipulihkan — silakan pilih kamar atau ubah tanggal jika perlu.');
            // redirect to booking.create with intent params so form is pre-filled
            return redirect()->route('booking.create', $intent);
        }

        // REDIRECT BERDASARKAN ROLE
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Hapus session data
        $request->session()->forget([
            'user_id',
            'user_name',
            'user_email',
            'user_role',
            'login_time'
        ]);

        // Logout user
        Auth::guard('web')->logout();

        // Invalidate dan regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Hapus cookies
        \Cookie::queue(\Cookie::forget('user_name'));
        \Cookie::queue(\Cookie::forget('user_email'));

        return redirect('/');
    }
}
