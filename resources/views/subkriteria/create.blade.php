@extends('layouts.app')

@section('title', 'Tambah Sub Kriteria')

@section('content')
<div class="container">
    <h2 class="font-bold text-2xl mb-4">Tambah Sub Kriteria</h2>
    
    <!-- Form Tambah Sub Kriteria -->
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
            <input type="text" id="nilai" name="nilai" class="w-full p-3 border rounded-lg shadow-sm" required>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg">Simpan</button>
            <a href="{{ route('subkriteria.index') }}" class="bg-orange-500 text-white py-2 px-6 rounded-lg">Batal</a>
        </div>
    </form>
</div>
@endsection
