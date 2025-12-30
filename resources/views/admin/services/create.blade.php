@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Tambah Layanan Baru</h1>
    <p class="text-gray-600 mt-1">Tambahkan kamar atau layanan akomodasi baru</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6 md:p-8 max-w-2xl">
    <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kamar / Nomor *</label>
            <input name="name" 
                   type="text"
                   required
                   class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition"
                   placeholder="Contoh: Kamar Melati 101">
            @error('name')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Kamar (Jenis) *</label>
            <select name="type" required
                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition">
                <option value="" disabled selected>Pilih Tipe Kamar</option>
                <option value="Standard Room">Standard Room</option>
                <option value="Deluxe Room">Deluxe Room</option>
                <option value="Twin Bed Room">Twin Bed Room</option>
                <option value="Family Suite">Family Suite</option>
                <option value="Executive Suite">Executive Suite</option>
            </select>
            @error('type')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Per Malam (Rp) *</label>
                <input name="price_per_night" 
                       type="number"
                       required
                       min="0"
                       class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition"
                       placeholder="0">
                @error('price_per_night')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kapasitas (Orang) *</label>
                <input name="capacity" 
                       type="number"
                       required
                       min="1"
                       class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition"
                       placeholder="0">
                @error('capacity')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" 
                      rows="3"
                      class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition"
                      placeholder="Deskripsi layanan / kamar (opsional)"></textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Status Ketersediaan</label>
            <select name="is_available"
                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition">
                <option value="1">Aktif (Tersedia)</option>
                <option value="0">Nonaktif (Tidak Tersedia)</option>
            </select>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">
                Simpan Layanan
            </button>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection