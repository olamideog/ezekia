<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\UserResource;
use App\Models\Currency;
use App\Models\EmptyModel;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateUserController extends Controller
{
    /**
     * Handle user registration.
     */
    public function __invoke(UpdateUserRequest $request): JsonResource
    {
        $user = ! empty($request->item) ? User::first($request->item) : null;

        if ($user == null) {
            return new EmptyResource(new EmptyModel('User Not Found'));
        }

        $currency = Currency::where('code', $request->string('currency')->trim())->first();

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
