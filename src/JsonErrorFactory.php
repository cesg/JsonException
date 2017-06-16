<?php
namespace App;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class JsonErrorFactory
{
    public static function make(\Exception $exception)
    {
        if (is_a($exception, ValidationException::class)) {
            return new ValidacionError($exception->validator);
        }
        if (is_a($exception, ModelNotFoundException::class)) {
            return new NoEncontradoError();
        }
    }
}