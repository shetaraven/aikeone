<?php

namespace App\Models\Admin\Dashboard;

use CodeIgniter\Model;

class SysVariablesModel extends Model
{
    protected $table = 'sys_variables';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'ID',
        'LABEL',
        'VALUE',
    ];
}
