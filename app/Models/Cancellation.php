<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $booking_id
 * @property int|null $processed_by
 * @property string|null $reason
 * @property string $status
 * @property float|null $refund_amount
 * @property string|null $admin_note
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read Booking $booking
 * @property-read User|null $processedBy
 */
class Cancellation extends Model
{
    protected $fillable = [
        'booking_id','processed_by','reason','status','refund_amount','admin_note'
    ];

    public function booking() { return $this->belongsTo(Booking::class); }
    public function processedBy() { return $this->belongsTo(User::class, 'processed_by'); }
}
