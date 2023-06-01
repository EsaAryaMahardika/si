@extends('layout.admin')
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
              <td>{{ $item->id }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->deskripsi }}</td>
              <td>{{ $item->tutorial_id }}</td>
              <td><a href="#edit{{ $item->id }}" class="btn">Edit</a>   |   <a href="#delete" class="btn">Hapus</a></td>
          </tr>
          {{-- MODAL EDIT --}}
          {{-- <div class="popup" id="edit{{ $item->id }}">
            <div class="popup__content">
                <div class="row">
                  <h2>Kerusakan</h2>
                  <form action="/u_crash/{{ $item->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                      <input type="text" name="id_rusak" id="id_rusak" value="{{ $item->id }}"/>
                    </div>
                    <div class="input-group">
                      <input type="text" name="nama" id="nama" value="{{ $item->nama }}"/>
                    </div>
                    <div class="input-group">
                      <select name="tutorial_id">
                        <option value="{{ $tutorial->id }}">{{ $tutorial->nama }}</option>
                        @foreach ($tutorial as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-group">
                      <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">{{ $item->deskripsi }}</textarea>
                    </div>
                    <a href="#" class="btn">Close</a>
                    <button type="submit" class="btn">Simpan</button>
                  </form>
              </div>
            </div>
          </div> --}}
          {{-- MODAL DELETE --}}
          <div class="popup" id="delete">
            <div class="popup__content">
                <p class="popup__text">
                    Godard health goth green juice +1, helvetica taxidermy synth. Brooklyn wayfarers hoodie twee, keffiyeh XOXO microdosing fashion axe iPhone bespoke vape. Affogato brooklyn offal meditation raclette aesthetic heirloom post-ironic iPhone venmo leggings.
                </p>
                <a href="#" class="btn">Close</a>
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
            <input type="text" placeholder="ID" name="id" required/>
          </div>
          <div class="input-group">
            <input type="text" placeholder="Nama" name="nama" id="nama" required/>
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
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Isikan deskripsi" required></textarea>
          </div>
          <a href="#" class="btn">Close</a>
          <button type="submit" class="btn">Simpan</button>
        </form>
      </div>
    </div>
</div>
@endsection