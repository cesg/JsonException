<?php

namespace Cesg\JsonException;


abstract class JsonExceptionAbstract
{
    protected $status;
    protected $description;
    protected $fields;

    public function getArray()
    {
        $data = [
            'data' => [
                'status' => $this->status,
                'description' => $this->description
            ]
        ];
        if ($this->fields) {
            $data['data']['fields'] = $this->fields;
        }
        return $data;
    }
}