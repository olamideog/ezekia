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

        $this->item = $this->input('id') ?? 0;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:55'],
            'last_name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'email'],
            'currency' => ['required', 'exists:App\Models\Currency,code'],
            'rate' => ['required', 'decimal:2'],
            'profile' => ['nullable', 'string'],
        ];
    }
}
