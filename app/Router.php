<?php
declare(strict_types=1);

namespace App;

use App\Exception\MethodNotFoundException;
use App\Exception\RouteNotFoundException;

class Router
{
    public array $routes;
    private string $requestUri;
    private string $requestMethod;
    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];

    }

    public function get(string $route,array $action)
    {
        $this->routes[$route] = ['methodType' => 'GET','controller'=>$action[0],'method'=> $action[1]];
    }

    public function post(string $route,array $action)
    {
        $this->routes[$route] = ['methodType' => 'POST','controller'=>$action[0],'method'=> $action[1]];
    }

    public function resolveRun()
    {
         if(!isset($this->routes[$this->requestUri])){
           throw new RouteNotFoundException();
         }
         if ($this->requestMethod != $this->routes[$this->requestUri]['methodType']){
             throw new MethodNotFoundException();
         }
    }

    public function __destruct()
    {
        try {
            $this->resolveRun();
        } catch (\App\Exception\MethodNotFoundException $e) {
            dd($e->getMessage());
        } catch (\App\Exception\RouteNotFoundException $e) {
            dd($e->getMessage());
        }
    }


}