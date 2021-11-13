<?php
declare(strict_types=1);
use App\Router;

require __DIR__ . '/vendor/autoload.php';


$router = new Router();

$router->get('/',[App\Classes\Home::class,'index']);
$router->get('/users',[App\Classes\Users::class,'index']);
$router->get('/users/create',[App\Classes\Users::class,'create']);




try {
   echo $router->resolveRun($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));
} catch (\App\Exception\MethodNotFoundException $e) {
    dd($e->getMessage());
} catch (\App\Exception\RouteNotFoundException $e) {
    dd($e->getMessage());
}


