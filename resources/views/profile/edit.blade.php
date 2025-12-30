@extends('layouts.app')

@section('content')

<div class="min-h-[70vh] flex items-center justify-center bg-gradient-to-br from-gray-50 to-white p-6">
    <div class="w-full max-w-3xl">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Profil</h1>
            <p class="text-gray-600">Perbarui data akun Anda dan tambahkan foto profil</p>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-50 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-50 text-red-800 rounded">{{ session('error') }}</div>
        @endif

        <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">
            <div class="p-6">
                <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center gap-6">
                        <div class="flex-shrink-0">
                            @if(auth()->user()->profile_photo)
                                <img id="profile-preview" src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}" class="w-24 h-24 rounded-full object-cover border-2 border-gray-200">
                            @else
                                <div id="profile-preview" class="w-24 h-24 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center border-2 border-gray-200">
                                    <span class="text-3xl font-bold text-blue-600">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700" />
                            <p class="mt-2 text-xs text-gray-500">JPG, PNG, GIF. Maks 2MB.</p>
                            @error('profile_photo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-xs text-gray-500">(tidak dapat diubah)</span></label>
                            <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-700" />
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                            @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="flex gap-3 justify-end">
                        <a href="{{ route('profil') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg">Batal</a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('profile_photo').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(!file) return;
    const reader = new FileReader();
    reader.onload = function(ev){
        const preview = document.getElementById('profile-preview');
        if(preview.tagName === 'DIV'){
            const img = document.createElement('img');
            img.id = 'profile-preview';
            img.src = ev.target.result;
            img.alt = 'Profile Preview';
            img.className = 'w-24 h-24 rounded-full object-cover border-2 border-gray-200';
            preview.replaceWith(img);
        } else {
            preview.src = ev.target.result;
        }
    };
    reader.readAsDataURL(file);
});
</script>

@endsection
