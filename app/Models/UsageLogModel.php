<?php

namespace App\Models;

use CodeIgniter\Model;

class UsageLogModel extends Model
{
    protected $table = 'usage_logs';
    protected $allowedFields = ['user_id', 'action', 'details'];

    public function logAction($userId, $action, $details = null)
    {
        $this->insert(['user_id' => $userId, 'action' => $action, 'details' => $details]);
    }

    public function getAnalytics($orgId = null)
    {
        $builder = $this->builder()
            ->select('action, COUNT(*) as count')
            ->join('users', 'users.id = usage_logs.user_id')
            ->groupBy('action');
        
        if (session()->get('role_name') !== 'super_admin' && $orgId === null) {
            $builder->where('users.org_id', session()->get('org_id'));
        } elseif ($orgId) {
            $builder->where('users.org_id', $orgId);
        }
        
        return $builder->get()->getResultArray();
    }
}