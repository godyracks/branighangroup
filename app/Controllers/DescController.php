<?php
namespace App\Controllers;

use App\Models\HouseModel;

class DescController extends BaseController
{
    protected $houseModel;

    public function __construct()
    {
        $this->houseModel = new HouseModel();
    }

    public function index($id): string
    {
        $house = $this->houseModel->find($id);

        if (!$house) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('House not found');
        }

        $data = [
            'house' => $house,
        ];

        return view('descview', $data);
    }
}
