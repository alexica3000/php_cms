<?php

use App\Application;
use App\Controllers\Controller;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once '../bootstrap.php';

$router = new Router();

$router->get('/', Controller::class . '@index');

$router->get('about', function() {
    return 'about';
});

$router->get('/contact', Controller::class . '@contact');
$router->get('/other', Controller::class . '@other');
$router->get('/show', Controller::class . '@show');

$application = new Application($router);
$application->run();
