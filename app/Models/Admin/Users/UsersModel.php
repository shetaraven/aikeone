<?php

namespace App\Models\Admin\Users;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
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
            'users.*',
            'user_types.LABEL as USER_TYPE_LABEL'
        ])
        ->join('user_types', 'users.USER_TYPE_ID = user_types.ID', 'LEFT');
    }
}
