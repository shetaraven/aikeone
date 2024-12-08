<?php

namespace App\Models\Admin\Menu;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
}
