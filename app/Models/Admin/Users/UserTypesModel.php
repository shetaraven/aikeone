<?php

namespace App\Models\Admin\Users;

use CodeIgniter\Model;

class UserTypesModel extends Model
{
    protected $table = 'user_types';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        
    ];
    protected $useTimestamps = true;
}
