@extends('adminlte::page')

@section('title', 'registrar producto')

@section('content')
<main>
    <div class="container py-4">
        <h2>{{$msg}}</h2>
        <a href="{{url('bibliotecas')}}" class="btn btn-secondary">Regresar</a>
    </div>
</main>
@endsection