<?php

namespace Cesg\JsonException;

use Cesg\JsonException\Transformer\ExceptionTransformer;
use Cesg\JsonException\Transformer\ResourceNotFoundExceptionTransformer;
use Cesg\JsonException\Transformer\RouteNotFoundExceptionTransformer;
use Cesg\JsonException\Transformer\ValidationExceptionTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class JsonExceptionFactory
{
    public static function make(\Exception $exception)
    {
        $handlers = (new static)->getHandlers();
        $exceptionClass = get_class($exception);

        if (array_key_exists($exceptionClass, $handlers)) {
            $handler = $handlers[$exceptionClass];

            if ((new \ReflectionClass($handler))->isSubclassOf(JsonExceptionAbstract::class)) {
                return new $handler($exception);
            }
        }

        return new ExceptionTransformer($exception);
    }

    protected function getHandlers()
    {
        return array_merge([
            ValidationException::class => ValidationExceptionTransformer::class,
            ModelNotFoundException::class => ResourceNotFoundExceptionTransformer::class,
            'Symfony\Component\HttpKernel\Exception\NotFoundHttpException' => RouteNotFoundExceptionTransformer::class,
        ], config('json-exceptions.handlers', []));
    }
}
