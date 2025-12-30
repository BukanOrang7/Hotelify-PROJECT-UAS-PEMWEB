@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Preview Artikel (Admin)</h1>
            <p class="text-sm text-gray-500">Preview post Anda — tetap berada di area Admin</p>
        </div>
        <div>
            <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-sm">Kembali</a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6">
        @if($post->featured_image && \Storage::disk('public')->exists($post->featured_image))
            <div class="mb-6 rounded overflow-hidden">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
            </div>
        @elseif($post->featured_image)
            <div class="mb-6 rounded overflow-hidden bg-red-50 p-4 text-sm text-red-700">Gambar tidak ditemukan di penyimpanan: <code>{{ $post->featured_image }}</code></div>
        @endif

        <h2 class="text-3xl font-bold mb-2">{{ $post->title }}</h2>
        <div class="text-sm text-gray-500 mb-6">By {{ $post->author?->name ?? 'Admin' }} — {{ $post->published_at->format('d F Y') }}</div>

        @if($post->excerpt)
        <p class="text-gray-700 italic mb-4">{{ $post->excerpt }}</p>
        @endif

        <div class="prose prose-sm max-w-none text-gray-800">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>
</div>
@endsection