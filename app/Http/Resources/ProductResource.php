<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->product_name,
            'description'   => $this->product_description,
            'price'         => $this->base_price,
            'variants'      => ProductVariantsResource::collection($this->variants),
            'images'        => $this->images
        ];
    }
}
