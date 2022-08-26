<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    public function createRoom($host, $attributes)
    {
        $data = [
            'host_id' => $host->id,
            'name' => $attributes['name'],
            'is_public' => $attributes['is_public'],
            'players_number' => $attributes['players_number'],
        ];
        if (isset($attributes['password']) && $attributes['password']) {
            $data['password'] = $attributes['password'];
        }
        return Room::query()->create($data);
    }

    public function getRooms()
    {
        // ...
    }

    public function getRoom(string $id)
    {
        // ...
    }

    public function removeRoom(string $id)
    {
        // ...
    }
}
