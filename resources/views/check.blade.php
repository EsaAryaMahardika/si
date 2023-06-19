<html lang="en">
<head>
    <title>RusakApa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="css/style.css" />    --}}
    {{-- <link rel="stylesheet" href="css/form.css" />    --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>
<body>
    <nav>
        <div class="logo">
            <i class="fa fa-laptop"></i> RusakApa
        </div>
    </nav>
    <div class="content">
        <div class="form">
            <form method="post" action="/check">
                @csrf
                @foreach ($gejala as $item)
                <input type="checkbox" id="{{ $item->id }}" name="id" value="{{ $item->id }}">
                <label for="{{ $item->id }}">{{ $item->keterangan }}</label><br>
                @endforeach
                <button type="submit" class="btn">Cek Kerusakan</button>
            </form>
        </div>
    </div>
</body>
</html>