<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUser(int $id = 0): User
    {
        return ! empty($id) ? User::find($id) : new User;
    }
}
