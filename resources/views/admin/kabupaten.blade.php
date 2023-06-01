@extends('layout.admin')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
</div>
<table id="kabupaten">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kabupaten as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td><a href="#edit" class="btn">Edit</a>   |   <a href="#delete" class="btn">Hapus</a></td>
            </tr>
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
                    <select name="id_prov" id="id_prov">
                        <option value="">ID - Provinsi</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="ID Kabupaten" name="id_kab" id="id_kab"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Nama Kabupaten" name="nama" id="nama"/>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</div>
<div class="popup" id="edit">
    <div class="popup__content">
        <form action="" method="post">
            <div class="row">
                <h2>Kabupaten</h2>
                <div class="input-group">
                    <select name="id_prov" id="id_prov">
                        <option value="">ID - Provinsi</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="ID Kabupaten" name="id_kab" id="id_kab"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Nama Kabupaten" name="nama" id="nama"/>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <input type="submit" value="Simpan">
        </form>
    </div>
</div>
<div class="popup" id="delete">
    <div class="popup__content">
        <p class="popup__text">
            Godard health goth green juice +1, helvetica taxidermy synth. Brooklyn wayfarers hoodie twee, keffiyeh XOXO microdosing fashion axe iPhone bespoke vape. Affogato brooklyn offal meditation raclette aesthetic heirloom post-ironic iPhone venmo leggings.
        </p>
        <a href="#" class="btn">Close</a>
    </div>
</div>
@endsection