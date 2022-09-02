<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjetivoResource extends JsonResource
{
    public function toArray($request)
    {
        return [            
            "id"=>$this->id,
            'nombreObjetivo'=>$this->nombreObjetivo,
        ];
    }
}
