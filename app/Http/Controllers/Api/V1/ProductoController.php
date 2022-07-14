<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductoResourse;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        //
        //return ClienteResourse::collection(Producto::where("usuario", auth()->user()->id)->get());
        return ProductoResourse::collection(Producto::all());
    }

    public function store(Request $request)
    {
        //
        //GUARDO TODOS LOS DATOS DE LOS INPUT DE LA VISTA CREATE
        
        $producto = new Producto();
        $producto->id = $request->id;
        $producto->idMediaMix = $request->idMediaMix;
        $producto->nombreMediaMix = $request->nombreMediaMix;
        $producto->descripcion = $request->descripcion;
        $producto->entregable = $request->entregable;
        $producto->tarifa = $request->tarifa;

        
        try {
            $nameImage = $request->preview->getClientOriginalName();
            $fecha = date('d-m-Y');
            $imagenNombre = $fecha . "-" . "preview-de-" . $request->nombreEmpresa . "-" . $nameImage;
            $request->preview->move(public_path('img'), str_replace(" ","-", $imagenNombre));
            
            $producto->preview = str_replace(" ","-", $imagenNombre);
        } catch (\Throwable $th) {
            $producto->preview = "";
        }
        
        

        $producto->save();

        return response()->json([
            "message" => "Registro guardado con exito"
        ],200);
    }
}
