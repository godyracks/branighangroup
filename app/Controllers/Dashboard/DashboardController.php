<?php
// app/Controllers/Dashboard/DashboardController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\HouseModel;
use App\Models\CategoryModel;
use App\Models\DesignModel;
use App\Models\DesignCategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DashboardController extends BaseController
{
    private $houseModel;
    private $categoryModel;
    private $designModel;
    private $designCategoryModel;
    private $allowedEmails = [
        'branighangroup@gmail.com',
        'godfreymatagaro@gmail.com',
        'brannyokara@gmail.com'
    ];
    private $session;

    public function __construct()
    {
        // Load models
        $this->houseModel = new HouseModel();
        $this->categoryModel = new CategoryModel();
        $this->designModel = new DesignModel();
        $this->designCategoryModel = new DesignCategoryModel(); 
        $this->session = session();
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

    public function index()
    {
        try {
            $this->checkAccess();
        } catch (PageNotFoundException $e) {
            return redirect()->to('/profile');
        }

        // Fetch categories from the CategoryModel
        $categories = $this->categoryModel->findAll();
        // Fetch design categories from DesignCategoryModel
        $designCategories = $this->designCategoryModel->findAll();

        $data = [
            'categories' => $categories,
            'designCategories' => $designCategories,
            'userData' => $this->session->get('userData')
        ];

        // Example: Load view for welcome message
        return view('dashboard/dash_welcomeview', $data);
    }

      public function dashboard()
    {
        try {
            $this->checkAccess();
        } catch (PageNotFoundException $e) {
            return redirect()->to('/profile');
        }

        // Fetch categories from the CategoryModel
        $categories = $this->categoryModel->findAll();
        // Fetch design categories from DesignCategoryModel
        $designCategories = $this->designCategoryModel->findAll();
        // Fetch houses from the HouseModel
        $houses = $this->houseModel->findAll();
        // Fetch designs from the DesignModel
        $designs = $this->designModel->findAll();

        $data = [
            'categories' => $categories,
            'designCategories' => $designCategories,
            'houses' => $houses,
            'designs' => $designs,
        ];

        // Example: Load view for main dashboard
        return view('dashboard/dashboardview', $data);
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
    
    public function editHouse($id)
{
    try {
        $this->checkAccess();
    } catch (PageNotFoundException $e) {
        return redirect()->to('/profile');
    }

    // Fetch the house data by ID
    $house = $this->houseModel->find($id);
    if (!$house) {
        throw new PageNotFoundException('House not found.');
    }

    // Fetch categories
    $categories = $this->categoryModel->findAll();

    $data = [
        'house' => $house,
        'categories' => $categories,
    ];

    return view('dashboard/edit_house', $data);
}
public function updateHouse($id)
{
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
        'images.*' => 'is_image[images]|max_size[images,2048]|ext_in[images,jpg,jpeg,png]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Handle file uploads
    $images = $this->request->getFiles();
    $imageUrls = [];

    // Create the folder if it doesn't exist
    $uploadPath = ROOTPATH . 'public/images/uploads/' . $id;
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    if ($images && isset($images['images'])) {
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move($uploadPath, $newName);
                $imageUrls[] = '/images/uploads/' . $id . '/' . $newName;
            }
        }
    }

    // Fetch the current house data
    $currentHouse = $this->houseModel->find($id);

    // Prepare the data for update
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
    for ($i = 1; $i <= 8; $i++) {
        if (isset($imageUrls[$i - 1])) {
            $data['image' . $i . '_url'] = $imageUrls[$i - 1];
        } else {
            $data['image' . $i . '_url'] = $currentHouse['image' . $i . '_url'];
        }
    }

    // Update the data in the database
    $this->houseModel->update($id, $data);

    return redirect()->to(base_url('/dashboard'))->with('message', 'House updated successfully!');
}
// EDIT && UPDATE DESIGNS
public function editDesign($id)
{
    $design = $this->designModel->find($id);

    // Fetch categories from your model or wherever they are stored
    $categories = $this->designCategoryModel->findAll(); // Adjust as per your actual model method

    return view('dashboard/edit_design', [
        'design' => $design,
        'categories' => $categories,
    ]);
}

    
    
    public function updateDesign($id)
{
    // Validate the request
    if (!$this->validate([
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'is_image[images]|max_size[images,2048]|ext_in[images,jpg,jpeg,png]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Handle file uploads
    $images = $this->request->getFiles();
    $imageUrls = [];

    // Create the folder if it doesn't exist
    $uploadPath = ROOTPATH . 'public/images/uploads/designs/' . $id;
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Check if any new images are uploaded
    if ($images && isset($images['images'])) {
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move($uploadPath, $newName);
                $imageUrls[] = '/images/uploads/designs/' . $id . '/' . $newName;
            }
        }
    }

    // Fetch the current design data
    $currentDesign = $this->designModel->find($id);

    // Prepare the data for update
    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'category_id' => $this->request->getPost('category_id'),
        'price' => $this->request->getPost('price'),
    ];

    // Add image URLs to the data
    for ($i = 1; $i <= 8; $i++) {
        if (isset($imageUrls[$i - 1])) {
            $data['image' . $i . '_url'] = $imageUrls[$i - 1];
        } else {
            // Retain the existing image URL if no new image uploaded for that slot
            $data['image' . $i . '_url'] = $currentDesign['image' . $i . '_url'];
        }
    }

    // Update the data in the database
    $this->designModel->update($id, $data);

    return redirect()->to(base_url('/dashboard'))->with('message', 'Design updated successfully!');
}

public function deleteDesign($id)
{
    try {
        $this->checkAccess();
    } catch (PageNotFoundException $e) {
        return redirect()->to('/profile');
    }

    // Find the design by ID
    $design = $this->designModel->find($id);

    if (!$design) {
        return redirect()->to(base_url('/dashboard'))->with('error', 'Design not found.');
    }

    // Delete the design
    $this->designModel->delete($id);

    // Optionally, you can also delete associated images if needed
    // Example: Remove image files from server
    for ($i = 1; $i <= 8; $i++) {
        $imageUrl = $design['image' . $i . '_url'];
        if ($imageUrl) {
            $imagePath = ROOTPATH . 'public' . $imageUrl;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

    return redirect()->to(base_url('/dashboard'))->with('message', 'Design deleted successfully.');
}

public function deleteHouse($id)
{
    try {
        $this->checkAccess();
    } catch (PageNotFoundException $e) {
        return redirect()->to('/profile');
    }

    // Find the house by ID
    $house = $this->houseModel->find($id);

    if (!$house) {
        return redirect()->to(base_url('/dashboard'))->with('error', 'House not found.');
    }

    // Delete the house
    $this->houseModel->delete($id);

    // Optionally, you can also delete associated images if needed
    // Example: Remove image files from server
    for ($i = 1; $i <= 8; $i++) {
        $imageUrl = $house['image' . $i . '_url'];
        if ($imageUrl) {
            $imagePath = ROOTPATH . 'public' . $imageUrl;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

    return redirect()->to(base_url('/dashboard'))->with('message', 'House deleted successfully.');
}

   
}
