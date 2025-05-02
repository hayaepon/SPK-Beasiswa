@extends('layouts.app')

@section('title', 'Sub Kriteria')

@section('content')
<div class="container mx-auto px-4 py-6 h-screen">
    <!-- Form untuk menambah Sub Kriteria -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="font-bold text-2xl mb-4">Tambah Sub Kriteria</h2>
        <form action="{{ route('subkriteria.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="beasiswa" class="block text-sm font-semibold">Beasiswa</label>
                    <select id="beasiswa" name="beasiswa" class="w-full p-3 border rounded-lg shadow-sm">
                        <option value="KIP-K">KIP-K</option>
                        <option value="Tahfiz">Tahfiz</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kriteria" class="block text-sm font-semibold">Kriteria</label>
                    <input type="text" id="kriteria" name="kriteria" class="w-full p-3 border rounded-lg shadow-sm" required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="sub_kriteria" class="block text-sm font-semibold">Sub Kriteria</label>
                    <input type="text" id="sub_kriteria" name="sub_kriteria" class="w-full p-3 border rounded-lg shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="nilai" class="block text-sm font-semibold">Nilai</label>
                    <input type="number" id="nilai" name="nilai" class="w-full p-3 border rounded-lg shadow-sm" required>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg w-full sm:w-auto">Simpan Sub Kriteria</button>
            </div>
        </form>
    </div>

    <hr class="my-6">

    <!-- Tabel Sub Kriteria -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="font-bold text-2xl mb-4">Data Sub Kriteria</h2>
        <table class="min-w-full mt-6 border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-left">No</th>
                    <th class="border px-4 py-2 text-left">Kriteria</th>
                    <th class="border px-4 py-2 text-left">Sub Kriteria</th>
                    <th class="border px-4 py-2 text-left">Nilai</th>
                    <th class="border px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subKriterias as $subKriteria)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $subKriteria->kriteria->kriteria }}</td>
                        <td class="border px-4 py-2">{{ $subKriteria->sub_kriteria }}</td>
                        <td class="border px-4 py-2">{{ $subKriteria->nilai }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('subkriteria.edit', $subKriteria->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            |
                            <form action="{{ route('subkriteria.destroy', $subKriteria->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
