<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HouseModel;
use App\Models\CategoryModel;
use App\Models\DashboardModel;
use App\Models\DesignModel;
use App\Models\DesignCategoryModel;

class DashboardController extends Controller
{
     private $houseModel;
    private $categoryModel;
    private $dashboardModel;
    private $designModel;
    private $designCategoryModel;
    private $session;
    
    public function __construct()
    {
        // Load models
        $this->houseModel = new HouseModel();
        $this->categoryModel = new CategoryModel();
        $this->dashboardModel = new DashboardModel();
        $this->designModel = new DesignModel();
        $this->designCategoryModel = new DesignCategoryModel(); 
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

        // Pass categories to the view
        $data = [
            'categories' => $categories,
            'designCategories' => $designCategories,
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
}
