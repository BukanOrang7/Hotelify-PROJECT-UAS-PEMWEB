@extends('layouts.app')

@section('content')
<article class="max-w-4xl mx-auto">
    <!-- Featured Image -->
    @if($post->featured_image && \Storage::disk('public')->exists($post->featured_image))
        <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                 alt="{{ $post->title }}"
                 class="w-full h-96 object-cover"
                 loading="lazy">
        </div>
    @elseif($post->featured_image)
        <div class="mb-8 rounded-xl overflow-hidden shadow-sm bg-red-50 p-6 text-red-700">
            Gambar tidak tersedia: <code>{{ $post->featured_image }}</code>
        </div>
    @endif

    <!-- Article Header -->
    <div class="bg-white rounded-xl shadow-sm p-8 mb-6">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
        
        <div class="flex items-center gap-4 text-gray-600 border-b pb-6">
            <div class="flex items-center gap-3">
                @if($post->author->profile_photo)
                    <img src="{{ asset('storage/' . $post->author->profile_photo) }}" 
                         alt="{{ $post->author->name }}"
                         class="w-10 h-10 rounded-full object-cover">
                @else
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <span class="text-sm font-bold text-blue-600">{{ strtoupper(substr($post->author->name, 0, 1)) }}</span>
                    </div>
                @endif
                <div>
                    <p class="font-medium text-gray-800">{{ $post->author->name }}</p>
                    <p class="text-sm">{{ $post->published_at->format('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Excerpt -->
        @if($post->excerpt)
            <p class="text-lg text-gray-700 italic mt-6 mb-6 border-l-4 border-blue-500 pl-4">
                {{ $post->excerpt }}
            </p>
        @endif
    </div>

    <!-- Article Body -->
    <div class="bg-white rounded-xl shadow-sm p-8 prose prose-sm max-w-none">
        <div class="text-gray-800 leading-relaxed space-y-4">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-8 mb-6">
        <a href="/blog" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Blog
        </a>
    </div>
</article>
@endsection
