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
        $user = ! empty($request->item) ? User::find($request->item) : null;

        if ($user == null) {
            return new EmptyResource(new EmptyModel('User Not Found'));
        }

        $currency = Currency::where('code', $request->string('currency')->trim())->first();

        $user['first_name'] = $request->has('first_name') ? $request->string('first_name')->trim() : $user->first_name;
        $user['last_name'] = $request->has('last_name') ? $request->string('last_name')->trim() : $user->last_name;
        $user['email'] = $request->has('email') ? $request->string('email')->trim() : $user->email;
        $user['currency_id'] = $currency != null ? $currency->id : $user->currency_id;
        $user['rate'] = $request->has('rate') ? $request->rate : $user->rate;
        $user['profile'] = $request->has('profile') ? $request->string('profile')->trim() : $user->profile;

        $user->save();

        return new UserResource($user);
    }
}
