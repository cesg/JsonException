Laravel Json Exception formatter.

Example.

```php
    public function render($request, Exception $exception)
    {
        if($request->wantsJson()) {
            $response = JsonExceptionFactory::make($exception);
            return new JsonResponse($response->getBodyResponse(), $response->getStatus());
        }
        return parent::render($request, $exception);
    }
```

Customize.

You can define a custom transformer to exceptions on the config file `json-exceptions.php`
transformer must extends `\Cesg\JsonException\JsonExceptionAbstract`

```php
return [
    'handlers' => [
        \App\Exceptions\CustomException::class => \App\Exceptions\CustomExceptionTransformer::class,
    ],
];

```
