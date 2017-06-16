<?php

namespace App;


use Illuminate\Validation\Validator;

class ValidacionError implements JsonError
{
    protected $estado;
    protected $descripcion;
    protected $campos;
    protected $validator;
    protected $datos;

    /**
     * ValidacionError constructor.
     * @param $validator
     */
    public function __construct(Validator $validator)
    {
        $this->estado = 422;
        $this->descripcion = 'Los campos presentan errores.';
        $this->validator = $validator;
        $this->llenarErroresEnCampos();
    }

    protected function llenarErroresEnCampos()
    {
        foreach ($this->validator->errors()->getMessages() as $field => $descripcion) {
            $this->agregaErrorDeCampo([$field => $descripcion[0]]);
        }
    }

    public function agregaErrorDeCampo(array $error)
    {
        $this->campos[] = $error;
    }

    public function getArray()
    {
        return [
            'status' => $this->estado,
            'description' => $this->descripcion,
            'fields' => $this->campos
        ];
    }

}