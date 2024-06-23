<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HouseModel;
use App\Models\CategoryModel;
use App\Models\DashboardModel;
use App\Models\DesignModel;
use App\Models\DesignCategoryModel;
use App\Models\BlogModel;

class DashboardController extends Controller
{
     private $houseModel;
    private $categoryModel;
    private $dashboardModel;
    private $designModel;
    private $designCategoryModel;
    private $blogModel;
    private $session;
    
    public function __construct()
    {
        // Load models
        $this->houseModel = new HouseModel();
        $this->categoryModel = new CategoryModel();
        $this->dashboardModel = new DashboardModel();
        $this->designModel = new DesignModel();
        $this->designCategoryModel = new DesignCategoryModel(); 
        $this->blogModel = new BlogModel();
        $this->session = session();
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->session->has('isLoggedIn')) {
            return redirect()->to('/');
        }
        // Retrieve the user's email from the session
        $userEmail = $this->session->get('userData')['email'];

        // List of allowed emails
        $allowedEmails = [
            'brannyokara@gmail.com',
            'godfreymatagaro@gmail.com',
            'branighangroup@gmail.com'
        ];

        // Check if the user's email is in the list of allowed emails
        if (!in_array($userEmail, $allowedEmails)) {
            return redirect()->to('/sellyourhouse');
        }


        // Fetch categories from the CategoryModel
        $categories = $this->categoryModel->findAll();
         // Fetch design categories from DesignCategoryModel
        $designCategories = $this->designCategoryModel->findAll();
        // Fetch blog posts from BlogModel
        $blogs = $this->blogModel->findAll();

        // Pass categories to the view
        $data = [
            'categories' => $categories,
            'designCategories' => $designCategories,
            'blogs' => $blogs,
            'userData' => $this->session->get('userData') // Assuming you store user data in the session
        ];

        // Load dashboard view with the categories data
        return view('dashboardview', $data);
    }

  
     public function posthouse()
    {
        $houseModel = new HouseModel();

        // Validate the request
        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'year_built' => 'required|numeric',
            'lot_size' => 'required|numeric',
            'garage_spaces' => 'required|numeric',
            'amenities' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'images.*' => 'uploaded[images]|max_size[images,2048]|ext_in[images,jpg,jpeg,png]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle the file uploads
        $images = $this->request->getFiles();
        $imageUrls = [];
        
        // Determine the next folder number
        $lastHouse = $houseModel->orderBy('id', 'DESC')->first();
        $nextFolderNumber = $lastHouse ? $lastHouse['id'] + 1 : 1;

        // Create the new folder
        $uploadPath = ROOTPATH . 'public/images/uploads/' . $nextFolderNumber;
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if ($images && isset($images['images'])) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move($uploadPath, $newName);
                    $imageUrls[] = '/images/uploads/' . $nextFolderNumber . '/' . $newName;
                }
            }
        }

        // Prepare the data for insertion
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category_id'),
            'bedrooms' => $this->request->getPost('bedrooms'),
            'bathrooms' => $this->request->getPost('bathrooms'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'zip_code' => $this->request->getPost('zip_code'),
            'year_built' => $this->request->getPost('year_built'),
            'lot_size' => $this->request->getPost('lot_size'),
            'garage_spaces' => $this->request->getPost('garage_spaces'),
            'amenities' => $this->request->getPost('amenities'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];

        // Add image URLs to the data
        foreach ($imageUrls as $key => $imageUrl) {
            $data['image' . ($key + 1) . '_url'] = $imageUrl;
        }

        // Ensure that all image keys are set to null if no image is uploaded
        for ($i = count($imageUrls) + 1; $i <= 8; $i++) {
            $data['image' . $i . '_url'] = null;
        }

        // Insert the data into the database
        $houseModel->save($data);

        return redirect()->to(base_url('/dashboard'))->with('message', 'House listed successfully!');
    }
    
    public function postdesign()
    {
        // Validate the request
        if (!$this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'images.*' => 'uploaded[images]|max_size[images,2048]|ext_in[images,jpg,jpeg,png]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file uploads
        $images = $this->request->getFiles();
        $imageUrls = [];

        // Determine the next folder number
        $lastDesign = $this->designModel->orderBy('id', 'DESC')->first();
        $nextFolderNumber = $lastDesign ? $lastDesign['id'] + 1 : 1;

        // Create the new folder
        $uploadPath = ROOTPATH . 'public/images/designs/' . $nextFolderNumber;
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if ($images && isset($images['images'])) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move($uploadPath, $newName);
                    $imageUrls[] = '/images/designs/' . $nextFolderNumber . '/' . $newName;
                }
            }
        }

        // Prepare data for insertion
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        // Add image URLs to the data
        foreach ($imageUrls as $key => $imageUrl) {
            $data['image' . ($key + 1) . '_url'] = $imageUrl;
        }

        // Ensure that all image keys are set to null if no image is uploaded
        for ($i = count($imageUrls) + 1; $i <= 8; $i++) {
            $data['image' . $i . '_url'] = null;
        }

        // Insert data into the database
        $this->designModel->save($data);

        return redirect()->to(base_url('/dashboard'))->with('message', 'Design posted successfully!');
    }

    // CRUD operations for blog posts
    public function getBlogs()
    {
        // Fetch all blog posts
        $blogs = $this->blogModel->findAll();

        // Pass the blogs data to the view
        return view('bloglist', ['blogs' => $blogs]);
    }

   public function createBlog()
{
    helper(['form', 'url']);

    if ($this->request->getMethod() === 'post' && $this->validate([
            'author_name' => 'required',
            'title' => 'required',
            'content' => 'required',
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

        $data = [
            'author_name' => $this->request->getPost('author_name'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'article_image' => $imageUrl,
            'tags' => $this->request->getPost('tags'),
            'category' => $this->request->getPost('category'),
            'created_at' => date('Y-m-d H:i:s'), // Add current timestamp
            'updated_at' => date('Y-m-d H:i:s'), // Add current timestamp
        ];
        $this->blogModel->createPost($data);
        return redirect()->to('/dashboard')->with('message', 'Blog post created successfully!');
    } else {
        return view('createblog');
    }
}


    public function editBlog($id)
    {
        helper(['form', 'url']);

        $blog = $this->blogModel->getPostById($id);

        if ($this->request->getMethod() === 'post' && $this->validate([
                'author_name' => 'required',
                'title' => 'required',
                'content' => 'required',
                'published_date' => 'required',
                'article_image' => 'uploaded[article_image]|max_size[article_image,2048]|ext_in[article_image,jpg,jpeg,png]',
            ])) {
            // Handle the file upload
            $image = $this->request->getFile('article_image');
            $imageUrl = $blog['article_image']; // Keep the existing image if not changed
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $uploadPath = ROOTPATH . 'public/images/blogs/';
                $image->move($uploadPath, $newName);
                $imageUrl = '/images/blogs/' . $newName;
            }

            $data = [
                'author_name' => $this->request->getPost('author_name'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'published_date' => $this->request->getPost('published_date'),
                'article_image' => $imageUrl,
                'tags' => $this->request->getPost('tags'),
                'category' => $this->request->getPost('category'),
            ];
            $this->blogModel->updatePost($id, $data);
            return redirect()->to('/dashboard/getBlogs')->with('message', 'Blog post updated successfully!');
        } else {
            return view('editblog', ['blog' => $blog]);
        }
    }

    public function deleteBlog($id)
    {
        $this->blogModel->deletePost($id);
        return redirect()->to('/dashboard/getBlogs')->with('message', 'Blog post deleted successfully!');
    }
}
