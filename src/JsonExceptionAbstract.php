<?php

namespace Cesg\JsonException;


abstract class JsonExceptionAbstract
{
    protected $status;
    protected $description;
    protected $fields;

    public function getBodyResponse()
    {
        $data = [
            'error' => [
                'status' => $this->status,
                'description' => $this->description
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