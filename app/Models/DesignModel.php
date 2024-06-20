<?php
namespace App\Models;

use CodeIgniter\Model;

class DesignModel extends Model
{
    protected $table = 'designs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'category_id', 'image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url', 'image6_url', 'image7_url', 'image8_url'];
}
