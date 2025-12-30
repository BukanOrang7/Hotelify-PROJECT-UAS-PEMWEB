@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 max-w-md w-full">
        
        <!-- Success Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                Booking Berhasil
            </h1>
            <p class="text-gray-600 text-sm md:text-base">
                Reservasi Anda telah berhasil diproses
            </p>
        </div>

        <!-- Booking Details Card -->
        <div class="bg-gray-50 rounded-xl p-6 mb-8 border border-gray-100">
            <h3 class="font-semibold text-gray-700 mb-6 pb-3 border-b border-gray-200 text-center">
                Detail Pembayaran
            </h3>
            
            <div class="space-y-6">
                <!-- Booking Code -->
                <div>
                    <p class="text-sm text-gray-500 mb-2">Kode Booking</p>
                    <div class="bg-white p-4 rounded-lg border border-gray-200">
                        <p class="font-mono font-bold text-lg text-gray-900 tracking-wider text-center">
                            {{ $booking->booking_code ?? 'N/A' }}
                        </p>
                    </div>
                </div>

                <!-- Total Price -->
                <div>
                    <p class="text-sm text-gray-500 mb-2">Total Pembayaran</p>
                    <div class="bg-white p-4 rounded-lg border border-gray-200">
                        <p class="text-2xl font-bold text-green-600 text-center">
                            Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 text-center mt-1">
                            Sudah termasuk pajak dan biaya layanan
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Badge -->
        <div class="flex justify-center mb-8">
            <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-5 py-2.5 rounded-full text-sm font-semibold border border-blue-100">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                Status: Menunggu Check-in
            </span>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4">
            <!-- Check-in Button -->
            <a href="/checkin?booking_code={{ $booking->booking_code }}" 
               class="block w-full bg-green-600 text-white py-3.5 px-4 rounded-xl hover:bg-green-700 transition-all duration-300 text-center font-semibold shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
                Lanjut ke Check-in
            </a>

            <!-- Print Invoice Button -->
            <a href="{{ route('booking.invoice.view', $booking) }}" target="_blank" 
               class="block w-full bg-white text-blue-600 py-3.5 px-4 rounded-xl hover:bg-blue-50 transition-all duration-300 text-center font-semibold border border-blue-200 hover:border-blue-300 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Cetak / Simpan PDF
            </a>
        </div>

        <!-- Information Note -->
        <div class="mt-8 pt-6 border-t border-gray-100">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="text-left">
                    <p class="text-sm text-gray-700 font-medium mb-1">
                        Simpan kode booking Anda
                    </p>
                    <p class="text-xs text-gray-600">
                        Kode booking diperlukan untuk proses check-in. Anda juga dapat mengunduh invoice sebagai bukti pembayaran.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection