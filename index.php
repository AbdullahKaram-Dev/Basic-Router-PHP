<?php

use App\Router;

require __DIR__ . '/vendor/autoload.php';


$router = new Router();

$router->get('/',[App\Classes\Home::class,'index']);
$router->get('/users',[App\Classes\Users::class,'index']);



