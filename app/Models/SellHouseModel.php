<?php

namespace App\Models;

use CodeIgniter\Model;

class SellHouseModel extends Model
{
    protected $table      = 'houses_onsale';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 'description', 'price', 'category_id', 'email', 'phone','image1_url', 'image2_url',
        'image3_url', 'image4_url', 'image5_url', 'image6_url',
        'image7_url', 'image8_url'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
