@extends('adminlte::page')

@section('title', 'Crear Categoria')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title"><i class="fas fa-folder-plus"></i> Crear Categoria</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.categoria.store')}}" method="POST" id="CrearCategoria">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria_input" class="form-control" id="categoria" placeholder="Ingresar Categoría">
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
        url: "http://recetas.test/admin/categoria",
        data:data,
    })
    .done(function( msg ) {
        $("#categoria").val("");
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