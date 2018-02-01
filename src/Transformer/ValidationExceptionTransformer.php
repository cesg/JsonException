<?php

namespace Cesg\JsonException\Transformer;

use Cesg\JsonException\JsonExceptionAbstract;
use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ValidationExceptionTransformer extends JsonExceptionAbstract
{
    protected $validator;

    public function __construct(ValidationException $exception)
    {
        $this->status = 422;
        $this->description = 'Los campos presentan errores.';
        $this->validator = $exception->validator;
        $this->code = 'API_VALIDATION_ERROR';
        $this->fillErrrosFields();
    }

    protected function fillErrrosFields()
    {
        foreach ($this->validator->errors()->getMessages() as $field => $descripcion) {
            $this->addError([$field => $descripcion[0]]);
        }
    }

    public function addError(array $error)
    {
        $this->fields[] = $error;
    }
}
