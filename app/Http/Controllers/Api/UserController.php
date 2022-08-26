<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(CreateUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $attributes = $request->validated();
        $user = $this->userService->createUser($attributes['name']);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return response()->json(new UserResource($user));
    }

    public function show(string $sessionToken): \Illuminate\Http\JsonResponse
    {
        $user = $this->userService->getUser($sessionToken);
        return response()->json(new UserResource($user));
    }
}
