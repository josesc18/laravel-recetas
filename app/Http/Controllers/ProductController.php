<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Location;
use App\Models\Property;
use App\Models\ModelP;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::select(
                                'products.id',
                                'properties.Propertydescription',
                                'brands.Branddescription',
                                'models.Modeldescription',
                                'products.serie',
                                'products.sku',
                                'areas.Areadescription',
                                'locations.floorNumber')
                            ->join('areas', 'products.area_id', '=', 'areas.id')
                            ->join('brands', 'products.brand_id', '=', 'brands.id')
                            ->join('locations', 'products.location_id', '=', 'locations.id')
                            ->join('properties', 'products.property_id', '=', 'properties.id')
                            ->join('models', 'products.model_id', '=', 'models.id')
                            ->get();
        return view('admin.products.index')->with("products",$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        $brands = Brand::all();
        $locations = Location::all();
        $properties = Property::all();
        $models = ModelP::all();

        $view = view('admin.products.create')
                ->with('models',$models)
                ->with('areas',$areas)
                ->with('brands',$brands)
                ->with('locations',$locations)
                ->with('properties',$properties);

        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'inputSerie'=>'required',
            'inputSKU'=>'required',
            'inputMemory'=>'required',
            'inputSO'=>'required',
            'inputDisk'=>'required',
            'observation'=>'required',
            'seclectArea'=>'required',
            'seclectModel'=>'required',
            'seclectProperty'=>'required',
            'seclectBrand'=>'required',
            'seclectFloor'=>'required',
        ]);

        $prodruct = Product::create([
            'serie' => $request->inputSerie,
            'sku' => $request->inputSKU,
            'memory' => $request->inputMemory,
            's/o' => $request->inputSO,
            'disk' => $request->inputDisk,
            'technology' => $request->inputTech,
            'observation' => $request->observation,
            'area_id' => $request->seclectArea,
            'model_id' => $request->seclectModel,
            'property_id' => $request->seclectProperty,
            'brand_id' => $request->seclectBrand,
            'location_id' => $request->seclectFloor,
        ]);
        $prodruct->save();
        return redirect("/admin/product");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product');
    }
}
