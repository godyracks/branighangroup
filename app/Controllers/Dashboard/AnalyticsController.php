<?php
// app/Controllers/Dashboard/AnalyticsController.php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class AnalyticsController extends BaseController
{
    public function index()
    {
        // Load the view for analytics
        return view('dashboard/analyticsview');
    }
}
