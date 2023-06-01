<html lang="en">
<head>
    <title>RusakApa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>
<body>
    <nav>
        <div class="logo">
            <i class="fa fa-laptop"></i> RusakApa
        </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/login">Masuk</a></li>
            <li><a href="/register">Daftar</a></li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>