<?php

namespace Cesg\JsonException;

use Cesg\JsonException\JsonExceptionAbstract;

class JsonRouteNotFoundException extends JsonExceptionAbstract
{
    public function __construct()
    {
        $this->status = 404;
        $this->code = 'API_NOT_FOUND_ERROR';
    }
}
