<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Services\RoomService;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private GameService $gameService;
    private RoomService $roomService;

    public function __construct(GameService $gameService, RoomService $roomService)
    {
        $this->gameService = $gameService;
        $this->roomService = $roomService;
    }

    public function index($roomId): \Illuminate\Http\JsonResponse
    {
        $room = $this->roomService->getRoom($roomId);
        $game = $this->gameService->getGame($room);
        return response()->json(new GameResource($game));
    }

    public function store($roomId): \Illuminate\Http\JsonResponse
    {
        $room = $this->roomService->getRoom($roomId);
        $game = $this->gameService->createGame($room);
        return response()->json(new GameResource($game));
    }
}
