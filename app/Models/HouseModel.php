<?php
namespace App\Models;

use CodeIgniter\Model;

class HouseModel extends Model
{
    protected $table = 'houses';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name', 'description', 'price', 'image_url', 'category_id',
        'bedrooms', 'bathrooms', 'address', 'city',
        'state', 'zip_code', 'year_built', 'lot_size', 'garage_spaces',
        'amenities', 'latitude', 'longitude', 'image1_url', 'image2_url',
        'image3_url', 'image4_url', 'image5_url', 'image6_url',
        'image7_url', 'image8_url'
    ];

    public function findSimilar($house)
    {
        // Define criteria for similarity, such as price range, category, etc.
        $similarCriteria = [
            'category_id' => $house['category_id'], // Example: Similar category
            'price >=' => $house['price'] * 0.8,    // Example: Price within 80% to 120% of the current house
            'price <=' => $house['price'] * 1.2,
            'id !=' => $house['id'],                // Exclude the current house
        ];

        // Fetch similar houses based on the defined criteria
        return $this->where($similarCriteria)
                    ->limit(4) // Limit the number of similar houses to be fetched
                    ->findAll();
    }
}
