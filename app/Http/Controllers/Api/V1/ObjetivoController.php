<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ObjetivoResource;
use App\Models\Objetivo;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function index()
    {
        return ObjetivoResource::collection(Objetivo::all());
    }

    public function store(Request $request)
    {
        //
        //GUARDO TODOS LOS DATOS DE LOS INPUT DE LA VISTA CREATE
        
        $objetivo = new Objetivo();
        $objetivo->nombreObjetivo = $request->nombreObjetivo;
       

        $objetivo->save();

        return response()->json([
            "message" => "Registro guardado con exito"
        ],200);
    }
    public function edit($id)
    {        
        $objetivo = Objetivo::find($id);



        if($objetivo){
            return $objetivo;
        }else{
            return response()->json([
                "nombreObjetivo" => "custom-objetivo"
            ],200);
        }
        
    }
}
