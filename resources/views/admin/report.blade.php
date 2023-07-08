@extends('layout.admin')
@section('title', 'Laporan')
@section('content')
<table id="report">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kerusakan</th>
            <th>tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->crash['nama'] }}</td>
            <td>{{ $item->tanggal }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection