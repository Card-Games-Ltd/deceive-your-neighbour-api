<?php

namespace App\Services;

use App\Models\Card;
use App\Models\Game;
use App\Models\Room;

class GameService
{
    public function createGame($room)
    {
        $game = Game::query()->create(['room_id' => $room->id]);
        $players = $room->users;
        $this->addPlayersToGame($game, $players);
        $this->generateCards($game, $players);
        return $game;
    }

    public function generateCards($game, $players)
    {
        $playerIds = $players->pluck('id')->toArray();
        $cards = Card::all()->pluck('id')->toArray();
        $cardsNumber = count($cards);
        for ($i = $cardsNumber - 1; $i > 0; $i--) {
            $newIndex = (int) floor(rand(0, 100) / 100  * ($i + 1));
            $oldValue = $cards[$newIndex];
            $cards[$newIndex] = $cards[$i];
            $cards[$i] = $oldValue;
        }
        $cardsWithPivot = [];
        foreach ($cards as $position => $cardId) {
            $userId = $playerIds[$position % count($playerIds)];
            $cardsWithPivot[$cardId] = [
                'position' => $position,
                'user_id' => $userId,
            ];
        }
        $game->cards()->sync($cardsWithPivot);
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

    public function addPlayersToGame($game, $players)
    {
        $players = $players->pluck('id');
        $game->users()->sync($players->toArray());
        return $game;
    }

    public function removeGame($id)
    {
        $game = Room::query()->find($id);
        return $game->delete();
    }
}
