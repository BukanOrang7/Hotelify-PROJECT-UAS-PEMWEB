@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Pengajuan Pembatalan</h1>
                <p class="text-blue-100">Kelola pengajuan pembatalan booking Hotelify</p>
            </div>
            <div class="flex items-center">
                <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                    <span id="totalRequest">{{ $count ?? 0 }}</span> Pengajuan Pending
                </span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Daftar Pengajuan</h2>
            <div id="loadingIndicator" class="text-sm text-blue-600 hidden">
                <i class="fas fa-sync fa-spin mr-1"></i> Memuat data...
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="cancellationTable" class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 text-gray-700">
                            <th class="p-4 text-left font-semibold">Kode Booking</th>
                            <th class="p-4 text-left font-semibold">Nama Pengaju</th>
                            <th class="p-4 text-left font-semibold">Alasan</th>
                            <th class="p-4 text-left font-semibold">Status</th>
                            <th class="p-4 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Setup Token CSRF untuk semua request AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#cancellationTable').DataTable({
            ajax: {
                url: '{{ route("admin.cancellations.data") }}',
                // Tampilkan loading indicator saat refresh otomatis
                beforeSend: function() { $('#loadingIndicator').removeClass('hidden'); },
                complete: function() { $('#loadingIndicator').addClass('hidden'); }
            },
            processing: true,
            serverSide: false, // Client side processing agar cepat (karena data < 10.000)
            pageLength: 10,
            order: [[3, 'asc']], // Default sort by Status (index 3)
            columns: [
                // 1. KODE BOOKING
                { 
                    data: 'booking_code',
                    render: function(data) {
                        return `<div class="font-medium text-gray-900">${data}</div>`;
                    }
                },
                // 2. NAMA PENGAJU
                { 
                    data: 'user_name',
                    render: function(data, type, row) {
                        return `
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold">
                                    ${row.user_initial}
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900">${data}</div>
                                    <div class="text-xs text-gray-500">${row.user_email}</div>
                                </div>
                            </div>
                        `;
                    }
                },
                // 3. ALASAN
                { 
                    data: 'reason_short',
                    render: function(data, type, row) {
                        // Tampilkan tooltip title jika teks dipotong
                        return `<div class="text-gray-700" title="${row.reason}">${data}</div>`;
                    }
                },
                // 4. STATUS
                { 
                    data: 'status',
                    render: function(data, type, row) {
                        let colorClass, icon;
                        
                        if(data === 'approved') {
                            colorClass = 'bg-green-100 text-green-800';
                            icon = '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                        } else if(data === 'rejected') {
                            colorClass = 'bg-red-100 text-red-800';
                            icon = '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                        } else {
                            colorClass = 'bg-yellow-100 text-yellow-800';
                            icon = '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                        }

                        let date = data === 'requested' ? row.created_at_formatted : row.updated_at_formatted;

                        return `
                            <div class="flex flex-col">
                                <span class="inline-flex w-fit items-center gap-1 px-3 py-1 rounded-full text-xs font-medium ${colorClass}">
                                    ${icon}
                                    ${data.charAt(0).toUpperCase() + data.slice(1)}
                                </span>
                                <span class="text-xs text-gray-400 mt-1">${date}</span>
                            </div>
                        `;
                    }
                },
                // 5. AKSI (Tombol AJAX)
                { 
                    data: 'id',
                    orderable: false,
                    render: function(data, type, row) {
                        if (row.status === 'requested') {
                            // Use booking_id to post to admin.bookings.update
                            return `
                                <div class="flex items-center gap-2">
                                    <button onclick="processCancellation(${row.booking_id}, 'cancelled')" 
                                            name="status" value="cancelled"
                                            class="px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded hover:shadow-md transition-all text-xs font-medium">
                                        Terima
                                    </button>
                                    <button onclick="processCancellation(${row.booking_id}, 'active')" 
                                            name="status" value="active"
                                            class="px-3 py-1.5 bg-red-600 text-white rounded hover:bg-red-700 transition-all text-xs font-medium">
                                        Tolak
                                    </button>
                                </div>
                            `;
                        } else {
                            return `<span class="text-xs text-gray-400 italic">Selesai diproses</span>`;
                        }
                    }
                }
            ]
        });

        // Fungsi Global untuk Handle Tombol Aksi (Sekarang gunakan admin.bookings.update)
        window.processCancellation = function(bookingId, status) {
            let text = status === 'cancelled' ? 'Ingin menerima pembatalan ini?' : 'Ingin menolak pengajuan pembatalan ini?';

            confirmAction({ title: 'Apakah anda yakin?', text: text, icon: 'warning', confirmButtonText: 'Ya, Lanjutkan', cancelButtonText: 'Batal' })
            .then((result) => {
                if (!result.isConfirmed) return;

                $.ajax({
                    url: `/admin/bookings/${bookingId}`,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _method: 'PUT',
                        status: status
                    },
                    success: function(response) {
                        table.ajax.reload(null, false); 
                        // Use Toast if available
                        if (window.Toast && response && response.message) {
                            Toast.fire({ icon: 'success', title: response.message });
                        } else if(response && response.message) {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        let msg = 'Terjadi kesalahan saat memproses data.';
                        if(xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                        else if(xhr.status === 419) msg = 'Session expired atau CSRF token tidak valid.';

                        if (window.Toast) {
                            Toast.fire({ icon: 'error', title: msg });
                        } else {
                            alert(msg);
                        }
                    }
                });
            });
        }

        // Auto Refresh Tabel Setiap 15 Detik (Tanpa kedip)
        setInterval(function() {
            // reload(callback, resetPaging) -> false artinya jangan reset paging ke halaman 1
            table.ajax.reload(null, false); 
        }, 15000); 

    });
</script>

<style>
    /* Styling tambahan agar DataTables lebih rapi */
    .dataTables_wrapper .dataTables_length select {
        padding-right: 2rem;
        border-radius: 0.5rem;
        border-color: #e5e7eb;
    }
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 0.5rem;
        border-color: #e5e7eb;
        padding: 0.5rem;
    }
</style>
@endsection