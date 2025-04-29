@extends('layouts.app')

@section('title', 'Sub Kriteria')

@section('content')
<div class="container ">
    <!-- Form untuk menambah Sub Kriteria -->
    <h2 class="font-bold text-2xl mb-4">Tambah Sub Kriteria</h2>
    <form action="{{ route('subkriteria.store') }}" method="POST">
        @csrf
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

        <div class="mb-4">
            <label for="sub_kriteria" class="block text-sm font-semibold">Sub Kriteria</label>
            <input type="text" id="sub_kriteria" name="sub_kriteria" class="w-full p-3 border rounded-lg shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="nilai" class="block text-sm font-semibold">Nilai</label>
            <input type="number" id="nilai" name="nilai" class="w-full p-3 border rounded-lg shadow-sm" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg">Simpan Sub Kriteria</button>
        </div>
    </form>

    <hr class="my-6">

    <!-- Tabel Sub Kriteria -->
    <h2 class="font-bold text-2xl mb-4">Data Sub Kriteria</h2>
    <table class="min-w-full mt-6 border-collapse">
        <thead>
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Kriteria</th>
                <th class="border px-4 py-2">Sub Kriteria</th>
                <th class="border px-4 py-2">Nilai</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subKriterias as $subKriteria)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $subKriteria->kriteria->kriteria }}</td>
                    <td class="border px-4 py-2">{{ $subKriteria->sub_kriteria }}</td>
                    <td class="border px-4 py-2">{{ $subKriteria->nilai }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('subkriteria.edit', $subKriteria->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('subkriteria.destroy', $subKriteria->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
