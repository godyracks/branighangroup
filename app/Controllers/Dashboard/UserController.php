<?php


namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    protected $userModel;
     private $allowedEmails = [
        'branighangroup@gmail.com',
        'godfreymatagaro@gmail.com',
        'brannyokara@gmail.com'
    ];
    private $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }
       private function checkAccess()
    {
        // Check if user is logged in
        if (!$this->session->has('isLoggedIn')) {
            throw new PageNotFoundException('You are not logged in.');
        }

        // Retrieve the user's email from the session
        $userEmail = $this->session->get('userData')['email'];

        // Check if the user's email is in the list of allowed emails
        if (!in_array($userEmail, $this->allowedEmails)) {
            throw new PageNotFoundException('You do not have permission to access this page.');
        }
    }

   public function index()
{
    try {
        $this->checkAccess();
    } catch (PageNotFoundException $e) {
        return redirect()->to('/')->with('error', $e->getMessage());
    }

    $userdata = $this->userModel->findAll(); // Fetch all users from the database
    $data = [
        'users' => $userdata,
        'userData' => $this->session->get('userData')
    ];

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

