<?php

namespace Cesg\JsonException\Transformer;

use Cesg\JsonException\JsonExceptionAbstract;

class ExceptionTransformer extends JsonExceptionAbstract
{
    protected $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
        $this->status = $exception->getCode();
        $this->description = $this->exception->getMessage();
        $this->code = 'API_INTERNAL_ERROR';
    }
}
