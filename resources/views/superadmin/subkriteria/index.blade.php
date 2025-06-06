@extends('layouts.app')

@section('title', 'Sub Kriteria')

@section('content')
<div class="container mx-auto px-4 py-6 h-screen">
    <!-- Form untuk menambah Sub Kriteria -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="font-semibold text-2xl mb-4 text-[22px]">Tambah Sub Kriteria</h2>
        <form action="{{ route('subkriteria.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="beasiswa" class="block text-sm text-black-700 text-[16px] font-medium">Beasiswa</label>
                    <select id="beasiswa" name="beasiswa" class="w-full p-3 border rounded-lg shadow-sm">
                        <option value="KIP-K">KIP-K</option>
                        <option value="Tahfiz">Tahfiz</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kriteria" class="block text-sm font-medium text-black-700 text-[16px]">Kriteria</label>
                    <input type="text" id="kriteria" name="kriteria" class="w-full p-3 border rounded-lg shadow-sm" required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="sub_kriteria" class="block text-sm font-medium text-black-700 text-[16px]">Sub Kriteria</label>
                    <input type="text" id="sub_kriteria" name="sub_kriteria" class="w-full p-3 border rounded-lg shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="nilai" class="block text-sm font-medium text-black-700 text-[16px]">Nilai</label>
                    <input type="number" id="nilai" name="nilai" class="w-full p-3 border rounded-lg shadow-sm" required>
                </div>
            </div>

            <div class="flex space-x-4 justify-start">
                <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg">Simpan</button>
                <a href="{{ route('subkriteria.index') }}" class="bg-yellow-400 text-white py-2 px-8 rounded-lg">Batal</a>
            </div>
        </form>
    </div>

    <hr class="my-6">

    <!-- Tabel Sub Kriteria -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="font-semibold text-2xl mb-4">Data Sub Kriteria</h2>
        <hr class="border-t-2 border-gray-300 mb-4 w-full">
        <table class="min-w-full mt-6 border-collapse">
            <thead>
                <tr class="bg-blue-800 text-white font-medium">
                    <th class="border px-4 py-2 text-left font-normal">No</th>
                    <th class="border px-4 py-2 text-left font-normal">Kriteria</th>
                    <th class="border px-4 py-2 text-left font-normal">Sub Kriteria</th>
                    <th class="border px-4 py-2 text-left font-normal">Nilai</th>
                    <th class="border px-4 py-2 text-left font-normal">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subKriterias as $subKriteria)
                    <tr class="border-b">
                        <td class="px-6 py-4 font-normal">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-normal">{{ $subKriteria->kriteria->kriteria }}</td>
                        <td class="px-6 py-4 font-normal">{{ $subKriteria->sub_kriteria }}</td>
                        <td class="px-6 py-4 font-normal">{{ $subKriteria->nilai }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('subkriteria.edit', $subKriteria->id) }}" class="text-yellow-500 hover:underline">
                            <i class="fas fa-edit text-yellow-300"></i>
                            </a>
                            <form action="{{ route('subkriteria.destroy', $subKriteria->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">
                                <i class="fas fa-trash"></i>
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
