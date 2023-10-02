<?php

namespace App\Http\Requests;

class GetUsersRequest extends BaseRequest
{
    // public string $search;

    // public float $rate;

    public string $currency;

    /**
     * To be executed once validation have been passed
     *
     * @return void
     */
    protected function setup()
    {
        parent::setup();

        // $this->rate = $this->get('rate') ? trim($this->get('rate')) : '';

        // $this->search = $this->get('search') ? trim($this->get('search')) : '';

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
            'search' => ['sometimes', 'string', 'max:55'],
            'rate' => ['sometimes', 'decimal:2'],
            'currency' => ['sometimes', 'exists:App\Models\Currency,code'],
        ];
    }
}
