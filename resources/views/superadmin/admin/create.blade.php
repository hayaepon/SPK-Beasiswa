@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
<div class="container mx-auto py-4 px-6">
    <h4 class="text-2xl font-semibold mb-4">Input Data User</h4>

    <!-- Form untuk tambah admin -->
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-black-700 text-[16px]">Nama:</label>
                <input type="text" id="nama" name="nama" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-black-700 text-[16px]">Email:</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-black-700 text-[16px]">Username:</label>
                <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-black-700 text-[16px]">Password:</label>
                <input type="text" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-black-700 text-[16px]">Role:</label>
                <select id="role" name="role" class="w-full p-2 border border-gray-300 rounded-lg">
                    <option value="SuperAdmin">SuperAdmin</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

        </div>

        <div class="flex space-x-4 justify-start">
            <!-- Tombol Simpan -->
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Simpan</button>
            <!-- Tombol Batal -->
            <a href="{{ route('admin.index') }}" class="bg-yellow-400 text-white px-6 py-2 rounded-lg text-center">Batal</a>
            
        </div>
    </form>
</div>
@endsection
