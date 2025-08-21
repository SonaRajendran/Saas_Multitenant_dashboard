<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model
{
    protected $table = 'subscriptions';
    protected $allowedFields = ['org_id', 'plan', 'status', 'stripe_sub_id', 'billing_info'];

    public function getSubscription($orgId)
    {
        return $this->where('org_id', $orgId)->first();
    }
}