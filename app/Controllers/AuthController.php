<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            // Validate input
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'confirm_password' => 'required|matches[password]'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
            }

            // Generate verification code
            $verificationCode = bin2hex(random_bytes(16));

            // Create user
            $userModel = new UserModel();
            $userData = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'verification_code' => $verificationCode
            ];
            $userModel->save($userData);

            // Send verification email
            $this->sendVerificationEmail($userData['email'], $verificationCode);

            return $this->response->setJSON(['status' => 'success', 'message' => 'User registered successfully. Please check your email to verify your account.']);
        }

        return view('register');
    }

    private function sendVerificationEmail($email, $verificationCode)
    {
        $emailService = \Config\Services::email();

        $emailService->setTo($email);
        $emailService->setFrom('contact@branighangroup.com', 'Branighan Group');
        $emailService->setSubject('Email Verification');
        $emailService->setMessage("Please click the link below to verify your email address: <br><a href=\"" . base_url() . "/verify-email?code=$verificationCode\">Verify Email</a>");

        $emailService->send();
    }

    public function verifyEmail()
    {
        $code = $this->request->getGet('code');

        $userModel = new UserModel();
        $user = $userModel->where('verification_code', $code)->first();

        if ($user) {
            $userModel->update($user['id'], ['is_email_verified' => true, 'verification_code' => null]);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Email verified successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid verification code.']);
        }
    }
  public function login()
{
    helper(['form', 'url']);

    if ($this->request->getMethod() === 'post') {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Invalid username or password.');
            return redirect()->back()->withInput();
        }

        $session = session();
        $session->set('isLoggedIn', true);
        $session->set('userData', $user);

        if (in_array($user['email'], ['branighangroup@gmail.com', 'godfreymatagaro@gmail.com', 'brannyokara@gmail.com'])) {
            session()->setFlashdata('success', 'Welcome to the admin dashboard!');
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('success', 'Welcome to your profile!');
            return redirect()->to('/profile');
        }
    }

    return view('login');
}


 public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }


}
