<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OrgModel;
use App\Models\UsageLogModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $orgModel = new OrgModel();
        $logModel = new UsageLogModel();
        
        $data['users'] = $userModel->getUsers();
        $data['orgs'] = $orgModel->findAll();
        $data['analytics'] = $logModel->getAnalytics(); // All orgs for super admin
        
        return view('admin/index', $data);
    }
}