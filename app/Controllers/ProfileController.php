<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Load profile view
        return view('profileview');
    }
}
