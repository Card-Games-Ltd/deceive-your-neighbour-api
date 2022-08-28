<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Support\Str;

class RoomService
{
    public function createRoom($host, $attributes)
    {
        $data = [
            'hash' => uniqid(Str::random()),
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
        return Room::query()->orderByDesc('created_at')->get();
    }

    public function getRoom(string $id)
    {
        return Room::query()->where(['hash' => $id])->first();
    }

    public function checkRoomCredentials($room, string $password = null): bool
    {
        return $room->is_public || $room->password === $password;
    }

    public function removeRoom(string $id)
    {
        $room = Room::query()->where(['hash' => $id])->first();
        return $room->delete();
    }
}
