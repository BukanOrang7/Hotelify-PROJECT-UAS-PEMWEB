<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cancellation;
use App\Models\ActivityLog;
use App\Traits\AutoCompleteBookingStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use AutoCompleteBookingStatus;

    public function index()
    {
        // Auto-complete statuses before showing profile
        self::autoCompleteStatuses();

        return view('profile.index', [
            'bookings' => Booking::where('user_id', auth()->id())
                ->with(['service', 'cancellation'])
                ->latest()
                ->get()
        ]);
    }

    /**
     * Get real-time booking data (AJAX)
     */
    public function bookingsData()
    {
        // Auto-complete statuses before returning data
        self::autoCompleteStatuses();

        $bookings = Booking::where('user_id', auth()->id())
            ->with(['service', 'cancellation', 'transactions'])
            ->latest()
            ->get()
            ->map(function($b) {
                $displayStatus = $b->status;
                if ($b->status === 'checked_in' && \Carbon\Carbon::parse($b->check_out)->isPast()) {
                    $displayStatus = 'completed';
                }
                
                return [
                    'id' => $b->id,
                    'booking_code' => $b->booking_code,
                    'service' => $b->service->name ?? '-',
                    'dates' => $b->check_in->format('Y-m-d') . ' - ' . $b->check_out->format('Y-m-d'),
                    'status' => $displayStatus,
                    'cancellation_status' => $b->cancellation?->status,
                ];
            });

        return response()->json(['bookings' => $bookings]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = $request->user();
        $old = $user->only(['name','email','phone','profile_photo']);
        
        // Handle file upload
        if ($request->hasFile('profile_photo')) {
            \Log::info('ProfileController@update: uploading profile_photo', ['user_id' => $user->id]);
            // Delete old photo if exists (on public disk)
            if ($user->profile_photo && \Storage::disk('public')->exists($user->profile_photo)) {
                \Storage::disk('public')->delete($user->profile_photo);
            }
            
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo'] = $path;
            \Log::info('ProfileController@update: stored profile_photo', ['user_id' => $user->id, 'path' => $path]);
        }

        $user->update($validated);
        // Refresh model from DB to ensure we log the persisted values
        $user->refresh();
        \Log::info('ProfileController@update: user updated', ['user_id' => $user->id, 'profile_photo' => $user->profile_photo]);

        ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'update',
            'model_type' => 'User',
            'model_id' => $user->id,
            'old_values' => json_encode($old),
            'new_values' => json_encode($user->only(['name','email','phone','profile_photo'])),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('profil')->with('success', 'Profil diperbarui');
    }

    public function requestCancellation(Request $request)
    {
        $request->validate(['booking_id' => 'required|exists:bookings,id','reason' => 'required|string']);
        $booking = Booking::findOrFail($request->booking_id);
        if ($booking->user_id != $request->user()->id) abort(403);

        // JANGAN ubah status booking - tetap "booked" 
        // Jika sudah ada cancellation record dengan status rejected, update saja
        // Jika belum ada, buat record cancellation request baru
        $existingCancellation = $booking->cancellation;
        
        if ($existingCancellation && $existingCancellation->status === 'rejected') {
            // Update existing rejected cancellation back to requested
            $old = $existingCancellation->toArray();
            $existingCancellation->update([
                'reason' => $request->reason,
                'status' => 'requested',
                'processed_by' => null
            ]);
            
            ActivityLog::create([
                'user_id' => $request->user()->id,
                'action' => 'update',
                'model_type' => 'Cancellation',
                'model_id' => $existingCancellation->id,
                'old_values' => json_encode(['status' => $old['status'] ?? null, 'reason' => $old['reason'] ?? null]),
                'new_values' => json_encode($existingCancellation->toArray()),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            return back()->with('success', 'Pengajuan pembatalan diperbarui');
        } else {
            // Create new cancellation record
            $c = Cancellation::create([
                'booking_id' => $booking->id,
                'reason' => $request->reason,
                'status' => 'requested'
            ]);

            ActivityLog::create([
                'user_id' => $request->user()->id,
                'action' => 'create',
                'model_type' => 'Cancellation',
                'model_id' => $c->id,
                'old_values' => null,
                'new_values' => json_encode($c->toArray()),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return back()->with('success', 'Pengajuan pembatalan terkirim');
        }
    }
}