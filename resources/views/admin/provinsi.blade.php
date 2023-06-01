@extends('layout.admin')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
</div>
<table id="provinsi">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($provinsi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td><a href="#edit{{ $item->id }}" class="btn">Edit</a>   |   <a href="#delete{{ $item->id }}" class="btn">Hapus</a></td>
            </tr>
            <div class="popup" id="edit{{ $item->id }}">
                <div class="popup__content">
                    <form action="" method="post">
                        <div class="row">
                            <h2>Provinsi</h2>
                            <div class="input-group">
                                <input type="text" value="{{ $item->id }}" name="id"/>
                            </div>
                            <div class="input-group">
                                <input type="text" value="{{ $item->nama }}" name="nama"/>
                            </div>
                        </div>
                        <a href="#" class="btn">Close</a>
                        <input type="submit" value="Simpan">
                    </form>
                </div>
            </div>
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
        <form action="/i_provinsi" method="post">
            @csrf
            <div class="row">
                <h2>Provinsi</h2>
                <div class="input-group">
                    <input type="text" placeholder="ID Provinsi" name="id"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Nama Provinsi" name="nama"/>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</div>
@endsection