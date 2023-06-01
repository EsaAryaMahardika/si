@extends('layout.admin')
@section('content')
<div class="some-text">
    <a class="btn btn-input" href="#input">INPUT</a>
</div>
<table id="rule">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kerusakan</th>
            <th>Gejala</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
<div class="popup" id="input">
    <div class="popup__content">
        <form action="/i_rule" method="post">
            @csrf
            <div class="row">
                <h2>Aturan</h2>
                <div class="input-group">
                    <input type="text" placeholder="ID Kerusakan" name="id_rusak" id="id_rusak"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="ID Gejala" name="id_gejala" id="id_gejala"/>
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
                <h2>Aturan</h2>
                <div class="input-group">
                    <input type="text" placeholder="ID Kerusakan" name="id_rusak" id="id_rusak"/>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="ID Gejala" name="id_gejala" id="id_gejala"/>
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