<?php
// app/Controllers/Dashboard/BlogController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class BlogController extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        // Load the BlogModel instance
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        // Fetch all blog posts using BlogModel
        $data['blogs'] = $this->blogModel->getAllPosts();

        // Pass data to view
        return view('dashboard/blog_managementview', $data);
    }

    public function show($id)
    {
        // Fetch a single blog post by ID using BlogModel
        $data['blog'] = $this->blogModel->getPostById($id);

        if (!$data['blog']) {
            // Handle case where post is not found (optional)
            return redirect()->to('/dashboard/blog_management')->with('error', 'Blog post not found.');
        }

        // Pass data to view
        return view('dashboard/blog_detailsview', $data);
    }

    public function create()
    {
        // Handle blog post creation form (if needed)
        // Example:
        // $postData = $this->request->getPost();
        // $this->blogModel->createPost($postData);
        // return redirect()->to('/dashboard/blog_management')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        // Handle blog post editing form (if needed)
        // Example:
        // $postData = $this->request->getPost();
        // $this->blogModel->updatePost($id, $postData);
        // return redirect()->to("/dashboard/blog_management/{$id}")->with('success', 'Blog post updated successfully.');
    }

    public function delete($id)
    {
        // Handle blog post deletion (if needed)
        // Example:
        // $this->blogModel->deletePost($id);
        // return redirect()->to('/dashboard/blog_management')->with('success', 'Blog post deleted successfully.');
    }
}
