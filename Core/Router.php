<?php

namespace App\Core;

use App\Core\Request;
use Exception;

class Router {
    protected static array $routes = [];
    
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function get(string $uri, array $callback){
        if($uri === '/'){
            $uri = ''; 
        }
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post(string $uri, array $callback){
        self::$routes['POST'][$uri] = $callback;
    }

    public static function loadRoutes(string $routesFile) {
        return require $routesFile;
    }

    public function resolve() {
        self::loadRoutes('../routes.php');
        $method = $this->request->getHttpMethod();
        $uri = $this->request->getUri();
        $callback = self::$routes[$method][$uri] ?? false;
 
        if(!$callback){
            throw new Exception("Route not defined for $uri");
        }

        $callback[0] = new $callback[0];

        return call_user_func($callback, $this->request);
    }
}
