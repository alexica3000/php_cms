<?php

namespace App;

use App\Interfaces\Renderable;

class View implements Renderable
{
    private string $template;
    private array $data;

    public function __construct(string $template, array $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function render()
    {
        $nameFile = str_replace('.', '/', $this->template) . '.php';
        $pathFile = VIEW_DIR . $nameFile;

        if (!file_exists($pathFile)) {
            echo 'Template not exist.';
            return;
        }

        extract($this->data);

        require_once $pathFile;
    }
}
