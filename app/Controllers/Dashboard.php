<?php

namespace App\Controllers;

use App\Models\UsageLogModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $logModel = new UsageLogModel();
        // The TenantFilter ensures this only retrieves data for the current org
        $data['analytics'] = $logModel->getAnalytics();
        
        return view('dashboard/index', $data);
    }
}