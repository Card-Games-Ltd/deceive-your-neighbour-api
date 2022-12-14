<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'hash' => $this->hash,
            'name' => $this->name,
            'host' => new UserResource($this->host),
            'is_public' => $this->is_public,
            'players_number' => (int) $this->players_number,
            'active_players_number' => $this->users()->count(),
            'players' => UserResource::collection($this->users),
            'game' => new GameResource($this->games()->active()->first())
        ];
    }
}
