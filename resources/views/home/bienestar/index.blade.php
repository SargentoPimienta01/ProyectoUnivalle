
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
    <style>
        <style>
        .container-fluid {
            margin-top: 20px; 
        }

        .row:first-child {
            margin-bottom: 20px;  
        }

        .card {
            margin-bottom: 20px;
            height: 210px;
            width: 210px;
            display: absolute;
            flex-direction: column;
            justify-content: space-between;
            background: var(--transparent-white);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            transition: transform 1s ease, box-shadow 1s ease;      
        }
        
        .card:hover {
        transform: scale(1.05); 
        box-shadow: 0 6px 13px rgba(128, 9, 9, 0.945); 
        }

        .card-title {
            color: var(--amaranth-purple);
        border: none; 
        margin: 0; 
        padding: 0; 
        background: none; 
        padding-bottom: 15px;
        cursor: pointer;
        font-weight: bold;
        }

        .card-box {
        padding: 20px;
        height: 160px; 
        text-align: center; 
        }

        .card img {
            display: none;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>
<body>

            <h1 class="text-center mt-3" style="color: #630505;">Servicios de Bienestar</h1>
            <div class="container-fluid">
                <div class="row">
                @foreach($bienestares as $bienestar)
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
                        <div class="card-body card-box">

                    <a href="{{ route('requisitosBienestaru', ['id_bienestar' => $bienestar->id, 'servicio' => Str::slug($bienestar->servicio)]) }}" class="button-anon-pen" style="color: black; text-decoration: none; display: inline-block; padding: 15px 20px; background-color: #eee; border: 1px solid #ccc; border-radius: 5px; transition: background-color 0.3s; padding: 15px 20px;">
                        <span>{{ $bienestar->servicio }}</span>
                    </a>
                </div>
            </div>
        </div>
                @endforeach
                </div>
            </div>
      <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>


