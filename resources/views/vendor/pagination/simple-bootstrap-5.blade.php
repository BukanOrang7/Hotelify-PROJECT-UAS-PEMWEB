@if ($paginator->hasPages())
    <div class="mt-6 text-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="text-gray-400 cursor-not-allowed">&lt;&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="text-blue-600 hover:underline">&lt;&lt;</a>
        @endif

        {{-- Current Page --}}
        <span class="mx-2 font-bold">{{ $paginator->currentPage() }}</span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-blue-600 hover:underline">&gt;&gt;</a>
        @else
            <span class="text-gray-400 cursor-not-allowed">&gt;&gt;</span>
        @endif
    </div>
@endif
