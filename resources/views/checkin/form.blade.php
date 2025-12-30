@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <!-- Header Card -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full shadow-lg mb-6 transform transition-transform hover:scale-105">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Check-in Online</h1>
            <p class="text-gray-600">Masukkan kode booking Anda untuk memulai proses check-in</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6 sm:p-8">
                <form method="POST" action="/checkin" class="space-y-6">
                    @csrf
                    
                    <!-- Booking Code Input -->
                    <div>
                        <label for="booking_code" class="block text-sm font-semibold text-gray-900 mb-2">
                            Kode Booking
                        </label>
                        @if($booking_code ?? false)
                            <div class="mb-2 p-2 bg-green-50 border border-green-200 rounded-lg">
                                <p class="text-sm text-green-700">
                                    <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Kode booking telah diisi otomatis dari booking Anda.
                                </p>
                            </div>
                        @endif
                        <div class="relative">
                            <input 
                                id="booking_code"
                                name="booking_code"
                                type="text"
                                required
                                autocomplete="off"
                                placeholder="Contoh: AR-20250101-ABCD"
                                value="{{ $booking_code ?? old('booking_code') }}"
                                class="w-full px-4 py-3 border-2 rounded-lg text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200
                                    @error('booking_code') border-red-500 @else border-gray-300 @enderror"
                            />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2H5z" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Kode booking dapat ditemukan di email konfirmasi yang kami kirimkan
                        </p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                    <div class="rounded-lg bg-red-50 border border-red-200 p-4 transform transition-all duration-300">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-semibold text-red-800">
                                    {{ $errors->has('booking_code') ? 'Tidak dapat melakukan check-in' : 'Booking tidak ditemukan' }}
                                </h3>
                                <div class="mt-1 text-sm text-red-700">
                                    <p>{{ $errors->first('booking_code') ?: 'Pastikan kode booking benar dan status masih "booked"' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 transform hover:-translate-y-0.5"
                    >
                        Verifikasi & Check-in
                        <svg class="inline-block w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>

                <!-- Info Cards -->
                <div class="mt-8 space-y-4">
                    <div class="flex items-start p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-200">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Siapkan Dokumen</p>
                            <p class="text-sm text-gray-600">ID/Passport dan kartu tamu yang diperlukan</p>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-green-50 rounded-lg hover:bg-green-100 transition duration-200">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Waktu Check-in</p>
                            <p class="text-sm text-gray-600">Mulai pukul 14:00 WIB</p>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition duration-200">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Butuh Bantuan?</p>
                            <p class="text-sm text-gray-600">Hubungi resepsionis di +62 21 1234 5678</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <p class="mt-6 text-center text-sm text-gray-500">
            Proses check-in online hanya berlaku untuk booking dengan status "booked"
        </p>
    </div>
</div>
@endsection