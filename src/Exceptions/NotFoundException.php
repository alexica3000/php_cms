<?php

namespace App\Exceptions;

use App\Interfaces\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        $error = $this->getMessage();

        require_once VIEW_DIR . 'error.php';
    }
}
