@extends('layouts.app')

@section('title', 'Pemesanan Kamar - Hotelfly')

@section('content')
<!-- Rooms List Section -->
<div class="py-8 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h2 class="heading-font text-3xl md:text-4xl font-bold text-blue-600 mb-4">Kamar &amp; Suite</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Jelajahi berbagai pilihan kamar dan suite kami yang dirancang untuk kenyamanan dan kemewahan Anda selama menginap.
            </p>
            <div class="my-6 border-t border-gray-300"></div>
        </div>
        
        <!-- Standard Room -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-10 hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col md:flex-row h-full">
                <div class="w-full md:w-1/2 h-64 md:h-auto relative">
                    <span class="absolute top-4 left-4 text-white px-3 py-1 rounded text-xs font-bold uppercase tracking-wide z-10 shadow-sm" style="background-color: #10B981;">
                        Harga Terbaik
                    </span>
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1470&auto=format&fit=crop" 
                         alt="Standard Room" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="ml-2 text-gray-400 text-sm font-medium">4.5 (200 Reviews)</span>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Standard Room</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm md:text-base">
                        Kamar nyaman dengan fasilitas lengkap untuk perjalanan bisnis atau liburan singkat Anda. Desain modern yang menenangkan.
                    </p>
                    
                    <div class="flex items-baseline gap-2 mb-6">
                        <span class="text-2xl md:text-3xl font-bold accent-color">Rp 950.000</span>
                        <span class="text-gray-500 text-sm">/ malam</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex items-center">
                            <i class="fas fa-user-friends w-6 accent-color"></i>
                            <span class="ml-2">2 tamu</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-wifi w-6 accent-color"></i>
                            <span class="ml-2">WiFi Gratis</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bed w-6 accent-color"></i>
                            <span class="ml-2">Tempat Tidur Double</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-ruler-combined w-6 accent-color"></i>
                            <span class="ml-2">25 m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deluxe Room -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-10 hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col md:flex-row h-full">
                <div class="w-full md:w-1/2 h-64 md:h-auto relative">
                    <span class="absolute top-4 left-4 text-white px-3 py-1 rounded text-xs font-bold uppercase tracking-wide z-10 shadow-sm" style="background-color: #8B5CF6;">
                        Populer
                    </span>
                    <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80" 
                         alt="Deluxe Room" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="ml-2 text-gray-400 text-sm font-medium">4.3 (150 Reviews)</span>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Deluxe Room</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm md:text-base">
                        Ruang lebih luas dengan pemandangan indah. Dilengkapi dengan fasilitas premium seperti bathtub dan area duduk terpisah untuk relaksasi maksimal.
                    </p>
                    
                    <div class="flex items-baseline gap-2 mb-6">
                        <span class="text-2xl md:text-3xl font-bold accent-color">Rp 1.550.000</span>
                        <span class="text-gray-500 text-sm">/ malam</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex items-center">
                            <i class="fas fa-user-friends w-6 accent-color"></i>
                            <span class="ml-2">3 tamu</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bath w-6 accent-color"></i>
                            <span class="ml-2">Bathtub</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bed w-6 accent-color"></i>
                            <span class="ml-2">Tempat Tidur Queen</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-ruler-combined w-6 accent-color"></i>
                            <span class="ml-2">35 m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Twin Bed Room -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-10 hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col md:flex-row h-full">
                <div class="w-full md:w-1/2 h-64 md:h-auto relative">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80" 
                         alt="Twin Bed Room" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="ml-2 text-gray-400 text-sm font-medium">4.5 (80 Reviews)</span>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Twin Bed Room</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm md:text-base">
                        Cocok untuk rekan perjalanan. Dua tempat tidur single premium dengan area kerja ergonomis untuk kenyamanan dan produktivitas Anda.
                    </p>
                    
                    <div class="flex items-baseline gap-2 mb-6">
                        <span class="text-2xl md:text-3xl font-bold accent-color">Rp 1.050.000</span>
                        <span class="text-gray-500 text-sm">/ malam</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex items-center">
                            <i class="fas fa-user-friends w-6 accent-color"></i>
                            <span class="ml-2">2 tamu</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-desktop w-6 accent-color"></i>
                            <span class="ml-2">Meja Kerja</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bed w-6 accent-color"></i>
                            <span class="ml-2">2 Tempat Tidur Single</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-ruler-combined w-6 accent-color"></i>
                            <span class="ml-2">30 m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Executive Suite -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-10 hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col md:flex-row h-full">
                <div class="w-full md:w-1/2 h-64 md:h-auto relative">
                    <span class="absolute top-4 left-4 text-white px-3 py-1 rounded text-xs font-bold uppercase tracking-wide z-10 shadow-sm" style="background-color: #1F2937;">
                        Mewah
                    </span>
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" 
                         alt="Executive Suite" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <span class="ml-2 text-gray-400 text-sm font-medium">4.9 (50 Reviews)</span>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Executive Suite</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm md:text-base">
                        Pengalaman menginap tak tertandingi dengan pemandangan kota yang menakjubkan, ruang tamu luas, dan fasilitas VIP premium.
                    </p>
                    
                    <div class="flex items-baseline gap-2 mb-6">
                        <span class="text-2xl md:text-3xl font-bold accent-color">Rp 2.850.000</span>
                        <span class="text-gray-500 text-sm">/ malam</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex items-center">
                            <i class="fas fa-user-friends w-6 accent-color"></i>
                            <span class="ml-2">3 tamu</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-wine-glass w-6 accent-color"></i>
                            <span class="ml-2">Mini Bar</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bed w-6 accent-color"></i>
                            <span class="ml-2">Tempat Tidur King</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-ruler-combined w-6 accent-color"></i>
                            <span class="ml-2">55 m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Family Suite -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col md:flex-row h-full">
                <div class="w-full md:w-1/2 h-64 md:h-auto relative">
                    <span class="absolute top-4 left-4 text-white px-3 py-1 rounded text-xs font-bold uppercase tracking-wide z-10 shadow-sm" style="background-color: #F97316;">
                        Keluarga
                    </span>
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1558&q=80" 
                         alt="Family Suite" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="ml-2 text-gray-400 text-sm font-medium">4.7 (120 Reviews)</span>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Family Suite</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm md:text-base">
                        Ideal untuk keluarga besar. Menyediakan dua kamar tidur terpisah, area bermain untuk anak, dan fasilitas yang terasa seperti di rumah.
                    </p>
                    
                    <div class="flex items-baseline gap-2 mb-6">
                        <span class="text-2xl md:text-3xl font-bold accent-color">Rp 3.800.000</span>
                        <span class="text-gray-500 text-sm">/ malam</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex items-center">
                            <i class="fas fa-users w-6 accent-color"></i>
                            <span class="ml-2">4 tamu</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-tv w-6 accent-color"></i>
                            <span class="ml-2">2 TV Pintar</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bed w-6 accent-color"></i>
                            <span class="ml-2">2 Tempat Tidur Double</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-ruler-combined w-6 accent-color"></i>
                            <span class="ml-2">65 m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Form Section (original code) -->
