<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cancellation;
use App\Traits\AutoCompleteBookingStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use AutoCompleteBookingStatus;

    public function index()
    {
        // Auto-complete statuses before loading dashboard
        self::autoCompleteStatuses();

        // Get today's date
        $today = Carbon::now()->format('Y-m-d');

        // Count active bookings for today (check_in <= today <= check_out, not cancelled)
        $todayBookings = $this->getTodayBookings($today);
        $pendingCancel = Cancellation::where('status', 'requested')->count();
        $todayRevenue = $this->getTodayRevenue($today);
        $totalRevenue = $this->getTotalRevenue();

        // Chart data for last 30 days (1 month) - Generate full date range
        $thirtyDaysAgo = Carbon::now()->subDays(30)->startOfDay();
        $today_carbon = Carbon::now()->endOfDay();
        
        // Get bookings data grouped by date
        $bookingsByDate = Booking::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$thirtyDaysAgo, $today_carbon])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');
        
        // Generate full date range with zeros for missing dates
        $chartData = collect();
        $currentDate = $thirtyDaysAgo->copy();
        while ($currentDate <= $today_carbon) {
            $dateStr = $currentDate->format('Y-m-d');
            $chartData->push([
                'date' => $dateStr,
                'total' => $bookingsByDate->get($dateStr)?->total ?? 0
            ]);
            $currentDate->addDay();
        }

        return view('admin.dashboard', compact(
            'todayBookings',
            'pendingCancel',
            'todayRevenue',
            'totalRevenue',
            'chartData',
            'today'
        ));
    }

    /**
     * Get real-time dashboard data (AJAX)
     */
    public function data()
    {
        // Auto-complete statuses before returning data
        self::autoCompleteStatuses();

        $today = Carbon::now()->format('Y-m-d');

        // also generate chart data for last 30 days (same logic as index)
        $thirtyDaysAgo = Carbon::now()->subDays(30)->startOfDay();
        $today_carbon = Carbon::now()->endOfDay();

        $bookingsByDate = Booking::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$thirtyDaysAgo, $today_carbon])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $chartDates = [];
        $chartTotals = [];
        $currentDate = $thirtyDaysAgo->copy();
        while ($currentDate <= $today_carbon) {
            $dateStr = $currentDate->format('Y-m-d');
            $chartDates[] = $dateStr;
            $chartTotals[] = $bookingsByDate->get($dateStr)?->total ?? 0;
            $currentDate->addDay();
        }

        return response()->json([
            'todayBookings' => $this->getTodayBookings($today),
            'pendingCancel' => Cancellation::where('status', 'requested')->count(),
            'todayRevenue' => $this->getTodayRevenue($today),
            'totalRevenue' => $this->getTotalRevenue(),
            'today' => $today,
            'chartDates' => $chartDates,
            'chartTotals' => $chartTotals,
        ]);
    }

    /**
     * Get chart data for specified number of days (AJAX)
     */
    public function chartData(Request $request)
    {
        $days = $request->get('days', 30); // Default to 30 days

        // Validate days parameter
        if (!in_array($days, [7, 30, 90])) {
            $days = 30;
        }

        $daysAgo = Carbon::now()->subDays($days)->startOfDay();
        $today_carbon = Carbon::now()->endOfDay();

        $bookingsByDate = Booking::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$daysAgo, $today_carbon])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $chartDates = [];
        $chartTotals = [];
        $currentDate = $daysAgo->copy();
        while ($currentDate <= $today_carbon) {
            $dateStr = $currentDate->format('Y-m-d');
            $chartDates[] = $dateStr;
            $chartTotals[] = $bookingsByDate->get($dateStr)?->total ?? 0;
            $currentDate->addDay();
        }

        return response()->json([
            'dates' => $chartDates,
            'totals' => $chartTotals,
        ]);
    }

    /**
     * Get bookings that are active today (check_in <= today <= check_out)
     * Excludes cancelled bookings
     */
    private function getTodayBookings($today)
    {
        return Booking::whereDate('check_in', '<=', $today)
            ->whereDate('check_out', '>=', $today)
            ->where('status', '!=', 'cancelled')
            ->count();
    }

    /**
     * Get revenue for today from completed transactions for active bookings today
     * Only counts non-cancelled bookings where check_in <= today <= check_out
     */
    private function getTodayRevenue($today)
    {
        return \App\Models\Transaction::where('status', 'completed')
            ->whereDate('created_at', '=', $today)
            ->whereHas('booking', function($q) use ($today) {
                $q->where('status', '!=', 'cancelled')
                  ->whereDate('check_in', '<=', $today)
                  ->whereDate('check_out', '>=', $today);
            })
            ->sum('amount');
    }

    /**
     * Get total revenue from all completed transactions (keseluruhan)
     */
    private function getTotalRevenue()
    {
        return \App\Models\Transaction::where('status', 'completed')
            ->whereHas('booking', function($q) {
                $q->where('status', '!=', 'cancelled');
            })
            ->sum('amount');
    }
}