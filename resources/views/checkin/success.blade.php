@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 max-w-md w-full">
        
        <!-- Success Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                Check-in Berhasil
            </h2>
            <p class="text-gray-600">Selamat datang di fasilitas kami</p>
        </div>

        <!-- Booking Details Card -->
        <div class="bg-gray-50 rounded-xl p-6 mb-8 border border-gray-100">
            <h3 class="font-semibold text-gray-700 mb-4 pb-2 border-b border-gray-200">
                Detail Reservasi
            </h3>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Kode Booking</p>
                    <p class="font-mono font-bold text-lg text-gray-900 tracking-wide">
                        {{ $booking->booking_code ?? 'N/A' }}
                    </p>
                </div>

                <div class="pt-3 border-t border-gray-200">
                    <p class="text-sm text-gray-500 mb-1">Layanan</p>
                    <p class="font-semibold text-gray-900">
                        {{ $booking->service->name ?? 'N/A' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 pt-3 border-t border-gray-200">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Check-in</p>
                        <p class="font-semibold text-gray-900">
                            {{ optional($booking->check_in)->format('d M Y') ?? 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Check-out</p>
                        <p class="font-semibold text-gray-900">
                            {{ optional($booking->check_out)->format('d M Y') ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Badge -->
        <div class="flex justify-center mb-6">
            <span class="inline-flex items-center gap-2 bg-green-50 text-green-700 px-5 py-2.5 rounded-full text-sm font-semibold border border-green-100">
                <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                Status: Checked In
            </span>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-3">
                <a href="/" class="bg-gray-600 text-white py-3 px-4 rounded-xl hover:bg-gray-700 transition-all duration-300 text-center font-semibold shadow-sm hover:shadow">
                    Beranda
                </a>
                <a href="/booking" class="bg-blue-600 text-white py-3 px-4 rounded-xl hover:bg-blue-700 transition-all duration-300 text-center font-semibold shadow-sm hover:shadow">
                    Booking Lagi
                </a>
            </div>

            <!-- Print Invoice Button -->
            <div>
                <a href="{{ route('booking.invoice.view', $booking) }}" target="_blank" 
                   class="block w-full bg-green-600 text-white py-3 px-4 rounded-xl hover:bg-green-700 transition-all duration-300 text-center font-semibold shadow-sm hover:shadow">
                    Cetak / Simpan PDF
                </a>
            </div>
        </div>

        <!-- Information Note -->
        <div class="mt-8 pt-6 border-t border-gray-100">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <p class="text-sm text-gray-600">
                    Tunjukkan kode booking ini di front desk untuk melengkapi proses check-in
                </p>
            </div>
        </div>

    </div>
</div>
@endsection