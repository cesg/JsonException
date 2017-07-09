<?php

namespace Cesg\JsonException;


class JsonException extends JsonExceptionAbstract
{
    protected $exception;

    /**
     * JsonException constructor.
     * @param $exception
     */
    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
        $this->status = 500;
        $this->description = $this->exception->getMessage();
    }

}