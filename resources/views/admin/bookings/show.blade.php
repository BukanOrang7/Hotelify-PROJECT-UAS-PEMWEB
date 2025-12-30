@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Detail Booking: {{ $booking->booking_code }}</h1>

<div class="bg-white p-6 rounded shadow">
    <p><strong>Kamar:</strong> {{ $booking->service->name ?? '-' }}</p>
    <p><strong>Tanggal:</strong> {{ $booking->check_in->format('Y-m-d') }} - {{ $booking->check_out->format('Y-m-d') }}</p>
    <p><strong>Jumlah:</strong> {{ $booking->guest_count }}</p>
    <p><strong>Total:</strong> Rp{{ number_format($booking->total_price) }}</p>
    <p><strong>Status:</strong> {{ $booking->status }}</p>

    <form method="POST" action="{{ route('admin.bookings.changeStatus', $booking) }}" class="mt-4">
        @csrf
        <label>Pilih status:</label>
        <select name="status" class="border p-2">
            <option value="pending" @selected($booking->status=='pending')>Pending</option>
            <option value="booked" @selected($booking->status=='booked')>Booked</option>
            <option value="checked_in" @selected($booking->status=='checked_in')>Checked In</option>
            <option value="checked_out" @selected($booking->status=='checked_out')>Checked Out</option>
            <option value="cancelled" @selected($booking->status=='cancelled')>Cancelled</option>
        </select>
        <button class="px-3 py-1 bg-blue-600 text-white rounded">Update</button>
    </form>
</div>
@endsection