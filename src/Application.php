<?php

namespace App;

use App\Interfaces\Renderable;
use Exception;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
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
}
