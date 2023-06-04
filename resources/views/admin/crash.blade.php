@extends('layout.admin')
@section('title', 'Kerusakan')
@section('content')
<div class="some-text">
  <a class="btn btn-input" href="#input">INPUT</a>
</div>
<table id="crash">
  <thead>
    <tr>
      <th>ID</th>
      <th>Kerusakan</th>
      <th>Deskripsi</th>
      <th>Tutorial</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kerusakan as $item)
    <tr>
      <td>{{ $item->id_crash }}</td>
      <td>{{ $item->crash }}</td>
      <td>{{ $item->deskripsi }}</td>
      <td>{{ $item->tutorial }}</td>
      <td><a href="#edit{{ $item->id_crash }}" class="btn">Edit</a> | <a href="#delete{{ $item->id_crash }}"
          class="btn">Hapus</a></td>
    </tr>
    {{-- MODAL EDIT --}}
    <div class="popup" id="edit{{ $item->id_crash }}">
      <div class="popup__content">
        <div class="row">
          <h2>Kerusakan</h2>
          <form action="/u_crash/{{ $item->id_crash }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group">
              <input type="text" name="id" value="{{ $item->id_crash }}" />
            </div>
            <div class="input-group">
              <input type="text" name="nama" value="{{ $item->crash }}" />
            </div>
            <div class="input-group">
              <select name="tutorial_id">
                <option value="{{ $item->tutorial_id }}">{{ $item->tutorial }}</option>
                @foreach ($tutorial as $data)
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group">
              <textarea name="deskripsi" cols="30" rows="10">{{ $item->deskripsi }}</textarea>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Ubah</button>
          </form>
        </div>
      </div>
    </div>
    {{-- MODAL DELETE --}}
    <div class="popup" id="delete{{ $item->id_crash }}">
      <div class="popup__content">
        <form action="d_crash/{{ $item->id_crash }}" method="POST">
          @csrf
          @method('DELETE')
          <p class="popup__text">
            Yakin ingin hapus kerusakan {{ $item->crash }}?
          </p>
          <a href="#" class="btn">Close</a>
          <button type="submit" class="btn">Hapus</button>
        </form>
      </div>
    </div>
    @endforeach
  </tbody>
</table>
{{-- MODAL INPUT --}}
<div class="popup" id="input">
  <div class="popup__content">
    <div class="row">
      <h2>Kerusakan</h2>
      <form action="/i_crash" method="POST">
        @csrf
        <div class="input-group">
          <input type="text" placeholder="ID" name="id" required />
        </div>
        <div class="input-group">
          <input type="text" placeholder="Nama" name="nama" id="nama" required />
        </div>
        <div class="input-group">
          <select name="tutorial_id" id="tutorial_id">
            <option>Pilih Tutorial</option>
            @foreach ($tutorial as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group">
          <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Isikan deskripsi"
            required></textarea>
        </div>
        <a href="#" class="btn">Close</a>
        <button type="submit" class="btn">Tambah</button>
      </form>
    </div>
  </div>
</div>
@endsection