<?php

namespace App\Models\Admin\Menu;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'MENU';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
}
