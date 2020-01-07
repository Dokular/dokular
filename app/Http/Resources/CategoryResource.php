<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name' => $this->name,
            'description' => $this->description,
            'img' => substr($this->getFirstMediaUrl('images'), 1),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
