<?php

namespace App\Http\Requests;

use App\Models\Currency;

class GetUsersRequest extends BaseRequest
{
    public string $name;

    public string $search;

    public string $currency;

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

        $this->currency = $this->query('currency')->trim();
    }
}
