<?php

namespace App\Models;

use Illuminate\Http\Response;

class EmptyModel
{
    public string $message;

    public string $code;

    public int $status_code;

    public function __construct($message, $code = 'NOT_FOUND', $status_code = Response::HTTP_NOT_FOUND)
    {
        $this->code = $code;
        $this->message = $message;
        $this->status_code = $status_code;
    }
}
