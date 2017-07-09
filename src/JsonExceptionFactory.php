<?php
namespace Cesg\JsonException;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class JsonExceptionFactory
{
    public static function make(\Exception $exception)
    {
        if (is_a($exception, ValidationException::class)) {
            return new ValidationException($exception->validator);
        }
        if (is_a($exception, ModelNotFoundException::class)) {
            return new NotFoundException();
        }

        return new JsonException($exception);
    }
}