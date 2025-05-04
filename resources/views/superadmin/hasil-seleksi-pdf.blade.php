

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Seleksi PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Seleksi</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Calon Penerima</th>
                <th>Kriteria 1</th>
                <th>Kriteria 2</th>
                <th>Kriteria 3</th>
                <th>Kriteria 4</th>
                <th>Hasil</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilSeleksi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_calon_penerima }}</td>
                    <td>{{ $data->nilai_kriteria1 }}</td>
                    <td>{{ $data->nilai_kriteria2 }}</td>
                    <td>{{ $data->nilai_kriteria3 }}</td>
                    <td>{{ $data->nilai_kriteria4 }}</td>
                    <td>{{ $data->hasil }}</td>
                    <td>{{ $data->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
