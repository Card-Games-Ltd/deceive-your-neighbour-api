<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_token' => 'required|exists:users,session_token',
            'name' => 'required|string|max:255',
            'password' => 'required_if:is_public,0|string|max:255',
            'is_public' => 'nullable|boolean',
            'players_number' => 'required|integer|min:3|max:4',
        ];
    }
}
