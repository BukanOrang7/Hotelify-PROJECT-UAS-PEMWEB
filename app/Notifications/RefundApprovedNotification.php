<?php

namespace App\Notifications;

use App\Models\Cancellation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RefundApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Cancellation $cancellation
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $booking = $this->cancellation->booking;
        $refundAmount = $this->cancellation->refund_amount;

        return (new MailMessage)
            ->subject('Pembatalan Disetujui - Pengembalian Dana Diterima')
            ->greeting("Halo {$notifiable->name},")
            ->line('Pengajuan pembatalan booking Anda telah disetujui oleh admin.')
            ->line("Nomor Booking: {$booking->booking_number}")
            ->line("Jumlah Pengembalian: Rp " . number_format($refundAmount, 0, ',', '.'))
            ->line('Dana pengembalian akan diproses ke rekening Anda dalam waktu 3-5 hari kerja.')
            ->line('Terima kasih telah menggunakan layanan kami.')
            ->action('Lihat Detail Booking', route('profil'))
            ->salutation('Salam, Hotelify');
    }

    public function toDatabase(object $notifiable): array
    {
        $booking = $this->cancellation->booking;
        $refundAmount = $this->cancellation->refund_amount;

        return [
            'cancellation_id' => $this->cancellation->id,
            'booking_id' => $booking->id,
            'booking_number' => $booking->booking_number,
            'title' => 'Pembatalan Disetujui',
            'message' => "Pengajuan pembatalan Anda telah disetujui. Pengembalian dana Rp " . number_format($refundAmount, 0, ',', '.') . " akan diproses dalam waktu 3-5 hari kerja.",
            'refund_amount' => $refundAmount,
            'type' => 'refund_approved'
        ];
    }
}
