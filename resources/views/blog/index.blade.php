@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-5xl font-bold text-gray-900 mb-4">
            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Blog & Informasi
            </span>
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Temukan artikel, tips, dan inspirasi terbaru untuk pengalaman menginap terbaik Anda
        </p>
    </div>

    <!-- Featured Post (first post with image if present) -->
    @if($posts->count() > 0)
        @php $featured = $posts->first(); @endphp
        <div class="mb-12">
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 hover:border-blue-100 transition-all duration-300">
                <div class="md:flex md:items-stretch">
                    <div class="md:w-1/2 h-80 md:h-auto overflow-hidden">
                        @if($featured->featured_image)
                            <img src="{{ asset('storage/' . $featured->featured_image) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4.5-9 3 6 2.5-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 md:w-1/2">
                        <div class="text-sm text-gray-500 mb-2">{{ $featured->published_at->format('d M Y') }}</div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $featured->title }}</h2>
                        @if($featured->excerpt)
                            <p class="text-gray-700 mb-4">{{ Str::limit($featured->excerpt, 180) }}</p>
                        @endif
                        <a href="/blog/{{ $featured->slug }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    @endif

    <!-- Blog Posts Grid -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Artikel Terbaru</h2>
            <div class="flex items-center gap-4">
                <span class="text-gray-500 text-sm">{{ $posts->count() }} Artikel Tersedia</span>
            </div>
        </div>

        @if($posts->count() > 1)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts->skip(1) as $post)
            <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-blue-100">
                <!-- Post Image -->
                <div class="relative overflow-hidden h-56">
                    @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" 
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4.5-9 3 6 2.5-4 3 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    @endif
                    
                    <!-- Date Badge -->
                    <div class="absolute top-4 left-4">
                        <div class="bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-sm">
                            <div class="text-sm font-bold text-blue-600">{{ $post->published_at->format('d') }}</div>
                            <div class="text-xs text-gray-500">{{ $post->published_at->format('M') }}</div>
                        </div>
                    </div>
                    
                    <!-- Category/Tag -->
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                            Travel
                        </span>
                    </div>
                </div>

                <!-- Post Content -->
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-gray-500">{{ $post->published_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        <a href="/blog/{{ $post->slug }}">
                            {{ Str::limit($post->title, 60) }}
                        </a>
                    </h3>

                    @if($post->excerpt)
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $post->excerpt }}
                    </p>
                    @endif

                    <!-- Author & Read More -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr('Admin', 0, 1)) }}
                            </div>
                            <span class="text-sm text-gray-600">Admin</span>
                        </div>
                        
                        <a href="/blog/{{ $post->slug }}" 
                           class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </div>

    <!-- Empty State -->
    @if($posts->isEmpty())
    <div class="text-center py-20">
        <div class="max-w-md mx-auto">
            <div class="mb-8">
                <svg class="w-24 h-24 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum ada artikel</h3>
            <p class="text-gray-600 mb-8">
                Artikel menarik akan segera hadir. Pantau terus untuk informasi terbaru!
            </p>
        </div>
    </div>
    @endif

<style>
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    /* Custom scrollbar for webkit browsers */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #3b82f6, #6366f1);
        border-radius: 4px;
    }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Image hover effects */
    .group img {
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endsection