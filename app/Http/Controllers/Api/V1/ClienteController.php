<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Http\Resources\V1\ClienteResourse;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        //
        return ClienteResourse::collection(Clientes::where("usuario", auth()->user()->id)->get());
        //return ClienteResourse::collection(Clientes::all());
    }

    public function store(Request $request)
    {
        //
        //GUARDO TODOS LOS DATOS DE LOS INPUT DE LA VISTA CREATE
        
        $cliente = new Clientes();
        $cliente->nombreEmpresa = $request->nombreEmpresa;
        $cliente->categoria = $request->categoria;
        $cliente->ubicacion = $request->ubicacion;
        $cliente->representante = $request->representante;
        $cliente->correo = $request->correo;                              
        $cliente->telefono = $request->telefono;
        $cliente->ejecutivo = $request->ejecutivo;
        $cliente->correoEjecutivo = $request->correoEjecutivo;
        $cliente->usuario = auth()->user()->id;    
        
        $nameImage = $request->logo->getClientOriginalName();

        //$cliente->logo = str_replace(" ","-", $nameImage);

        $fecha = date('d-m-Y');

        $imagenNombre = $fecha . "-" . "logo-de-" . $request->nombreEmpresa . "-" . $nameImage;
        
        $request->logo->move(public_path('img'), str_replace(" ","-", $imagenNombre));
        
        $cliente->logo = str_replace(" ","-", $imagenNombre);

        $cliente->save();

        return response()->json([
            "message" => "Registro guardado con exito",
            "logo" => $request->logo
        ],200);
    }

    public function edit($id)
    {        
        $cliente = Clientes::find($id);
        return $cliente;
    }

    public function update(Request $request)
    {
        $cliente = Clientes::find($request->id);
        $cliente->nombreEmpresa = $request->nombreEmpresa;
        $cliente->categoria = $request->categoria;
        $cliente->ubicacion = $request->ubicacion;
        $cliente->representante = $request->representante;
        $cliente->correo = $request->correo;                              
        $cliente->telefono = $request->telefono;
        $cliente->ejecutivo = $request->ejecutivo;
        $cliente->correoEjecutivo = $request->correoEjecutivo;
        $cliente->usuario = auth()->user()->id;    
        
        
        try {
            $nameImage = $request->logo->getClientOriginalName();
            //$cliente->logo = str_replace(" ","-", $nameImage);
            $fecha = date('d-m-Y');
            $imagenNombre = $fecha . "-" . "logo-de-" . $request->nombreEmpresa . "-" . $nameImage;
           
              $request->logo->move(public_path('img'), str_replace(" ","-", $imagenNombre));
           
              $cliente->logo = str_replace(" ","-", $imagenNombre);
            $cliente->logo = isset($request->logo) ? str_replace(" ","-", $imagenNombre) : $cliente->logo;
        } catch (\Throwable $th) {
            $cliente->logo = $cliente->logo;
        }
         

        $cliente->save();

        return response()->json([
            "message" => "Registro guardado con exito",
            "logo" => $request->logo
        ],200);
    }

    public function destroy(Clientes $clientes)
    {
        //
    }
}
