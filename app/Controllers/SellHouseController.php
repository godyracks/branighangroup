<?php

namespace App\Controllers;

use App\Models\HouseModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class SellHouseController extends Controller
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        
        echo view('sellhouse', $data);
    }

    public function sellsubmit()
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
            'square_footage' => 'required|numeric',
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
        
        if ($images && isset($images['images'])) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(WRITEPATH . 'uploads', $newName);
                    $imageUrls[] = 'uploads/' . $newName;
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
            'square_footage' => $this->request->getPost('square_footage'),
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

        return redirect()->to(base_url('sellyourhouse'))->with('message', 'House listed successfully!');
    }
}
