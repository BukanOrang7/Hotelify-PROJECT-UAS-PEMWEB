<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;

class PageController extends Controller
{
    public function infografis()
    {
        // sample aggregated data for last 6 months
        $months = [];
        $occupancy = [];
        $guests = [];
        for ($i = 5; $i >= 0; $i--) {
            $m = now()->subMonths($i)->format('M Y');
            $months[] = $m;
            // rudimentary sample: random or query
            $occupancy[] = rand(40, 95);
            $guests[] = rand(50, 300);
        }

        return view('public.infografis', [
            'occupancy' => ['months' => $months, 'occupancyRates' => $occupancy],
            'guests' => ['months' => $months, 'count' => $guests]
        ]);
    }
}
