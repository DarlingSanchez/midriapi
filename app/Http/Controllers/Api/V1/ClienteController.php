<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Http\Resources\V1\ClienteResourse;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return ClienteResourse::collection(Clientes::where("usuario", $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            "Logo" => gettype($request->logo)
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
        return $clientes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
