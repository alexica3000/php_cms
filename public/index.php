<?php

use App\Application;
use App\Controllers\Controller;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once '../bootstrap.php';

$router = new Router();

$router->get('/', Controller::class . '@index');
$router->get('/contact', Controller::class . '@contact');
$router->get('/about', Controller::class . '@about');
$router->get('/books', Controller::class . '@allBooks');
$router->get('/books/*', Controller::class . '@allBooks');
$router->get('/show', Controller::class . '@show');
$router->get('/test/*/test2/*', function ($param1, $param2) {
    return "Test page with param1=$param1 param2=$param2";
});

$application = new Application($router);
$application->run();
