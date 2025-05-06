@extends('layouts.admin')

@section('title', 'Perhitungan SMART')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-semibold mb-2">Perhitungan SMART</h2>
        <hr class="border-t-2 border-gray-300 mb-4 w-full">
        
        <!-- Form Perhitungan SMART -->
        <form action="{{ route('perhitungan-smart.hitung') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <!-- Nama Calon Penerima -->
                <div>
                    <label for="calon_penerima_id" class="block text-sm font-medium">Nama Calon Penerima</label>
                    <select id="calon_penerima_id" name="calon_penerima_id" class="form-select w-full">
                        <option value="">Pilih Calon Penerima</option>
                        @foreach($dataCalonPenerima as $calon)
                            <option value="{{ $calon->id }}">{{ $calon->nama_calon_penerima }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Beasiswa -->
                <div>
                    <label for="beasiswa_id" class="block text-sm font-medium">Beasiswa</label>
                    <select id="beasiswa_id" name="beasiswa_id" class="form-select w-full">
                        <option value="">Pilih Beasiswa</option>
                        @foreach($beasiswa as $b)
                            <option value="{{ $b->id }}">{{ $b->beasiswa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <!-- Kriteria dan Sub Kriteria -->
                @foreach($kriteria as $k)
                    <div class="mb-2">
                        <label class="block text-sm font-medium">{{ $k->kriteria }}</label>
                        <select name="kriteria[{{ $k->id }}]" class="form-select w-full">
                            <option value="">Pilih Subkriteria</option>
                            @foreach($subKriteria->where('kriteria_id', $k->id) as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->subkriteria }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
@endsection
