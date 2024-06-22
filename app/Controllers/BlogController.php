<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Controller;

class BlogController extends Controller
{
    public function index()
    {
        // Load the model
        $model = new BlogModel();

        // Fetch all blog posts from the database
        $data['posts'] = $model->getAllPosts();

        // Pass the data to the view
        return view('blogview', $data);
    }
}
