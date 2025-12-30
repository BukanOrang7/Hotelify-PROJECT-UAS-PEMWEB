@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header dengan Gradasi Biru -->
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
        <h1 class="text-3xl font-bold mb-2">Manajemen Blog</h1>
        <p class="text-blue-100">Kelola artikel dan konten blog Anda di sini</p>
    </div>

    <!-- Card Utama -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Card Header dengan Tombol -->
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Daftar Artikel</h2>
                
                <a href="/admin/blog/create"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium shadow-md hover:shadow-lg transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Tulis Artikel Baru
                </a>
            </div>
        </div>

        <!-- Articles List -->
        <div class="divide-y divide-gray-100">
            @forelse($posts as $p)
            <div class="p-6 hover:bg-blue-50/50 transition-colors duration-200 group">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <!-- Article Info -->
                    <div class="flex-1">
                        <div class="flex items-start gap-4">
                            <!-- Featured Image -->
                            @if($p->featured_image && \Storage::disk('public')->exists($p->featured_image))
                            <div class="hidden sm:block flex-shrink-0">
                                <div class="w-20 h-20 rounded-lg overflow-hidden bg-gradient-to-br from-blue-100 to-indigo-100">
                                    <img src="{{ asset('storage/' . $p->featured_image) }}" 
                                         alt="{{ $p->title }}"
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                            @elseif($p->featured_image)
                            <div class="hidden sm:block flex-shrink-0">
                                <div class="w-20 h-20 rounded-lg overflow-hidden bg-red-50 p-2 flex items-center justify-center text-xs text-red-700">Gambar hilang</div>
                            </div>
                            @endif
                            
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-900 text-lg mb-2 group-hover:text-blue-600 transition-colors">
                                    {{ $p->title }}
                                </h3>
                                
                                <!-- Meta Info -->
                                <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $p->author?->name ?? 'Admin' }}</span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $p->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3">
                        <!-- View Button (admin preview within admin area) -->
                        <a href="/admin/blog/{{ $p->id }}/preview" 
                           class="inline-flex items-center gap-1 px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Lihat
                        </a>
                        
                        <!-- Edit Button -->
                        <a href="/admin/blog/{{ $p->id }}/edit" 
                           class="inline-flex items-center gap-1 px-3 py-2 text-sm text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </a>
                        
                        <!-- Delete Button -->
                        <form method="POST" 
                              action="{{ route('admin.blog.destroy', $p) }}" 
                              class="inline-flex delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" 
                                    class="inline-flex items-center gap-1 px-3 py-2 text-sm text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors delete-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="p-12 text-center">
                <div class="mx-auto w-24 h-24 mb-6 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada artikel</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menulis artikel pertama Anda</p>
                <a href="/admin/blog/create"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:shadow-lg transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Tulis Artikel Pertama
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert for delete confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest('form');
            
            Swal.fire({
                title: 'Hapus Artikel?',
                text: "Artikel akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                backdrop: 'rgba(0,0,0,0.4)'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection