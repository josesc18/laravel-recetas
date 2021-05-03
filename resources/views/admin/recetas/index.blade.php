@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
    <h1>Recetas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body p-0" style="display: block;">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                    @foreach($recetas as $receta)
                    <tr>
                        <td>{{++$i}}</td>
                        <th>{{$receta->titulo}}</th>
                        <th><img src="/storage/{{$receta->imagen}}" alt="" width="100px"></th>
                        <th>{{$receta->categoria->nombre}}</th>
                        <th>{{$receta->user->name}}</th>
                        <td>
                            <form action="{{ route('admin.receta.destroy', $receta->id) }}" method="post">
                                <a class="btn bg-primary" href='{{ route("admin.receta.show", $receta->id) }}'>
                                    <i class="fas fa-eye"></i> 
                                </a>
                                <a class="btn bg-warning" href='#'>
                                    <i class="fas fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button class="btn bg-danger btnEliminar " type="submit"> 
                                    <i class="fas fa-trash-alt"></i>
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
@stop

@section('css')

@stop

@section('js')
<script>
</script>
@stop