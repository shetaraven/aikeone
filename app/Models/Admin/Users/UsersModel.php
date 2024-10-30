<?php

namespace App\Models\Admin\Users;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'USERS';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'GOOGLE_ID',
        'GIVEN_NAME',
        'FAMILY_NAME',
        'EMAIL',
        'IMAGE',
        'ACTIVE',
    ];
    protected $useTimestamps = true;

    public function withUserType() {
        return $this->select([
            'USERS.*',
            'USER_TYPES.LABEL as USER_TYPE_LABEL'
        ])
        ->join('USER_TYPES', 'USERS.USER_TYPE_ID = USER_TYPES.ID', 'LEFT');
    }
}
