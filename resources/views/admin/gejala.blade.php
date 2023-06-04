@extends('layout.admin')
@section('title', 'Gejala')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
</div>
<table id="gejala">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gejala as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->keterangan }}</td>
                <td><a href="#edit{{ $item->id }}" class="btn">Edit</a>   |   <a href="#delete{{ $item->id }}" class="btn">Hapus</a></td>
            </tr>
            {{-- MODAL EDIT --}}
            <div class="popup" id="edit{{ $item->id }}">
              <div class="popup__content">
                  <div class="row">
                    <h2>Gejala</h2>
                    <form action="/u_gejala/{{ $item->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-group">
                                <input type="text" placeholder="ID" value="{{ $item->id }}" name="id"/>
                            </div>
                            <div class="input-group">
                                <input type="text" placeholder="Keterangan" value="{{ $item->keterangan }}" name="keterangan"/>
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
                <form action="d_gejala/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="popup__text">
                        Apakah anda yakin menghapus gejala "{{ $item->keterangan }}"?
                    </p>
                    <a href="#" class="btn">Close</a>
                    <button type="submit" class="btn">Hapus</button>
                </form>
              </div>
            </div>
        @endforeach
    </tbody>
</table>
<div class="popup" id="input">
    <div class="popup__content">
        <form action="/i_gejala" method="post">
            @csrf
            <div class="row">
                <h2>Gejala</h2>
                <div class="input-group">
                    <input type="text" placeholder="ID" name="id"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Keterangan" name="keterangan"/>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>
</div>
@endsection