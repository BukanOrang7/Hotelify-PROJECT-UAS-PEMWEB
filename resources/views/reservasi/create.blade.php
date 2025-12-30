@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-4 md:p-8">

    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Pesan Kamar</h1>
    <p class="text-gray-600 mb-8">Isi formulir di bawah untuk melakukan pemesanan kamar</p>

    <form id="booking-form" method="POST" action="{{ route('booking.store') }}" class="grid md:grid-cols-2 gap-6">
        @csrf

        <div class="md:col-span-2 grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Kamar *</label>
                <select id="service_type" name="service_type" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition">
                    <option value="">Semua Tipe</option>
                    @foreach($services->pluck('type')->unique() as $type)
                        <option value="{{ $type }}">{{ \Illuminate\Support\Str::title($type) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kamar / Unit *</label>
                <select id="service_id" name="service_id" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach($services as $s)
                        <option value="{{ $s->id }}" data-price="{{ $s->price_per_night }}" data-type="{{ $s->type }}">
                            {{ $s->name }} • Rp{{ number_format($s->price_per_night) }} / malam
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Check-in *</label>
            <input type="date" id="check_in" name="check_in" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Check-out *</label>
            <input type="date" id="check_out" name="check_out" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition" required>
        </div>

        <!-- Jumlah tamu dihilangkan dari UI, dikirim sebagai nilai default 1 -->
        <input type="hidden" id="guest_count" name="guest_count" value="1">

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">&nbsp;</label>
            <button type="button" id="check-price" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 rounded-lg font-semibold transition duration-300">Hitung Total Harga</button>
        </div>

        <div id="price-result" class="md:col-span-2 bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-lg p-6" style="display:none">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Jumlah Malam</p>
                    <p class="text-xl font-bold text-gray-800"><span id="nights">0</span> malam</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Harga / Malam</p>
                    <p class="text-lg font-semibold text-blue-600">Rp<span id="price_per_night">0</span></p>
                </div>
                <div class="col-span-2 md:col-span-2">
                    <p class="text-sm text-gray-600">TOTAL HARGA</p>
                    <p class="text-2xl md:text-3xl font-bold text-blue-700">Rp<span id="total">0</span></p>
                </div>
            </div>
        </div>

        <div class="md:col-span-2 bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Tamu</h3>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                <input type="text" name="name" required class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition" placeholder="Nama lengkap Anda">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                <input type="email" name="email" required class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition" placeholder="email@example.com">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                <input type="tel" name="phone" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition" placeholder="+62 812345678">
            </div>
        </div>

        <div class="md:col-span-2">
            <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white py-4 rounded-lg font-bold text-lg transition duration-300">Lanjutkan ke Pembayaran</button>
        </div>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Filter Nama Kamar berdasarkan Tipe Kamar
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
});

$('#check-price').on('click', function(){
    let service = $('#service_id').val();
    let checkIn = $('#check_in').val();
    let checkOut = $('#check_out').val();
    
    if (!service || !checkIn || !checkOut) {
        alert('Pilih kamar dan tanggal check-in/check-out');
        return;
    }
    
    let data = {
        service_id: service,
        service_type: $('#service_type').val(),
        check_in: checkIn,
        check_out: checkOut,
        guest_count: $('#guest_count').val() || 1,
        _token: '{{ csrf_token() }}'
    };
    $.post("{{ route('booking.checkPrice') }}", data, function(res){
        $('#nights').text(res.nights);
        $('#price_per_night').text(new Intl.NumberFormat('id-ID').format(res.price_per_night));
        $('#total').text(new Intl.NumberFormat('id-ID').format(res.total));
        $('#price-result').show();
    }).fail(function(xhr){
        alert('Periksa input: '+(xhr.responseJSON.message || 'Error'));
    });
});
</script> 
@endsection
