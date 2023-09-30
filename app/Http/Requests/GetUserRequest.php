<?php

namespace App\Http\Requests;

class GetUserRequest extends BaseRequest
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

        $this->item = $this->input('id') ?? 0;
    }
}
