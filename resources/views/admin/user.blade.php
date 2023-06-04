@extends('layout.admin')
@section('title', 'Pengguna')
@section('content')
<table id="user">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>WhatsApp</th>
            <th>Provinsi</th>
            <th>Kabupaten</th>
        </tr>
    </thead>
</table>
<div class="popup" id="edit">
    <div class="popup__content">
        <form action="" method="post">
            <div class="row">
                <h2>Pengguna</h2>
              <div class="input-group">
                <input type="text" placeholder="Nama" name="nama" id="nama"/>
              </div>
              <div class="input-group">
                <input type="number" placeholder="WhatsApp" name="tlp" id="tlp"/>
              </div>
              <div class="input-group">
                <select name="id_prov" id="prov">
                    <option value="">Pilih Provinsi</option>
                </select>
              </div>
              <div class="input-group">
                <select name="id_kab" id="kab">
                    <option value="">Pilih Kabupaten</option>
                </select>
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