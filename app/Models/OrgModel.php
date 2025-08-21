<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgModel extends Model
{
    protected $table = 'organizations';
    protected $allowedFields = ['name'];

    public function createOrg($name)
    {
        $this->insert(['name' => $name]);
        return $this->insertID();
    }
}