<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
            'id' => $this->id,
            'suit' => $this->suit,
            'value' => $this->value,
            'holder' => new UserResource($this->pivot->user),
            'position' => $this->pivot->position,
            'is_active' => $this->pivot->is_active,
        ];
    }
}
