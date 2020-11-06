<?php

namespace App\Controllers;

use App\Models\Book;
use App\View;

class Controller
{
    public function home()
    {
        $data = [
            'title' => 'Index page',
            'page' => 'home',
            'pageData' => [
                'welcome' => 'Welcome to home page'
            ]
        ];

        return new View('template', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact page',
            'page' => 'contact',
            'pageData' => [
                'text' => 'Some text here'
            ]
        ];

        return new View('template', $data);
    }

    public function allBooks()
    {
        $data = [
            'title' => 'My Books',
            'page' => 'books',
            'pageData' => [
                'books' => Book::all()
            ]
        ];

        return new View('template', $data);
    }

    public function showBook($id)
    {
        $data = [
            'title' => 'Book description',
            'page' => 'one-book',
            'pageData' => [
                'book' => Book::where('id', $id)->first()
            ]
        ];

        return new View('template', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About page',
            'page' => 'about',
            'pageData' => [
                'text' => 'About'
            ]
        ];

        return new View('template', $data);
    }
}
