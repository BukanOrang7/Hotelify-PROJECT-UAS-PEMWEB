@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Pengguna</h1>

<form action="/admin/users" method="POST" class="space-y-4 bg-white p-4 rounded-xl shadow-sm">
    @csrf
    <div>
        <label class="block text-sm font-medium">Nama</label>
        <input name="name" class="w-full border rounded p-2" value="{{ old('name') }}" required>
    </div>
    <div>
        <label class="block text-sm font-medium">Email</label>
        <input name="email" class="w-full border rounded p-2" value="{{ old('email') }}" type="email" required>
    </div>
    <div>
        <label class="block text-sm font-medium">Password</label>
        <input name="password" class="w-full border rounded p-2" type="password" required>
    </div>
    <div>
        <label class="block text-sm font-medium">Role</label>
        <select name="role" class="w-full border rounded p-2" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium">Telepon</label>
        <input name="phone" class="w-full border rounded p-2" value="{{ old('phone') }}">
    </div>

    <div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Simpan</button>
        <a href="/admin/users" class="ml-2 text-gray-600">Batal</a>
    </div>
</form>
@endsection
