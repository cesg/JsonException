<?php

namespace Cesg\JsonException\Test;


use Cesg\JsonException\JsonExceptionFactory;
use Cesg\JsonException\Transformer\ValidationExceptionTransformer;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ValidationExceptionTransformerTest extends TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function factory_make_validation_exception()
    {
        /** @var Validator $validator */
        $validator = $this->getValidationFactory()->make(['foo' => 1, 'bar' => 2], ['tar' => 'required']);
        /** @var ValidationExceptionTransformer $exception */
        $exception = JsonExceptionFactory::make(new ValidationException($validator));
        $this->assertTrue(is_a($exception, ValidationExceptionTransformer::class));
        $this->assertNotEmpty($exception->getBodyResponse());
    }

    protected function getValidationFactory()
    {
        return app(Factory::class);
    }
}