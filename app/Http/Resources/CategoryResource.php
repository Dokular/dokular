<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use JD\Cloudder\Facades\Cloudder;

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
            'img' => Cloudder::show($this->img,['width' => 300]),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
