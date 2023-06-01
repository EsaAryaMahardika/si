@extends('layout.admin')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
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
              <td>{{ $item->id_prov }}</td>
              <td>{{ $item->id_kab }}</td>
              <td><a href="#edit{{ $item->id }}" class="btn">Edit</a>   |   <a href="#delete" class="btn">Hapus</a></td>
          </tr>
          {{-- MODAL EDIT --}}
          <div class="popup" id="edit{{ $item->id }}">
            <div class="popup__content">
              <div class="row">
                <h2>Kerusakan</h2>
                <form action="/u_engineer/{{ $item->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <h2>Teknisi</h2>
                    <div class="input-group">
                      <input type="text" placeholder="Nama" name="nama"/>
                    </div>
                    <div class="input-group">
                      <input type="number" placeholder="WhatsApp" name="tlp"/>
                    </div>
                    <div class="input-group">
                      <select name="id_prov">
                          <option value="">Pilih Provinsi</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <select name="id_kab">
                          <option value="">Pilih Kabupaten</option>
                      </select>
                    </div>
                  </div>
                  <a href="#" class="btn">Close</a>
                  <button type="submit" class="btn">Simpan</button>
                </form>
              </div>
            </div>
          </div>
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
<div class="popup" id="input">
    <div class="popup__content">
        <form action="/i_engineer" method="post">
          @csrf
            <div class="row">
              <h2>Teknisi</h2>
              <div class="input-group">
                <input type="text" placeholder="Nama" name="nama"/>
              </div>
              <div class="input-group">
                <input type="number" placeholder="WhatsApp" name="tlp"/>
              </div>
              <div class="input-group">
                <select id="prov" name="id_prov" >
                    
                </select>
              </div>
              <div class="input-group">
                <select id="kab" name="id_kab">
                    
                </select>
              </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Simpan</button>
          </form>
    </div>
</div>
@endsection