@extends('adminlte::page')

@section('title', 'Crear Receta')

@section('content_header')
    <h1>Crear Receta</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title"><i class="fas fa-folder-plus"></i> Crear Producto</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        
        <form action="{{route('admin.receta.store')}}" method="POST" id="CrearCategoria" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="inputSerie">Title</label>
                <input type="text" class="form-control" name="title">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Category</label>
                    <select class="form-control" name="categoria_id">
                        <option selected>Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->nombre}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12 pt-4">
                    <label>Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
                <div class="form-group col-md-12 pt-4">
                    <label>Ingredents</label>
                    <textarea id="editor" name="ingredientes" > 
                    </textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Prepatations</label>
                    <textarea id="editor2" name="preparacion" > 
                    </textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button class="btn btn-success" id="btnCrear">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('css')

@stop

@section('js')
<script>
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
    
ClassicEditor
    .create( document.querySelector( '#editor2' ), {
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