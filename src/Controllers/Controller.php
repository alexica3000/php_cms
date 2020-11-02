<?php

namespace App\Controllers;

use App\View;

class Controller
{
    public function index()
    {
        return new View('index', ['title' => 'Index page']);
    }

    public function contact()
    {
        return new View('contact', ['title' => 'Contact page']);
    }

    public function other()
    {
        return new View('index', ['title' => 'Other page']);
    }

    public function show()
    {
        return new View('personal.messages.show', ['title' => 'Show page']);
    }
}
