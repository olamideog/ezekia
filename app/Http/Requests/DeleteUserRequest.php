<?php

namespace App\Http\Requests;

class DeleteUserRequest extends BaseRequest
{
    public int $item;

    /**
     * To be executed once validation have been passed
     *
     * @return void
     */
    protected function setup()
    {
        parent::setup();

        $this->item = $this->route()->parameter('id') ?? 0;
    }
}
