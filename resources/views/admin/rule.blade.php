@extends('layout.admin')
@section('title', 'Aturan')
@section('content')
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
        @foreach ($relasi as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>
                @foreach ($item->gejala as $item)
                    - {{ $item->keterangan }} <br>
                @endforeach
            </td>
            <td>
                <a href="#edit{{ $item->id }}" class="btn">Edit</a> | <a href="#delete{{ $item->id }}" class="btn">Hapus</a>
            </td>
        </tr>
        {{-- MODAL EDIT --}}
        <div class="popup" id="edit{{ $item->id }}">
            <div class="popup__content">
                <div class="row">
                    <h2>Aturan</h2>
                    {{-- <form action="u_rule/{{ $item->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-group">
                                <select name="id_rusak">
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @foreach ($relasi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <select name="id_gejala[]" class="gejala" multiple="multiple">
                                    @foreach ($item->gejala as $data)
                                    <option selected value="{{ $data->id }}">{{ $data->keterangan }}</option>
                                    @endforeach
                                    @foreach ($gejala as $item)
                                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <a href="#" class="btn">Close</a>
                        {{-- <button type="submit" class="btn">Ubah</button> --}}
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
                    <a href="#" class="btn">Close</a>
                    <button type="submit" class="btn">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection