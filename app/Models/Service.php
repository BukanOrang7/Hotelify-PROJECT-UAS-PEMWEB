<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int $capacity
 * @property float $price_per_night
 * @property string|null $description
 * @property string|null $image
 * @property bool $is_available
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<Booking> $bookings
 */
use Carbon\Carbon;

class Service extends Model
{
    protected $fillable = [
        'name','type','capacity','price_per_night','description','image','is_available'
    ];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    /**
     * Scope a query to services that are available between $start and $end.
     *
     * Usage: Service::availableIn($start, $end)->get();
     *
     * $start / $end can be date strings or Carbon instances.
     */
    public function scopeAvailableIn($query, $start, $end)
    {
        $start = Carbon::parse($start)->startOfDay();
        $end = Carbon::parse($end)->startOfDay();

        return $query->whereDoesntHave('bookings', function ($q) use ($start, $end) {
            $q->where('status', '!=', 'cancelled')
              ->where(function ($qb) use ($start, $end) {
                  // overlap if booking.check_in < requested_end AND booking.check_out > requested_start
                  $qb->where('check_in', '<', $end->toDateString())
                     ->where('check_out', '>', $start->toDateString());
              });
        });
    }

} 
