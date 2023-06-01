@extends('layout.admin')
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
                    <form action="/u_crash/{{ $item->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-group">
                                <input type="text" placeholder="ID" value="{{ $item->id }}" name="id"/>
                            </div>
                            <div class="input-group">
                                <input type="text" placeholder="Keterangan" value="{{ $item->keterangan }}" name="keterangan"/>
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
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</div>
@endsection