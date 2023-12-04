@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Bienestar universitario | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="hero">
            <h1 class="text-center mt-3" style="color: #630505;">Servicios de Bienestar</h1>
                <div class="Opciones2">
                @foreach($bienestares as $bienestar)
                    <a href="{{ route('requisitosBienestaru', ['id_bienestar' => $bienestar->id, 'servicio' => Str::slug($bienestar->servicio)]) }}" class="button-anon-pen">
                        <span>{{ $bienestar->servicio }}</span>
                    </a>
                @endforeach
                </div>
    </div>
      <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>


