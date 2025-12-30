<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property string $booking_code
 * @property string $check_in
 * @property string $check_out
 * @property int $guest_count
 * @property float $total_price
 * @property string $status
 * @property array $guest_info
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read Service $service
 * @property-read User $user
 * @property-read Cancellation $cancellation
 * @property-read \Illuminate\Database\Eloquent\Collection<Transaction> $transactions
 */
use Carbon\Carbon;

class Booking extends Model
{
    protected $fillable = [
        'user_id','service_id','booking_code',
        'check_in','check_out','guest_count',
        'total_price','status','guest_info','payment_status'
    ];

    protected $casts = [
        'guest_info' => 'array',
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cancellation() {
        return $this->hasOne(Cancellation::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get status with auto-complete if check_out has passed
     */
    public function getDisplayStatusAttribute()
    {
        if ($this->status === 'cancelled') {
            return 'cancelled';
        }
        if ($this->status === 'checked_in' && \Carbon\Carbon::parse($this->check_out)->isPast()) {
            return 'completed';
        }
        return $this->status;
    }

    /**
     * Check if booking can be displayed (not cancelled)
     */
    public function isActive()
    {
        return $this->status !== 'cancelled';
    }

    /**
     * Scope a query to bookings with payment_status = 'pending' older than given hours
     * Usage: Booking::unpaidOlderThan(24)->get();
     */
    public function scopeUnpaidOlderThan($query, $hours = 24)
    {
        $cutoff = Carbon::now()->subHours($hours);

        // If bookings table has payment_status column, use it (user-provided schema)
        if (\Illuminate\Support\Facades\Schema::hasColumn('bookings', 'payment_status')) {
            return $query->where('payment_status', 'pending')
                         ->where('created_at', '<=', $cutoff)
                         ->where('status', '!=', 'cancelled');
        }

        // Fallback: determine unpaid based on latest transaction status (efficient via subquery)
        // This will select bookings where the latest transaction (by id) has status = 'pending'.
        return $query->where('created_at', '<=', $cutoff)
            ->where('status', '!=', 'cancelled')
            ->whereExists(function ($q) {
                $q->select(\DB::raw(1))
                  ->from('transactions as t')
                  ->whereRaw('t.booking_id = bookings.id')
                  ->whereRaw('t.id = (SELECT id FROM transactions WHERE booking_id = bookings.id ORDER BY id DESC LIMIT 1)')
                  ->where('t.status', 'pending');
            });
    }

} 

