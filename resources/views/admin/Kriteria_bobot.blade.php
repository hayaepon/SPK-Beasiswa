@extends('layouts.admin')

@section('title', 'Kriteria & Bobot')

@section('content')
 <!-- Data Kriteria & Bobot -->
 <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h3 class="text-xl font-semibold mb-4">Data Kriteria & Bobot</h3>
        <hr class="border-t-2 border-gray-300 mb-4 w-full">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-blue-800 text-white font-medium">
                    <th class="border px-4 py-2 text-left font-normal">Id Kriteria</th>
                    <th class="border px-4 py-2 text-left font-normal">Kriteria</th>
                    <th class="border px-4 py-2 text-left font-normal">Bobot</th>
                    <th class="border px-4 py-2 text-left font-normal">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriterias as $kriteria)
                    <tr class="bg-white">
                        <td class="border px-4 py-2">{{ $kriteria->id }}</td>
                        <td class="pborder px-4 py-2">{{ $kriteria->kriteria }}</td>
                        <td class="border px-4 py-2">{{ $kriteria->bobot }}%</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="text-yellow-500">
                            <i class="fas fa-edit text-yellow-300"></i>
                            </a> |
                            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
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
