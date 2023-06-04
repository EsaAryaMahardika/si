@extends('layout.admin')
@section('title', 'Tutorial')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
</div>
<table id="tutorial">
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>File</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tutorial as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td><a class="btn btn-input" href="{{ asset('storage/tutorial/'.$item->file) }}" target="_blank">Cek</a>
            </td>
            <td><a href="#edit{{ $item->id }}" class="btn">Edit</a> | <a href="#delete{{ $item->id }}"
                    class="btn">Hapus</a></td>
        </tr>
        {{-- MODAL EDIT --}}
        <div class="popup" id="edit{{ $item->id }}">
            <div class="popup__content">
                <div class="row">
                    <h2>Tutorial</h2>
                    <form action="u_tutorial/{{ $item->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-group">
                                <input type="text" value="{{ $item->nama }}" name="nama" />
                            </div>
                            <div class="input-group">
                                <input type="file" name="file">
                            </div>
                        </div>
                        <a href="#" class="btn">Close</a>
                        <button type="submit" class="btn">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- MODAL DELETE --}}
        <div class="popup" id="delete{{ $item->id }}">
            <div class="popup__content">
                <form action="d_tutorial/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="popup__text">
                        Apakah anda yakin menghapus tutorial {{ $item->nama }}?
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
        <form action="/i_tutorial" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <h2>Tutorial</h2>
                <div class="input-group">
                    <input type="text" placeholder="Judul" name="nama" id="nama" />
                </div>
                <div class="input-group">
                    <label class="file">
                        <input type="file" id="file" name="file">
                        <span class="file-custom"></span>
                    </label>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>
</div>
@endsection