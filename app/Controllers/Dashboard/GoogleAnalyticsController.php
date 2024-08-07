<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Libraries\GoogleAnalytics;
use CodeIgniter\Exceptions\PageNotFoundException;

class GoogleAnalyticsController extends BaseController
{
    protected $googleAnalytics;
    private $allowedEmails = [
        'branighangroup@gmail.com',
        'godfreymatagaro@gmail.com',
        'brannyokara@gmail.com'
    ];

    public function __construct()
    {
        // Initialize the GoogleAnalytics library
        $this->googleAnalytics = new GoogleAnalytics();

        // Ensure session is loaded
        $this->session = \Config\Services::session();
    }

    private function checkAccess()
    {
        // Check if user is logged in
        if (!$this->session->has('isLoggedIn')) {
            throw new PageNotFoundException('You are not logged in.');
        }

        // Retrieve the user's email from the session
        $userData = $this->session->get('userData');
        if (empty($userData) || !isset($userData['email'])) {
            throw new PageNotFoundException('User data is missing.');
        }

        $userEmail = $userData['email'];

        // Check if the user's email is in the list of allowed emails
        if (!in_array($userEmail, $this->allowedEmails)) {
            throw new PageNotFoundException('You do not have permission to access this page.');
        }
    }

    public function authenticate()
    {
        try {
            $authCode = $this->request->getVar('code');
            if (empty($authCode)) {
                throw new \InvalidArgumentException('Authorization code is missing.');
            }

            $this->googleAnalytics->authenticate($authCode);

            // Redirect to the analytics dashboard or wherever you need
            return redirect()->to('/dashboard/analytics');
        } catch (\Exception $e) {
            // Handle the error appropriately
            return redirect()->to('/error')->with('error', $e->getMessage());
        }
    }

    public function index()
    {
       
            $this->checkAccess();

            // Example view ID, start date, and end date
            $viewId = 'YOUR_VIEW_ID';
            $startDate = '7daysAgo';
            $endDate = 'today';

            $sessions = $this->googleAnalytics->getSessions($viewId, $startDate, $endDate);

            return view('dashboard/analyticsview', ['sessions' => $sessions]);
       
    }
}
