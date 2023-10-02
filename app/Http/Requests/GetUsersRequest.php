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

        $this->name = $this->get('name') ? trim($this->get('name')) : '';

        $this->search = $this->get('search') ? trim($this->get('search')) : '';

        $this->currency = $this->get('currency') ? trim($this->get('currency')) : '';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'string', 'max:55'],
            'search' => ['sometimes', 'string', 'max:55'],
            'currency' => ['sometimes', 'exists:App\Models\Currency,code'],
        ];
    }
}
