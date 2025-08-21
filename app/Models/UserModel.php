<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'password', 'name', 'org_id', 'role_id'];

    public function getUsers($orgId = null)
    {
        $builder = $this->builder();
        if (session()->get('role_name') !== 'super_admin' && $orgId === null) {
            $builder->where('org_id', session()->get('org_id'));
        } elseif ($orgId) {
            $builder->where('org_id', $orgId);
        }
        return $builder->get()->getResultArray();
    }
}