<?php

namespace App;

use App\Interfaces\Renderable;
use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;
use PDO;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    public function run()
    {
        try {
            $dispatched = $this->router->dispatch();

            if ($dispatched instanceof Renderable) {
                $dispatched->render();
            } else {
                echo $dispatched;
            }
        } catch (Exception $e) {
            $this->renderException($e);
        }
    }

    public function renderException($e)
    {
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            $code = $e->getCode() == 0 ? 500 : $e->getCode();
            echo 'Error with code ' . $code . ', message: ' . $e->getMessage() . PHP_EOL;
        }
    }

    private function initialize()
    {
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'mariadb',
            'database'  => 'php_cms',
            'username'  => 'php_cms',
            'password'  => 'php_cms',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
