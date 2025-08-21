<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OrgModel;
use App\Models\RoleModel;
use App\Models\SubscriptionModel; // Import SubscriptionModel
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $userModel = new UserModel();
        $roleModel = new RoleModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $userModel->where('email', $email)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            $role = $roleModel->find($user['role_id']);
            
            session()->set([
                'user_id' => $user['id'],
                'org_id' => $user['org_id'],
                'role_id' => $user['role_id'],
                'role_name' => $role['name'],
                'permissions' => $role['permissions']
            ]);
            
            return redirect()->to('/dashboard');
        }
        
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function doRegister()
    {
        $orgModel = new OrgModel();
        $userModel = new UserModel();
        $subModel = new SubscriptionModel(); // Use SubscriptionModel
        
        $orgName = $this->request->getPost('org_name');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $name = $this->request->getPost('name');
        
        $orgId = $orgModel->createOrg($orgName);
        
        $userModel->insert([
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'org_id' => $orgId,
            'role_id' => 2  // org_admin
        ]);
        
        // Create default subscription
        $subModel->insert(['org_id' => $orgId, 'plan' => 'basic']);
        
        return redirect()->to('/auth/login')->with('success', 'Registered successfully');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}