<?php

namespace Cesg\JsonException\Transformer;


use Cesg\JsonException\JsonExceptionAbstract;
use Illuminate\Auth\AuthenticationException;

class AuthenticationExceptionTransformer extends JsonExceptionAbstract
{

    /**
     * AuthenticationExceptionTransformer constructor.
     * @param AuthenticationException $exception
     */
    public function __construct(AuthenticationException $exception)
    {
        $this->status = $exception->getCode();
        $this->description = $exception->getMessage();
        $this->code = 'API_AUTHENTICATION_ERROR';
    }
}