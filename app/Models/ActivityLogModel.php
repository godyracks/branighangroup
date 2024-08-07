<?php
namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'activity', 'created_at'];

    // You may adjust timestamps based on your requirements
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
