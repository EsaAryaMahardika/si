@extends('layout.main')
@section('content')
<div class="content">
    <div class="form">
        <form method="post">
            <input type="text" placeholder="Username" />
            <input type="text" placeholder="Nama Lengkap" />
            <input type="email" placeholder="E-mail" />
            <input type="password" placeholder="Kata sandi" />
            <input type="password" placeholder="Ulangi Kata sandi" />
            <button type="submit" class="btn">Daftar</button>
        </form>
    </div>
</div>
@endsection