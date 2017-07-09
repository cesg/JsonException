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