@extends('layouts.app')

@section('content')

<section class="relative min-h-[85vh] md:min-h-screen flex items-center justify-center overflow-hidden pt-28 pb-28 md:pb-20 section-padding">
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/70 to-indigo-900/50 z-10 hero-bg-overlay pointer-events-none"></div>
        <img src="{{ route('hero.bg') }}"
             alt="Luxury Hotel"
             class="w-full h-full object-cover transform scale-105 animate-float pointer-events-none"
             id="parallax-bg">
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-start lg:items-center">
            <div class="text-white animate-fade-in-up hero-content">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 px-4 py-2 rounded-full mb-6 hover:bg-white/20 transition-all duration-300 cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-medium group-hover:tracking-wider transition-all duration-300">Luxury Experience</span>
                </div>

                <h1 class="hero-title text-white font-bold mb-6 leading-tight">
                    Find Your Perfect <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-indigo-200 hover:from-blue-400 hover:to-indigo-300 transition-all duration-500">Stay</span>
                </h1>

                <p class="text-lg text-white/80 mb-8 max-w-xl hover:text-white/90 transition-colors duration-300">
                    Nikmati kemewahan dan kenyamanan tiada tara. Pesan hotel atau vila impian Anda dengan sistem reservasi kami yang mudah.
                </p>
                
                <div class="flex flex-wrap gap-8 mb-10">
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold group-hover:text-blue-300 transition-colors duration-300">4.8★</div>
                        <div class="text-sm text-white/60 group-hover:text-white/80 transition-colors duration-300">Peringkat</div>
                    </div>
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold group-hover:text-blue-300 transition-colors duration-300">50+</div>
                        <div class="text-sm text-white/60 group-hover:text-white/80 transition-colors duration-300">Properti</div>
                    </div>
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold group-hover:text-blue-300 transition-colors duration-300">24/7</div>
                        <div class="text-sm text-white/60 group-hover:text-white/80 transition-colors duration-300">Dukungan</div>
                    </div>
                </div>
            </div>

            <div class="animate-fade-in-up delay-200 mt-12 lg:mt-0">
                <div class="glass-card bg-white/6 backdrop-blur-lg border border-white/20 rounded-2xl p-6 lg:p-8 shadow-2xl w-full booking-card hover:bg-white/8 hover:border-white/30 transition-all duration-500 group">
                    <h2 class="text-2xl font-bold text-white mb-6 group-hover:translate-x-2 transition-transform duration-300">Pesan Penginapan Anda</h2>
                    
                    <form action="{{ route('booking.create') }}" method="GET" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-white/80 mb-2">Check-in</label>
                                <input type="date" name="check_in" required class="w-full bg-white/10 border border-white/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-white/50 backdrop-blur-sm transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-white/80 mb-2">Check-out</label>
                                <input type="date" name="check_out" required class="w-full bg-white/10 border border-white/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-white/50 backdrop-blur-sm transition-all duration-300">
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-3 sm:py-4 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-xl flex items-center justify-center gap-2 group-btn relative overflow-hidden">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-btn-hover:rotate-12 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Periksa Ketersediaan
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-700 transform -translate-x-full group-btn-hover:translate-x-0 transition-transform duration-500"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce hover:scale-125 transition-transform duration-300 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white/60 hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Layanan Premium Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kami menyediakan fasilitas kelas dunia untuk memastikan kenyamanan dan kepuasan Anda selama menginap.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-blue-100">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Akomodasi Mewah</h3>
                <p class="text-gray-600 group-hover:text-gray-700">Kamar luas dengan interior modern, kasur premium, dan pemandangan kota.</p>
            </div>
            
            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-blue-100">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">WiFi Kecepatan Tinggi</h3>
                <p class="text-gray-600 group-hover:text-gray-700">Koneksi internet super cepat di seluruh area hotel untuk kebutuhan bisnis Anda.</p>
            </div>
            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-blue-100">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Layanan Kamar 24/7</h3>
                <p class="text-gray-600 group-hover:text-gray-700">Layanan pesan antar makanan dan kebutuhan kamar kapan saja.</p>
            </div>
           <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-blue-100">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Spa & Kebugaran</h3>
                <p class="text-gray-600 group-hover:text-gray-700">Pusat kebugaran modern dan spa untuk menyegarkan tubuh dan pikiran.</p>
            </div>
            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-blue-100">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Lokasi Strategis</h3>
                <p class="text-gray-600 group-hover:text-gray-700">Terletak di pusat kota, dekat dengan pusat perbelanjaan dan bisnis.</p>
            </div>
            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 hover:border-blue-100">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Keamanan Terbaik</h3>
                <p class="text-gray-600 group-hover:text-gray-700">Sistem keamanan 24 jam dan CCTV di seluruh area publik.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-b from-white to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 hover:text-blue-600 transition-colors duration-300">Kamar Unggulan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto hover:text-gray-700 transition-colors duration-300">Temukan koleksi akomodasi premium kami</p>
        </div>

        <!-- Carousel Container -->
        <div class="relative">
            <!-- Navigation Buttons (Desktop Only) -->
            <button class="hidden lg:flex absolute -left-14 top-1/2 -translate-y-1/2 z-20 bg-white/95 hover:bg-white text-gray-800 hover:text-blue-600 w-12 h-12 rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 items-center justify-center group"
                    id="prevButton">
                <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            
            <button class="hidden lg:flex absolute -right-14 top-1/2 -translate-y-1/2 z-20 bg-white/95 hover:bg-white text-gray-800 hover:text-blue-600 w-12 h-12 rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 items-center justify-center group"
                    id="nextButton">
                <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Carousel Wrapper dengan padding untuk mobile -->
            <div class="relative overflow-hidden">
                <!-- Carousel Track dengan padding horizontal yang cukup -->
                <div id="carouselTrack" 
                     class="flex gap-3 sm:gap-4 md:gap-6 overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-4 scroll-smooth touch-pan-x px-2 sm:px-4 md:px-6">
                    
                    <!-- Slide 1: Standard Room -->
                    <div class="carousel-slide flex-shrink-0 snap-center w-[180px] sm:w-[220px] md:w-[280px] lg:w-[320px]">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group h-full">
                            <div class="relative h-32 sm:h-40 md:h-48 lg:h-60 overflow-hidden">
                                <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg sm:rounded-xl font-bold shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <span class="text-sm sm:text-base">Rp 950.000</span><span class="text-xs sm:text-sm font-normal">/night</span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1470&auto=format&fit=crop" alt="Standard Room" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-3 sm:p-4 md:p-5 lg:p-6">
                                <h3 class="text-sm sm:text-base md:text-lg font-bold text-gray-900 mb-2 sm:mb-3 group-hover:text-blue-600 transition-colors duration-300">Standard Room</h3>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 group-hover:text-gray-700 transition-colors duration-300 line-clamp-2">Kamar nyaman dan terjangkau dengan fasilitas esensial.</p>
                                <div class="flex items-center gap-1 sm:gap-2 mb-3 sm:mb-4 md:mb-6">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a6 6 0 01-7.143 0" /></svg>
                                    <span class="text-xs sm:text-sm text-gray-600">Hingga 2 tamu</span>
                                </div>
                                <a href="{{ route('booking.create') }}?room=standard" class="block w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 sm:py-2.5 md:py-3 rounded-lg sm:rounded-xl text-center transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg text-xs sm:text-sm md:text-base">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2: Deluxe Room -->
                    <div class="carousel-slide flex-shrink-0 snap-center w-[180px] sm:w-[220px] md:w-[280px] lg:w-[320px]">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group h-full">
                            <div class="relative h-32 sm:h-40 md:h-48 lg:h-60 overflow-hidden">
                                <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg sm:rounded-xl font-bold shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <span class="text-sm sm:text-base">Rp 1.550.000</span><span class="text-xs sm:text-sm font-normal">/night</span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Deluxe Room" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-3 sm:p-4 md:p-5 lg:p-6">
                                <h3 class="text-sm sm:text-base md:text-lg font-bold text-gray-900 mb-2 sm:mb-3 group-hover:text-green-600 transition-colors duration-300">Deluxe Room</h3>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 group-hover:text-gray-700 transition-colors duration-300 line-clamp-2">Kamar luas dengan fasilitas premium dan pemandangan panorama.</p>
                                <div class="flex items-center gap-1 sm:gap-2 mb-3 sm:mb-4 md:mb-6">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a6 6 0 01-7.143 0" /></svg>
                                    <span class="text-xs sm:text-sm text-gray-600">Hingga 2 tamu</span>
                                </div>
                                <a href="{{ route('booking.create') }}?room=deluxe" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-2 sm:py-2.5 md:py-3 rounded-lg sm:rounded-xl text-center transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg text-xs sm:text-sm md:text-base">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3: Twin Bed Room -->
                    <div class="carousel-slide flex-shrink-0 snap-center w-[180px] sm:w-[220px] md:w-[280px] lg:w-[320px]">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group h-full">
                            <div class="relative h-32 sm:h-40 md:h-48 lg:h-60 overflow-hidden">
                                <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg sm:rounded-xl font-bold shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <span class="text-sm sm:text-base">Rp 1.050.000</span><span class="text-xs sm:text-sm font-normal">/night</span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Twin Bed Room" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-3 sm:p-4 md:p-5 lg:p-6">
                                <h3 class="text-sm sm:text-base md:text-lg font-bold text-gray-900 mb-2 sm:mb-3 group-hover:text-purple-600 transition-colors duration-300">Twin Bed Room</h3>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 group-hover:text-gray-700 transition-colors duration-300 line-clamp-2">Dua tempat tidur single nyaman, cocok untuk teman atau saudara.</p>
                                <div class="flex items-center gap-1 sm:gap-2 mb-3 sm:mb-4 md:mb-6">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a6 6 0 01-7.143 0" /></svg>
                                    <span class="text-xs sm:text-sm text-gray-600">Hingga 2 tamu</span>
                                </div>
                                <a href="{{ route('booking.create') }}?room=standard" class="block w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 sm:py-2.5 md:py-3 rounded-lg sm:rounded-xl text-center transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg text-xs sm:text-sm md:text-base">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 4: Executive Suite -->
                    <div class="carousel-slide flex-shrink-0 snap-center w-[180px] sm:w-[220px] md:w-[280px] lg:w-[320px]">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group h-full">
                            <div class="relative h-32 sm:h-40 md:h-48 lg:h-60 overflow-hidden">
                                <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg sm:rounded-xl font-bold shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <span class="text-sm sm:text-base">Rp 2.850.000</span><span class="text-xs sm:text-sm font-normal">/night</span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Executive Suite" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-3 sm:p-4 md:p-5 lg:p-6">
                                <h3 class="text-sm sm:text-base md:text-lg font-bold text-gray-900 mb-2 sm:mb-3 group-hover:text-amber-600 transition-colors duration-300">Executive Suite</h3>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 group-hover:text-gray-700 transition-colors duration-300 line-clamp-2">Suite mewah dengan ruang tamu dan fasilitas bisnis premium.</p>
                                <div class="flex items-center gap-1 sm:gap-2 mb-3 sm:mb-4 md:mb-6">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a6 6 0 01-7.143 0" /></svg>
                                    <span class="text-xs sm:text-sm text-gray-600">Hingga 2 tamu</span>
                                </div>
                                <a href="{{ route('booking.create') }}?room=executive" class="block w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-2 sm:py-2.5 md:py-3 rounded-lg sm:rounded-xl text-center transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg text-xs sm:text-sm md:text-base">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 5: Family Suite -->
                    <div class="carousel-slide flex-shrink-0 snap-center w-[180px] sm:w-[220px] md:w-[280px] lg:w-[320px]">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group h-full">
                            <div class="relative h-32 sm:h-40 md:h-48 lg:h-60 overflow-hidden">
                                <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg sm:rounded-xl font-bold shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <span class="text-sm sm:text-base">Rp 3.800.000</span><span class="text-xs sm:text-sm font-normal">/night</span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1558&q=80" alt="Family Suite" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-3 sm:p-4 md:p-5 lg:p-6">
                                <h3 class="text-sm sm:text-base md:text-lg font-bold text-gray-900 mb-2 sm:mb-3 group-hover:text-red-600 transition-colors duration-300">Family Suite</h3>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 group-hover:text-gray-700 transition-colors duration-300 line-clamp-2">Suite luas dengan beberapa kamar tidur dan fasilitas ramah keluarga.</p>
                                <div class="flex items-center gap-1 sm:gap-2 mb-3 sm:mb-4 md:mb-6">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a6 6 0 01-7.143 0" /></svg>
                                    <span class="text-xs sm:text-sm text-gray-600">Hingga 4 tamu</span>
                                </div>
                               <a href="{{ route('booking.create') }}?room=standard" class="block w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 sm:py-2.5 md:py-3 rounded-lg sm:rounded-xl text-center transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg text-xs sm:text-sm md:text-base">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="text-center mt-12">
            <a href="{{ route('booking.create') }}" 
               class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] group relative overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    View All Rooms
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-800 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
            </a>
        </div>
    </div>
