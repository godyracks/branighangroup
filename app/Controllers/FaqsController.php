<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FaqsController extends Controller
{
    public function index()
    {
        // Load the view for FAQs
        return view('faqsview');
    }
}
