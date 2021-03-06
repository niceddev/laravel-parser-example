<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'id'             => $this->id,
            'name'           => $this->name,
            'sub_categories' => self::collection($this->whenLoaded('subCategories')),
            'total_sold'     => \DB::table('products')
                                        ->where('category_id', $this->id)
                                        ->sum('bought')
        ];
    }
}
