<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP-2-2194498</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{route('toutesCollections')}}">Toutes les collections</a></li>
            <li><a href="{{route('toutesImages')}}">Toutes les images</a></li>
        </ul>
    </nav>

    @yield('content')
</body>
</html>