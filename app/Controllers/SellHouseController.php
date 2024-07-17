<?php

namespace App\Controllers;

use App\Models\SellHouseModel;
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
        $sellHouseModel = new SellHouseModel();

        // Validate the request
        if (!$this->validate([
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'price'       => 'required|numeric',
            'category_id' => 'required|integer',
            'email'       => 'required|valid_email',
            'phone'       => 'required|min_length[10]|max_length[15]',
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
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category_id'),
            'email'       => $this->request->getPost('email'),
            'phone'       => $this->request->getPost('phone')
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
        $sellHouseModel->save($data);

        return redirect()->to(base_url('sellyourhouse'))->with('message', 'House listed successfully!');
    }
}
