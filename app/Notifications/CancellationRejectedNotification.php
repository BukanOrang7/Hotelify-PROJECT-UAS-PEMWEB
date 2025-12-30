<?php

namespace App\Notifications;

use App\Models\Cancellation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CancellationRejectedNotification extends Notification implements ShouldQueue
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

        return (new MailMessage)
            ->subject('Pengajuan Pembatalan Ditolak')
            ->greeting("Halo {$notifiable->name},")
            ->line('Maaf, pengajuan pembatalan booking Anda telah ditolak oleh admin.')
            ->line("Nomor Booking: {$booking->booking_number}")
            ->line('Silakan hubungi customer service jika Anda memiliki pertanyaan lebih lanjut.')
            ->action('Lihat Detail Booking', route('profil'))
            ->salutation('Salam, Hotelify');
    }

    public function toDatabase(object $notifiable): array
    {
        $booking = $this->cancellation->booking;

        return [
            'cancellation_id' => $this->cancellation->id,
            'booking_id' => $booking->id,
            'booking_number' => $booking->booking_number,
            'title' => 'Pembatalan Ditolak',
            'message' => "Pengajuan pembatalan Anda telah ditolak oleh admin.",
            'type' => 'cancellation_rejected'
        ];
    }
}
