<?php
// app/Controllers/Dashboard/SupportController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class SupportController extends BaseController
{
    public function index()
    {
        return view('dashboard/supportview');
    }

    public function submitSupportRequest()
    {
        // Handle support request form submission
        $subject = $this->request->getPost('subject');
        $description = $this->request->getPost('description');

        // Example: Validate and process support request data
        // You can implement validation logic here as needed

        // For demonstration purposes, just redirect back to the support page
        return redirect()->to('/dashboard/support')->with('success', 'Support request submitted successfully.');
    }

    public function submitFeedback()
    {
        // Handle feedback form submission
        $feedback = $this->request->getPost('feedback');

        // Example: Validate and process feedback data
        // You can implement validation logic here as needed

        // For demonstration purposes, just redirect back to the support page
        return redirect()->to('/dashboard/support')->with('success', 'Feedback submitted successfully.');
    }
}
