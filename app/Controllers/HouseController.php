<?php

namespace App\Controllers;

use App\Models\HouseModel;
use App\Models\CategoryModel;

class HouseController extends BaseController
{
    protected $houseModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->houseModel = new HouseModel();
        $this->categoryModel = new CategoryModel();
    }

   public function index()
   {
       // Get page number from URL parameter, default to 1 if not provided
       $currentPage = $this->request->getGet('page') ?? 1;

       // Define the number of items per page
       $perPage = 9;

       // Calculate the offset
       $offset = ($currentPage - 1) * $perPage;

       // Fetch total number of houses
       $totalHouses = $this->houseModel->countAllResults();

       // Fetch houses for the current page
       $houses = $this->houseModel
           ->select('id, name, price, image1_url, description')
           ->limit($perPage, $offset)
           ->find();

       // Calculate total number of pages
       $totalPages = ceil($totalHouses / $perPage);

       // Pass data to the view
       $data = [
           'houses' => $houses,
           'currentPage' => $currentPage,
           'totalPages' => $totalPages,
           'categories' => $this->categoryModel->findAll()
       ];

       // Render houses view
       return view('housesview', $data);
   }

// Method to filter houses by amenities
public function filterByAmenities($amenity)
{
    // Fetch houses that have the specified amenity
    $houses = $this->houseModel->like('amenities', $amenity)->findAll();

    // Pass the filtered houses to the homeview
    $data = [
        'houses' => $houses,
        'categories' => $this->categoryModel->findAll(),
        'message' => "Houses with $amenity",
        'currentPage' => 1, // Set currentPage to 1 for now
        'totalPages' => 1   // Set totalPages to 1 for now
    ];

    // Render homeview
    return view('homeview', $data);
}


    

    public function filter()
    {
        // Get the filter criteria from the request
        $category = $this->request->getGet('category');
        $budget = $this->request->getGet('budget');

        // Initialize the builder
        $builder = $this->houseModel->builder()->select('id, name, price, description, image1_url');

        $message = "";

        // Filter by category if specified
        if (!empty($category)) {
            $categoryData = $this->categoryModel->find($category);
            if ($categoryData) {
                $builder->where('category_id', $category);
                $message = "Category: " . $categoryData['name'];
            } else {
                $message = "Category not found!";
            }
        }

        // Filter by budget if specified
        if (!empty($budget)) {
            list($min, $max) = $this->parseBudgetRange($budget);
            if ($min !== null) {
                $builder->where('price >=', $min);
            }
            if ($max !== null) {
                $builder->where('price <=', $max);
            }
            $message = "Houses within range $budget";
        }

        $houses = $builder->get()->getResultArray();

        // Check if houses are found
        if (empty($houses)) {
            if (!empty($budget)) {
                $message .= " are not available!";
            } else {
                $message = "No houses available!";
            }
        }

        // Pass the filtered houses and message to the view
        $data = [
            'houses' => $houses,
            'categories' => $this->categoryModel->findAll(),
            'message' => $message,
            'currentPage' => 1, // Set currentPage to 1 for now
            'totalPages' => 1   // Set totalPages to 1 for now
        ];

        return view('housesview', $data);
    }

    // Parse the budget range string into min and max values
    private function parseBudgetRange($range)
    {
        switch ($range) {
            case '0-500k':
                return [0, 500000];
            case '500k-1m':
                return [500000, 1000000];
            case '1m-2m':
                return [1000000, 2000000];
            case '2m-3m':
                return [2000000, 3000000];
            case '3m-5m':
                return [3000000, 5000000];
            case '5m-10m':
                return [5000000, 10000000];
            case 'Above 10m':
                return [10000000, null];
            default:
                return [null, null];
        }
    }

    public function search()
    {
        $query = $this->request->getGet('query');

        if ($query) {
            $houses = $this->houseModel->select('id, name, price, image1_url')->like('name', $query)->findAll();
        } else {
            $houses = [];
        }

        return $this->response->setJSON($houses);
    }

    // Display detailed house information
    // public function show($name)
    // {
    //     // Retrieve the house details by the unique name
    //     $house = $this->houseModel->where('name', $name)->first();
    
    //     // Check if the house exists
    //     if (!$house) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('House not found');
    //     }
    
    //     // Fetch similar homes based on some criteria
    //     $similarHomes = $this->houseModel->findSimilar($house); // Example method, adjust as needed
    
    //     // Prepare data to be passed to the view
    //     $data = [
    //         'house' => $house,
    //         'similarHomes' => $similarHomes,
    //         'categories' => $this->categoryModel->findAll()
    //     ];
    
    //     // Load the view to display the house details
    //     return view('descview', $data);
    // }
    
    public function show($name)
{
    // Retrieve the house details by the unique name
    $house = $this->houseModel->where('name', $name)->first();

    // Check if the house exists
    if (!$house) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('House not found');
    }

    // Prepare data to be passed to the view
    $data = [
        'house' => $house,
        'categories' => $this->categoryModel->findAll()
    ];

    // Load the view to display the house details
    return view('descview', $data);
}

}