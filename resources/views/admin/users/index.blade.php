@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header dengan Gradasi Biru -->
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
        <h1 class="text-3xl font-bold mb-2">Manajemen Pengguna</h1>
        <p class="text-blue-100">Kelola data pengguna sistem Hotelify</p>
    </div>

    <!-- Card Utama -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <!-- Card Header dengan Tombol -->
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Daftar Pengguna</h2>
                
                <a href="/admin/users/create"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium shadow-md hover:shadow-lg transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Pengguna
                </a>
            </div>
        </div>

        <!-- Tabel Pengguna -->
        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="usersTable" class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 text-gray-700">
                            <th class="p-4 text-left font-semibold">Nama</th>
                            <th class="p-4 text-left font-semibold">Email</th>
                            <th class="p-4 text-left font-semibold">Role</th>
                            <th class="p-4 text-left font-semibold">Telepon</th>
                            <th class="p-4 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-t hover:bg-blue-50/50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    @if($user->profile_photo)
                                        <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                                             alt="{{ $user->name }}"
                                             class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div class="font-medium text-gray-900">{{ $user->name }}</div>
                                </div>
                            </td>
                            <td class="p-4 text-gray-700">{{ $user->email }}</td>
                            <td class="p-4">
                                @php
                                    $roleColors = [
                                        'admin' => 'bg-purple-100 text-purple-800',
                                        'user' => 'bg-blue-100 text-blue-800',
                                        'staff' => 'bg-green-100 text-green-800',
                                        'superadmin' => 'bg-red-100 text-red-800'
                                    ];
                                    $color = $roleColors[$user->role] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium {{ $color }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-700">{{ $user->phone ?? '-' }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <!-- Edit Button -->
                                    <a href="/admin/users/{{ $user->id }}/edit" 
                                       class="text-blue-600 hover:text-blue-800 hover:underline font-medium">
                                        Edit
                                    </a>
                                    <span class="text-gray-300">|</span>
                                    <!-- Delete Button -->
                                    <button type="button" 
                                            onclick="confirmDelete('{{ $user->id }}', '{{ addslashes($user->name) }}')"
                                            class="text-red-600 hover:text-red-800 hover:underline font-medium">
                                        Hapus
                                    </button>
                                    
                                    <!-- Hidden Delete Form -->
                                    <form id="delete-form-{{ $user->id }}" 
                                          action="/admin/users/{{ $user->id }}" 
                                          method="POST" 
                                          class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- DataTables is loaded globally from the admin layout to avoid duplicate inclusion -->

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            order: [[0, 'asc']],
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

    // SweetAlert for delete confirmation
    function confirmDelete(userId, userName) {
        Swal.fire({
            title: 'Hapus Pengguna?',
            html: `Anda akan menghapus pengguna <strong>${userName}</strong>. Tindakan ini tidak dapat dibatalkan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            backdrop: 'rgba(0,0,0,0.4)'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the delete form
                document.getElementById(`delete-form-${userId}`).submit();
            }
        });
    }
</script>

<style>
    /* Custom DataTables styling */
    #usersTable_wrapper {
        width: 100%;
    }
    
    #usersTable_wrapper .dataTables_filter input {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.5rem 1rem !important;
        margin-bottom: 1rem;
    }
    
    #usersTable_wrapper .dataTables_length select {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.25rem 2rem 0.25rem 0.5rem !important;
        margin-bottom: 1rem;
    }
    
    #usersTable_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #d1d5db !important;
        border-radius: 0.375rem !important;
        padding: 0.375rem 0.75rem !important;
        margin: 0 0.125rem !important;
    }
    
    #usersTable_wrapper .dataTables_paginate .paginate_button.current {
        background: linear-gradient(to right, #3b82f6, #6366f1) !important;
        color: white !important;
        border: none !important;
    }
    
    #usersTable_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f3f4f6 !important;
        color: #1f2937 !important;
    }
    
    #usersTable_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(to right, #2563eb, #4f46e5) !important;
        color: white !important;
    }
    
    #usersTable_wrapper .dataTables_info {
        padding-top: 1rem !important;
        color: #6b7280 !important;
    }
</style>
@endsection