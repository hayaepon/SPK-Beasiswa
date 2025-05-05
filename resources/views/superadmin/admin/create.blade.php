@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
<div class="container mx-auto py-4 px-6">
    <h4 class="text-2xl font-semibold mb-4">Input Data Admin</h4>

    <!-- Menampilkan Pesan Error jika ada -->
    @if($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded-lg mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk tambah admin -->
    <form action="{{ route('admin.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" class="w-full p-2 border border-gray-300 rounded-lg @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}" autocomplete="off" required>
                @error('username')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-lg @error('password') border-red-500 @enderror" autocomplete="new-password" required>
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role:</label>
                <select id="role" name="role" class="w-full p-2 border border-gray-300 rounded-lg @error('role') border-red-500 @enderror">
                    <option value="SuperAdmin" {{ old('role') == 'SuperAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-lg @error('status') border-red-500 @enderror">
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Non-Aktif" {{ old('status') == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                </select>
                @error('status')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
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
