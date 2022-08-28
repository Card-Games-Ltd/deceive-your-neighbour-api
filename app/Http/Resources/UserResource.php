<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'avatar' => optional($this->getMedia('avatar')->first())->getUrl(),
            'session_token' => $this->session_token,
            'session_token_expires_at' => $this->session_token_expires_at,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
        ];
    }
}
