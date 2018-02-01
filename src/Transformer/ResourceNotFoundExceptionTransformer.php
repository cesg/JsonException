<?php

namespace Cesg\JsonException\Transformer;

use Cesg\JsonException\JsonExceptionAbstract;

class ResourceNotFoundExceptionTransformer extends JsonExceptionAbstract
{
    public function __construct()
    {
        $this->status = 404;
        $this->description = 'No es es posible encontrar el recurso.';
        $this->code = 'API_RESOURCE_NOT_FOUND_ERROR';
    }
}
