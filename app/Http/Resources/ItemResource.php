<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'limit' => $this->limit,
            // 'store_id' => $this->store_id,
        ];
    }
}
