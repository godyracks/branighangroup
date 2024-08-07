<?php
// app/Controllers/Dashboard/BlogController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BlogController extends BaseController
{
    protected $blogModel;
      private $allowedEmails = [
        'branighangroup@gmail.com',
        'godfreymatagaro@gmail.com',
        'brannyokara@gmail.com'
    ];
    private $session;

    public function __construct()
    {
        // Load the BlogModel instance
       $this->blogModel = new \App\Models\BlogModel();

         $this->session = session();
    }

    public function index()
    {
         try {
            $this->checkAccess();
        } catch (PageNotFoundException $e) {
            return redirect()->to('/');
        }
        
        $blogdata = $this->blogModel->getAllPosts();
        // Fetch all blog posts using BlogModel
        $data = ['blogs' => $blogdata,
         'userData' => $this->session->get('userData')
    ];

        // Pass data to view
        return view('dashboard/blog_managementview', $data);
    }
      private function checkAccess()
    {
        // Check if user is logged in
        if (!$this->session->has('isLoggedIn')) {
            throw new PageNotFoundException('You are not logged in.');
        }

        // Retrieve the user's email from the session
        $userEmail = $this->session->get('userData')['email'];

        // Check if the user's email is in the list of allowed emails
        if (!in_array($userEmail, $this->allowedEmails)) {
            throw new PageNotFoundException('You do not have permission to access this page.');
        }
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



public function createBlog()
{
    helper(['form', 'url']);

    if ($this->request->getMethod() === 'post' && $this->validate([
            'author_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'article_image' => 'uploaded[article_image]|max_size[article_image,2048]|ext_in[article_image,jpg,jpeg,png]',
        ])) {
        
        // Handle the file upload
        $image = $this->request->getFile('article_image');
        $imageUrl = '';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $uploadPath = ROOTPATH . 'public/images/blogs/';
            $image->move($uploadPath, $newName);
            $imageUrl = '/images/blogs/' . $newName;
        }

        $title = $this->request->getPost('title');

        $data = [
            'author_name' => $this->request->getPost('author_name'),
            'title' => $title,
            'content' => $this->request->getPost('description'),
            'article_image' => $imageUrl,
            'tags' => $this->request->getPost('tags'),
            'category' => $this->request->getPost('category'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $blogModel = new \App\Models\BlogModel();
        $blogModel->createPost($data); // Save post with the title

        return redirect()->to('/dashboard')->with('message', 'Blog post created successfully!');
    } else {
        return view('createblog');
    }
}



//   public function edit($id)
// {
//     $blog = $this->blogModel->find($id);

//     if (!$blog) {
//         return redirect()->to('/dashboard/blog_management')->with('error', 'Blog post not found.');
//     }

//     $data = [
//         'blog' => $blog,
//         'userData' => $this->session->get('userData')
//     ];

//     return view('dashboard/edit_blog', $data);
// }
public function edit($id)
{
    try {
        $this->checkAccess();
    } catch (PageNotFoundException $e) {
        return redirect()->to('/');
    }
    
    $blog = $this->blogModel->find($id);

    if (!$blog) {
        return redirect()->to('/dashboard/blog_management')->with('error', 'Blog post not found.');
    }

    $data = [
        'blog' => $blog,
        'userData' => $this->session->get('userData')
    ];

    return view('dashboard/edit_blog', $data);
}

public function update($id)
{
    helper(['form', 'url']);

    if ($this->request->getMethod() === 'post' && $this->validate([
            'author_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'article_image' => 'max_size[article_image,2048]|ext_in[article_image,jpg,jpeg,png]',
        ])) {

        $data = [
            'author_name' => $this->request->getPost('author_name'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('description'),
            'tags' => $this->request->getPost('tags'),
            'category' => $this->request->getPost('category'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Handle the file upload
        $image = $this->request->getFile('article_image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $uploadPath = ROOTPATH . 'public/images/blogs/';
            $image->move($uploadPath, $newName);
            $data['article_image'] = '/images/blogs/' . $newName;
        }

        $this->blogModel->updatePost($id, $data);

        return redirect()->to('/dashboard/blog_management')->with('message', 'Blog post updated successfully!');
    } else {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}

    public function delete($id)
    {
        // Handle blog post deletion (if needed)
        // Example:
        // $this->blogModel->deletePost($id);
        // return redirect()->to('/dashboard/blog_management')->with('success', 'Blog post deleted successfully.');
    }
}
