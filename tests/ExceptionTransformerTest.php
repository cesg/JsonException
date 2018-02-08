<?php

namespace Cesg\JsonException\Test;
use Cesg\JsonException\JsonExceptionAbstract;
use Cesg\JsonException\JsonExceptionFactory;
use Cesg\JsonException\Transformer\ExceptionTransformer;

class ExceptionTransformerTest extends TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function factory_make_default_exception_transformer()
    {
        /** @var ExceptionTransformer $exception */
        $exception = JsonExceptionFactory::make(new \Exception('msg', 34));
        $this->assertNotNull($exception);
        $this->assertTrue(is_a($exception, ExceptionTransformer::class));
        $this->assertTrue(is_a($exception, JsonExceptionAbstract::class));
        $this->assertNotEmpty($exception->getBodyResponse());
    }
}