<div class="pt-8 pb-12">
    <div class="container-sm">
        <div class="max-w-3xl mx-auto glass-card p-6 lg:p-8 rounded-xl">

            <h1 class="text-2xl font-bold mb-6">Formulir Pemesanan</h1>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form id="booking-form" method="POST" action="{{ route('booking.store') }}" class="grid md:grid-cols-2 gap-6">
                @csrf

                <div class="md:col-span-2 grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm mb-1">Tipe Kamar</label>
                        <select id="service_type" name="service_type" class="w-full border rounded p-2">
                            <option value="">Semua Tipe</option>
                            @foreach($services->pluck('type')->unique() as $type)
                                <option value="{{ $type }}" {{ (old('service_type', request('service_type')) == $type) ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Nama Kamar / Unit</label>
                        <select id="service_id" name="service_id" class="w-full border rounded p-2">
                            <option value="">-- Pilih Kamar --</option>
                            @foreach($services as $s)
                                <option value="{{ $s->id }}" data-price="{{ $s->price_per_night }}" data-type="{{ $s->type }}" {{ (old('service_id', request('service_id', session('booking_intent.service_id'))) == $s->id) ? 'selected' : '' }}>
                                    {{ $s->name }} • Rp{{ number_format($s->price_per_night) }} / malam
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm mb-1">Tanggal Check-in</label>
                    <input type="date" id="check_in" name="check_in" class="w-full border rounded p-2" value="{{ old('check_in', request('check_in', session('booking_intent.check_in'))) }}">
                </div>

                <div>
                    <label class="block text-sm mb-1">Tanggal Check-out</label>
                    <input type="date" id="check_out" name="check_out" class="w-full border rounded p-2" value="{{ old('check_out', request('check_out', session('booking_intent.check_out'))) }}">
                </div>

                <!-- Guest count removed from UI, still sent as default -->
                <input type="hidden" id="guest_count" name="guest_count" value="{{ old('guest_count', request('guest_count', session('booking_intent.guest_count', 1))) }}">
                <small id="capacity-warning" class="text-red-600" style="display:none;"></small>

                <div id="price-result" class="md:col-span-2 p-4 border rounded" style="display:none">
                    <p>Malam: <span id="nights">0</span></p>
                    <p>Harga / malam: Rp <span id="price_per_night">0</span></p>
                    <p><strong>Total: Rp <span id="total">0</span></strong></p>
                </div>

                <div class="md:col-span-2">
                    <button id="booking-submit" type="submit" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white  font-semibold py-3 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-green-300">Pesan Sekarang</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let maxCapacity = 0;

// Filter Room Name based on Room Type
$('#service_type').on('change', function(){
    var type = $(this).val();
    $('#service_id option').each(function(){
        var optType = $(this).data('type');
        if(!type || optType == type) {
            $(this).show().prop('disabled', false);
        } else {
            $(this).hide().prop('disabled', true);
        }
    });
    $('#service_id').val('');
    updatePrice();
});

function updatePrice(){
    let service_id = $('#service_id').val();
    let check_in = $('#check_in').val();
    let check_out = $('#check_out').val();
    let guest_count = $('#guest_count').val() || 1;
    
    // Update max capacity from selected service
    let selectedOption = $('#service_id').find('option:selected');
    maxCapacity = selectedOption.data('capacity') || 0;
    
    if(!service_id || !check_in || !check_out) return;
    
    $.post("{{ route('booking.checkPrice') }}", {
        service_id, service_type: $('#service_type').val(), check_in, check_out, guest_count, _token: '{{ csrf_token() }}'
    }, function(res){
        $('#nights').text(res.nights);
        $('#price_per_night').text(new Intl.NumberFormat('id-ID').format(res.price_per_night));
        $('#total').text(new Intl.NumberFormat('id-ID').format(res.total));
        $('#capacity-warning').hide();
        $('#price-result').show();
        $('button[type="submit"]').prop('disabled', false);
    }).fail(function(xhr){
        if(xhr.status === 422) {
            let error = xhr.responseJSON.error;
            $('#capacity-warning').text(error).show();
            $('#price-result').hide();
            $('button[type="submit"]').prop('disabled', true);
        } else {
            console.error(xhr.responseJSON || xhr.responseText);
            $('#price-result').hide();
        }
    });
}

$('#service_id, #check_in, #check_out, #service_type').on('change', updatePrice);

// Trigger on load if fields have values
$(document).ready(function(){ 
    // Trigger price update (prefilled values will be used)
    updatePrice();

    // If dates were passed in query string, focus the room selector so user picks a room first
    if($('#check_in').val() && $('#check_out').val()){
        const serviceEl = document.getElementById('service_id');
        if(serviceEl){
            // scroll into view and focus
            serviceEl.scrollIntoView({behavior:'smooth', block:'center'});
            setTimeout(()=> serviceEl.focus(), 250);
        }
    }

    // Keep price updated when fields change
    $('#service_id, #check_in, #check_out, #service_type').on('change', updatePrice);
});
</script>
@endsection