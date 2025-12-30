@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow text-center">
    <h2 class="text-2xl font-bold text-green-600 mb-4">Booking Berhasil</h2>

    <p>Kode Booking:</p>
    <p class="text-xl font-mono font-bold mb-4">{{ $booking->booking_code }}</p>

    <p>Total Bayar:</p>
    <p class="text-lg font-semibold mb-4">
        Rp{{ number_format($booking->total_price) }}
    </p>

    <a href="/checkin" class="text-blue-600 underline">
        Lanjut ke Check-in
    </a>
</div>
@endsection
