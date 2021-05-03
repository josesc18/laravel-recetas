<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Receta;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $recetas = Receta::all();
        return view("admin.recetas.index")->with("recetas",$recetas);
    }

    public function validateRecetas(Request $request){
        return $request->validate([
            'title'=>'required',
            'categoria_id'=>'required',
            'imagen'=>'required',
            'ingredientes'=>'required',
            'preparacion'=>'required',
        ]);
    }

    public function create()
    {
        $categories = Categoria::all();
        return view("admin.recetas.create")->with('categories',$categories);
    }

    
    public function store(Request $request)
    {
        $this->validateRecetas($request);

        $url_img = $request->imagen->store('upload-recetas','public');

        $receta = Receta::create([
            'titulo' => $request->title,
            'ingredientes' => $request->ingredientes,
            'preparacion' => $request->preparacion,
            'imagen' => $url_img,
            'categoria_id' => $request->categoria_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect("/admin/receta");
    }


    public function show($id)
    {
        $receta = Receta::find($id);
        return view("admin.recetas.show")->with("receta",$receta);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $receta = Receta::find($id);
        $receta->delete();
        return redirect("/admin/receta");
    }
}
