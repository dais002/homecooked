<?php

namespace App\Http\Resources;

use App\Cuisine;
use App\Store;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // query returns all records
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'cuisineType' => $this->cuisineType,
            'items' => ItemResource::collection($this->items)
            // 'cuisine' => new CuisineResource($this->cuisine)
            // 'cuisine' => $this->cuisine->type
        ];
    }
}
