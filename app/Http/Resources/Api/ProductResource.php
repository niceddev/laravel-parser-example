<?php

namespace App\Http\Resources\Api;

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
            'id'          => $this->id,
            'name'        => $this->name,
            'price'       => $this->price,
            'image_url'   => $this->image_url,
            'brand'       => $this->brand,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'bought'      => $this->bought,
//            'boughtJmart' => $this->boughtJmart,
//            'boughtMechta'=> $this->boughtMechta,
//            'boughtTechnodom' => $this->boughtTechnodom,
            'rating'      => $this->rating,
            'astana'      => $this->astana,
            'almaty'      => $this->almaty,
            'shymkent'      => $this->shymkent,
            'karaganda'      => $this->karaganda,
        ];
    }
}
