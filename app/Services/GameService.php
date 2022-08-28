<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Room;
use Illuminate\Support\Str;

class GameService
{
    public function createGame($room)
    {
        return Game::query()->create(['room_id' => $room->id]);
    }

    public function getGame($room)
    {
        return $room->games()->active()->first();
    }

    public function addPlayerToGame($game, $player)
    {
        $players = $game->users->pluck('id');
        $players->add($player->id);
        $game->users()->sync($players->toArray());
        return $game;
    }

    public function removeGame($id)
    {
        $game = Room::query()->find($id);
        return $game->delete();
    }
}
