<?php

namespace App\Controllers;

use App\Models\HouseModel;
use CodeIgniter\Controller;

class SearchController extends Controller
{
    protected $houseModel;

    public function __construct()
    {
        $this->houseModel = new HouseModel();
    }

    public function index()
    {
        $location = $this->request->getGet('location');
        $houses = [];

        if ($location) {
            $houses = $this->houseModel
                ->select('id, name, description, price, image1_url, address, city, state, zip_code')
                ->like('address', $location)
                ->orLike('city', $location)
                ->orLike('state', $location)
                ->findAll();
        }

        // Return the search results as JSON
        return $this->response->setJSON($houses);
    }
}
