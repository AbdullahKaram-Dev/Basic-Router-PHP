<?php

use App\Router;

require __DIR__ . '/vendor/autoload.php';


$router = new Router();

$router->register('/',[App\Classes\Home::class,'index'])
       ->register('/users',[App\Classes\Users::class,'index']);




try {
    echo $router->resolve($_SERVER['REQUEST_URI']);
} catch (\App\Exception\RouteNotFoundException $e) {
    echo $e->getMessage();
}

