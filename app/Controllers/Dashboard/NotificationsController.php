<?php
// app/Controllers/Dashboard/NotificationsController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class NotificationsController extends BaseController
{
    public function index()
    {
        // Sample data for notifications (replace with actual data retrieval logic)
        $data['notifications'] = [
            [
                'title' => 'New Inquiry',
                'message' => 'A new inquiry has been received.',
                'date' => 'June 24, 2024'
            ],
            [
                'title' => 'Property Sold',
                'message' => 'Property #101 has been sold.',
                'date' => 'June 23, 2024'
            ],
            // Add more notifications as needed
        ];

        // Load view with notifications data
        return view('dashboard/notificationsview', $data);
    }
}
