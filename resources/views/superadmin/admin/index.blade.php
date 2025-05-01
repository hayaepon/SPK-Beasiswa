@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4 px-6">
    <div class="flex justify-between items-center mb-4">
        <h4 class="text-xl font-semibold">Manajemen Admin</h4>
        <button id="addAdminBtn" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-green-600">+ Tambah</button>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto" id="adminTable">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Username</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through admin data and display it -->
                @foreach ($admins as $admin)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $admin->nama }}</td>
                        <td class="px-4 py-2">{{ $admin->email }}</td>
                        <td class="px-4 py-2">{{ $admin->username }}</td>
                        <td class="px-4 py-2">{{ $admin->role }}</td>
                        <td class="px-4 py-2">{{ $admin->status }}</td>
                        <td class="px-4 py-2">
                            <a href="#" class="bg-yellow-500 text-white px-2 py-1 rounded-lg shadow-sm hover:bg-yellow-600">Edit</a>
                            <a href="#" class="bg-red-500 text-white px-2 py-1 rounded-lg shadow-sm hover:bg-red-600">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
