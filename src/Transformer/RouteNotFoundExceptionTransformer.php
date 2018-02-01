<?php

namespace Cesg\JsonException\Transformer;

use Cesg\JsonException\JsonExceptionAbstract;

class RouteNotFoundExceptionTransformer extends JsonExceptionAbstract
{
    public function __construct()
    {
        $this->status = 404;
        $this->code = 'API_ROUTE_NOT_FOUND_ERROR';
    }
}
