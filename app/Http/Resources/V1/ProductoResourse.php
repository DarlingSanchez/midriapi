<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResourse extends JsonResource
{
    
    public function toArray($request)
    {
        return [            
            "id"=>$this->id,
            'idMediaMix'=>$this->idMediaMix,
            'nombreMediaMix'=>$this->nombreMediaMix,
            'descripcion'=>$this->descripcion,
            'entregable'=>$this->entregable,
            'tarifa'=>$this->tarifa,
            'preview'=>$this->preview
        ];
    }
}
