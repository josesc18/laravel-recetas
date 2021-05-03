@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body p-0" style="display: block;">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($Categorias as $key=>$categoria)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$categoria["nombre"]}}</td>
                            <td>
                                <form action="{{route('admin.categoria.destroy',$categoria['id'])}}" method="post" id="CategoriaDelete">
                                    <a class="btn btn-app" href='/admin/categoria/{{$categoria["id"]}}/edit'>
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-app btnEliminar" type="submit"> 
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- /.table-responsive -->
        </div>
        <!-- /.card-footer -->
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
</script>
@stop