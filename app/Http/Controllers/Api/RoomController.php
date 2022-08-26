<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Services\RoomService;
use App\Services\UserService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private UserService $userService;
    private RoomService $roomService;

    public function __construct(UserService $userService, RoomService $roomService)
    {
        $this->userService = $userService;
        $this->roomService = $roomService;
    }

    public function store(CreateRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        $attributes = $request->validated();
        $host = $this->userService->getUser($attributes['session_token']);
        unset($attributes['session_token']);
        $room = $this->roomService->createRoom($host, $attributes);
        return response()->json(new RoomResource($room));
    }
}
