<?php

namespace App;


class NoEncontradoError implements JsonError
{
    protected $estado;
    protected $descripcion;

    /**
     * NoEncontradoError constructor.
     */
    public function __construct()
    {
        $this->estado = 404;
        $this->estado = 'No es es posible encontrar el recurso.';
    }

    public function getArray()
    {
        return [
            'status' => $this->estado,
            'description' => $this->descripcion
        ];
    }
}