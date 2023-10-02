<?php

namespace App\Http\Requests;

class UpdateUserRequest extends BaseRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['sometimes', 'string', 'max:55'],
            'last_name' => ['sometimes', 'string', 'max:55'],
            'email' => ['sometimes', 'email'],
            'currency' => ['sometimes', 'exists:App\Models\Currency,code'],
            'rate' => ['sometimes', 'decimal:2'],
            'profile' => ['sometimes', 'string'],
        ];
    }
}
