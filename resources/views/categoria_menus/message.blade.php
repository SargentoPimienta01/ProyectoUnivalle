@extends('layout/template')

@section('title', 'registrar producto')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>{{$msg}}</h2>
        <a href="{{url('categoria_menus')}}" class="btn btn-secondary">Regresar</a>
    </div>
</main>