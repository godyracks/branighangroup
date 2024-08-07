<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;

class BlogController extends Controller
{
    public function index()
    {
        $blogModel = new BlogModel();

        // Get page number from URL parameter, default to 1 if not provided
        $currentPage = $this->request->getGet('page') ?? 1;

        // Define the number of items per page
        $perPage = 6;

        // Calculate the offset
        $offset = ($currentPage - 1) * $perPage;

        // Fetch total number of posts
        $totalPosts = $blogModel->countAllResults(false); // false to avoid counting soft-deleted records

        // Fetch posts for the current page
        $posts = $blogModel
            ->orderBy('created_at', 'DESC')
            ->limit($perPage, $offset)
            ->get()
            ->getResultArray();

        // Fetch top posts
        $topPosts = $blogModel->getTopPosts(); // Assuming getTopPosts() fetches top 5 posts

        // Calculate total number of pages
        $totalPages = ceil($totalPosts / $perPage);

        // Pass data to the view
        $data = [
            'posts' => $posts,
            'topPosts' => $topPosts, // Pass topPosts to the view
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'message' => $posts ? 'Posts fetched successfully' : 'No posts available',
        ];

        // Render view with pagination data
        return view('blogview', $data);
    }

public function view($title)
{
    $blogModel = new BlogModel();

    // Replace hyphens with spaces
    $title = str_replace('-', ' ', $title);

    // Decode the URL-encoded title
    $title = urldecode($title);

    // Fetch the post using the title
    $post = $blogModel->where('title', $title)->first();

    if (!$post) {
        // Handle case where post is not found
        return redirect()->to('/blog')->with('error', 'Post not found.');
    }

    // Pass data to the view
    $data = [
        'post' => $post,
    ];

    // Render view with post data
    return view('full-article', $data);
}








    public function latestArticles()
    {
        $blogModel = new BlogModel();
        $latestArticles = $blogModel->getLatestArticles(4); // Fetch top 4 latest articles

        // Return JSON response
        return $this->response->setJSON($latestArticles);
    }

    public function search()
    {
        $blogModel = new BlogModel();
        $query = $this->request->getGet('q');

        // Perform search query in the model (example)
        $searchResults = $blogModel->searchPosts($query);

        // Return JSON response
        return $this->response->setJSON($searchResults);
    }
}
