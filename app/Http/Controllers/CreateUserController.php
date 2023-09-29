<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateUserController extends Controller
{
    /**
     * Handle user registration.
     */
    public function __invoke(CreateUserRequest $request): JsonResource
    {
        $currency = Currency::where('code', $request->string('currency')->trim())->first();
        $user = new User();
        $user['first_name'] = $request->string('first_name')->trim();
        $user['last_name'] = $request->string('last_name')->trim();
        $user['email'] = $request->string('email')->trim();
        $user['currency_id'] = $currency->id;
        $user['rate'] = $request->rate;
        $user['profile'] = $request->string('profile')->trim();

        $user->save();

        return new UserResource($user);
    }
}
