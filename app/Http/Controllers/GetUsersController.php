<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUsersRequest;
use App\Http\Resources\UserResource;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUsersController extends Controller
{
    /**
     * Handle get single user.
     */
    public function __invoke(GetUsersRequest $request): JsonResource
    {
        $currency = Currency::where('code', $request->string('currency')->trim())->first();
        $users = User::get();
        $result = [];
        foreach ($users as $user) {
            $user->convertRate($currency);
            $result[] = $user;
        }

        return UserResource::collection($result);
    }
}
