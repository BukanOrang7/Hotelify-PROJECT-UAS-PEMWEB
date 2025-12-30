@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Layanan / Kamar</h1>
                <p class="text-gray-600 mt-1">Kelola layanan dan kamar yang tersedia</p>
            </div>
            <a href="/admin/services/create" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium px-5 py-2.5 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                Tambah Layanan
            </a>
        </div>
    </div>



    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-8">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table id="servicesTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama Kamar</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Tipe</th> <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Harga</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Kapasitas</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Status</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200"></tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div id="bookingsContainer" class="grid grid-cols-1 gap-4"></div>
</div>

<script>
$(document).ready(function () {
    window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    
    var table = $('#servicesTable').DataTable({
        ajax: '{{ route('admin.services.data') }}',
        processing: true, // Tambahkan loading indicator
        serverSide: false, // Client side processing untuk data sedikit
        pageLength: 10,
        columns: [
            { 
                data: 'name',
                render: function(data, type, row) {
                    return `<div class="font-medium text-gray-900">${data}</div>`;
                }
            },
            { 
                data: 'type', // Menampilkan Tipe Kamar
                render: function(data) {
                    return `<span class="text-sm text-gray-600">${data}</span>`;
                }
            },
            { 
                data: 'price', 
                className: 'text-center font-semibold'
            },
            { 
                data: 'capacity', 
                className: 'text-center',
                render: function(data) {
                    return `<span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">${data} Org</span>`;
                }
            },
            { 
                data: 'status', 
                className: 'text-center',
                render: function(data) {
                    let color = data === 'Aktif' ? 'text-green-600 bg-green-50' : 'text-red-600 bg-red-50';
                    return `<span class="${color} px-2 py-1 rounded-full text-xs font-medium">${data}</span>`;
                }
            },
            { 
                data: 'id', 
                className: 'text-center',
                orderable: false,
                render: function(data){
                    return `
                        <div class="flex justify-center gap-2">
                            <a href="/admin/services/${data}/edit" class="text-blue-600 hover:text-blue-900 text-sm">Edit</a>
                            <button onclick="deleteService(event, ${data})" class="text-red-600 hover:text-red-900 text-sm ml-2">Hapus</button>
                        </div>
                    `;
                }
            }
        ]
    });

    // Script Delete using SweetAlert2 confirmation and Toast
    window.deleteService = function(e, id){
        // keep original behavior but replace native confirm/alert with SweetAlert2
        e.preventDefault();

        confirmAction({
            title: 'Apakah Anda yakin ingin menghapus tipe kamar ini?',
            text: 'Data yang dihapus tidak bisa dikembalikan.',
            icon: 'warning',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then(result => {
            if(!result.isConfirmed) return;

            fetch('/admin/services/'+id, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                    'X-HTTP-Method-Override': 'DELETE',
                    'Accept': 'application/json'
                }
            }).then(async r => {
                if(r.ok){
                    // reload table and show toast (keep logic intact)
                    table.ajax.reload();

                    // try to read success message from response, else use default
                    let msg = 'Layanan berhasil dihapus';
                    try{ const json = await r.json(); if(json && json.message) msg = json.message; }catch(_){}
                    Toast.fire({ icon: 'success', title: msg });
                } else {
                    let errorMsg = 'Gagal menghapus';
                    try{ const json = await r.json(); if(json && json.message) errorMsg = json.message; }catch(_){}
                    Toast.fire({ icon: 'error', title: errorMsg });
                }
            }).catch(err => {
                Toast.fire({ icon: 'error', title: 'Gagal menghapus' });
            });
        });
    }
});
</script>
@endsection