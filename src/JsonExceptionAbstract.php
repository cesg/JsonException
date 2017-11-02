<?php

namespace Cesg\JsonException;

abstract class JsonExceptionAbstract
{
    protected $status;
    protected $description;
    protected $fields;
    protected $code = 'API_ERROR';

    public function getBodyResponse()
    {
        $data = [
            'error' => [
                'status' => $this->status,
                'description' => $this->description,
                'code' => $this->code
            ]
        ];
        if ($this->fields) {
            $data['error']['fields'] = $this->fields;
        }

        return $data;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
