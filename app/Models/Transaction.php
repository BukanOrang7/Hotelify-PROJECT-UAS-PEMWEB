<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $booking_id
 * @property float $amount
 * @property string $payment_method
 * @property string|null $transaction_code
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $payment_date
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read Booking $booking
 */
class Transaction extends Model
{
    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'transaction_code',
        'status',
        'payment_date',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'payment_date' => 'datetime',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
} 
