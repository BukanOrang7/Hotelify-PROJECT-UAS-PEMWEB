@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Header dengan Hotelify -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Profil Saya</h2>
                <p class="text-gray-600 mt-1">Kelola informasi profil dan riwayat pemesanan Anda</p>
            </div>
            
            <!-- Tombol Edit dan Logout -->
            <div class="flex gap-3">
                <a href="{{ route('profil.edit') }}"
                   class="px-5 py-2.5 bg-blue-600 text-white hover:bg-blue-700 rounded-lg font-medium transition duration-200 shadow-sm hover:shadow">
                    Edit Profil
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" 
                            class="px-5 py-2.5 bg-red-600 text-white hover:bg-red-700 rounded-lg font-medium transition duration-200 shadow-sm hover:shadow">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Profile Information -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <!-- Profile Header -->
                <div class="flex flex-col items-center text-center mb-8">
                    <!-- Avatar -->
                    @if(auth()->user()->profile_photo)
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" 
                             alt="{{ auth()->user()->name }}"
                             class="w-24 h-24 rounded-full object-cover border-4 border-blue-100 mb-4">
                    @else
                        <div class="w-24 h-24 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center border-4 border-blue-100 mb-4">
                            <span class="text-3xl font-bold text-blue-600">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </span>
                        </div>
                    @endif
                    
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 text-sm">Anggota sejak {{ auth()->user()->created_at->format('F Y') }}</p>
                </div>

                <!-- Informasi Pribadi -->
                <div>
                    <h3 class="text-lg font-medium text-gray-800 mb-6 pb-3 border-b border-gray-100">Informasi Pribadi</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500">Nama Lengkap</p>
                                <p class="font-medium text-gray-800">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500">Alamat Email</p>
                                <p class="font-medium text-gray-800">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        
                        @if(auth()->user()->phone)
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500">Nomor Telepon</p>
                                <p class="font-medium text-gray-800">{{ auth()->user()->phone }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Footer Card -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-sm text-gray-500">
                                Terakhir diperbarui: {{ auth()->user()->updated_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Booking History -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-800">Riwayat Booking</h2>
                        <span class="text-sm text-gray-500">{{ $bookings->count() }} pesanan</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-1">Semua pemesanan Anda dalam satu tempat</p>
                </div>

                <div class="p-0">
                    @if($bookings->count())
                        <!-- Desktop Table -->
                        <div class="hidden lg:block overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50 text-left">
                                        <th class="py-4 px-6 text-sm font-semibold text-gray-700">Kode</th>
                                        <th class="py-4 px-6 text-sm font-semibold text-gray-700">Layanan</th>
                                        <th class="py-4 px-6 text-sm font-semibold text-gray-700">Tanggal</th>
                                        <th class="py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="py-4 px-6 text-sm font-semibold text-gray-700">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($bookings as $b)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6">
                                            <div class="font-mono font-bold text-gray-900">{{ $b->booking_code }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="font-medium text-gray-800">{{ $b->service->name ?? '-' }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="space-y-1">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-700">{{ $b->check_in->format('d M Y') }}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-700">{{ $b->check_out->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="space-y-2">
                                                @php
                                                    $displayStatus = $b->status;
                                                    if ($b->status !== 'cancelled' && $b->check_out->isPast()) {
                                                        $displayStatus = 'completed';
                                                    }
                                                @endphp
                                                
                                                <!-- Status Badge -->
                                                <div>
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium
                                                        @if($displayStatus == 'pending') bg-orange-100 text-orange-800
                                                        @elseif($displayStatus == 'booked') bg-green-100 text-green-800
                                                        @elseif($displayStatus == 'checked_in') bg-blue-100 text-blue-800
                                                        @elseif($displayStatus == 'completed') bg-gray-100 text-gray-800
                                                        @elseif($displayStatus == 'cancelled') bg-red-100 text-red-800
                                                        @else bg-gray-100 text-gray-800 @endif">
                                                        @if($displayStatus == 'pending') 
                                                            <span class="w-1.5 h-1.5 bg-orange-500 rounded-full animate-pulse"></span>
                                                        @elseif($displayStatus == 'booked')
                                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                                        @elseif($displayStatus == 'checked_in')
                                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                                                        @else
                                                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>
                                                        @endif
                                                        {{ ucfirst(str_replace('_', ' ', $displayStatus)) }}
                                                    </span>
                                                </div>
                                                
                                                <!-- Cancellation Status -->
                                                @if($b->cancellation)
                                                    <div>
                                                        @if($b->cancellation->status == 'requested')
                                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-yellow-50 text-yellow-700 rounded-full text-xs">
                                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Menunggu persetujuan
                                                            </span>
                                                        @elseif($b->cancellation->status == 'approved')
                                                            <div class="space-y-1">
                                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-50 text-red-700 rounded-full text-xs">
                                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-11 11a1 1 0 01-1.414-1.414l11-11a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                                    </svg>
                                                                    Pembatalan disetujui
                                                                </span>

                                                                @if(isset($b->cancellation->refund_amount) && $b->cancellation->refund_amount !== null)
                                                                    <div class="text-xs text-gray-500">Uang berhasil dikembalikan: <strong>Rp {{ number_format($b->cancellation->refund_amount, 0, ',', '.') }}</strong></div>
                                                                @else
                                                                    <div class="text-xs text-gray-500">Uang telah dikembalikan ke metode pembayaran Anda.</div>
                                                                @endif
                                                            </div>
                                                                                                                @elseif($b->cancellation->status == 'rejected')
                                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-orange-50 text-orange-700 rounded-full text-xs">
                                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Pembatalan ditolak
                                                            </span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex flex-wrap gap-2">
                                                <!-- Action Buttons -->
                                                @if($b->status == 'pending')
                                                    <a href="{{ route('booking.payment', $b->id) }}" 
                                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white hover:bg-blue-700 rounded-lg text-xs font-medium transition-colors shadow-sm">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                        </svg>
                                                        Bayar
                                                    </a>
                                                @elseif($b->status == 'booked')
                                                    @if($b->cancellation && $b->cancellation->status == 'requested')
                                                        <span class="text-xs text-gray-500 px-3 py-1.5">Menunggu persetujuan</span>
                                                    @elseif($b->cancellation && $b->cancellation->status == 'rejected')
                                                        <div class="flex flex-wrap gap-2">
                                                            <form method="POST" action="/checkin" class="inline">
                                                                @csrf
                                                                <input type="hidden" name="booking_code" value="{{ $b->booking_code }}">
                                                                <button type="submit" 
                                                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-purple-600 text-white hover:bg-purple-700 rounded-lg text-xs font-medium transition-colors shadow-sm">
                                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                                                    </svg>
                                                                    Check-in
                                                                </button>
                                                            </form>
                                                            <button class="cancel-btn inline-flex items-center gap-1 px-3 py-1.5 bg-yellow-600 text-white hover:bg-yellow-700 rounded-lg text-xs font-medium transition-colors shadow-sm" 
                                                                    data-booking-id="{{ $b->id }}">
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                                Ajukan Lagi
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="flex flex-wrap gap-2">
                                                            <form method="POST" action="/checkin" class="inline">
                                                                @csrf
                                                                <input type="hidden" name="booking_code" value="{{ $b->booking_code }}">
                                                                <button type="submit" 
                                                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-purple-600 text-white hover:bg-purple-700 rounded-lg text-xs font-medium transition-colors shadow-sm">
                                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                                                    </svg>
                                                                    Check-in
                                                                </button>
                                                            </form>
                                                            <button class="cancel-btn inline-flex items-center gap-1 px-3 py-1.5 bg-yellow-600 text-white hover:bg-yellow-700 rounded-lg text-xs font-medium transition-colors shadow-sm" 
                                                                    data-booking-id="{{ $b->id }}">
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                                Batalkan
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endif
                                                
                                                <!-- Invoice Button -->
                                                @if(in_array($b->status, ['booked', 'checked_in', 'completed']))
                                                    <a href="{{ route('booking.invoice.view', $b->id) }}" target="_blank" 
                                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 text-white hover:bg-green-700 rounded-lg text-xs font-medium transition-colors shadow-sm">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                        Invoice
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Mobile Cards -->
                        <div class="lg:hidden space-y-4 p-6">
                            @foreach($bookings as $b)
                            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                                <div class="space-y-4">
                                    <!-- Header -->
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <div class="font-mono font-bold text-gray-900">{{ $b->booking_code }}</div>
                                            <div class="text-sm text-gray-600 mt-1">{{ $b->service->name ?? '-' }}</div>
                                        </div>
                                        @php
                                            $displayStatus = $b->status;
                                            if ($b->status === 'checked_in' && $b->check_out->isPast()) {
                                                $displayStatus = 'completed';
                                            }
                                        @endphp
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium
                                            @if($displayStatus == 'pending') bg-orange-100 text-orange-800
                                            @elseif($displayStatus == 'booked') bg-green-100 text-green-800
                                            @elseif($displayStatus == 'checked_in') bg-blue-100 text-blue-800
                                            @elseif($displayStatus == 'completed') bg-gray-100 text-gray-800
                                            @elseif($displayStatus == 'cancelled') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst(str_replace('_', ' ', $displayStatus)) }}
                                        </span>
                                    </div>

                                    <!-- Dates -->
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-xs text-gray-500">Check-in</p>
                                            <p class="font-medium text-gray-800">{{ $b->check_in->format('d M Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Check-out</p>
                                            <p class="font-medium text-gray-800">{{ $b->check_out->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                    <!-- Cancellation Status -->
                                    @if($b->cancellation)
                                    <div>
                                        @if($b->cancellation->status == 'requested')
                                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-50 text-yellow-700 rounded-full text-xs">
                                                Menunggu persetujuan pembatalan
                                            </span>
                                        @elseif($b->cancellation->status == 'approved')
                                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-red-50 text-red-700 rounded-full text-xs">
                                                Pembatalan disetujui
                                            </span>
                                        @elseif($b->cancellation->status == 'rejected')
                                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-orange-50 text-orange-700 rounded-full text-xs">
                                                Pembatalan ditolak
                                            </span>
                                        @endif
                                    </div>
                                    @endif

                                    <!-- Actions -->
                                    <div class="pt-3 border-t border-gray-200">
                                        <div class="flex flex-wrap gap-2">
                                            @if($b->status == 'pending')
                                                <a href="{{ route('booking.payment', $b->id) }}" 
                                                   class="flex-1 text-center px-3 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg text-sm font-medium transition-colors shadow-sm">
                                                    Lanjutkan Pembayaran
                                                </a>
                                            @elseif($b->status == 'booked')
                                                @if($b->cancellation && $b->cancellation->status == 'requested')
                                                    <span class="text-sm text-gray-500 px-3 py-2">Menunggu persetujuan</span>
                                                @else
                                                    <div class="flex gap-2 w-full">
                                                        <form method="POST" action="/checkin" class="flex-1">
                                                            @csrf
                                                            <input type="hidden" name="booking_code" value="{{ $b->booking_code }}">
                                                            <button type="submit" 
                                                                    class="w-full px-3 py-2 bg-purple-600 text-white hover:bg-purple-700 rounded-lg text-sm font-medium transition-colors shadow-sm">
                                                                Check-in
                                                            </button>
                                                        </form>
                                                        <button class="cancel-btn flex-1 px-3 py-2 bg-yellow-600 text-white hover:bg-yellow-700 rounded-lg text-sm font-medium transition-colors shadow-sm" 
                                                                data-booking-id="{{ $b->id }}">
                                                            Ajukan Pembatalan
                                                        </button>
                                                    </div>
                                                @endif
                                            @endif
                                            
                                            @if(in_array($b->status, ['booked', 'checked_in', 'completed']))
                                                <a href="{{ route('booking.invoice.view', $b->id) }}" target="_blank" 
                                                   class="w-full text-center px-3 py-2 bg-green-600 text-white hover:bg-green-700 rounded-lg text-sm font-medium transition-colors shadow-sm">
                                                    Cetak Invoice
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada booking</h3>
                            <p class="text-gray-600 mb-6">Mulai dengan membuat booking pertama Anda</p>
                            <a href="/" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white hover:bg-blue-700 rounded-lg font-medium transition-all duration-200 shadow-sm hover:shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Buat Booking Baru
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Modal -->
<div id="cancelModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Ajukan Pembatalan</h3>
            <button id="closeCancelModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <form id="cancelForm" method="POST" action="{{ route('profil.requestCancellation') }}">
            @csrf
            <input type="hidden" name="booking_id" id="bookingIdInput">
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alasan Pembatalan</label>
                    <textarea name="reason" required rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                              placeholder="Mohon jelaskan alasan pembatalan..."></textarea>
                </div>
            </div>
            
            <div class="flex gap-3 mt-8">
                <button type="button" id="cancelModalCloseBtn" 
                        class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                    Batal
                </button>
                <button type="submit" 
                        class="flex-1 px-4 py-3 bg-red-600 text-white hover:bg-red-700 rounded-lg font-medium transition-colors">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Cancel Modal Functionality
    const cancelModal = $('#cancelModal');
    const bookingIdInput = $('#bookingIdInput');
    
    // Open modal when cancel button is clicked
    $('.cancel-btn').on('click', function(){
        const bookingId = $(this).data('booking-id');
        bookingIdInput.val(bookingId);
        cancelModal.removeClass('hidden').addClass('flex');
    });
    
    // Close modal functions
    $('#closeCancelModal, #cancelModalCloseBtn').on('click', function(){ 
        cancelModal.removeClass('flex').addClass('hidden');
    });
    
    // Close modal on ESC key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            cancelModal.removeClass('flex').addClass('hidden');
        }
    });
    
    // Close modal on background click
    cancelModal.on('click', function(e) {
        if (e.target === this) {
            $(this).removeClass('flex').addClass('hidden');
        }
    });
    
    // Form submission handling
    $('#cancelForm').on('submit', function(e) {
        const reason = $('textarea[name="reason"]').val();
        if (!reason.trim()) {
            e.preventDefault();
            alert('Mohon isi alasan pembatalan');
            return false;
        }
    });
    
    // Real-time booking status update
    let lastKnownCancellationStates = {};
    let isPageVisible = true;
    let pollingInterval = null;
    
    // Initialize state tracking
    function initializeStateTracking() {
        $('tbody tr').each(function(index) {
            const statusCell = $(this).find('td').eq(3);
            const hasCancellationBadge = statusCell.find('[class*="bg-yellow-50"], [class*="bg-red-50"], [class*="bg-orange-50"]');
            
            if (hasCancellationBadge.length) {
                const badgeText = hasCancellationBadge.text();
                if (badgeText.includes('Menunggu')) {
                    lastKnownCancellationStates[index] = 'requested';
                } else if (badgeText.includes('disetujui')) {
                    lastKnownCancellationStates[index] = 'approved';
                } else if (badgeText.includes('ditolak')) {
                    lastKnownCancellationStates[index] = 'rejected';
                }
            } else {
                lastKnownCancellationStates[index] = null;
            }
        });
    }
    
    // Update booking status
    function updateBookingStatus() {
        if (!isPageVisible) return;
        
        fetch('{{ route("profil.bookingsData") }}', {
            headers: { 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            let shouldReload = false;
            const bookings = data.bookings;
            const rows = $('tbody tr');
            
            rows.each(function(index) {
                if (bookings[index]) {
                    const booking = bookings[index];
                    const bookingId = booking.id;
                    const currentCancellationStatus = booking.cancellation_status;
                    const previousCancellationStatus = lastKnownCancellationStates[index];
                    
                    if (previousCancellationStatus !== currentCancellationStatus) {
                        if (previousCancellationStatus === 'requested' && 
                            (currentCancellationStatus === 'approved' || currentCancellationStatus === 'rejected')) {
                            shouldReload = true;
                            lastKnownCancellationStates[index] = currentCancellationStatus;
                        }
                    }
                }
            });
            
            if (shouldReload && isPageVisible) {
                setTimeout(() => location.reload(), 300);
            }
        })
        .catch(e => console.error('Polling error:', e));
    }
    
    // Page visibility handlers
    document.addEventListener('visibilitychange', function() {
        isPageVisible = !document.hidden;
        if (isPageVisible) {
            updateBookingStatus();
        }
    });
    
    window.addEventListener('focus', function() {
        isPageVisible = true;
        updateBookingStatus();
    });
    
    window.addEventListener('blur', function() {
        isPageVisible = false;
    });
    
    // Initialize tracking
    initializeStateTracking();
    
    // Start polling
    pollingInterval = setInterval(updateBookingStatus, 10000);
    
    // Handle visibility change for polling
    document.addEventListener('visibilitychange', function() {
        if (document.hidden && pollingInterval) {
            clearInterval(pollingInterval);
            pollingInterval = null;
        } else if (!document.hidden && !pollingInterval) {
            pollingInterval = setInterval(updateBookingStatus, 10000);
        }
    });
});
</script>
@endsection