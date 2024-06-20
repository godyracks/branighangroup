<?php
namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'houses';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'description', 'price', 'category_id', 'bedrooms', 'bathrooms', 'address', 'city', 'state', 'zip_code', 'year_built',
        'lot_size', 'garage_spaces', 'amenities', 'latitude', 'longitude', 
        'image1_url', 'image2_url', 'image3_url', 'image4_url', 
        'image5_url', 'image6_url', 'image7_url', 'image8_url'
    ];
}
