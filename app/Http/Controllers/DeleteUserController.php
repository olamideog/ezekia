<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Resources\EmptyResource;
use App\Models\EmptyModel;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class DeleteUserController extends Controller
{
    /**
     * Handle get single user.
     */
    public function __invoke(DeleteUserRequest $request): JsonResource
    {
        $user = ! empty($request->item) ? User::first($request->item) : null;

        if ($user == null) {
            return new EmptyResource(new EmptyModel('User Not Found'));
        }

        $user->delete();

        return new EmptyResource(new EmptyModel('User deleted', 'SUCCESSFUL', Response::HTTP_OK));
    }
}
