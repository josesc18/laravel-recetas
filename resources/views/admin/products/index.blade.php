@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body p-0" style="display: block;">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Property</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Serie</th>
                        <th>Sku</th>
                        <th>Area</th>
                        <th>Floor</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                @foreach($products as $product)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$product->Propertydescription}}</td>
                        <td>{{$product->Branddescription}}</td>
                        <td>{{$product->Modeldescription}}</td>
                        <td>{{$product->serie}}</td>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->Areadescription}}</td>
                        <td>{{$product->floorNumber}}</td>
                        <td>
                            <form action="{{route('admin.product.destroy',$product['id'])}}" method="post" id="CategoriaDelete">
                                <a class="btn bg-primary" href='#'>
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