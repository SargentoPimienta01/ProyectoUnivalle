<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Univalle</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/Univalle_logo.png') }}">
</head>
<body>
    <div class="intro">
        <h1> Univalle
            <!-- <span class="logo-parts">
                Univalle
            </span> -->
        </h1> 
    </div>
  
    <div class="content">
        <div class="titulo">
            <h2>Universidad del Valle</h2>
        </div>
        <div class="all">
            <div class="lefter">
                <a class="link" href="{{ route('home') }}">
                    <div class="text">
                        Trámites
                    </div>
                </a>
            </div>
            <div class="left">
                <div class="text">Post-Grado</div>
            </div>
            <div class="center">
                <div class="explainer"><span>Información</span></div>
                <div class="text">Cafecito</div>
            </div>
            <div class="right">
                <div class="text">Bienestar U</div>
            </div>
            <div class="righter">
                <div class="text">Biblioteca</div>
            </div>
            @foreach($areas as $area)
                <div class="righter">
                    @php
                        $nombre_area_slug = Str::slug($area->nombre_area, '-');
                    @endphp
                    <a class="link" href="{{ route('nombre_area', ['nombre_area' => $nombre_area_slug]) }}">
                        <div class="text">{{ $area->nombre_area }}</div>
                    </a>
                </div>
            @endforeach 
        </div>
    </div>

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>
