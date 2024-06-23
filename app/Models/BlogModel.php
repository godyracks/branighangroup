<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'author_name', 
        'title', 
        'content', 
        'article_image', 
        'tags', 
        'category',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    // Method to get all posts
    public function getAllPosts()
    {
        return $this->findAll();
    }

    // Method to get a single post by ID
    public function getPostById($id)
    {
        return $this->find($id);
    }

    // Method to create a new post
    public function createPost($data)
    {
        return $this->insert($data);
    }

    // Method to update a post by ID
    public function updatePost($id, $data)
    {
        return $this->update($id, $data);
    }

    // Method to delete a post by ID
    public function deletePost($id)
    {
        return $this->delete($id);
    }

    // Method to get the top 5 posts based on created_at in descending order
   public function getTopPosts()
{
    return $this->orderBy('RAND()')->limit(5)->findAll();
}


    // Method to get the top 4 latest articles
    public function getLatestArticles()
    {
        return $this->orderBy('created_at', 'DESC')->findAll(4);
    }
    
    public function searchPosts($query)
    {
        // Example: perform search in the 'title' or 'content' fields
        return $this->like('title', $query)
                    ->orWhere('content', $query)
                    ->findAll();
    }
}
