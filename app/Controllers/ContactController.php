<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ContactController extends Controller
{
    public function index()
    {
       
        return view('contactview');
    }
}
