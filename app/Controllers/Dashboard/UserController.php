<?php
// app/Controllers/Dashboard/UserManagementController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Fetch all users
        $data['users'] = $this->userModel->findAll();

        // Load view with fetched data
        return view('dashboard/user_managementview', $data);
    }

  

    public function edit($id)
    {
        // Fetch user data by ID
        $data['user'] = $this->userModel->find($id);

        if (!$data['user']) {
            // Handle case where user is not found
            return redirect()->to('/dashboard/user_management')->with('error', 'User not found.');
        }

        // Handle user data update form submission
        if ($this->request->getMethod() === 'post') {
            $updateData = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                // Update other fields as needed
            ];

            // Update user data in database
            $this->userModel->update($id, $updateData);

            // Redirect to user management page with success message
            return redirect()->to('/dashboard/user_management')->with('success', 'User updated successfully.');
        }

        // Load edit view with user data
        return view('dashboard/user_editview', $data);
    }

    public function delete($id)
    {
        // Delete user by ID
        $this->userModel->delete($id);

        // Redirect to user management page with success message
        return redirect()->to('/dashboard/user_management')->with('success', 'User deleted successfully.');
    }
}

