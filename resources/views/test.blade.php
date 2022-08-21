<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>U-Coins</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <p>Got these rows from the database:</p>
        <ul>
            @foreach ($names as $n)
                @if ($n)
                <li> {{ json_encode($n) }} </li>
                @else
                <li>Nameless!</li>
                @endif
            @endforeach
        </ul>
    </body>
</html>