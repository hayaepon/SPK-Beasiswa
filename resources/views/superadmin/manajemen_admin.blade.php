@extends('layouts.app')

@section('title', 'Manajemen Admin')

@section('content')
<div class="container mx-auto py-4 px-6 h-screen">
    <!-- Pesan Sukses jika ada -->
    @if(session('success'))
    <div id="successMessage" class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            // Menyembunyikan pesan sukses setelah 3 detik
            document.getElementById('successMessage').style.display = 'none';
        }, 2000); // 2detik
    </script>
@endif


    <div class="flex justify-between items-center mb-4">
        <h4 class="text-2xl font-semibold">Daftar Data Admin</h4>
        <a href="{{ route('admin.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-green-600">+ Tambah</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto" id="adminTable">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="border px-4 py-2 text-left font-normal">No</th>
                    <th class="border px-4 py-2 text-left font-normal">Nama</th>
                    <th class="border px-4 py-2 text-left font-normal">Email</th>
                    <th class="border px-4 py-2 text-left font-normal">Username</th>
                    <th class="border px-4 py-2 text-left font-normal">Role</th>
                    <th class="border px-4 py-2 text-left font-normal">Status</th>
                    <th class="border px-4 py-2 text-left font-normal">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $index => $admin)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $admin->nama }}</td>
                        <td class="border px-4 py-2">{{ $admin->email }}</td>
                        <td class="border px-4 py-2">{{ $admin->username }}</td>
                        <td class="border px-4 py-2">{{ $admin->role }}</td>
                        <td class="border px-4 py-2">{{ $admin->status }}</td>
                        <td class="border px-4 py-2">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.edit', $admin->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            |
                            <!-- Delete Button -->
                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
