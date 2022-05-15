<?php

namespace App\Http\Resources\Api;

use App\Models\SearchHistory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class SearchHistoryResource extends JsonResource
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
            'text'          => $this->text,
            'date'          => $this->created_at,
            'total_queries' => SearchHistory::select(DB::raw('count(text) as total'))
                                    ->where('text', $this->text)
                                    ->orderByDesc('total')
                                    ->groupBy('text')
                                    ->pluck('total')
                                    ->pop()
        ];
    }
}
