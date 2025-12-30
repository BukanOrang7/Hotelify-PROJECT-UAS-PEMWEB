@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Pembayaran (Dummy)</h1>

    <p>Kode Booking: <strong>{{ $booking->booking_code }}</strong></p>
    <p>Nama: <strong>{{ $booking->guest_info['name'] ?? auth()->user()->name ?? '-' }}</strong></p>
    <p>Total: <strong>Rp {{ number_format($booking->total_price,0,',','.') }}</strong></p>

    <form method="POST" action="{{ route('booking.payment.pay', $booking) }}">
        @csrf
        <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Bayar (Dummy)</button>
    </form>
</div>
@endsection