@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title"><i class="fas fa-folder-plus"></i> Editar Categoria</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" id="CrearCategoria">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" value="{{$Categoria['nombre']}}" name="categoria_input" class="form-control" id="categoria" placeholder="Ingresar Categoría">
            </div>
            <button type="button" id="btnCrear" class="btn btn-primary">Crear</button>
    </form>
</div>
@stop
@section('css')

@stop

@section('js')
<script>
$("#btnCrear").click(function (e) { 
    e.preventDefault();
    let data = $("#CrearCategoria").serialize();
    $.ajax({
        method: "POST",
        url: "{{route('admin.categoria.update', $Categoria['id'])}}",
        data:data,
    })
    .done(function( msg ) {
        Swal.fire(
        'Exito!',
        msg,
        'success'
        )
    })
    .fail(function() {
        Swal.fire(
            'Oops...',
            'Completar los campos',
            'error',
        );
    });
});
</script>
@stop