</section>  

<section class="py-20 bg-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Reservasi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Tiga langkah mudah untuk memesan pengalaman menginap tak terlupakan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
            <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-blue-200 -z-0 transform translate-y-1/2"></div>

            <div class="relative z-10 text-center group">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-md border-4 border-blue-100 group-hover:border-blue-300 transition-all duration-300 transform group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">1. Pilih Tanggal</h3>
                <p class="text-gray-600 px-4">Tentukan tanggal check-in, check-out, dan jumlah tamu yang akan menginap.</p>
            </div>

            <div class="relative z-10 text-center group">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-md border-4 border-blue-100 group-hover:border-blue-300 transition-all duration-300 transform group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">2. Pilih Kamar</h3>
                <p class="text-gray-600 px-4">Pilih tipe kamar yang sesuai dengan kebutuhan dan preferensi Anda.</p>
            </div>

            <div class="relative z-10 text-center group">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-md border-4 border-blue-100 group-hover:border-blue-300 transition-all duration-300 transform group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">3. Konfirmasi & Bayar</h3>
                <p class="text-gray-600 px-4">Lengkapi data diri, lakukan pembayaran, dan e-tiket akan dikirimkan ke email Anda.</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('booking.create') }}" class="inline-block px-8 py-3 border-2 border-blue-600 text-blue-600 font-bold rounded-full hover:bg-blue-600 hover:text-white transition-all duration-300">
                Mulai Reservasi
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center group transform hover:scale-110 transition-all duration-500 cursor-pointer">
                <div class="text-5xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors duration-300" id="stat1">0</div>
                <div class="text-white/80 group-hover:text-white transition-colors duration-300">Tamu Puas</div>
            </div>
            <div class="text-center group transform hover:scale-110 transition-all duration-500 cursor-pointer">
                <div class="text-5xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors duration-300" id="stat2">0</div>
                <div class="text-white/80 group-hover:text-white transition-colors duration-300">Kamar Tersedia</div>
            </div>
            <div class="text-center group transform hover:scale-110 transition-all duration-500 cursor-pointer">
                <div class="text-5xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors duration-300" id="stat3">0</div>
                <div class="text-white/80 group-hover:text-white transition-colors duration-300">Staf Berpengalaman</div>
            </div>
            <div class="text-center group transform hover:scale-110 transition-all duration-500 cursor-pointer">
                <div class="text-5xl font-bold text-white mb-2 group-hover:text-blue-300 transition-colors duration-300" id="stat4">0</div>
                <div class="text-white/80 group-hover:text-white transition-colors duration-300">Penghargaan</div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 hover:text-blue-600 transition-colors duration-300">Testimoni Pelanggan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto hover:text-gray-700 transition-colors duration-300">Pengalaman nyata dari pelanggan kami yang puas</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-fade-in-up delay-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold text-lg group-hover:scale-110 transition-transform duration-300">J</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">John Doe</h4>
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic group-hover:text-gray-700 transition-colors duration-300">"Pengalaman hotel terbaik yang pernah saya alami! Kamarnya sangat bersih dan pelayanannya luar biasa."</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-fade-in-up delay-200">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-green-400 to-teal-500 flex items-center justify-center text-white font-bold text-lg group-hover:scale-110 transition-transform duration-300">S</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Sarah Smith</h4>
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic group-hover:text-gray-700 transition-colors duration-300">"Sempurna untuk liburan keluarga kami! Anak-anak menyukai kolam renang dan kami menghargai kamar yang luas."</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-fade-in-up delay-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center text-white font-bold text-lg group-hover:scale-110 transition-transform duration-300">M</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Michael Brown</h4>
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic group-hover:text-gray-700 transition-colors duration-300">"Pelayanan luar biasa dan perhatian terhadap detail. Staf melampaui harapan untuk membuat masa menginap kami sempurna."</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-4xl font-bold text-gray-900">Lokasi Strategis</h2>
                <p class="text-gray-600 text-lg">Terletak di jantung kota, Hotelify menawarkan akses mudah ke tempat wisata utama, distrik bisnis, dan pusat perbelanjaan.</p>
                
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Alamat</h4>
                            <p class="text-gray-600">Jl. Jenderal Sudirman No. 123, Jakarta Selatan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Kontak</h4>
                            <p class="text-gray-600">+62 21 1234 5678</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="h-[400px] bg-gray-200 rounded-2xl overflow-hidden shadow-lg relative">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.299974443229!2d106.800049314769!3d-6.224123995493979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d7a7d427d%3A0xb3a0d5c2c77d4c2!2sSudirman%20Central%20Business%20District!5e0!3m2!1sen!2sid!4v1625637219985!5m2!1sen!2sid" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: scale(1.05) translateY(0);
        }
        50% {
            transform: scale(1.05) translateY(-20px);
        }
    }

    @keyframes pulse-glow {
        0%, 100% {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
        50% {
            box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }

    .animate-float {
        animation: float 20s ease-in-out infinite;
    }

    /* Parallax effect */
    @media (min-width: 768px) {
        #parallax-bg {
            transition: transform 0.3s ease-out;
        }
    }

    /* Glassmorphism */
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Prevent background elements from capturing pointer events and improve layout on small screens */
    #parallax-bg { pointer-events: none; object-position: center; }
    .hero-bg-overlay { pointer-events: none; }
    .booking-card { margin-top: 0; }
    .hero-content { padding-bottom: 0.5rem; }
    
    /* Button overlay effect */
    .group-btn:hover .group-btn-hover\:rotate-12 {
        transform: rotate(12deg);
    }
    
    .group-btn:hover .group-btn-hover\:translate-x-full {
        transform: translateX(100%);
    }

    @media (max-width: 768px) {
        .booking-card { margin-top: 1.5rem; padding: 1rem; margin-bottom: 1.5rem; }
        .booking-card .relative .absolute { right: 0.6rem; top: 0.6rem; }
        .booking-card input { padding-right: 2.5rem; }
        .hero-content { padding-bottom: 1.5rem; }
    }
    
    @media (min-width: 1024px) {
        .hero-content { padding-bottom: 2.5rem; }
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Image hover effects */
    .group img {
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .keyboard-focus {
        outline: 2px solid #3b82f6;
        outline-offset: 2px;
    }
</style>

<script>
    // Parallax Effect for Hero Background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxBg = document.getElementById('parallax-bg');
        if (parallaxBg) {
            parallaxBg.style.transform = `scale(1.05) translateY(${scrolled * 0.3}px)`;
        }
    });

    // Counter Animation for Stats
    function animateCounter(element, target, duration) {
        let start = 0;
        const increment = target / (duration / 16); // 60fps
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start).toLocaleString();
            }
        }, 16);
    }

    // Start counter animation when stats section is in view
    const statsSection = document.querySelector('section.bg-gradient-to-r');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(document.getElementById('stat1'), 50000, 2000);
                animateCounter(document.getElementById('stat2'), 100, 1500);
                animateCounter(document.getElementById('stat3'), 50, 1800);
                animateCounter(document.getElementById('stat4'), 12, 1200);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    if (statsSection) {
        observer.observe(statsSection);
    }

    // Animate elements on scroll
    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-fade-in-up').forEach(el => {
        scrollObserver.observe(el);
    });

    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            document.activeElement.classList.add('keyboard-focus');
        }
    });

    document.addEventListener('click', () => {
        document.querySelectorAll('.keyboard-focus').forEach(el => {
            el.classList.remove('keyboard-focus');
        });
    });
</script>
@endsection
