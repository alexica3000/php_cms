<?php

namespace App\Controllers;

use App\Models\Book;
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

    public function allBooks()
    {
        $books = Book::all();

        return new View('index', ['title' => 'My books']);
    }

    public function show()
    {
        return new View('personal.messages.show', ['title' => 'Show page']);
    }

    public function about()
    {
        return new View('index', ['title' => 'About page']);
    }
}
