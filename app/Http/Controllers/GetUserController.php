<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUserRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\UserResource;
use App\Models\EmptyModel;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUserController extends Controller
{
    /**
     * Handle get single user.
     */
    public function __invoke(GetUserRequest $request): JsonResource
    {
        $user = ! empty($request->item) ? User::first($request->item) : null;

        if ($user == null) {
            return new EmptyResource(new EmptyModel('User Not Found'));
        }

        return new UserResource($user);
    }
}
