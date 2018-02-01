<?php

namespace Cesg\JsonException\Transformer;

use Cesg\JsonException\JsonExceptionAbstract;

class Exception extends JsonExceptionAbstract
{
    protected $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
        $this->status = 500;
        $this->description = $this->exception->getMessage();
        $this->code = 'API_INTERNAL_ERROR';
    }
}
