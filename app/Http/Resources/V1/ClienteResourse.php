<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'nombreEmpresa'=>$this->nombreEmpresa,
            'categoria'=>$this->categoria,
            'ubicacion'=>$this->ubicacion,
            'representante'=>$this->representante,
            'correo'=>$this->correo,
            'telefono'=>$this->telefono,
            'ejecutivo'=>$this->ejecutivo,
            'correoEjecutivo'=>$this->correoEjecutivo,            
            'usuario'=>$this->usuario,
            'logo'=>$this->logo,
        ];
    }
}
