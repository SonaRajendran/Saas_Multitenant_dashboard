<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'teams';
    protected $allowedFields = ['name', 'org_id'];
    // Add methods for CRUD as needed
}