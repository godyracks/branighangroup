<?php 
namespace App\Controllers;

use App\Libraries\GoogleApi;
use App\Models\UserModel;
use CodeIgniter\Controller;

class GoogleAuthController extends Controller
{
    protected $googleApi;

    public function __construct()
    {
        $this->googleApi = new GoogleApi();
    }

    public function login()
    {
        return redirect()->to($this->googleApi->getLoginUrl());
    }

   public function callback()
{
    $code = $this->request->getGet('code');
    
    if ($code) {
        $token = $this->googleApi->authenticate($code);
        $userInfo = $this->googleApi->getUserInfo();

        $googleId = $userInfo['id'];
        $email = $userInfo['email'];
        $username = $userInfo['name'];
        $profileImage = $userInfo['picture'];

        // Check if user already exists with Google ID or email
        $userModel = new UserModel();
        $existingUser = $userModel->where('google_id', $googleId)->orWhere('email', $email)->first();

        if ($existingUser) {
            // User exists either with Google ID or with the same email, check Google credentials
            if ($existingUser['google_id']) {
                // User already authenticated via Google, log them in
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $existingUser);

                // Redirect admin users to dashboard
                if (in_array($email, ['branighangroup@gmail.com', 'godfreymatagaro@gmail.com', 'brannyokara@gmail.com'])) {
                    return redirect()->to('/dashboard/welcome');
                } else {
                    return redirect()->to('/profile');
                }
            } else {
                // User exists with the same email but not authenticated via Google
                session()->setFlashdata('error', 'Your Gmail exists, you need to use a different gmail address or reset your password if you have forgotten it.');
                return redirect()->to('/');
            }
        } else {
            // User does not exist with Google ID or email, check if they can sign in via Google API
            // Check if user is eligible to sign in with Google API (has valid Google credentials)
            if ($googleId && $profileImage) {
                // Create a new user with Google credentials
                $userData = [
                    'username' => $username,
                    'email' => $email,
                    'google_id' => $googleId,
                    'profile_image' => $profileImage,
                    'is_email_verified' => true // Assuming Google authenticated users are verified
                ];
                $userModel->save($userData);

                // Log the new user in
                $newUser = $userModel->where('google_id', $googleId)->first();
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $newUser);

                // Redirect admin users to dashboard
                if (in_array($email, ['branighangroup@gmail.com', 'godfreymatagaro@gmail.com', 'brannyokara@gmail.com'])) {
                    return redirect()->to('/dashboard/welcome');
                } else {
                    return redirect()->to('/profile');
                }
            } else {
                // User does not have valid Google credentials, handle the scenario accordingly
                session()->setFlashdata('error', 'You are not authorized to sign in with Google.');
                return redirect()->to('/');
            }
        }
    }

    return redirect()->to('/');
}

}
