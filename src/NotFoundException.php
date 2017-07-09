<?php

namespace Cesg\JsonException;


class NotFoundException extends JsonExceptionAbstract
{

    /**
     * NoEncontradoError constructor.
     */
    public function __construct()
    {
        $this->status = 404;
        $this->description = 'No es es posible encontrar el recurso.';
    }
}