@extends('layout.main')
@section('content')
<div class="content">
    <div class="form">
        <form method="post" action="/check">
            @csrf
            @foreach ($gejala as $item)
            <input type="checkbox" id="{{ $item->id }}" name="id[]" value="{{ $item->id }}">
            <label for="{{ $item->id }}">{{ $item->keterangan }}</label><br>
            @endforeach
            <button type="submit" class="btn">Cek Kerusakan</button>
        </form>
    </div>
</div>
@endsection