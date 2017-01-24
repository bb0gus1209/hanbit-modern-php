<?php
class App
{
    protected $routes = array();
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello world';

    public function addRoute($routePath, $routeCallback)
    {
        // bindTo 메서드는 PHP 5.4 이상부터 지원된다.
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function dispatch($currentPath)
    {
        foreach ($this->routes as $routePath => $callback) {
            if ($routePath === $currentPath) {
                $callback();
            }
        }

        header('HTTP/1.1 ' . $this->responseStatus);
        header('Content-type: ' . $this->responseContentType);
        header('Content-length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}

$app = new App();
$app->addRoute('/users/josh', function () {
    $this->responseContentType = 'application/json;charset=utf8';
    $this->responseBody = '{"name": "Josh"}';
});
$app->dispatch('/users/josh');
