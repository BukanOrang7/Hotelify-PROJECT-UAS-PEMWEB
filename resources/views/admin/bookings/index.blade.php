@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
        <h1 class="text-3xl font-bold mb-2">Data Reservasi</h1>
        <p class="text-blue-100">Kelola semua reservasi sistem Hotelify</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <h2 class="text-xl font-semibold text-gray-800">Daftar Reservasi</h2>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="bookingsTable" class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 text-gray-700">
                            <th class="p-4 text-left font-semibold">Kode Booking</th>
                            <th class="p-4 text-left font-semibold">Nama Tamu</th>
                            <th class="p-4 text-left font-semibold">Check-in</th>
                            <th class="p-4 text-left font-semibold">Layanan</th>
                            <th class="p-4 text-left font-semibold">Status</th>
                            <th class="p-4 text-left font-semibold">Pembayaran</th>
                            <th class="p-4 text-left font-semibold">Total</th>
                            <th class="p-4 text-left font-semibold">Invoice</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var table = $('#bookingsTable').DataTable({
                    ajax: {
                        url: '{{ route('admin.bookings.data') }}',
                        dataSrc: 'data',
                        error: function(xhr, status, error) {
                            console.error('Failed to load bookings data:', status, error, xhr.responseText);
                            // Show single-row error message
                            $('#bookingsTable tbody').html('<tr><td colspan="8" class="text-red-500 p-4">Gagal memuat data reservasi. Coba refresh halaman atau periksa log server.</td></tr>');
                        }
                    },
                    processing: true,
                    serverSide: false,
                    pageLength: 10,
                    order: [[2, 'asc']], // check-in ascending
                    columns: [
                        { data: 'booking_code', render: function(data,row){
                            return `<div class="font-mono font-bold text-blue-600">${data}</div>`;
                        }},
                        { data: 'name', render: function(data,row){
                            return `<div class="font-medium text-gray-900">${data}</div>`;
                        }},
                        { data: 'check_in', render: function(data,row){
                            return `<div class="font-medium">${data}</div>`;
                        }},
                        { data: 'service', render: function(data,row){
                            return `<div class="font-medium">${data}</div>`;
                        }},
                        { data: 'status', render: function(data,row){
                            var colorClass = 'bg-gray-100 text-gray-800';
                            var icon = '<span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>';
                            if(data === 'booked') { colorClass = 'bg-yellow-100 text-yellow-800'; icon = '<span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>'; }
                            if(data === 'checked_in') { colorClass = 'bg-blue-100 text-blue-800'; icon = '<span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>'; }
                            if(data === 'completed') { colorClass = 'bg-green-100 text-green-800'; icon = '<span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>'; }
                            if(data === 'cancelled') { colorClass = 'bg-red-100 text-red-800'; icon = '<span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>'; }
                            if(data === 'pending') { colorClass = 'bg-orange-100 text-orange-800'; icon = '<span class="w-1.5 h-1.5 bg-orange-500 rounded-full animate-pulse"></span>'; }

                            return `<div class="flex flex-col"><span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium ${colorClass}">${icon} ${data.charAt(0).toUpperCase() + data.slice(1)}</span></div>`;
                        }},
                        
                        // --- BAGIAN INI YANG SUDAH DIPERBAIKI ---
                        { 
                            data: 'payment', 
                            render: function(data, row) {
                                // Normalisasi data biar aman (ubah ke huruf kecil semua)
                                let payStatus = (data || '').toLowerCase();
                                let bookStatus = (row.status || '').toLowerCase();

                                // 1. Jika Cancelled -> Tampilkan Strip
                                if (bookStatus === 'cancelled') {
                                    return '<span class="text-xs text-gray-500">-</span>';
                                }

                                // 2. LOGIKA SAKTI: Jika Payment 'paid' ATAU Status Booking 'completed' -> HIJAU (LUNAS)
                                if (payStatus === 'paid' || bookStatus === 'completed') {
                                    return `
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg> 
                                            Lunas
                                        </span>`;
                                }

                                // 3. Sisanya -> MERAH (BELUM DIBAYAR)
                                return `
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg> 
                                        Belum dibayar
                                    </span>`;
                            }
                        },
                        // -----------------------------------------

                        { data: 'total_price', render: function(data,row){
                            if(row.status === 'cancelled' || data === '-'){
                                return `<div class="font-bold text-gray-900">-</div>`;
                            }
                            return `<div class="font-bold text-gray-900">${data}</div>`;
                        }},
                        { data: 'id', orderable: false, render: function(data,row){
                            return `<div class="flex items-center gap-2">
                                        <a href="/booking/${data}/invoice/view" target="_blank" class="text-green-600 hover:text-green-800 hover:underline font-medium text-sm">Invoice</a>
                                    </div>`;
                        }}
                    ],
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

                // Auto-refresh table every 10s
                setInterval(function(){
                    table.ajax.reload(null, false);
                }, 10000);
            });
        </script>
    </div>
</div>

<style>
    /* Custom DataTables styling */
    #bookingsTable_wrapper {
        width: 100%;
    }
    
    #bookingsTable_wrapper .dataTables_filter input {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.5rem 1rem !important;
        margin-bottom: 1rem;
    }
    
    #bookingsTable_wrapper .dataTables_length select {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.25rem 2rem 0.25rem 0.5rem !important;
        margin-bottom: 1rem;
    }
    
    #bookingsTable_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #d1d5db !important;
        border-radius: 0.375rem !important;
        padding: 0.375rem 0.75rem !important;
        margin: 0 0.125rem !important;
    }
    
    #bookingsTable_wrapper .dataTables_paginate .paginate_button.current {
        background: linear-gradient(to right, #3b82f6, #6366f1) !important;
        color: white !important;
        border: none !important;
    }
    
    #bookingsTable_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f3f4f6 !important;
        color: #1f2937 !important;
    }
    
    #bookingsTable_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(to right, #2563eb, #4f46e5) !important;
        color: white !important;
    }
    
    #bookingsTable_wrapper .dataTables_info {
        padding-top: 1rem !important;
        color: #6b7280 !important;
    }
</style>
@endsection