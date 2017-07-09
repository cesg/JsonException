<?php

namespace Cesg\JsonException;


use Illuminate\Validation\Validator;

class ValidationException extends JsonExceptionAbstract
{
    protected $validator;

    /**
     * ValidacionError constructor.
     * @param $validator
     */
    public function __construct(Validator $validator)
    {
        $this->status = 422;
        $this->description = 'Los campos presentan errores.';
        $this->validator = $validator;
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