<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceChangeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'permanent_id' => $this->permanent_id,
            'title' => $this->title,
            'price_changes' => $this->priceChanges->count(),
            'price_change_history' => $this->priceChanges()
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(fn($priceChange) => [
                    'price' => $priceChange->price,
                    'created_at' => $priceChange->created_at->toISO8601String(),
                ])->toArray(),
            'current_price' => $this->price,
            'highest_price' => $this->highest_price,
            'lowest_price' => $this->lowest_price,
            'oldest_price' => $this->oldest_known_price,
        ];
    }
}
