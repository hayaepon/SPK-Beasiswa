@extends('layouts.app')

@section('title', 'Data Calon Penerima')

@section('content')
<div class="container mx-auto px-4 py-6 h-screen">
    <!-- Form untuk menambah Data Calon Penerima -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-bold mb-4">Form Input Calon Penerima</h2>

        <form action="{{ route('calon-penerima.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="no_pendaftaran" class="text-sm font-medium text-gray-700">No Pendaftaran</label>
                    <input type="text" id="no_pendaftaran" name="no_pendaftaran" class="w-full p-3 border rounded-lg shadow-sm" required />
                </div>
                <div class="flex flex-col">
                    <label for="nama_calon_penerima" class="text-sm font-medium text-gray-700">Nama Calon Penerima</label>
                    <input type="text" id="nama_calon_penerima" name="nama_calon_penerima" class="w-full p-3 border rounded-lg shadow-sm" required />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="asal_sekolah" class="text-sm font-medium text-gray-700">Asal Sekolah</label>
                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="w-full p-3 border rounded-lg shadow-sm" required />
                </div>
                <div class="flex flex-col">
                    <label for="pilihan_beasiswa" class="text-sm font-medium text-gray-700">Pilihan Beasiswa</label>
                    <select id="pilihan_beasiswa" name="pilihan_beasiswa" class="w-full p-3 border rounded-lg shadow-sm" required>
                        <option value="">Pilih Beasiswa</option>
                        <option value="KIP-K">KIP-K</option>
                        <option value="Tahfidz">Tahfidz</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg w-full sm:w-auto">Submit</button>
            </div>
        </form>
    </div>

    <hr class="my-6">

    <!-- Tabel Data Calon Penerima -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Data Calon Penerima</h2>
        <table class="min-w-full mt-6 table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2 text-left">No</th>
                    <th class="border px-4 py-2 text-left">No Pendaftaran</th>
                    <th class="border px-4 py-2 text-left">Nama Calon Penerima</th>
                    <th class="border px-4 py-2 text-left">Asal Sekolah</th>
                    <th class="border px-4 py-2 text-left">Beasiswa</th>
                    <th class="border px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataCalonPenerima as $data)
                    <tr class="bg-white">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $data->no_pendaftaran }}</td>
                        <td class="border px-4 py-2">{{ $data->nama_calon_penerima }}</td>
                        <td class="border px-4 py-2">{{ $data->asal_sekolah }}</td>
                        <td class="border px-4 py-2">{{ $data->pilihan_beasiswa }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('calon-penerima.edit', $data->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                            <form action="{{ route('calon-penerima.destroy', $data->id) }}" method="POST" class="inline">
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
