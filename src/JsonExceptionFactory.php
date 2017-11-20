<?php
namespace Cesg\JsonException;

use Cesg\JsonException\Transformer\Exception;
use Cesg\JsonException\Transformer\ResourceNotFoundException;
use Cesg\JsonException\Transformer\RouteNotFoundException;
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
            return new ResourceNotFoundException();
        }

        if (is_a($exception, 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException')) {
            return new RouteNotFoundException();
        }

        return new Exception($exception);
    }
}
