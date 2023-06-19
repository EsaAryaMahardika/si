<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/export.css">
    <title>Export Kabupaten</title>
</head>
<body>
    <h3>Data Kabupaten</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kabupaten as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->prov['nama'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" align="center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
</body>
</html>