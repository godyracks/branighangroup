<?php
// app/Controllers/Dashboard/DashboardController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\HouseModel;
use App\Models\CategoryModel;
use App\Models\DesignModel;
use App\Models\DesignCategoryModel;

class DashboardController extends BaseController
{
    private $houseModel;
    private $categoryModel;
    private $designModel;
    private $designCategoryModel;


    public function __construct()
    {
        // Load models
        $this->houseModel = new HouseModel();
        $this->categoryModel = new CategoryModel();
        $this->designModel = new DesignModel();
        $this->designCategoryModel = new DesignCategoryModel(); 
        
    }

    public function index()
    {
          // Fetch categories from the CategoryModel
          $categories = $this->categoryModel->findAll();
          // Fetch design categories from DesignCategoryModel
         $designCategories = $this->designCategoryModel->findAll();

         $data = [
            'categories' => $categories,
            'designCategories' => $designCategories,
           
        ];
     // Example: Load view for welcome message
        return view('dashboard/dash_welcomeview', $data);
    }

    public function dashboard()
    {
           // Example: Load view for main dashboard
               // Fetch categories from the CategoryModel
          $categories = $this->categoryModel->findAll();
          // Fetch design categories from DesignCategoryModel
         $designCategories = $this->designCategoryModel->findAll();

         $data = [
            'categories' => $categories,
            'designCategories' => $designCategories,
           
        ];
        
        return view('dashboard/dashboardview', $data);
    }
}
