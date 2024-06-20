<?php
namespace App\Models;

use CodeIgniter\Model;

class DesignCategoryModel extends Model
{
    protected $table = 'design_category';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name']; 
}
