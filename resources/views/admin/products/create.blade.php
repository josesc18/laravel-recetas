@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title"><i class="fas fa-folder-plus"></i> Crear Producto</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <form action="{{route('admin.product.store')}}" method="POST" id="CrearCategoria">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputSerie">Serie</label>
                <input type="text" class="form-control" name="inputSerie">
                </div>
                <div class="form-group col-md-6">
                <label for="inputSKU">SKU</label>
                <input type="text" class="form-control" name="inputSKU">
                </div>
            </div>

            <div class="form-row">
            
                <div class="form-group col-md-3">
                    <label for="inputAddress">Memory</label>
                    <input type="text" class="form-control" name="inputMemory">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputAddress2">S/O</label>
                    <input type="text" class="form-control" name="inputSO">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputAddress2">Disk</label>
                    <input type="text" class="form-control" name="inputDisk">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputAddress2">Technology</label>
                    <input type="text" class="form-control" name="inputTech">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Propiety</label>
                    <select class="form-control" name="seclectProperty">
                        <option selected>Choose...</option>
                        @foreach($properties as $property)
                        <option value="{{$property->id}}">{{$property->Propertydescription}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Model</label>
                    <select id="inputState" class="form-control" name="seclectModel">
                        <option selected>Choose...</option>
                        @foreach($models as $model)
                        <option value="{{$model->id}}">{{$model->Modeldescription}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Brand</label>
                    <select class="form-control" name="seclectBrand">
                        <option selected>Choose...</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->Branddescription}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Floor</label>
                    <select class="form-control" name="seclectFloor">
                        <option selected>Choose...</option>
                        @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->floorNumber}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputState">Area</label>
                    <select class="form-control" name="seclectArea">
                        <option selected>Choose...</option>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->Areadescription}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="form-group">
                <textarea id="editor" name="observation"> 
                </textarea>
            </div>
            <button class="btn btn-success" id="btnGuardar">Guardar</button>
        </form>
    </div>
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
        url: "http://recetas.test/admin/product",
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

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: {
            items: [
                'heading', '|',
                'fontfamily', 'fontsize', '|',
                'alignment', '|',
                'bold', 'italic', '|',
                'link', '|',
                'outdent', 'indent', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'insertTable', '|',
                'uploadImage', 'blockQuote', '|',
                'undo', 'redo'
            ],
            
            viewportTopOffset: 30,
            shouldNotGroupWhenFull: false,
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
            ]
        },
    } )
    .catch( error => {
        console.log( error );
    } );
    
</script>
@stop