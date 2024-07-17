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

        // Determine the next folder number
        $lastHouse = $sellHouseModel->orderBy('id', 'DESC')->first();
        $nextFolderNumber = $lastHouse ? $lastHouse['id'] + 1 : 1;

        // Create the new folder
        $uploadPath = ROOTPATH . 'public/images/housesonsale/' . $nextFolderNumber;
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if ($images && isset($images['images'])) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move($uploadPath, $newName);
                    $imageUrls[] = '/images/housesonsale/' . $nextFolderNumber . '/' . $newName;
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

        // Send the email
        $this->sendEmail($data);

        return redirect()->to(base_url('sellyourhouse'))->with('message', 'House listed successfully!');
    }

    private function sendEmail($data)
    {
        $email = \Config\Services::email();

        $email->setFrom($data['email'], $data['name']);
        $email->setTo('contact@branighangroup.com');

        $email->setSubject('New House Listing');
        $email->setMessage(
            "A new house has been listed:\n\n" .
            "Name: " . $data['name'] . "\n" .
            "Description: " . $data['description'] . "\n" .
            "Price: " . $data['price'] . "\n" .
            "Category ID: " . $data['category_id'] . "\n" .
            "Email: " . $data['email'] . "\n" .
            "Phone: " . $data['phone'] . "\n" .
             "Check Admin Dashboard for Images:\n\n" 
        );

        if (!$email->send()) {
            log_message('error', 'Email could not be sent.');
            log_message('error', $email->printDebugger(['headers']));
        }
    }
}