@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
    <h1>Recetas</h1>
@stop

@section('content')
<article class="contenido-receta">

    <h1 class="text-center mb-4">{{$receta->titulo}}</h1>

    <div class="imagen-receta">
        <img src="/storage/{{ $receta->imagen }}" class="w-100">
    </div>

    <div class="receta-meta">

        <p>
        <span class="font-weight-bold text-primary">Escrito por :</span>
        {{$receta->categoria->nombre}}

        </p>
        <p>
        <span class="font-weight-bold text-primary">Autor :</span>
        {{$receta->user->name}}
        </p>

        <div class="ingredientes">
        <h2 class="my-3 text-primary">ingredientes</h2>
        {!! $receta->ingredientes  !!}

    </div>
    <div class="preparacion">
        <h2 class="my-3 text-primary">Preparacion</h2>
        {!! $receta->preparacion  !!}
    </div>
</article>
@stop

@section('css')

@stop

@section('js')
<script>
</script>
@stop