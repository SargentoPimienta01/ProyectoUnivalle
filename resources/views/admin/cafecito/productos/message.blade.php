@extends('adminlte::page')

@section('title', 'Admin | Productos Cafetería')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<main>
    <div class="container py-4">
        <h2>{{$msg}}</h2>
        <a href="{{url('productos')}}" class="btn btn-secondary">Regresar</a>
    </div>
</main>
@endsection