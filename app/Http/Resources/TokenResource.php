<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->accessToken->id,
            'token' => $this->plainTextToken,
            'type' => 'Bearer',
            'abilities' => $this->accessToken->abilities,
            'created_at' => $this->accessToken->created_at,
            'expiry_date' => $this->accessToken->expires_at,
        ];
    }
}
