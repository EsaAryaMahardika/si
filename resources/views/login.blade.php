@extends('layout.main')
@section('content')
<div class="content">
    <div class="form">
        <form method="post">
            <input type="text" placeholder="Username" />
            <input type="password" placeholder="Kata sandi" />
            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
</div>
@endsection