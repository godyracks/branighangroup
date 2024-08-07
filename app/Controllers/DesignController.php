<?php
namespace App\Controllers;

use App\Models\DesignModel;
use App\Models\DesignCategoryModel;

class DesignController extends BaseController
{
    protected $designModel;
    protected $designCategoryModel;

    public function __construct()
    {
        $this->designModel = new DesignModel();
        $this->designCategoryModel = new DesignCategoryModel();
    }

    public function index()
    {
        // Get page number from URL parameter, default to 1 if not provided
        $currentPage = $this->request->getGet('page') ?? 1;

        // Define the number of items per page
        $perPage = 9;

        // Calculate the offset
        $offset = ($currentPage - 1) * $perPage;

        // Fetch total number of designs
        $totalDesigns = $this->designModel->countAllResults();

        // Fetch designs for the current page
        $designs = $this->designModel
            ->select('id, name, price, description, image1_url')
            ->limit($perPage, $offset)
            ->findAll();

        // Calculate total number of pages
        $totalPages = ceil($totalDesigns / $perPage);

        // Pass data to the view
        $data = [
            'designs' => $designs,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'categories' => $this->designCategoryModel->findAll(),
            'message' => $designs ? 'All designs fetched successfully' : 'No designs available',
            'selectedCategoryName' => null,
        ];

        // Render design view
        return view('designview', $data);
    }

public function filter()
{
    // Get the filter criteria from the request
    $category_id = $this->request->getGet('category');
    $budget = $this->request->getGet('budget');

    // Define the number of items per page
    $perPage = 9;

    // Get page number from URL parameter, default to 1 if not provided
    $currentPage = $this->request->getGet('page') ?? 1;

    // Calculate the offset
    $offset = ($currentPage - 1) * $perPage;

    // Initialize the builder
    $builder = $this->designModel->builder()->select('id, name, price, description, image1_url');

    // Variables to hold query parts
    $whereConditions = [];
    $message = "";

    // Filter by category if specified
    if (!empty($category_id)) {
        $whereConditions['category_id'] = $category_id;
    }

    // Filter by budget if specified
    if (!empty($budget)) {
        [$minPrice, $maxPrice] = $this->parseBudgetRange($budget);
        if ($minPrice !== null) {
            $builder->where('price >=', $minPrice);
        }
        if ($maxPrice !== null) {
            $builder->where('price <=', $maxPrice);
        }
    }

    // Apply conditions
    if (!empty($whereConditions)) {
        $builder->where($whereConditions);
    }

    // Fetch the filtered designs
    $designs = $builder->limit($perPage, $offset)->get()->getResultArray();

    // Fetch total number of designs for pagination
    $totalDesigns = $this->designModel->countAllResults();

    // Calculate total number of pages
    $totalPages = ceil($totalDesigns / $perPage);

    // Set appropriate message
    if (!empty($category_id)) {
        $selectedCategory = $this->designCategoryModel->find($category_id);
        $selectedCategoryName = $selectedCategory ? $selectedCategory['name'] : 'Unknown';
        $message = empty($designs) ? "No designs found for the selected category and budget" : "Filtered by category: {$selectedCategoryName}";
    } else {
        $message = empty($designs) ? 'No designs available for the selected budget' : 'Filtered by budget successfully';
        $selectedCategoryName = null;
    }

    // Pass the filtered designs and message to the view
    $data = [
        'designs' => $designs,
        'message' => $message,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
        'categories' => $this->designCategoryModel->findAll(),
        'selectedCategoryName' => $selectedCategoryName,
    ];

    return view('designview', $data);
}




    public function search()
    {
        $query = $this->request->getGet('query');
    
        // Debugging statements
        log_message('debug', 'Search query: ' . $query);
    
        if ($query) {
            $designs = $this->designModel->select('id, name, description, price, image1_url')->like('name', $query)->findAll();
            log_message('debug', 'Number of designs found: ' . count($designs));
        } else {
            $designs = [];
        }
    
        return $this->response->setJSON($designs);
    }
    
    public function show($id, $name)
    {
        // Retrieve the design details by ID
        $design = $this->designModel->find($id);
    
        // Check if the design exists
        if (!$design) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Design not found');
        }
    
        // Verify that the name in the URL matches the actual name
        if (url_title($design['name'], '-', TRUE) !== $name) {
            // If the name in the URL doesn't match the actual name, redirect to the correct URL
            return redirect()->to(site_url("design/view/{$id}/" . url_title($design['name'], '-', TRUE)));
        }
    
        // Prepare data to be passed to the view
        $data = [
            'design' => $design,
            'categories' => $this->designCategoryModel->findAll()
        ];
    
        // Load the view to display the design details
        return view('descview', $data);
    }

    // Parse the budget range string into min and max values
    private function parseBudgetRange($range)
    {
        switch ($range) {
            case '0-10k':
                return [0, 10000];
            case '10k-20k':
                return [10000, 20000];
            case '20k-30k':
                return [20000, 30000];
            case '30k-40k':
                return [30000, 40000];
            case '40k-50k':
                return [40000, 50000];
            case '50k-60k':
                return [50000, 60000];
            case '60k-70k':
                return [60000, 70000];
            case '70k-80k':
                return [70000, 80000];
            case '80k-90k':
                return [80000, 90000];
            case '90k-100k':
                return [90000, 100000];
            case 'Above 100k':
                return [100000, null];
            default:
                return [null, null];
        }
    }
}
