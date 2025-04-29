@extends('layouts.app')

@section('title', 'Kriteria & Bobot')

@section('content')
<!-- Tambah Kriteria -->
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-bold mb-4">Tambah Kriteria & Bobot</h2>

    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf

        <!-- Beasiswa -->
        <div class="mb-4">
            <label for="beasiswa" class="block text-gray-700 font-semibold">Beasiswa</label>
            <select id="beasiswa" name="beasiswa" class="w-full p-3 border rounded-lg shadow-sm">
                <option value="KIP-K">KIP-K</option>
                <option value="Tahfiz">Tahfiz</option>
            </select>
        </div>

        <!-- Kriteria -->
        <div class="mb-4">
            <label for="kriteria" class="block text-gray-700 font-semibold">Kriteria</label>
            <input type="text" id="kriteria" name="kriteria" class="w-full p-3 border rounded-lg shadow-sm" required>
        </div>

        <!-- Bobot -->
        <div class="mb-4">
            <label for="bobot" class="block text-gray-700 font-semibold">Bobot Kriteria (%)</label>
            <input type="number" id="bobot" name="bobot" class="w-full p-3 border rounded-lg shadow-sm" required>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md">Simpan</button>
            <a href="{{ route('kriteria.index') }}" class="bg-gray-600 text-white py-2 px-6 rounded-lg shadow-md">Batal</a>
        </div>
    </form>
</div>

<!-- Data Kriteria & Bobot -->
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h3 class="text-xl font-bold mb-4">Data Kriteria & Bobot</h3>

    <table class="min-w-full table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-4 text-left">Id Kriteria</th>
                <th class="px-6 py-4 text-left">Kriteria</th>
                <th class="px-6 py-4 text-left">Bobot</th>
                <th class="px-6 py-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kriterias as $kriteria)
            <tr class="border-b">
                <td class="px-6 py-4">{{ $kriteria->id }}</td>
                <td class="px-6 py-4">{{ $kriteria->kriteria }}</td>
                <td class="px-6 py-4">{{ $kriteria->bobot }}%</td>
                <td class="px-6 py-4">
                    <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="text-blue-600">Edit</a> |
                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
