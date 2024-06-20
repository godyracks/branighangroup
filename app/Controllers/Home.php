<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        // Retrieve categories
        $categories = $this->categoryModel->findAll();
        
        // Pass categories to the view
        $data = [
            'categories' => $categories
        ];

        return view('homeview', $data);
    }
}
