@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-6">Tulis Artikel Baru</h1>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 text-green-800 rounded">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="mb-4 p-4 bg-red-50 text-red-800 rounded">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-sm max-w-2xl">
    @csrf

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Unggulan</label>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition"
             id="drop-zone">
            <input type="file" 
                   name="featured_image" 
                   id="featured_image"
                   accept="image/jpeg,image/jpg,image/png,image/gif"
                   class="hidden">
            <div id="upload-text">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-8l-3.172-3.172a4 4 0 00-5.656 0L28 20M9 20l3.172-3.172a4 4 0 015.656 0L28 20"></path>
                </svg>
                <p class="mt-2 text-sm text-gray-600">Klik atau drag file gambar di sini (Max 2MB)</p>
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF</p>
            </div>
            <img id="preview" class="hidden mx-auto max-h-48 mt-4">
        </div>
        @error('featured_image')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Artikel</label>
        <input name="title" 
               placeholder="Masukkan judul artikel"
               value="{{ old('title') }}"
               class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               required>
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-2">Ringkasan (Opsional)</label>
        <input name="excerpt" 
               placeholder="Ringkasan singkat artikel"
               value="{{ old('excerpt') }}"
               class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        @error('excerpt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Isi Artikel</label>
        <textarea name="body" 
                  rows="10"
                  placeholder="Tulis isi artikel di sini..."
                  class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required>{{ old('body') }}</textarea>
        @error('body')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-medium transition duration-200">
            Simpan Artikel
        </button>
        <a href="{{ route('admin.blog.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded font-medium transition duration-200">
            Batal
        </a>
    </div>
</form>

<script>
const dropZone = document.getElementById('drop-zone');
const fileInput = document.getElementById('featured_image');
const preview = document.getElementById('preview');
const uploadText = document.getElementById('upload-text');

dropZone.addEventListener('click', () => fileInput.click());

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => dropZone.classList.add('border-blue-500', 'bg-blue-50'), false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => dropZone.classList.remove('border-blue-500', 'bg-blue-50'), false);
});

dropZone.addEventListener('drop', (e) => {
    const files = e.dataTransfer.files;
    fileInput.files = files;
    handleFileSelect();
});

fileInput.addEventListener('change', handleFileSelect);

function handleFileSelect() {
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            uploadText.classList.add('hidden');
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
@endsection
