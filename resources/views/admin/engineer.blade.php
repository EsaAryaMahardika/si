@extends('layout.admin')
@section('title', 'Teknisi')
@section('content')
<div class="some-text">
  <a class="btn btn-input" href="#input">INPUT</a>
</div>
<div class="popup" id="input">
  <div class="popup__content">
    <form action="/i_engineer" method="post">
      @csrf
      <div class="row">
        <h2>Teknisi</h2>
        <div class="input-group">
          <input type="text" placeholder="Nama" name="nama" />
        </div>
        <div class="input-group">
          <input type="number" placeholder="WhatsApp" name="tlp" />
        </div>
        <div class="input-group">
          <select class="prov" name="id_prov">
            <option value="">Pilih Provinsi</option>
            @foreach ($prov as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group">
          <select class="kab" name="id_kab">

          </select>
        </div>
      </div>
      <a href="#" class="btn">Close</a>
      <button type="submit" class="btn">Tambah</button>
    </form>
  </div>
</div>
<table id="engineer">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>WhatsApp</th>
      <th>Provinsi</th>
      <th>Kabupaten</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($teknisi as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->nama }}</td>
      <td>{{ $item->tlp }}</td>
      <td>{{ $item->prov['nama'] }}</td>
      <td>{{ $item->kab['nama'] }}</td>
      <td><a href="#edit{{ $item->id }}" class="btn">Edit</a> | <a href="#delete{{ $item->id }}" class="btn">Hapus</a>
      </td>
    </tr>
    {{-- MODAL EDIT --}}
    <div class="popup" id="edit{{ $item->id }}">
      <div class="popup__content">
        <div class="row">
          <h2>Teknisi</h2>
          <form action="/u_engineer/{{ $item->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="input-group">
                <input type="text" placeholder="Nama" name="nama" value="{{ $item->nama }}" />
              </div>
              <div class="input-group">
                <input type="number" placeholder="WhatsApp" name="tlp" value="{{ $item->tlp }}" />
              </div>
              <div class="input-group">
                <select name="id_prov" class="prov">
                  <option value="{{ $item->id_prov }}">{{ $item->prov['nama'] }}</option>
                  @foreach ($prov as $data)
                  <option value="{{ $data->id }}">{{ $data->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="input-group">
                <select name="id_kab" class="kab">
                  <option value="{{ $item->id_kab }}">{{ $item->kab['nama'] }}</option>
                </select>
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
        <form action="d_engineer/{{ $item->id }}" method="POST">
          @csrf
          @method('DELETE')
          <p class="popup__text">
            Yakin ingin hapus teknisi {{ $item->nama }}?
          </p>
          <a href="#" class="btn">Close</a>
          <button type="submit" class="btn">Hapus</button>
        </form>
      </div>
    </div>
    @endforeach
  </tbody>
</table>
@endsection