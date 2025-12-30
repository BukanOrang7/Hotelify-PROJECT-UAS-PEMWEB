@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header dengan Gradasi Biru -->
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Log Aktivitas</h1>
                <p class="text-blue-100">Pantau aktivitas sistem dan pengguna Hotelify</p>
            </div>
            <div class="flex items-center">
                <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                    {{ count($logs) }} Aktivitas
                </span>
            </div>
        </div>
    </div>

    <!-- Card Utama -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Riwayat Aktivitas</h2>
            </div>
        </div>

        <!-- Tabel Log -->
        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="logTable" class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 text-gray-700">
                            <th class="p-4 text-left font-semibold">Pengguna</th>
                            <th class="p-4 text-left font-semibold">Aksi</th>
                            <th class="p-4 text-left font-semibold">Alamat IP</th>
                            <th class="p-4 text-left font-semibold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr class="border-t hover:bg-blue-50/50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr($log->user->name ?? 'S', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $log->user->name ?? 'System' }}</div>
                                        <div class="text-xs text-gray-500">{{ $log->user->email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                            @php
                                $actionColors = [
                                    'login' => 'bg-green-100 text-green-800',
                                    'logout' => 'bg-blue-100 text-blue-800',
                                    'create' => 'bg-purple-100 text-purple-800',
                                    'update' => 'bg-yellow-100 text-yellow-800',
                                    'delete' => 'bg-red-100 text-red-800',
                                    'view' => 'bg-gray-100 text-gray-800',
                                ];
                                
                                $actionIcons = [
                                    'login' => 'M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z',
                                    'logout' => 'M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z',
                                    'create' => 'M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z',
                                    'update' => 'M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z',
                                    'delete' => 'M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z',
                                    'view' => 'M10 12a2 2 0 100-4 2 2 0 000 4z M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z',
                                ];
                                
                                $actionText = strtolower($log->action);
                                $color = 'bg-gray-100 text-gray-800';
                                $icon = 'M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z';
                                
                                foreach ($actionColors as $key => $value) {
                                    if (strpos($actionText, $key) !== false) {
                                        $color = $value;
                                        $icon = $actionIcons[$key] ?? $icon;
                                        break;
                                    }
                                }
                            @endphp
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium {{ $color }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="{{ $icon }}" clip-rule="evenodd" />
                                    </svg>
                                    {{ $log->action }}
                                </span>
                            </div>
                            @if($log->description)
                                <div class="text-xs text-gray-600 mt-1 line-clamp-2">{{ $log->description }}</div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-mono text-gray-700">{{ $log->ip_address }}</div>
                            @if($log->user_agent)
                                <div class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ $log->user_agent }}</div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-medium text-gray-900">{{ $log->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $log->created_at->format('H:i:s') }}</div>
                            <div class="text-xs text-gray-400 mt-1">{{ $log->created_at->diffForHumans() }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        $('#logTable').DataTable({
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            order: [[3, 'desc']], // Urutkan berdasarkan waktu terbaru
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang cocok",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>

<style>
    /* Custom DataTables styling */
    #logTable_wrapper {
        width: 100%;
    }
    
    #logTable_wrapper .dataTables_filter input {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.5rem 1rem !important;
        margin-bottom: 1rem;
    }
    
    #logTable_wrapper .dataTables_length select {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.25rem 2rem 0.25rem 0.5rem !important;
        margin-bottom: 1rem;
    }
    
    #logTable_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #d1d5db !important;
        border-radius: 0.375rem !important;
        padding: 0.375rem 0.75rem !important;
        margin: 0 0.125rem !important;
    }
    
    #logTable_wrapper .dataTables_paginate .paginate_button.current {
        background: linear-gradient(to right, #3b82f6, #6366f1) !important;
        color: white !important;
        border: none !important;
    }
    
    #logTable_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f3f4f6 !important;
        color: #1f2937 !important;
    }
    
    #logTable_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(to right, #2563eb, #4f46e5) !important;
        color: white !important;
    }
    
    #logTable_wrapper .dataTables_info {
        padding-top: 1rem !important;
        color: #6b7280 !important;
    }
    
    /* Line clamp for description */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection