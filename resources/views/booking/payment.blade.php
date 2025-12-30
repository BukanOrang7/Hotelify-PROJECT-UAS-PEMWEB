@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Pembayaran</h1>

    <div class="mb-6 space-y-3">
        <p><span class="text-gray-600">Kode Booking:</span> <strong class="text-slate-900">{{ $booking->booking_code }}</strong></p>
        <p><span class="text-gray-600">Nama:</span> <strong class="text-slate-900">{{ $booking->guest_info['name'] ?? auth()->user()->name ?? '-' }}</strong></p>
        <p><span class="text-gray-600">Total:</span> <strong class="text-lg text-blue-600">Rp {{ number_format($booking->total_price,0,',','.') }}</strong></p>
    </div>

    <form method="POST" action="{{ route('booking.payment.pay', $booking) }}">
        @csrf
        <div class="space-y-4">
            <label class="block text-sm text-gray-700">Pilih Bank</label>
            <select name="bank" required class="w-full border rounded p-2">
                <option value="">-- Pilih Bank --</option>
                @foreach($banks as $b)
                    <option value="{{ $b }}">{{ $b }}</option>
                @endforeach
            </select>

            <label class="block text-sm text-gray-700">Nomor Rekening Pengirim</label>
            <input type="tel" name="account_number" required pattern="[0-9]*" inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')" class="w-full border rounded p-2" placeholder="contoh: 1234567890">
            <p class="text-xs text-gray-500 mt-1">Hanya masukkan angka (tanpa spasi atau simbol)</p>
            @error('account_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button class="w-full mt-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">Lanjutkan Pembayaran</button>
        </div>
    </form>
</div>
@endsection
