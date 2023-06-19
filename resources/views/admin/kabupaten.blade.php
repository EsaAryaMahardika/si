@extends('layout.admin')
@section('title', 'Kabupaten')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
    <a class="btn btn-input" href="/export_kabupaten" target="_blank">EXPORT</a>
</div>
<table id="kabupaten">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Kabupaten</th>
            <th>Nama Provinsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kabupaten as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->prov['nama'] }}</td>
                <td><a href="#edit{{ $item->id }}" class="btn">Edit</a>   |   <a href="#delete{{ $item->id }}" class="btn">Hapus</a></td>
            </tr>
            <div class="popup" id="edit{{ $item->id }}">
                <div class="popup__content">
                    <form action="u_kabupaten/{{ $item->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <h2>Kabupaten</h2>
                            <div class="input-group">
                                <select name="id_prov">
                                    <option value="{{ $item->prov['id'] }}">{{ $item->prov['nama'] }}</option>
                                    @foreach ($provinsi as $data)
                                        <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <input type="text" placeholder="ID Kabupaten" name="id" value="{{ $item->id }}"/>
                            </div>
                            <div class="input-group">
                                <input type="text" placeholder="Nama Kabupaten" name="nama" value="{{ $item->nama }}"/>
                            </div>
                        </div>
                        <a href="#" class="btn">Close</a>
                        <input type="submit" value="Ubah">
                    </form>
                </div>
            </div>
            <div class="popup" id="delete{{ $item->id }}">
                <div class="popup__content">
                    <form action="d_kabupaten/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p class="popup__text">
                            Yakin ingin hapus kabupaten {{ $item->nama }}?
                        </p>
                        <a href="#" class="btn">Close</a>
                        <input type="submit" value="Hapus">
                    </form>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
<div class="popup" id="input">
    <div class="popup__content">
        <form action="/i_kabupaten" method="post">
            @csrf
            <div class="row">
                <h2>Kabupaten</h2>
                <div class="input-group">
                    <select name="id_prov">
                        <option>Pilih Provinsi</option>
                        @foreach ($provinsi as $data)
                            <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="ID Kabupaten" name="id"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Nama Kabupaten" name="nama"/>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>
</div>
@endsection