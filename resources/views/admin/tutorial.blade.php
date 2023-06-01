@extends('layout.admin')
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
                <td><a class="btn btn-input" href="{{ asset('storage/tutorial/'.$item->file) }}" target="_blank">Cek</a></td>
                <td><a href="#edit{{ $item->id }}" class="btn">Edit</a>   |   <a href="#delete{{ $item->id }}" class="btn">Hapus</a></td>
            </tr>
            {{-- MODAL EDIT --}}
            <div class="popup" id="edit{{ $item->id }}">
                <div class="popup__content">
                    <div class="row">
                        <h2>Tutorial</h2>
                        <form action="/i_tutorial" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <h2>Tutorial</h2>
                                <div class="input-group">
                                    <input type="text" value="{{ $item->nama }}" name="nama"/>
                                </div>
                                <div class="input-group">
                                    <label class="file">
                                        <input type="file" name="file">
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>
                            <a href="#" class="btn">Close</a>
                            <button type="submit" class="btn">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- MODAL DELETE --}}
            <div class="popup" id="delete{{ $item->id }}">
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
        <form action="/i_tutorial" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <h2>Tutorial</h2>
                <div class="input-group">
                    <input type="text" placeholder="Judul" name="nama" id="nama"/>
                </div>
                <div class="input-group">
                    <label class="file">
                        <input type="file" id="file" name="file">
                        <span class="file-custom"></span>
                    </label>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</div>
@endsection