<?php

namespace App;

use App\Interfaces\Renderable;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $dispatched = $this->router->dispatch();

        if ($dispatched instanceof Renderable) {
            $dispatched->render();
        } else {
            echo $dispatched;
        }
    }
}
