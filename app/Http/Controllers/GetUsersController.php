<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUsersRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\UserResource;
use App\Models\EmptyModel;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUsersController extends Controller
{
    /**
     * Handle get single user.
     */
    public function __invoke(GetUsersRequest $request): JsonResource
    {
        $users = User::where('first_name', 'like', '%'.$request->name.'%')
            ->orWhere('last_name', 'like', '%'.$request->name.'%')
            ->orWhere('profile', 'like', '%'.$request->search.'%')
            ->get();

        if ($users == null) {
            return new EmptyResource(new EmptyModel('User Not Found'));
        }

        return UserResource::collection($users);
    }
}
