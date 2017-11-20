<?php
namespace Cesg\JsonException;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Cesg\JsonException\JsonException;

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

        if (is_a($exception, 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException')) {
            return new JsonException($exception);
        }

        return new JsonException($exception);
    }
}
