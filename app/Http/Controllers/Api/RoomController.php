<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Services\RoomService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    private UserService $userService;
    private RoomService $roomService;

    public function __construct(UserService $userService, RoomService $roomService)
    {
        $this->userService = $userService;
        $this->roomService = $roomService;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(RoomResource::collection($this->roomService->getRooms()));
    }

    public function store(CreateRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        $attributes = $request->validated();
        $host = $this->userService->getUser($attributes['session_token']);
        unset($attributes['session_token']);
        $room = $this->roomService->createRoom($host, $attributes);
        return response()->json(new RoomResource($room));
    }

    public function show(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $room = $this->roomService->getRoom($id);
        if ($this->roomService->checkRoomCredentials($room, $request->get('password'))) {
            $player = $this->userService->getUser($request->get('session_token'));
            if ($player) {
                $this->roomService->addPlayer($room, $player);
                return response()->json(new RoomResource($room));
            } else {
                return response()->json(['error' => 'You are blocked.'], Response::HTTP_UNAUTHORIZED);
            }
        }
        return response()->json(['error' => 'Wrong credentials for the room.'], Response::HTTP_FORBIDDEN);
    }
}
