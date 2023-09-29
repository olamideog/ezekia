<?php

namespace App\Http\Requests;

class GetUsersRequest extends BaseRequest
{
    public string $name;

    public string $search;

    /**
     * To be executed once validation have been passed
     *
     * @return void
     */
    protected function setup()
    {
        parent::setup();

        $this->name = $this->query('name')->trim();

        $this->search = $this->query('search')->trim();
    }
}
