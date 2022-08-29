<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'name' => $this->room->name,
            'is_active' => $this->is_active,
            'current_executor' => new UserResource($this->currentExecutor),
            'previous_executor' => new UserResource($this->previousExecutor),
            'current_action' => new ActionResource($this->currentAction),
            'actions' => ActionResource::collection($this->actions()->with(['actionType'])->get()),
            'cards' => CardResource::collection($this->cards),
            'players' => UserResource::collection($this->users),
        ];
    }
}
