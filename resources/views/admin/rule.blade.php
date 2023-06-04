@extends('layout.admin')
@section('title', 'Aturan')
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
    <tbody>
        @foreach ($aturan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->crash }}</td>
            <td>{{ $item->gejala }}</td>
            <td>
                <a href="#edit{{ $item->id }}" class="btn">Edit</a> | <a href="#delete{{ $item->id }}" class="btn">Hapus</a>
            </td>
        </tr>
        {{-- MODAL EDIT --}}
        <div class="popup" id="edit{{ $item->id }}">
            <div class="popup__content">
                <div class="row">
                    <h2>Aturan</h2>
                    <form action="u_rule/{{ $item->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-group">
                                <select name="id_rusak">
                                    <option value="{{ $item->id_rusak }}">{{ $item->crash }}</option>
                                    @foreach ($crash as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <select name="id_gejala">
                                    <option value="{{ $item->id_gejala }}">{{ $item->gejala }}</option>
                                    @foreach ($gejala as $item)
                                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                                    @endforeach
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
                <form action="d_rule/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="popup__text">
                        Yakin ingin hapus aturan ini?
                    </p>
                    <p>Kerusakan: {{ $item->crash }} | Gejala: {{ $item->gejala }}</p>
                    <a href="#" class="btn">Close</a>
                    <button type="submit" class="btn">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
<div class="popup" id="input">
    <div class="popup__content">
        <form action="/i_rule" method="post">
            @csrf
            <div class="row">
                <h2>Aturan</h2>
                <div class="input-group">
                    <select name="id_rusak">
                        <option>Pilih Kerusakan</option>
                        @foreach ($crash as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <select name="id_gejala">
                        <option>Pilih Gejala</option>
                        @foreach ($gejala as $item)
                        <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <a href="#" class="btn">Close</a>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</div>
@endsection