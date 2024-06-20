<?php

namespace App\Controllers;

class BlogController extends BaseController
{
    public function index(): string
    {
        return view('blogview');
    }
}
